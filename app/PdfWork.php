<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PdfWork extends Model
{
    //
    protected $table = 'pdfwork';

    protected $fillable =[
        'work_id',
        'name',
        'big_class',
        'small_class',
        'people',
        'school',
        'aim',
        'brief',
        'detailed',
        'document_name'
    ];
}
