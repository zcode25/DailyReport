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
        Schema::create('equipment', function (Blueprint $table) {
            $table->char('equipmentId', 10)->primary();
            $table->char('reportId', 20);
            $table->foreign('reportId')->references('reportId')->on('reports')->onUpdate('cascade')->onDelete('restrict');
            $table->string('exca');
            $table->string('buldozer');
            $table->string('vibro');
            $table->string('truck');
            $table->string('pickup');
            $table->string('crane');
            $table->string('forklift');
            $table->string('pancang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
