<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    //
    protected $primaryKey = 'warning_id';
    protected $fillable = [
        'warning_type',
        'warning_status',
        'warning_body',
    ];
}
