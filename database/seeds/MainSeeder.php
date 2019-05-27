<?php

use App\ExeService;
use App\ExeTask;
use App\Order;
use App\Room;
use App\Service;
use App\Task;
use App\User;
use App\Worker;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//=========== User ============================
        DB::table('users')->delete();
        User::create([
            'name' => 'Test1',
            'email' => 'test1@gmail.com',
            'user_mid_name' => 'Test1MN',
            'user_last_name' => 'Test1LN',
            'tel_user' => '+380990000001',
            'password' => '$2y$10$Bq6SxXDnHQLVn86iP0mcX.b2ys93GLl2lzkxKwt.MdGqw2AQ8ndt.'
        ]);
        User::create([
            'name' => 'Test2',
            'email' => 'test2@gmail.com',
            'user_mid_name' => 'Test2MN',
            'user_last_name' => 'Test2LN',
            'tel_user' => '+380990000002',
            'password' => '$2y$10$Bq6SxXDnHQLVn86iP0mcX.b2ys93GLl2lzkxKwt.MdGqw2AQ8ndt.'
        ]);
        User::create([
            'name' => 'Test3',
            'email' => 'test3@gmail.com',
            'user_mid_name' => 'Test3MN',
            'user_last_name' => 'Test3LN',
            'tel_user' => '+380990000003',
            'password' => '$2y$10$Bq6SxXDnHQLVn86iP0mcX.b2ys93GLl2lzkxKwt.MdGqw2AQ8ndt.'
        ]);
        User::create([
            'name' => 'Test4',
            'email' => 'test4@gmail.com',
            'user_mid_name' => 'Test4MN',
            'user_last_name' => 'Test4LN',
            'tel_user' => '+380990000004',
            'password' => '$2y$10$Bq6SxXDnHQLVn86iP0mcX.b2ys93GLl2lzkxKwt.MdGqw2AQ8ndt.'
        ]);
        User::create([
            'name' => 'Test5',
            'email' => 'test5@gmail.com',
            'user_mid_name' => 'Test5MN',
            'user_last_name' => 'Test5LN',
            'tel_user' => '+380990000005',
            'password' => '$2y$10$Bq6SxXDnHQLVn86iP0mcX.b2ys93GLl2lzkxKwt.MdGqw2AQ8ndt.'
        ]);
        User::create([
            'name' => 'tEmployee',
            'email' => 'test@gmail.com',
            'user_mid_name' => 'EmplMN',
            'user_last_name' => 'EmplLN',
            'tel_user' => '+380990000006',
            'password' => '$2y$10$Bq6SxXDnHQLVn86iP0mcX.b2ys93GLl2lzkxKwt.MdGqw2AQ8ndt.'
        ]);
        User::create([
            'name' => 'tWorker',
            'email' => 'testworker@gmail.com',
            'user_mid_name' => 'WorkerMN',
            'user_last_name' => 'WorkerLN',
            'tel_user' => '+380990000007',
            'password' => '$2y$10$Bq6SxXDnHQLVn86iP0mcX.b2ys93GLl2lzkxKwt.MdGqw2AQ8ndt.'
        ]);

    }
}
