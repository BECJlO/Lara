<?php

namespace App\Http\Controllers\Admin;

use App\ExeTask;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExeTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exeTasks = ExeTask::with('worker', 'task', 'exeService')->get();
        return view('admin.exetask.index', [ 'exeTasks' => $exeTasks, 'titlePage' => 'Executing Tasks', 'addTitlePage' =>'Main page' ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $workers = Worker::get()->mapWithKeys(function ($item) {
            return [$item['worker_id'] => $item['worker_id']];
        })->all();
        $taks = Order::get()->mapWithKeys(function ($item) {
            return [$item['order_id'] => $item['order_id']];
        })->all();
        $orders = Order::get()->mapWithKeys(function ($item) {
            return [$item['order_id'] => $item['order_id']];
        })->all();
        return view('admin.exeservice.create', [,'titlePage' => 'Executing Task', 'addTitlePage' =>'Create page']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExeTask  $exeTask
     * @return \Illuminate\Http\Response
     */
    public function show(ExeTask $exeTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExeTask  $exeTask
     * @return \Illuminate\Http\Response
     */
    public function edit(ExeTask $exeTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExeTask  $exeTask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExeTask $exeTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExeTask  $exeTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExeTask $exeTask)
    {
        //
    }
}
