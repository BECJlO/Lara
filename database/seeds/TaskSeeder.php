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

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //=========== Task ============================

        DB::table('tasks')->delete();
        Task::create([
            "task_desc" => 'Lorem1 [[user]]\[[room]]\[[order]] ipsum dolor sit amet, vix no aperiri pertinax. Cu vel mundi nostrud inciderint',
            "worker_category" => 'maid',
            "service_id" => '1'
        ]);
        Task::create([
            "task_desc" => 'Lorem2 [[user]]\[[room]]\[[order]] ipsum dolor sit amet, vix no aperiri pertinax. Cu vel mundi nostrud inciderint',
            "worker_category" => 'porter',
            "service_id" => '2'
        ]);
        Task::create([
            "task_desc" => 'Lorem3 [[user]]\[[room]]\[[order]] ipsum dolor sit amet, vix no aperiri pertinax. Cu vel mundi nostrud inciderint',
            "worker_category" => 'cook',
            "service_id" => '3'
        ]);

    }
}
