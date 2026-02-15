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
        Schema::create('lessons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('module_id')->constrained('modules')->onDelete('cascade');
            $table->string('title');
            $table->enum('type', ['video', 'text', 'quiz', 'assignment', 'download'])->default('video');
            $table->text('content')->nullable();
            $table->string('video_url')->nullable();
            $table->string('file_url')->nullable();
            $table->integer('duration_seconds')->default(0);
            $table->integer('position')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
