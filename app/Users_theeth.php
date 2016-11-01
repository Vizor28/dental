<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_theeth extends Model
{
    //
    protected $table='users_theeth';

    public function thooth(){
        return $this->belongsTo('App\Thooth');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }


}
