<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExeServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('exe_services', function (Blueprint $table) {
            $table->increments('exe_service_id');
            $table->integer('service_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->string('exe_service_status');
            $table->timestamps();
            
            $table->foreign('service_id')->references('service_id')->on('services');
            $table->foreign('order_id')->references('order_id')->on('orders');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exe_services');
    }
}
