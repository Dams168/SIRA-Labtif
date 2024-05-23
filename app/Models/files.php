<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'registrationId',
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
        return $this->belongsTo(registration::class, 'registrationId');
    }
}
