<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPower extends Model
{
    //
    protected $table= 'user_power';

    protected $fillable=[
        'user_id',
        'is_admin',
        'school'
    ];
}
