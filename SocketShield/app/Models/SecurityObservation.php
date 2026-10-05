<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityObservation extends Model
{
    protected $fillable = [
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
];

    protected $casts = [
        'messages_per_second' => 'float',
        'cpu_usage' => 'float',
        'memory_usage' => 'float',
        'collected_at' => 'datetime',
    ];
}