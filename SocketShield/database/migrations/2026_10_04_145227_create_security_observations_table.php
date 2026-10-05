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
        Schema::create('security_observations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('active_connections')->default(0);
            $table->decimal('messages_per_second', 10, 2)->default(0);
            $table->unsignedInteger('message_size')->default(0);
            $table->decimal('cpu_usage', 8, 2)->default(0);
            $table->decimal('memory_usage', 8, 2)->default(0);
            $table->unsignedBigInteger('network_bytes_sent')->default(0);
            $table->unsignedBigInteger('network_bytes_received')->default(0);
            $table->string('scenario')->default('baseline');
            $table->string('label')->nullable();
            $table->unsignedBigInteger('experiment_id')->nullable();
            $table->timestamp('collected_at')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_observations');
    }
};
