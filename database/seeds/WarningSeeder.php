<?php

use App\Warning;
use Illuminate\Database\Seeder;

class WarningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('warnings')->delete();
        Warning::create([
            'warning_type' => 'No workers',
            'warning_status' => 'init',
            'warning_body' => 'Type workers maid, order id 2, room 324, user User2'
        ]);
    }
}
