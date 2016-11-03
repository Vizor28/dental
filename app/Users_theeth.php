<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_theeth extends Model
{
    //
    protected $table='users_theeth';

    public $timestamps=false;

    public function thooth(){
        return $this->belongsTo('App\Thooth');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function clinic(){
        return $this->belongsTo('App\Clinic');
    }

    public function doctor(){
        return $this->belongsTo('App\Doctor');
    }

    public function patient(){
        return $this->belongsTo('App\Patient');
    }


}
