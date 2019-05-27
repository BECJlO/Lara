<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExeService extends Model
{
    protected $primaryKey = 'exe_service_id';
    //
    protected $fillable = [
        'service_id',
        'order_id',
        'exe_service_status',
        'times_exe_serv',
    ];

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function service()
    {
        return $this->belongsTo('App\Service', 'service_id');
    }

    public function exeTasks()
    {
        return $this->hasMany('App\ExeTask', 'exe_service_id');
    }

    // public function workers()
    // {
    //     return $this->hasManyThrough('App\ExeTask',  'exe_service_id');
    // }

    
}
