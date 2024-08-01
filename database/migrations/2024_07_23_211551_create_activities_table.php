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
        Schema::create('activities', function (Blueprint $table) {
            $table->id('activityId');
            $table->unsignedBigInteger('reportId');
            $table->foreign('reportId')->references('reportId')->on('reports')->onUpdate('cascade')->onDelete('restrict');
            $table->text('activityTime');
            $table->text('activityName');
            $table->string('activityImage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
