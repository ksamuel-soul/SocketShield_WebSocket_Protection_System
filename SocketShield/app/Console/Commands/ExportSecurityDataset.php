<?php

namespace App\Console\Commands;

use App\Models\SecurityObservation;
use Illuminate\Console\Command;

class ExportSecurityDataset extends Command
{
    protected $signature = 'socketshield:export';

    protected $description = 'Export SocketShield observations to CSV';

    public function handle(): int
    {
        $path = storage_path('app/security_observations.csv');

        $file = fopen($path, 'w');

        fputcsv($file, [
            'id',
            'active_connections',
            'messages_per_second',
            'message_size',
            'bytes_per_second',
            'average_message_size',
            'connection_rate',
            'reconnection_rate',
            'cpu_usage',
            'memory_usage',
            'network_bytes_sent',
            'network_bytes_received',
            'scenario',
            'label',
            'experiment_id',
            'collected_at',
        ]);

        SecurityObservation::orderBy('id')->chunk(500, function ($observations) use ($file) {
            foreach ($observations as $observation) {
                fputcsv($file, [
                    $observation->id,
                    $observation->active_connections,
                    $observation->messages_per_second,
                    $observation->message_size,
                    $observation->bytes_per_second,
                    $observation->average_message_size,
                    $observation->connection_rate,
                    $observation->reconnection_rate,
                    $observation->cpu_usage,
                    $observation->memory_usage,
                    $observation->network_bytes_sent,
                    $observation->network_bytes_received,
                    $observation->scenario,
                    $observation->label,
                    $observation->experiment_id,
                    $observation->collected_at,
                ]);
            }
        });

        fclose($file);

        $this->info("Dataset exported to {$path}");

        return self::SUCCESS;
    }
}