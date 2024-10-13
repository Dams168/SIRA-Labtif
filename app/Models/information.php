<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'tglOpenRecruitment',
        'tglClosedRecruitment',
        'tglPraRecruitment',
        'tglProsesAwal',
        'tglProsesAkhir',
        'tglPengumumanHasil',
    ];
}
