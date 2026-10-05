<?php

namespace App\Console\Commands;

use App\Models\Experiment;
use App\Models\SecurityObservation;
use App\Models\TrafficMetric;
use App\Models\WebSocketConnection;
use App\Services\PythonResourceService;
use Illuminate\Console\Command;

class RunBaselineExperiment extends Command
{
    protected $signature = 'socketshield:baseline {duration=300}';

    protected $description = 'Collect normal WebSocket traffic for baseline analysis';

    public function handle(PythonResourceService $pythonResourceService): int
    {
        $duration = (int) $this->argument('duration');

        $experiment = Experiment::create([
            'name' => 'Normal Traffic Baseline',
            'scenario' => 'baseline',
            'description' => 'Legitimate WebSocket traffic used to establish normal behavior.',
            'duration_seconds' => $duration,
            'status' => 'running',
            'started_at' => now(),
        ]);

        $this->info("Baseline experiment started: {$experiment->id}");

        $endTime = time() + $duration;

        while (time() < $endTime) {
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
                'cpu_usage' => $resources['cpu_usage'] ?? 0,
                'memory_usage' => $resources['memory_usage'] ?? 0,
                'network_bytes_sent' => $resources['network_bytes_sent'] ?? 0,
                'network_bytes_received' => $resources['network_bytes_received'] ?? 0,
                'scenario' => 'baseline',
                'label' => 'normal',
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
        $this->info("Baseline experiment {$experiment->id} completed.");

        return self::SUCCESS;
    }
}