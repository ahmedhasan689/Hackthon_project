<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'price',
        'quantity',
        'cover_image',
        'available',
        'category_id',
        'description',
        'offer'
    ];

    // Relation
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Accessors For Cover_image
    public function getCoverAttribute()
    {
        if (!$this->cover_image){
            return asset('Front/img/cover.jpg');
        }

        if (stripos($this->cover_image, 'http') === 0) {
            return $this->cover_image;
        }

        return asset('cover/' . $this->cover_image);
    }

}
