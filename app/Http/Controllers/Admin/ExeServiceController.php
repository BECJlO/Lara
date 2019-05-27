<?php

namespace App\Http\Controllers\Admin;


use Session;
use App\ExeService;
use App\Service;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ExeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exeServices = ExeService::with('order', 'service', 'exeTasks')->get();
        return view('admin.exeservice.index', [ 'exeServices' => $exeServices, 'titlePage' => 'Executing Service', 'addTitlePage' =>'Main page' ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $services = Service::get()->mapWithKeys(function ($item) {
            return [$item['service_id'] => $item['service_name']];
        })->all();
        $orders = Order::get()->mapWithKeys(function ($item) {
            return [$item['order_id'] => $item['order_id']];
        })->all();
        return view('admin.exeservice.create', ['services'=>$services, 'orders'=>$orders ,'titlePage' => 'Executing Service', 'addTitlePage' =>'Create page']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        // validat
        $rules = array(
            'service_id' => 'required|numeric',
            'order_id' => 'required|numeric',
            'exe_service_status' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/exe-service/create')
                ->withErrors($validator);
        } else {
            // store
            $exeService = new ExeService;
            $exeService->service_id       = Input::get('service_id');
            $exeService->order_id      = Input::get('order_id');
            $exeService->exe_service_status = Input::get('exe_service_status');
            $exeService->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/exe-service');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExeService  $exeService
     * @return \Illuminate\Http\Response
     */
    public function show(ExeService $exeService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExeService  $exeService
     * @return \Illuminate\Http\Response
     */
    public function edit(ExeService $exeService)
    {
        //
        $services = Service::get()->mapWithKeys(function ($item) {
            return [$item['service_id'] => $item['service_name']];
        })->all();
        $orders = Order::get()->mapWithKeys(function ($item) {
            return [$item['order_id'] => $item['order_id']];
        })->all();
        $exeServ = ExeService::find($exeService)->first();
        return view('admin.exeservice.edit', ['exeServ'=> $exeServ, 'services'=>$services, 'orders'=>$orders ,'titlePage' => 'Executing Service', 'addTitlePage' =>'Edit page']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExeService  $exeService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExeService $exeService)
    {
        //
        $rules = array(
            'service_id' => 'required|numeric',
            'order_id' => 'required|numeric',
            'exe_service_status' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/exe-service/' . $exeService . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $exeService = new ExeService;
            $exeService->service_id       = Input::get('service_id');
            $exeService->order_id      = Input::get('order_id');
            $exeService->exe_service_status = Input::get('exe_service_status');
            $exeService->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/exe-service');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExeService  $exeService
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExeService $exeService)
    {
        //
        $exeService->delete();
        return redirect()->route('admin.exe-service.index');
    }
}
