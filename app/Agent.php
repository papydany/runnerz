<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    //
     public function state()
    {
        return $this->belongsTo('App\State');
    }
     public function lga()
    {
        return $this->belongsTo('App\Lga');
    }
}
