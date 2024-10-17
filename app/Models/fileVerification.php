<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fileVerification extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_id',
        'fileCV_verified',
        'fileSuratLamaran_verified',
        'fileCertificate_verified',
        'fileFHS_verified',
        'fileProductImages_verified',
        'fileProduct_verified'
    ];

    public function file()
    {
        return $this->belongsTo(files::class, 'file_id');
    }

    public function isVerified()
    {
        return $this->fileCV_verified && $this->fileSuratLamaran_verified && $this->fileCertificate_verified && $this->fileFHS_verified && $this->fileSuratRekomendasi_verified && $this->fileProductImages_verified;
    }
}
