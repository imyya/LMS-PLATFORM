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
        Schema::create('tenants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('subdomain')->unique()->nullable();
            $table->string('custom_domain')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('primary_color')->nullable();
            $table->enum('subscription_plan', ['free', 'basic', 'premium', 'enterprise'])->default('free');
            $table->enum('subscription_status', ['active', 'inactive', 'cancelled', 'expired'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
