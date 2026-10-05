<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ResourceMonitorService;

class CollectResourceMetrics extends Command
{
    protected $signature = 'socketshield:monitor';

    protected $description = 'Collect SocketShield resource metrics';

    public function handle(ResourceMonitorService $service): int
    {
        $service->collect();

        $this->info('Resource metrics collected.');

        return self::SUCCESS;
    }
}