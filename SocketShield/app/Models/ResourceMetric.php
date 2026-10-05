<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceMetric extends Model
{
    protected $fillable = [
        'cpu_usage',
        'memory_usage',
        'active_connections',
        'messages_per_second',
        'measured_at',
    ];

    protected $casts = [
        'cpu_usage'=>'float',
        'memory_usage'=>'float',
        'messages_per_second' => 'float',
        'measured_at' => 'datetime',
    ];
}
