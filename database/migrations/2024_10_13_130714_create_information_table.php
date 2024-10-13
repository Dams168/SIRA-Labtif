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
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->date('tglOpenRecruitment');
            $table->date('tglClosedRecruitment');
            $table->date('tglTestTulis');
            $table->date('tglWawancaraAsisten');
            $table->date('tglWawancaraDosen');
            $table->date('tglPengumumanHasil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
