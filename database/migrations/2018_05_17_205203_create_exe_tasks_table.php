<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExeTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('exe_tasks', function (Blueprint $table) {
            $table->increments('exe_task_id');
            $table->integer('task_id')->unsigned();
            $table->integer('exe_service_id')->unsigned();
            $table->integer('worker_id')->unsigned();
            $table->string('exe_task_status', 15);
            $table->timestamps();


            $table->foreign('task_id')->references('task_id')->on('tasks');
            $table->foreign('exe_service_id')->references('exe_service_id')->on('exe_services');
            $table->foreign('worker_id')->references('worker_id')->on('workers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exe_tasks');
    }
}
