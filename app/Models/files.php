<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    use HasFactory;

    protected $fillable = [
        'fileCV',
        'fileSuratLamaran',
        'fileCertificate',
        'fileFHS',
        'fileSuratRekomendasi',
        'fileProductImages',
        'fileProduct'
    ];

    public function registration()
    {
        return $this->hasOne(registration::class, 'fileId');
    }
}
