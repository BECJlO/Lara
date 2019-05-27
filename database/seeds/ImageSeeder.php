<?php


use App\ExeService;
use App\ExeTask;
use App\Order;
use App\Room;
use App\Service;
use App\Task;
use App\User;
use App\Worker;
use App\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->delete();
        Image::create([
            'image_url' => 'users_img/1.png',
            'imageable_id' => 1,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/2.png',
            'imageable_id' => 2,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/3.png',
            'imageable_id' => 3,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/4.png',
            'imageable_id' => 4,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/5.png',
            'imageable_id' => 5,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/1.png',
            'imageable_id' => 6,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/2.png',
            'imageable_id' => 7,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/3.png',
            'imageable_id' => 8,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/4.png',
            'imageable_id' => 9,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/5.png',
            'imageable_id' => 10,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/6.png',
            'imageable_id' => 11,
            'imageable_type' => 'App\User'
        ]);
        Image::create([
            'image_url' => 'users_img/1.png',
            'imageable_id' => 12,
            'imageable_type' => 'App\User'
        ]);


        // Room img
        Image::create([
            'image_url' => 'room_img/324.jpg',
            'imageable_id' => 1,
            'imageable_type' => 'App\Room'
        ]);
        Image::create([
            'image_url' => 'room_img/324(1).jpg',
            'imageable_id' => 1,
            'imageable_type' => 'App\Room'
        ]);
        Image::create([
            'image_url' => 'room_img/324(2).jpg',
            'imageable_id' => 1,
            'imageable_type' => 'App\Room'
        ]);
            //-----------------------
        Image::create([
            'image_url' => 'room_img/325.jpeg',
            'imageable_id' => 2,
            'imageable_type' => 'App\Room'
        ]);
        Image::create([
            'image_url' => 'room_img/325(1).jpg',
            'imageable_id' => 2,
            'imageable_type' => 'App\Room'
        ]);
        Image::create([
            'image_url' => 'room_img/325(2).jpg',
            'imageable_id' => 2,
            'imageable_type' => 'App\Room'
        ]);
            //----------------------
        Image::create([
            'image_url' => 'room_img/326.jpg',
            'imageable_id' => 3,
            'imageable_type' => 'App\Room'
        ]);
        Image::create([
            'image_url' => 'room_img/326(1).jpg',
            'imageable_id' => 3,
            'imageable_type' => 'App\Room'
        ]);
        Image::create([
            'image_url' => 'room_img/326(2).jpg',
            'imageable_id' => 3,
            'imageable_type' => 'App\Room'
        ]);
            //----------------------
        Image::create([
            'image_url' => 'room_img/327.jpg',
            'imageable_id' => 4,
            'imageable_type' => 'App\Room'
        ]);
        Image::create([
            'image_url' => 'room_img/327(1).jpg',
            'imageable_id' => 4,
            'imageable_type' => 'App\Room'
        ]);
        Image::create([
            'image_url' => 'room_img/327(2).jpg',
            'imageable_id' => 4,
            'imageable_type' => 'App\Room'
        ]);

            // Service img
        Image::create([
            'image_url' => 'services_img/1.jpeg',
            'imageable_id' => 1,
            'imageable_type' => 'App\Service'
        ]);
        Image::create([
            'image_url' => 'services_img/1(1).jpg',
            'imageable_id' => 1,
            'imageable_type' => 'App\Service'
        ]);
        Image::create([
            'image_url' => 'services_img/2.jpg',
            'imageable_id' => 2,
            'imageable_type' => 'App\Service'
        ]);
        Image::create([
            'image_url' => 'services_img/2(1).jpg',
            'imageable_id' => 2,
            'imageable_type' => 'App\Service'
        ]);
        Image::create([
            'image_url' => 'services_img/3.png',
            'imageable_id' => 3,
            'imageable_type' => 'App\Service'
        ]);
        Image::create([
            'image_url' => 'services_img/3(1).jpg',
            'imageable_id' => 3,
            'imageable_type' => 'App\Service'
        ]);
    }
}
