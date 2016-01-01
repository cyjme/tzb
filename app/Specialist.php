<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    //
    protected $table = 'specialist';

    protected $fillable =[
        'name',
        'email',
        'phone',
        'unit',
        'good_field',
        'class'
    ];
}
