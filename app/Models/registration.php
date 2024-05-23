<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'userId', 'npm', 'class', 'period', 'phone', 'regDate', 'photo', 'courseId', 'status', 'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function file()
    {
        return $this->hasMany(files::class);
    }

    public function course()
    {
        return $this->belongsTo(course::class, 'courseId');
    }

    public function test()
    {
        return $this->hasMany(test::class);
    }
}
