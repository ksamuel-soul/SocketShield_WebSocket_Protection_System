<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WebSocketConnection extends Model
{
    protected $table = 'websocket_connections';
    protected $fillable = [
        'connection_id',
        'user_id',
        'ip_address',
        'user_agent',
        'connected_at',
        'last_heartbeat_at',
        'disconnected_at',
        'message_count',
        'status',
        'defense_action',
        'risk_score',
        'violation_count',
        'restricted_until'
    ];

    protected $casts = [
    'connected_at' => 'datetime',
    'last_heartbeat_at' => 'datetime',
    'disconnected_at' => 'datetime',
    'restricted_until' => 'datetime',
    'risk_score' => 'integer',
    'violation_count' => 'integer',
];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}