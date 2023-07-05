<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['password'];


    public function carts(){
        return $this->hasMany(Cart::class,'user_id');
    }

        public function favourites(){
        return $this->hasMany(FavoriteProduct::class,'user_id');
    }
}
