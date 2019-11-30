<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Porduct extends Model
{
    function user (){
        return $this->belongsTo(User::class);
    }
}
