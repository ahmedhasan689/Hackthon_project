<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Relation
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
