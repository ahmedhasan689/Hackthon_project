<?php 

namespace App\Repositories\Cart;

use Illuminate\Support\Facades\Cookie;

class DatabaseRepository implements CartRepository 
{

    protected $name = 'cart';

    public function all()
    {   
        return Cookie::get($this->name, []);
    }

    public function add($item)
    {
        $items = $this->all();
        $items[] = $item;
        
        // queue ( name, value, Expired-Date[ mins ], path, Domain)
        Cookie::queue($this->name, $items, 60 * 24 * 30, '/', null, false, true);
    }

    public function clear()
    {
        Cookie::queue($this->name, '', -60);
    }

}