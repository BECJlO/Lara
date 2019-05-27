<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'room_id',
        'order_status',
        'order_length',
        'order_paid',
    ];

    public function exeServices()
    {
        return $this->hasMany('App\ExeService', 'order_id');
    }

    public function exeTasks()
    {
        return $this->hasManyThrough('App\ExeService', 'App\ExeTask', 'order_id', 'exe_service_id');
    }

    public function room()
    {
        return $this->belongsTo('App\Room', 'room_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
