<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Front.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Front.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => ['required', 'min:3'],
            'category' => ['required'],
            'quantity' => ['required', 'numeric'],
            'description' => ['required', 'min:15', 'max:250'],
            'price' => ['required', 'numeric'],
            'offer' => ['nullable'],
            'cover_image' => ['required', 'image'],
        ]);

        // dd($request);

        $cover_image = null;

        if ($request->hasFile('cover_image')){
            $file = $request->file('cover_image');

            $cover_image = $file->store('/', [
                'disk' => 'cover',
            ]);
        } else {
            $cover_image = null;
        }


        if ($request->offer) {
            $product = Product::create([
                'user_id' => Auth::guard( session('guardName') )->user()->id,
                'name' => $request->product_name,
                'category_id' => $request->category,
                'quantity' => $request->quantity,
                'available' => $request->quantity,
                'description' => $request->description,
                'price' => $request->price,
                'offer' => 1,
                'cover_image' => $cover_image,
            ]);
        }else{
            $product = Product::create([
                'user_id' => Auth::guard( session('guardName') )->user()->id,
                'name' => $request->product_name,
                'category_id' => $request->category,
                'quantity' => $request->quantity,
                'available' => $request->quantity,
                'description' => $request->description,
                'price' => $request->price,
                'cover_image' => $cover_image,
            ]);
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('Front.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
