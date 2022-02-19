<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name'  
    ];

    // Relation
    public function users() {
        return $this->hasMany(User::class, 'category_id');
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
