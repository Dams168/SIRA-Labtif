<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function registration()
    {
        return $this->hasOne(registration::class, 'courseId');
    }
}
