<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('traffic_metrics', function (Blueprint $table) {
            $table->unsignedBigInteger('connection_id')->nullable();
            $table->unsignedInteger('message_count')->default(0);
            $table->unsignedInteger('message_size')->default(0);
            $table->decimal('messages_per_second', 12, 4)->default(0);
            $table->timestamp('measured_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('traffic_metrics', function (Blueprint $table) {
            $table->dropColumn([
                'connection_id',
                'message_count',
                'message_size',
                'messages_per_second',
                'measured_at',
            ]);
        });
    }
};