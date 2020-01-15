<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewsMenager extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }
}


