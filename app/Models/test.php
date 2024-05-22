<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;

    protected $fillable = [
        'testName',
        'scoreTest',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'scheduleId');
    }

    public function details()
    {
        return $this->hasMany(test_detail::class);
    }

    public function result()
    {
        return $this->hasOne(result::class);
    }
}
