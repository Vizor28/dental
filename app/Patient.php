<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    public $timestamps=false;

    public function register(){
        return $this->morphOne('App\Register', 'registerable');
    }

    public function change_theeth(){
        return $this->hasMany('App\Users_theeth','patient_id','id');
    }


}
