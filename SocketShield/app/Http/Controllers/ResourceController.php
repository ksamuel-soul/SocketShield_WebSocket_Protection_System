<?php

namespace App\Http\Controllers;

use App\Services\ResourceMonitorService;

class ResourceController extends Controller
{
    public function collect(ResourceMonitorService $service)
    {
        $metric = $service->collect();

        return response()->json([
            'success' => true,
            'data' => $metric,
        ]);
    }
}