<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;

class CheckAdminRole
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
        $workers = Worker::where('user_id', Auth::user()->id);
        if(!empty($workers->where('worker_category','admin')->first()->worker_id)){
            return $next($request);
        }
        else{
            return redirect('worker.index');
        }
    }
}
