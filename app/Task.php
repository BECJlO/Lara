<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $guarded = ['_token'];
    protected $primaryKey = 'task_id';


    public $timestamps = false;

    protected $fillable = [
        'task_desc', 'type_task', 'service_id'
    ];

    public function exeTasks()
    {
        return $this->hasMany('App\ExeTask', 'task_id');
    }

    public function service()
    {
        return $this->belongsTo('App\Service', 'service_id');
    }


}
