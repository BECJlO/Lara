<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    //
    protected $primaryKey = 'worker_id';

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'worker_category', 'worker_status'
    ];

    public function exeTasks()
    {
        return $this->hasMany('App\ExeTask', 'worker_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}

