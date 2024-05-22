<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameScoreDetail',
        'scoreTestDetail',
    ];

    public function test()
    {
        return $this->belongsTo(test::class, 'testId');
    }
}
