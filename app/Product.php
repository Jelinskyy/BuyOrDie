<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    function user (){
        return $this->belongsTo(User::class);
    }

    public function rates(){
        return $this->BelongsToMany(User::class);
    }
}
