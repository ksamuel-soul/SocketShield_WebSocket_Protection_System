<?php

namespace App\Console\Commands;

use App\Models\SecurityObservation;
use App\Models\TrafficMetric;
use App\Models\WebSocketConnection;
use App\Services\PythonResourceService;
use Illuminate\Console\Command;

class CollectSecurityObservation extends Command
{
    protected $signature = 'socketshield:collect';

    protected $description = 'Collect a unified SocketShield security observation';

    public function handle(PythonResourceService $pythonResourceService): int
    {
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
            'label' => null,
            'collected_at' => now(),
        ]);

        $this->info('Security observation collected.');

        return self::SUCCESS;
    }
}