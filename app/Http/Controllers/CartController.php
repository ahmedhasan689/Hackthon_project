<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{
    /**
     * @var \App\Repositories\Cart\CartRepository
     */
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;    
    }

    public function index(CartRepository $cart)
    {
        $this->cart->add([
            'id' => 1,
            'name' => 'Pizza',
            'price' => 100,
        ]);

        return $this->cart->all();
    }
}
