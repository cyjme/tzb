<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkStatus extends Model
{
    //
    protected $table = 'work_status';

    protected $fillable = [
        'work_id',
        'status'
    ];
}
