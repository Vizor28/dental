<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    //

    public $timestamps = false;

    public function doctors(){
        return $this->belongsToMany('App\Doctor', 'doctors_clinics');
    }


}
