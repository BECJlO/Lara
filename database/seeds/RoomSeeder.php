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

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ////=========== Room ==============================
        DB::table('rooms')->delete();
        Room::create([
            'room_num' => 324,
            'room_price' => 1500.00,
            'room_amountRoom' => 3,
            'room_category' => 'vip',
            'room_floor' => 11,
            'room_info' => json_encode(array('Комфорт' => 21, 'Уютность' => 30, 'Красота' => 50, 'Вид' => 150, 'Интэрьер' => 50)),
            'room_rating' => 10.00,
            'room_status' => 'free'
        ]);
        Room::create([
            'room_num' => 325,
            'room_price' => 1000.00,
            'room_amountRoom' => 3,
            'room_category' => 'standart',
            'room_floor' => 11,
            'room_info' => json_encode(array('Комфорт' => 11, 'Уютность' => 22, 'Красота' => 40, 'Вид' => 150, 'Интэрьер' => 50)),
            'room_rating' => 67.00,
            'room_status' => 'free'
        ]);
        Room::create([
            'room_num' => 326,
            'room_price' => 600.00,
            'room_amountRoom' => 2,
            'room_category' => 'simple',
            'room_floor' => 11,
            'room_info' => json_encode(array('Комфорт' => 10, 'Уютность' => 20, 'Красота' => 20, 'Вид' => 150, 'Интэрьер' => 40)),
            'room_rating' =>69.52,
            'room_status' => 'free'
        ]);
        Room::create([
            'room_num' => 327,
            'room_price' => 500.00,
            'room_amountRoom' => 1,
            'room_category' => 'simple',
            'room_floor' => 11,
            'room_info' => json_encode(array('Комфорт' => 10, 'Уютность' => 20, 'Красота' => 20, 'Вид' => 150, 'Интэрьер' => 40)),
            'room_rating' => 90.01,
            'room_status' => 'free'
        ]);
    }
}
