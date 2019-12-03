<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seller extends Model
{
    protected $guarded = [];
    protected $fillable = ['description', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sellerImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/shop-logo.png';

        return '/storage/' . $imagePath;
    }
}
