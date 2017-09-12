<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    //
         public function agent()
    {

        return $this->belongsTo('App\Agent');
    }

     public function requesterran()
    {

        return $this->belongsTo('App\RequestErran');
    }

   
} 
