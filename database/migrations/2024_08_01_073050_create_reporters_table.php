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
        Schema::create('reporters', function (Blueprint $table) {
            $table->id('reporterId')->primary();
            $table->unsignedBigInteger('projectId');
            $table->foreign('projectId')->references('projectId')->on('projects')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporters');
    }
};
