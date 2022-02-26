<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class DatabaseRepository implements CartRepository
{

    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }

    public function all()
    {
        if ($this->items->count() == 0) {
            $this->items = Cart::Where('customer_id', Auth::guard(session('guardName'))->user()->id )
            ->get();
        }
        return $this->items;
    }

    public function add($item, $qty = 0)
    {
        /* $cart = Cart::where([
            'cookie_id' => $this->getCookieId(),
            'product_id' => ($item instanceof Product) ? $item->id : $item,
        ])->first();
        if ($cart) {
            $cart->update([
                'cookie_id' => $this->getCookieId(),
                'product_id' => ($item instanceof Product) ? $item->id : $item,
            ]);
        } else {
            Cart::create([
                'cookie_id' => $this->getCookieId(),
                'product_id' => ($item instanceof Product) ? $item->id : $item,
                'customer_id' => Auth::guard(session('guardName'))->user()->id,
                'quantity' => DB::raw('quantity +' . $qty),
            ]);
        }; */

        $cart = Cart::updateOrCreate([
            'cookie_id' => $this->getCookieId(),
            'product_id' => ($item instanceof Product) ? $item->id : $item,
        ], [
            // 'id' => Str::uuid(),
            'customer_id' => Auth::guard(session('guardName'))->user()->id,
            'quantity' => DB::raw('quantity +' . $qty),
        ]);

        $this->items->push($cart);

        return $cart;
    }

    public function clear()
    {
        Cart::where('cookie_id', $this->getCookieId())->orWhere('customer_id', Auth::id())
            ->delete();
    }

    // To Create Cookie_id
    protected function getCookieId()
    {
        $id = Cookie::get('cart_cookie_id');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_cookie_id', $id, 60 * 24 * 30);
        }

        return $id;
    }

    public function total()
    {
        $items = $this->all();
        return $items->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    }
}
