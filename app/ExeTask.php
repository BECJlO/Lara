<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExeTask extends Model
{
    //
    protected $primaryKey = 'exe_task_id';


    protected $fillable = [
        'task_id',
        'exe_service_id',
        'worker_id',
        'exe_task_status'
    ];


    public function exeService()
    {
        return $this->belongsTo('App\ExeService', 'exe_service_id');
    }



    public function worker()
    {
        return $this->belongsTo('App\Worker', 'worker_id');
    }


    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }
}
