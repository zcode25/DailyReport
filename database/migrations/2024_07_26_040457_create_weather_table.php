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
        Schema::create('weather', function (Blueprint $table) {
            $table->char('weatherId', 10)->primary();
            $table->char('reportId', 20);
            $table->boolean('time1')->nullable();
            $table->boolean('time2')->nullable();
            $table->boolean('time3')->nullable();
            $table->boolean('time4')->nullable();
            $table->boolean('time5')->nullable();
            $table->boolean('time6')->nullable();
            $table->boolean('time7')->nullable();
            $table->boolean('time8')->nullable();
            $table->boolean('time9')->nullable();
            $table->boolean('time10')->nullable();
            $table->boolean('time11')->nullable();
            $table->boolean('time12')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
