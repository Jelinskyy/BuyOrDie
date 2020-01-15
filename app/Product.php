<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function($product){
            $product->viewsMenager()->create();
        });
    }

    function user (){
        return $this->belongsTo(User::class);
    }

    public function rates(){
        return $this->BelongsToMany(User::class);
    }

    public function viewsMenager(){
        return $this->hasOne(ViewsMenager::class);
    }
}
