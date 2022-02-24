<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'avatar',
        'city_id',
        'address',
        'gender',
        'age',
    ];

    // Relation
    public function city() {
        return $this->belongsTo(User::class, 'city_id');
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    // Accessors For Image_Path
    public function getImageAttribute()
    {
        if (!$this->avatar){
            return asset('Front/img/no-image.png');
        }

        if (stripos($this->avatar, 'http') === 0) {
            return $this->avatar;
        }

        return asset('uploads/' . $this->avatar);
    }
}
