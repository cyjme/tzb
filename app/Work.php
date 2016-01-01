<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $table = 'work';

    protected $fillable = [
        'user_id',
        'name',
        'big_class',
        'small_class',
        'aim',
        'brief',
        'detailed',
        'document_address',
        'materials_address',
        'image_address',
        'video_address'
    ];
}