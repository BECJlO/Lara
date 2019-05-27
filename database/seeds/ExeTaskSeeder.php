<?php

use App\ExeService;
use App\ExeTask;
use App\Order;
use App\Room;
use App\Service;
use App\Task;
use App\User;
use App\Worker;

use Illuminate\Database\Seeder;

class ExeTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exe_tasks')->delete();
        ExeTask::create([
            'task_id' => 1,
            'exe_service_id' => 1,
            'worker_id' => 1,
            'exe_task_status' => 'inprocces'
            ]);
        ExeTask::create([
            'task_id' => 2,
            'exe_service_id' => 1,
            'worker_id' => 2,
            'exe_task_status' => 'inprocces'
            ]);
        ExeTask::create([
            'task_id' => 1,
            'exe_service_id' => 1,
            'worker_id' => 1,
            'exe_task_status' => 'inprocces'
            ]);
        ExeTask::create([
            'task_id' => 2,
            'exe_service_id' => 2,
            'worker_id' => 2,
            'exe_task_status' => 'inprocces'
            ]);
        ExeTask::create([
            'task_id' => 2,
            'exe_service_id' => 3,
            'worker_id' => 3,
            'exe_task_status' => 'inprocces'
            ]);
    }
}
