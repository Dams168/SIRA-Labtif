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
            $table->string('fileFHS');
            $table->string('fileSuratRekomendasi')->nullable();
            $table->string('fileProductImages');
            $table->string('fileProduct');

            $table->unsignedBigInteger('registrationId');
            $table->foreign('registrationId')->references('id')->on('registrations')->onDelete('cascade')->onUpdate('cascade');
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
