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

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//=========== Order ================================
        DB::table('orders')->delete();
        Order::create([
            'user_id' => 6,
            'room_id' => 4,
            'order_length' => 4,
            'order_paid' => 500.00,
            'order_status' => 'active'
        ]);

    }
}
