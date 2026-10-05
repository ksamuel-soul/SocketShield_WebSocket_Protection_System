<?php

namespace App\Services;

class RiskScoringService
{
    public function calculate(array $data): int
    {
        $score = 0;

        if (($data['messages_per_second'] ?? 0) > 10) {
            $score += 30;
        }

        if (($data['bytes_per_second'] ?? 0) > 5000) {
            $score += 20;
        }

        if (($data['active_connections'] ?? 0) > 20) {
            $score += 15;
        }

        if (($data['connection_rate'] ?? 0) > 10) {
            $score += 10;
        }

        if (($data['reconnection_rate'] ?? 0) > 5) {
            $score += 5;
        }

        if (($data['cpu_usage'] ?? 0) > 80) {
            $score += 10;
        }

        if (($data['memory_usage'] ?? 0) > 80) {
            $score += 10;
        }

        return min($score, 100);
    }

    public function level(int $score): string
    {
        return match (true) {
            $score <= 30 => 'low',
            $score <= 50 => 'moderate',
            $score <= 70 => 'high',
            $score <= 85 => 'very_high',
            default => 'critical',
        };
    }

    public function action(int $score): string
    {
        return match (true) {
            $score <= 30 => 'allow',
            $score <= 50 => 'monitor',
            $score <= 70 => 'throttle',
            $score <= 85 => 'restrict',
            default => 'terminate',
        };
    }
}