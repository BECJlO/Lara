<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(MainSeeder::class);
        $this->call(WorkerSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ExeServiceSeeder::class);
        $this->call(ExeTaskSeeder::class);
        $this->call(WarningSeeder::class);
        $this->call(ImageSeeder::class);
    }
}
