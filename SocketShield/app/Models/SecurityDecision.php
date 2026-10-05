<?php

namespace App\Models;

use App\Models\WebSocketConnection;
use Illuminate\Database\Eloquent\Model;

class SecurityDecision extends Model
{
    protected $fillable = [
        'connection_id',
        'risk_score',
        'risk_level',
        'action',
        'reason',
        'decided_at',
    ];

    protected $casts = [
        'risk_score' => 'integer',
        'decided_at' => 'datetime',
    ];

    public function connection()
{
    return $this->belongsTo(
        WebSocketConnection::class,
        'connection_id'
    );
}
}