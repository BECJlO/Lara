<?php

namespace App\Components\Services;

use App\User;
use App\Service;
use App\ExeService;
use App\Task;
use App\ExeTask;
use Illuminate\Support\Collection;



public class ExeServiceCont
{
    $id = ''; // ID service
    $Name = ''; // Name service for geting in view
    $TypesWorker = ''; // types workers
    $Workers = ''; // workers with appropriate type
    $TaskList = '';
    $Status = '';

    function __construct($id) {
        //Пердача даних и з бази
    }
    public function create(){
        $TaskList = Task::where('service_id', $Id);
        //$typeWorkers = $TaskList->pluck('worker_category')->unique());
        //$Workers = Worker::all()->
        // random shuffle()
        $exeService = new ExeService();
        $exeService->service_id = $idService;
        $exeService->order_id = $id;


        foreach ($task in $TaskList) {
            $idTask = $task->task_id;
            $typeWorker = $task->worker_category;
            $desc = $task->decs_task;
            $Worker = Worker::where('worker_category',$typeWorker)->where('status','free')->random();
            $User = User::where('id', $Worker->id);
            $ExeTask = new ExeTask();
            $ExeTask->worker_id = $Worker->worker_id;
            $ExeTask->id_task = $idTask;
            $ExeTask->status_task = "nominated";
        }
    }

   

    public function createTasks(){
        foreach ($task in $TaskList) {
            $task->
        }
    };

    public function getDescription();
    public function getPrice();
}
