<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('ip_address', 45)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('country_code', 5)->nullable();
            $table->string('city', 100)->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->string('device', 20)->nullable();
            $table->string('referrer', 255)->nullable();
            $table->timestamp('created_at')->nullable();

            $table->index('created_at');
            $table->index('country_code');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_views');
    }
};
