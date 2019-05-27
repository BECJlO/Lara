<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_name', 'service_desc', 'service_price', 'image_serv', 'service_category',
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task', 'service_id');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

}
