<?php

namespace App\Http\Controllers;

use App\Models\WebSocketConnection;
use App\Models\TrafficMetric;
use Illuminate\Http\Request;
use App\Models\SecurityDecision;
use App\Services\RiskScoringService;
use App\Services\PythonResourceService;

class WebSocketController extends Controller
{
    public function connect(Request $request)
    {
        $connection = WebSocketConnection::create([
            'connection_id' => $request->connection_id,
            'user_id' => auth()->id(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'connected_at' => now(),
            'last_heartbeat_at' => now(),
            'status' => 'connected',
        ]);

        return response()->json([
            'success' => true,
            'id' => $connection->id,
        ]);
    }

    public function heartbeat(Request $request)
    {
        $connection = WebSocketConnection::findOrFail($request->id);

        $connection->update([
            'last_heartbeat_at' => now(),
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function disconnect(Request $request)
    {
        $connection = WebSocketConnection::findOrFail($request->id);

        $connection->update([
            'disconnected_at' => now(),
            'status' => 'disconnected',
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

public function message(
    Request $request,
    RiskScoringService $riskScoringService,
    PythonResourceService $pythonResourceService
) {
    $connection = WebSocketConnection::findOrFail(
        $request->connection_id
    );

    if (
        $connection->defense_action === 'throttle' &&
        $connection->updated_at?->gt(now()->subMilliseconds(500))
    ) {
        return response()->json([
            'success' => false,
            'action' => 'throttle',
            'message' => 'Traffic temporarily throttled.',
        ], 429);
    }

    if (
        $connection->defense_action === 'restrict' &&
        $connection->restricted_until &&
        $connection->restricted_until->isFuture()
    ) {
        return response()->json([
            'success' => false,
            'action' => 'restrict',
            'message' => 'Connection temporarily restricted.',
            'restricted_until' => $connection->restricted_until,
        ], 429);
    }

    $connection->increment(
        'message_count',
        $request->message_count ?? 0
    );

    $metric = TrafficMetric::create([
        'connection_id' => $connection->id,
        'message_count' => $request->message_count ?? 0,
        'message_size' => $request->message_size ?? 0,
        'messages_per_second' => $request->messages_per_second ?? 0,
        'bytes_per_second' => $request->bytes_per_second ?? 0,
        'average_message_size' => $request->average_message_size ?? 0,
        'connection_rate' => $request->connection_rate ?? 0,
        'reconnection_rate' => $request->reconnection_rate ?? 0,
        'measured_at' => now(),
    ]);

    $resources = $pythonResourceService->collect();

    $activeConnections = WebSocketConnection::where(
        'status',
        'connected'
    )->count();

    $riskScore = $riskScoringService->calculate([
        'messages_per_second' => $metric->messages_per_second,
        'bytes_per_second' => $metric->bytes_per_second,
        'active_connections' => $activeConnections,
        'connection_rate' => $metric->connection_rate,
        'reconnection_rate' => $metric->reconnection_rate,
        'cpu_usage' => $resources['cpu_usage'] ?? 0,
        'memory_usage' => $resources['memory_usage'] ?? 0,
    ]);

    $riskLevel = $riskScoringService->level($riskScore);
    $action = $riskScoringService->action($riskScore);

    $this->applyDefense(
    $connection,
    $riskScore,
    $action
);
    SecurityDecision::create([
        'connection_id' => $connection->id,
        'risk_score' => $riskScore,
        'risk_level' => $riskLevel,
        'action' => $action,
        'reason' => 'Traffic and resource behavior evaluation',
        'decided_at' => now(),
    ]);

    return response()->json([
    'success' => true,
    'metric_id' => $metric->id,
    'risk_score' => $riskScore,
    'risk_level' => $riskLevel,
    'action' => $connection->defense_action,
    'violation_count' => $connection->violation_count,
]);
}

private function applyDefense(
    WebSocketConnection $connection,
    int $riskScore,
    string $action
): void {
    $violationCount = $connection->violation_count;

    if ($riskScore > 30) {
        $violationCount++;
    } else {
        $violationCount = max(0, $violationCount - 1);
    }

    if ($violationCount >= 5 && $riskScore >= 86) {
        $action = 'terminate';
    } elseif ($violationCount >= 3 && $riskScore >= 71) {
        $action = 'restrict';
    } elseif ($violationCount >= 2 && $riskScore >= 51) {
        $action = 'throttle';
    } elseif ($riskScore > 30) {
        $action = 'monitor';
    } else {
        $action = 'allow';
    }

    $connection->update([
        'risk_score' => $riskScore,
        'defense_action' => $action,
        'violation_count' => $violationCount,
        'restricted_until' => $action === 'restrict'
            ? now()->addSeconds(30)
            : null,
    ]);
}
}