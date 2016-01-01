<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    //
    protected $table = 'award';

    protected $fillable =[
        'work_id',
        'school_award',
        'province_award'
    ];
}
