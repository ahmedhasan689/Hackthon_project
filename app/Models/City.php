<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'city_name',
    ];  

    // Relation
    public function users() {
        return $this->hasMany(User::class, 'city_id');
    }

    public function customers() {
        return $this->hasMany(Customer::class, 'city_id');
    }

    public function deliveries() {
        return $this->hasMany(Delivery::class, 'city_id');
    }
    
}
