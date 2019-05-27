<?php

namespace App;

use App\Worker;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_mid_name', 'user_last_name', 'tel_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function order()
    {
        return $this->hasMany('App\Order', 'user_id');
    }

    public function exeServices()
    {
        return $this->hasManyThrough('App\Order', 'App\ExeService', 'user_id', 'order_id');
    }

    protected function worker(){
        return $this->hasOne('App\Worker', 'user_id');
    }

    public function isWorker(){
        if (!empty($this->worker)){
            return true;
        }else{
            return false;
        }
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
