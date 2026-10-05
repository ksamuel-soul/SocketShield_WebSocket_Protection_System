<?php

namespace App\Services;

use App\Models\ResourceMetric;
use App\Models\WebSocketConnection;

class ResourceMonitorService
{
    public function __construct(
        private PythonResourceService $pythonResourceService
    ) {
    }

    public function collect(): ResourceMetric
    {
        $resources = $this->pythonResourceService->collect();

        $activeConnections = WebSocketConnection::where(
            'status',
            'connected'
        )->count();

        return ResourceMetric::create([
            'cpu_usage' => (float) ($resources['cpu_usage'] ?? 0),
            'memory_usage' => (float) ($resources['memory_usage'] ?? 0),
            'active_connections' => $activeConnections,
            'messages_per_second' => 0,
            'measured_at' => now(),
        ]);
    }
}