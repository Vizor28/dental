<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thooth extends Model
{
    //
    protected $table='theeth';

    public $incrementing = false;

    public $timestamps = false;

    public function chap(){
        return $this->belongsTo('App\Chap');
    }
}
