<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infor extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'mother_height',
        'mother_weight',
        'waist_size',
        'clinic_date',
        'city',
        'district',
        'moh_area',
        'phm_area',
        'grama_division',
        'father_mobile',
        'midwife_mobile',
        'working',
        'job_roll',
        'income',
        'sleeping_time',
        'wakeup_time',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function infor()
    {
        return $this->belongsTo(Infor::class);
    }

}


