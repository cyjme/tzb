<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    //
    protected $table = 'information';

    protected $fillable =[
        'target_id',
        'send_people',
        'send_time',
        'validity_time',
        'have_read'
    ];
}
