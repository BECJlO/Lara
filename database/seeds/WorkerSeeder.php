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

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //=========== Worker ==============================

        DB::table('workers')->delete();
        Worker::create([
            'user_id' => 7,
            'worker_category' => 'maid',
            'worker_status' => 'busy'
        ]);
        Worker::create([
            'user_id' => 3,
            'worker_category' => 'porter',
            'worker_status' => 'busy'
        ]);
        Worker::create([
            'user_id' => 4,
            'worker_category' => 'cook',
            'worker_status' => 'busy'
        ]);
        Worker::create([
            'user_id' => 5,
            'worker_category' => 'cook',
            'worker_status' => 'free'
        ]);

    }
}
