<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
        $offer_products = Product::where('offer', 1)->get();
        $products = Product::all();
        return view('Front.index', compact('offer_products', 'products'));
    }

}
