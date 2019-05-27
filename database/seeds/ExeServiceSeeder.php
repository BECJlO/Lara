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

class ExeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//=========== ExeService ============================
        DB::table('exe_services')->delete();
        ExeService::create([
            'service_id' => 1,
            'order_id' => 1,
            'exe_service_status' => 'fulfilled'
        ]);
        ExeService::create([
            'service_id' => 2,
            'order_id' => 1,
            'exe_service_status' => 'inprocces'
        ]);
        ExeService::create([
            'service_id' => 3,
            'order_id' => 1,
            'exe_service_status' => 'fulfilled'
        ]);
    }
}
