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
        Schema::create('biologies', function (Blueprint $table) {
            $table->id('biologyId')->primary();
            $table->unsignedBigInteger('reportId');
            $table->foreign('reportId')->references('reportId')->on('reports')->onUpdate('cascade')->onDelete('restrict');
            $table->string('biologyName');
            $table->boolean('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biologies');
    }
};
