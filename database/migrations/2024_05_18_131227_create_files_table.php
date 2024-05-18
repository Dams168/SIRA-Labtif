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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('fileCV');
            $table->string('fileSuratLamaran');
            $table->string('fileCertificate');
            $table->string('fileTranscript');
            $table->string('fileSuratRekomendasi')->nullable();
            $table->string('productImages');
            $table->string('fileProduct');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
