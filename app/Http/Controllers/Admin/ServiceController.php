<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::with('tasks')->get();
        return view('admin.service.index', [ 'services' => $services, 'titlePage' => 'Service', 'addTitlePage' =>'Main page' ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.service.create', ['titlePage' => 'Service', 'addTitlePage' =>'Create page']);
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
        //
        // validat
        $rules = array(
            'service_name' => 'required',
            'service_desc' => 'required',
            'service_category' => 'required',
            'service_price' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/service/create')
                ->withErrors($validator);
        } else {
            // store
            $service = new Service;
            $service->service_name       = Input::get('service_name');
            $service->service_desc      = Input::get('service_desc');
            $service->service_category = Input::get('service_category');
            $service->service_price = Input::get('service_price');
            $service->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/service');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
                //
        // validat
        $rules = array(
            'service_name' => 'required',
            'service_desc' => 'required',
            'service_category' => 'required',
            'service_price' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/service/'. $service .'/edit')
                ->withErrors($validator);
        } else {
            // store
            $service = new Service;
            $service->service_name       = Input::get('service_name');
            $service->service_desc      = Input::get('service_desc');
            $service->service_category = Input::get('service_category');
            $service->service_price = Input::get('service_price');
            $service->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('admin/service');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $service->delete();
        return redirect()->route('admin.service.index');
    }
}
