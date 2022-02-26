<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'customer_id',
        'shipping',
        'discount',
        'tax',
        'total',
        'status',
        'payment_status',
        'billing_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'shipping_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'notes',
    ];

    protected static function booted()
    {
        static::creating(function(Order $order){
            $now = Carbon::now();

            $number = Order::whereYear('created_at', '=',$now->year)->max('number');

            $order->number = $number ? $number + 1 : $now->year . '0001';

            if (!$order->shipping_name){
                $order->shipping_name = $order->billing_name;
            }

            if (!$order->shipping_email){
                $order->shipping_email = $order->billing_email;
            }

            if (!$order->shipping_phone){
                $order->shipping_phone = $order->billing_phone;
            }

            if (!$order->shipping_address){
                $order->shipping_address = $order->billing_address;
            }

        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')->using(OrderItem::class)->withPivot(['quantity', 'price']);
    }


}
