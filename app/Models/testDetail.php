<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'psikotest',
        'umum',
        'minatan',
        'praktek',
        'mengajar',
        'pengenalanDiri',
        'dosen1',
        'dosen2',
        'dosen3',
        'dosen4',
        'testId'
    ];

    public function test()
    {
        return $this->belongsTo(test::class);
    }
}
