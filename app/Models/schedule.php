<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'scheduleName',
        'scheduleDate',
        'registrationId',
    ];

    public function tests()
    {
        return $this->hasMany(Test::class, 'scheduleId');
    }
}
