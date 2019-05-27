<?php

namespace App\Http\Controllers\Admin;


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
use App\Http\Controllers\Controller;


class AdminController extends Controller
{

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $user = Auth::user();
        $rooms = Room::all();
        $workers = Worker::with('user','exeTask')->all();
        $orders = Order::with('user','room','exeServices', 'exeTasks')->all();

        $data = [
            'titlePage' => 'Home',
            'addTitlePage' => 'Worker page',

        ];


        return view('admin.index', ['data' => $data]);
    }
}
