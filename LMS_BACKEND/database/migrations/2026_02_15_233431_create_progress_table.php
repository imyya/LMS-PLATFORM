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
        Schema::create('progress', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('lesson_id')->constrained('lessons')->onDelete('cascade');
            $table->boolean('completed')->default(false);
            $table->integer('watch_time_seconds')->default(0);
            $table->integer('last_position_seconds')->default(0);
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->unique(['user_id', 'lesson_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
