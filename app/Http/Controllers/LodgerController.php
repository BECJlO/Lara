<?php

namespace App\Http\Controllers;

use App\User;
use App\Worker;
use App\Order;
use App\ExeService;
use App\Task;
use App\ExeTask;
use App\Service;
use App\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class LodgerController extends Controller
{
    //
    protected $pages = [
        [
            'url' => 'LodgerController@index',
            'title' => 'Home',
            'icon' => 'fa-home',
            'subItems' => false
        ],
        [
            'url' => 'LodgerController@profile',
            'title' => 'Profile',
            'icon' => 'fa-user',
            'subItems' => false
        ],
        // [
        //     'url' => 'LodgerController@tasks',
        //     'title' => 'Tasks',
        //     'icon' => 'fa-book',
        //     'subItems' => false
        // ],
        [
            'url' => 'LodgerController@map',
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
        $user = Auth::user();
        $worker = Worker::with('exeTasks')->where('user_id', $user->id)->first();
        $exeTasks = $worker->exeTasks;
        $fullInfotask = [];
        // in function
        foreach($exeTasks as $exeTask){
            $exeServ = $exeTask->exeService;
            $order = $exeServ->order;
            $room = $order->room;
            $orderUser = $order->user;
            $task = $exeTask->task;
            $descTask = $task->task_desc;
            $template = [
                '[[user]]' => $orderUser->name.' '.$orderUser->user_mid_name,
                '[[room]]' => $room->room_num,
                '[[order]]' => $order->order_id
            ];
            $infoTask = str_replace(array_keys($template), array_values($template), $descTask);
            $item = [
                'id' => $exeTask->exe_task_id,
                'desc' => $infoTask,
                'user' => $user->name.' '.$user->user_mid_name,
                'room' => $room->room_num,
                'order' => $order->order_id,
                'date' => $exeTask->created_at,
                'status' => $exeTask->exe_task_status
            ];
            array_push($fullInfotask, $item);
        }
        // end  function return $item
        $data = [
            'titlePage' => 'Home',
            'addTitlePage' => 'Worker page',
            'user' => $user,
            'pages' => $this->pages,
            'tasks' => $fullInfotask
        ];

        return view('worker.index', ['data' => $data]);
    }

    public function changeStatusTask($id){

    }


    public function profile(){
        
    }
    public function tasks(){

    }
    public function map(){

    }
}
