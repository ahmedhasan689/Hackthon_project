<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $KeyType = 'string';

    protected $fillable = [
        'id',
        'cookie_id',
        'product_id',
        'customer_id',
        'quantity',
    ];

    protected $with = [
        'product',
    ];

    // Relations
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Events
    protected static function booted()
    {
        static::creating(function (Cart $cart){
            $cart->id = Str::uuid();
        });
    }

}
