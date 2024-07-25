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
        Schema::create('ppes', function (Blueprint $table) {
            $table->char('ppeId', 10)->primary();
            $table->char('reportId', 20);
            $table->boolean('helm');
            $table->boolean('uniform');
            $table->boolean('vest');
            $table->boolean('safetyShoes');
            $table->boolean('safetyGoggles');
            $table->boolean('glove');
            $table->boolean('safetyMask');
            $table->boolean('earPlug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppes');
    }
};
