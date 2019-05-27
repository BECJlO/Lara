<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('room_id');
            $table->integer('room_num')->unsigned();
            $table->float('room_price', 8, 2);
            $table->integer('room_amountRoom')->unsigned()->nullable();
            $table->string('room_category', 150)->nullable();
            $table->integer('room_floor')->nullable();
            $table->json('room_info')->nullable();
            $table->float('room_rating', 5, 2);
            $table->string('room_status', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
