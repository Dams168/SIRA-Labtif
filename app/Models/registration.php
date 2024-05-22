<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'course',
        'npm',
        'class',
        'photo',
        'regDate',
        'status',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function file()
    {
        return $this->belongsTo(files::class, 'fileId');
    }
    public function course()
    {
        return $this->belongsTo(course::class, 'course_id');
    }

    public function test()
    {
        return $this->hasMany(test::class);
    }
}
