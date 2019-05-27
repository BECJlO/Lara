<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'room_id';
    //
    public $timestamps = false;

    protected $fillable = [
    'room_id',
    'room_num',
    'room_price',
    'room_amountRoom',
    'room_category',
    'room_floor',
    'room_info',
    'room_rating',
    'room_status'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order', 'room_id');
    }

    // public function user()
    // {
    //     return $this->belongsManyThrough('App\Order', 'App\User', 'order_id');
    // }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

}
