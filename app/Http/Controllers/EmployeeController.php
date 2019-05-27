<?php

namespace App\Http\Controllers;

use DateTime;
use App\User;
use App\Worker;
use App\Order;
use App\ExeTask;
use App\ExeService;
use App\Service;
use App\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection;

class EmployeeController extends Controller
{

    protected $pages = [
        [
            'url' => 'employee.index',
            'title' => 'Home',
            'icon' => 'fa-home',
            'subItems' => false
        ],
        [
            'url' => 'employee.room',
            'title' => 'Room',
            'icon' => 'fa-flag',
            'subItems' => false
        ],
        [
            'url' => 'employee.service',
            'title' => 'Services',
            'icon' => 'fa-book',
            'subItems' => false
        ],
        [
            'url' => 'employee.map',
            'title' => 'Map',
            'icon' => 'fa-map-o',
            'subItems' => false
        ]
    ];


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
    {
        $now = new DateTime();
        $user = Auth::user();
        $order = $user->order->first();
        $room = $order->room;
        $exeServices = $order->exeServices;
        //$services = Service::whereIn('service_id', $exeServices->pluck('service_id'));
        $services = Service::get();
        $descServices = Service::whereIn('service_id', $exeServices->pluck('service_id'))->pluck('service_name', 'service_id');
        $priceServices = Service::whereIn('service_id', $exeServices->pluck('service_id'))->pluck('service_price', 'service_id');
        $cost = [];
        foreach($exeServices as $exeServ){
            $priceOne = $priceServices[$exeServ->service_id];
            array_push($cost, $priceOne);
        }
        //     $serv = Service::where('service_id', $exeServ->service_id)->first();
        //     $exeServ = $exeServ->all();
        //     $exeServ->service_desc = $serv->service_desc;
        //     $exeServ->service_price = $serv->service_price;
        // });
        $this->pages[2]['subItems'] = Service::pluck('service_name', 'service_id')->all();
        $cost = array_sum($cost);
        $cost += $room->room_price;
        //$exeServices->zip($descServices);
        //$exeServices->zip($priceServices);
        $services = Service::whereIn('service_id', $exeServices->pluck('service_id'))->get();
        $interval = $now->diff($order->created_at);

        $result = [
            'titlePage' => 'Home',
            'addTitlePage' => 'Employee page',
            'user' => $user,
            'order' => $order,
            'exeServ' => $exeServices,
            'room' => $room,
            'serv' => $services,
            'pages' => $this->pages,
            'descServices' => $descServices,
            'priceServices' => $priceServices,
            'interval' => $interval->d,
            'cost' => $cost
        ];
        //$result = $user;
        //$result = $order;

        return view('employee.index', ['data' => $result]);
    }

    public function room(){
        $user = Auth::user();
        $order = Order::with('room')->find($user->id)->first()->get();
        $room = $order->room->get();

        $result = [
            'titlePage' => 'Your room',
            'addTitlePage' => 'Employee page',
            'room' => $room,
            'user' => $user,
            'order' => $order,
            'page' => $this->pages
        ];
        return view('employee.room', ['data' => $result]);
    }

    public function profile(){

        $user = Auth::user();
        $result = [
            'titlePage' => 'Profile',
            'addTitlePage' => 'Employee page',
            'user' => $user,
            'pages' => $this->pages
        ];
        return view('user.profile', ['data' => $result]);
    }

    public function service($id){
        if(is_null($id) || is_empty($id)){
            $id = 1;
        }
        $user = Auth::user();
        $service = Service::find($id)->first()->get();
        // $user = Auth::user();
        // $order = Order::where('id', $user->id)->first();
        // $room = Room::where('room_id', $order)->first();
        // $exeServices = ExeService::where('order_id', $order->order_id)->get();
        // $services = Service::whereIn('service_id', $exeServices->pluck('service_id'))->get();

         $result = [
            'titlePage' => $service->service_name,
            'addTitlePage' => 'Employee page',
            'user' => $user,
            'service' => $service,
            'page' => $this->pages
        ];
    }


    public function cservice($id){
        $user = Auth::user();
        $order = $user->order->where('order_status','active')->first();

        $newExeService = ExeService::create([
            'service_id' => $id,
            'order_id' => $order->order_id,
            'exe_service_status' => 'inprocces'
        ]);
        
        $tasks = Service::find($id)->tasks;
        foreach($tasks as $task){
            $taskId = $task->task_id;
            $worker_category = $task->worker_category;
            $worker = Worker::where('worker_category', '=', $worker_category)
                    ->where('worker_status', '=', 'busy')->get()->random();
            $exeTask = new ExeTask([
                'task_id' => $taskId,
                'worker_id' => $worker->worker_id,
                'exe_task_status' => 'inprocces'
            ]);
            $newExeService->exeTasks()->save($exeTask);
        }
        //$newExeService->exe_service_status = 'fulfilled';
        //$newExeService->save;
        $data = [
            'titlePage' => 'Home',
            'addTitlePage' => 'Employee page',
            'pages' => $this->pages,
            'tasks' => $tasks,
            'worker' => $worker->worker_id
                ];
        return view('employee.cservice', ['data' => $data]);
    }

    public function map(){

        $user = Auth::user();
        $order = $user->order;
        $room = $order->room;

        $result = [
            'titlePage' => 'Home',
            'addTitlePage' => 'Employee page',
            'pages' => $this->pages,
            'user' => $user,
            'order' => $order,
            'page' => $pages
        ];
    }


}
