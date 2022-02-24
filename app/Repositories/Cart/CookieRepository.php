<?php

namespace App\Repositories\Cart;

use Illuminate\Support\Facades\Cookie;

class CookieRepository implements CartRepository
{

    protected $name = 'cart';

    public function all()
    {
        $items = Cookie::get($this->name);

        if ($items) {
            return unserialize($items);
        }

        return Cookie::get($this->name);
    }

    public function add($item, $qty = 1)
    {
        $items = $this->all();
        $items[] = $item;

        // queue ( name, value, Expired-Date[ mins ], path, Domain)
        Cookie::queue($this->name, serialize($items), 60 * 24 * 30, '/', null, false, true);
    }

    public function clear()
    {
        Cookie::queue($this->name, '', -60);
    }

}
