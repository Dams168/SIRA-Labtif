<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'testId',
        'finalScore',
        'result',
    ];

    public function test()
    {
        return $this->belongsTo(test::class, 'testId');
    }
}
