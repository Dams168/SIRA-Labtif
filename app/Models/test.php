<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'testTulis',
        'wawancaraAsisten',
        'wawancaraDosen',
        'registrationId',
    ];

    public function registration()
    {
        return $this->belongsTo(registration::class, 'registrationId');
    }


    public function result()
    {
        return $this->hasOne(result::class, 'testId');
    }

    public function testDetail()
    {
        return $this->hasOne(testDetail::class, 'testId');
    }
}
