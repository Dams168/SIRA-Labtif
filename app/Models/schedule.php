<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheduleName',
    ];

    public function tests()
    {
        return $this->hasMany(Test::class, 'scheduleId');
    }
}
