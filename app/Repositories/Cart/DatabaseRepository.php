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



    public function all()
    {
        return Cart::where('cookie_id', $this->getCookieId())->orWhere('customer_id', Auth::guard(session('guardName'))->user()->id)
            ->get();
    }

    public function add($item, $qty = 1)
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

        return Cart::updateOrCreate([
            'cookie_id' => $this->getCookieId(),
            'product_id' => ($item instanceof Product) ? $item->id : $item,
        ], [
            // 'id' => Str::uuid(),
            'customer_id' => Auth::guard(session('guardName'))->user()->id,
            'quantity' => DB::raw('quantity +' . $qty),
        ]);
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
}
