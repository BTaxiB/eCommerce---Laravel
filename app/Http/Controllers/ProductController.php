<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StoreCircuit;
use App\Models\Url;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Product::all();

        return view('/products', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:200',
            'description' => 'max:500',
            'price' => 'required',
            'product_url' => 'unique:urls'
        ]);

        $product = new Product;
        $product->name          = validInput($request->input('name'));
        $product->description   = validInput($request->input('description'));
        $product->price         = floatval($request->input('price'));
        $product->save();

        //Storing URL
        if (checkUrl($request->input('product_url'))) {
            $url = new Url;
            $url->name = $request->input('product_url');
            $product->url()->save($url);
        }

        //format selected option, extract store_id
        $storeId = getStringBetween($request->input('store'), "y", "z");

        $circuit = new StoreCircuit;
        $circuit->product_id = $product->id;
        $circuit->store_id = $storeId;
        $circuit->save();

        return view("/products");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $item = Product::findOrFail($id);

        return view("products.edit", compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return view('/products');
    }
}
