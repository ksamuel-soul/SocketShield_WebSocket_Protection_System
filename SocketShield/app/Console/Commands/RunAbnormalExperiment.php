<?php

namespace App\Console\Commands;

use App\Models\Experiment;
use App\Models\SecurityObservation;
use App\Models\TrafficMetric;
use App\Models\WebSocketConnection;
use App\Services\PythonResourceService;
use Illuminate\Console\Command;

class RunAbnormalExperiment extends Command
{
    protected $signature = 'socketshield:abnormal {duration=30}';

    protected $description = 'Collect controlled abnormal traffic observations';

    public function handle(PythonResourceService $pythonResourceService): int
    {
        $duration = (int) $this->argument('duration');

        $experiment = Experiment::create([
            'name' => 'Controlled Abnormal Traffic',
            'scenario' => 'message_burst',
            'description' => 'Controlled local high-frequency WebSocket message traffic',
            'duration_seconds' => $duration,
            'status' => 'running',
            'started_at' => now(),
        ]);

        $this->info("Abnormal experiment started for {$duration} seconds.");

        for ($i = 0; $i < $duration; $i++) {
            $resources = $pythonResourceService->collect();

            $traffic = TrafficMetric::latest('measured_at')->first();

            $activeConnections = WebSocketConnection::where(
                'status',
                'connected'
            )->count();

            SecurityObservation::create([
                'active_connections' => $activeConnections,
                'messages_per_second' => $traffic?->messages_per_second ?? 0,
                'message_size' => $traffic?->message_size ?? 0,
                'bytes_per_second' => $traffic?->bytes_per_second ?? 0,
                'average_message_size' => $traffic?->average_message_size ?? 0,
                'connection_rate' => $traffic?->connection_rate ?? 0,
                'reconnection_rate' => $traffic?->reconnection_rate ?? 0,
                'cpu_usage' => $resources['cpu_usage'] ?? 0,
                'memory_usage' => $resources['memory_usage'] ?? 0,
                'network_bytes_sent' => $resources['network_bytes_sent'] ?? 0,
                'network_bytes_received' => $resources['network_bytes_received'] ?? 0,
                'scenario' => 'message_burst',
                'label' => 'abnormal',
                'experiment_id' => $experiment->id,
                'collected_at' => now(),
            ]);

            $this->output->write('.');

            sleep(1);
        }

        $experiment->update([
            'status' => 'completed',
            'ended_at' => now(),
        ]);

        $this->newLine();
        $this->info('Abnormal experiment completed.');

        return self::SUCCESS;
    }
}