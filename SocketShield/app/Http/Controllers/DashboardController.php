<?php

namespace App\Http\Controllers;

use App\Models\TrafficMetric;
use App\Models\ResourceMetric;
use App\Models\WebSocketConnection;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function metrics()
    {
        $activeConnections = WebSocketConnection::where('status', 'connected')->count();

        $totalConnections = WebSocketConnection::count();

        $latestTraffic = TrafficMetric::latest('measured_at')->first();

        $latestResource = ResourceMetric::latest('measured_at')->first();

        return response()->json([
            'active_connections' => $activeConnections,
            'total_connections' => $totalConnections,
            'messages_per_second' => $latestTraffic?->messages_per_second ?? 0,
            'message_count' => $latestTraffic?->message_count ?? 0,
            'message_size' => $latestTraffic?->message_size ?? 0,
            'cpu_load' => $latestResource?->cpu_usage ?? 0,
            'memory_usage' => $latestResource?->memory_usage ?? 0,
            'measured_at' => $latestResource?->measured_at,
        ]);
    }
}