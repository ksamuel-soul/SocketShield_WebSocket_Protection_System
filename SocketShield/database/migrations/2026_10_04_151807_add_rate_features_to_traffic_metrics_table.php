<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('traffic_metrics', function (Blueprint $table) {
            $table->decimal('bytes_per_second', 12, 2)->default(0);
            $table->decimal('average_message_size', 12, 2)->default(0);
            $table->unsignedInteger('connection_rate')->default(0);
            $table->unsignedInteger('reconnection_rate')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('traffic_metrics', function (Blueprint $table) {
            $table->dropColumn([
                'bytes_per_second',
                'average_message_size',
                'connection_rate',
                'reconnection_rate',
            ]);
        });
    }
};