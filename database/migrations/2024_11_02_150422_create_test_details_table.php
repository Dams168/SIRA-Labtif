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
        Schema::create('test_details', function (Blueprint $table) {
            $table->id();

            $table->integer('psikotest');
            $table->integer('umum');
            $table->integer('minatan');
            $table->integer('praktek');
            $table->integer('mengajar');
            $table->integer('pengenalanDiri');
            $table->integer('dosen1');
            $table->integer('dosen2');
            $table->integer('dosen3');
            $table->integer('dosen4');

            $table->unsignedBigInteger('testId');
            $table->foreign('testId')->references('id')->on('tests')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_details');
    }
};
