<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Cart\CartRepository;

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
        $carts = Cart::where('customer_id', Auth::guard( session('guardName') )->user()->id)->get();

        return view('Front.cart.cart', [
            'carts' => $carts,
            'total' => $this->cart->total(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['int', 'min:1',
                function($attr, $value, $fail) {
                $id = request()->input('product_id');
                $product = Product::find($id);
                if($value > $product->quantity) {
                    $fail('الرقم أكبر من المتوفر');
                }
            }],
        ]);

        $cart = $this->cart->add($request->post('product_id'), $request->post('quantity', 1));

        return redirect()->route('cart');
    }
}
