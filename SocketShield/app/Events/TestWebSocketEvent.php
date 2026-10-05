<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestWebSocketEvent implements ShouldBroadcastNow
{
    use Dispatchable, SerializesModels;

    public function __construct(public string $message)
    {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('socketshield'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'TestWebSocketEvent';
    }
}