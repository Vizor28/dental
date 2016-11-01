<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    //
    public $timestamps = false;

    public $incrementing = false;

    public function registerable()
    {
        return $this->morphTo();
    }
}
