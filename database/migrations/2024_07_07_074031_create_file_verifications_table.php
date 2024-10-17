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
        Schema::create('file_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade')->onUpdate('cascade');

            $table->boolean('fileCV_verified')->default(false);
            $table->boolean('fileSuratLamaran_verified')->default(false);
            $table->boolean('fileCertificate_verified')->default(false);
            $table->boolean('fileFHS_verified')->default(false);
            $table->boolean('fileProductImages_verified')->default(false);
            $table->boolean('fileProduct_verified')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_verifications');
    }
};
