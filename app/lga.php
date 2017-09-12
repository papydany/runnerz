<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    //

         public function agent()
    {

        return $this->hasMany('App\Agent');
    }

      public function requesterran()
    {

        return $this->hasMany('App\RequestErran');
    }
}
