<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    //
    protected $table = 'applicant';

    protected $fillable =[
        'user_id',
        'name',
        'sex',
        'card_id',
        'school',
        'faculty',
        'major',
        'grade',
        'school_years',
        'address'
    ];
}
