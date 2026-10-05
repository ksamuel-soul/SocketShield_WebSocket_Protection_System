<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resource_metrics', function (Blueprint $table) {
            $table->id();
            $table->decimal('cpu_usage', 8, 2)->default(0);
            $table->decimal('memory_usage', 8, 2)->default(0);
            $table->unsignedInteger('active_connections')->default(0);
            $table->decimal('messages_per_second', 10, 2)->default(0);
            $table->timestamp('measured_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_metrics');
    }
};
