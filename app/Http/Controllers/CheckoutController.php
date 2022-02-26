<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\City;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Cart\CartRepository;
use Throwable;

class CheckoutController extends Controller
{
    /**
     * @var \App\Repositories\Cart\CartRepository
     */
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function create()
    {
        $cities = City::all();
        return view('Front.checkout', [
            'cart' => $this->cart,
            'customer' => Auth::guard(session('guardName'))->user(),
            'cities' => $cities,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'billing_name' => ['required', 'string'],
            'billing_phone' => ['required', 'numeric'],
            'billing_email' => ['required', 'email'],
            'billing_address' => ['required'],
        ]);

        DB::beginTransaction();

        try {

            $request->merge([
                'total' => $this->cart->total(),
            ]);

            $order = Order::create([
                'billing_name' => $request->billing_name,
                'billing_phone' => $request->billing_phone,
                'billing_email' => $request->billing_email,
                'billing_address' => $request->billing_address,
                'customer_id' => $request->customer,
                'total' => $this->cart->total(),
                'notes' => $request->notes,
            ]);

            $items = [];
            foreach ($this->cart->all() as $item) {
                $items[] = [
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ];
                /* $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]); */
            }

            DB::table('order_items')->insert($items);

            DB::commit();

            return redirect()->route('orders');
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
