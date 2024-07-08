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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->integer('testTulis');
            $table->integer('wawancaraAsisten');
            $table->integer('wawancaraDosen');
            $table->unsignedBigInteger('registrationId');
            $table->foreign('registrationId')->references('id')->on('registrations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
