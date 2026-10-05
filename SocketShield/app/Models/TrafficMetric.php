<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrafficMetric extends Model
{
    protected $table = 'traffic_metrics';

    protected $fillable = [
    'connection_id',
    'message_count',
    'message_size',
    'messages_per_second',
    'bytes_per_second',
    'average_message_size',
    'connection_rate',
    'reconnection_rate',
    'measured_at',
];
    protected $casts = [
    'messages_per_second' => 'float',
    'bytes_per_second' => 'float',
    'average_message_size' => 'float',
    'measured_at' => 'datetime',
];

    public function connection(): BelongsTo
    {
        return $this->belongsTo(WebSocketConnection::class, 'connection_id');
    }
}