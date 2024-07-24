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
        Schema::create('projects', function (Blueprint $table) {
            $table->char('projectId', 10)->primary();
            $table->string('projectName');
            $table->text('projectAddress');
            $table->string('customer');
            $table->string('address');
            $table->text('projectDesc');
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
        Schema::dropIfExists('projects');
    }
};
