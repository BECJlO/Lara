<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;

class CheckWorkerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $idUser = Auth::user()->id;
        if(!empty(Worker::where('user_id',$idUser)->first()->worker_id)){
            return $next($request);
        }
        else{
            return redirect('');
        }
    }
}
