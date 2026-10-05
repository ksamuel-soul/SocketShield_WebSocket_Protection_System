<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('websocket_connections', function (Blueprint $table) {
            $table->string('defense_action')->default('allow');
            $table->integer('risk_score')->default(0);
            $table->unsignedInteger('violation_count')->default(0);
            $table->timestamp('restricted_until')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('websocket_connections', function (Blueprint $table) {
            $table->dropColumn([
                'defense_action',
                'risk_score',
                'violation_count',
                'restricted_until',
            ]);
        });
    }
};