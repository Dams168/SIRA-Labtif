<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    use HasFactory;

    // protected $table = 'registrations';
    // protected $dates = ['created_date', 'updated_date'];

    public $timestamps = false;
    protected $fillable = [
        'userId',
        'name',
        'npm',
        'class',
        'period',
        'phone',
        'regDate',
        'photo',
        'courseId',
        'status',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function file()
    {
        return $this->hasOne(files::class, 'registrationId');
    }

    public function course()
    {
        return $this->belongsTo(course::class, 'courseId');
    }

    public function test()
    {
        return $this->hasOne(Test::class, 'registrationId');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'registrationId');
    }
}
