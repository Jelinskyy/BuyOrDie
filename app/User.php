<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user){
            $user->seller()->create([
                'description' => 'New user',
                'image' => '',
            ]);
        });

        static::deleting(function(User $user){
            $user->seller->delete();
            foreach($user->product as $prod)
            {
                unlink(storage_path("app/public/".$prod->image));
                $prod->delete();
            }
        });
    }

    public function seller()
    {
        return $this->hasOne(Seller::class);
    }

    public function rateing(){
        return $this->BelongsToMany(Product::class);
    }

    public function viewed()
    {
        return $this->belongsToMany(ViewsMenager::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
