<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StoreCircuit;
use App\Models\Url;
use App\Models\Store;
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
        $items = Product::all();
        // dd($items);

        return view('products.index', compact('items', $items));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = Store::all();

        return view('products.create', compact('stores'));
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        echo "wrong route";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required|max:200',
            'description' => 'max:500',
            'price' => 'required',
            'product_url' => 'unique:App\Models\Url,name'
        ]);

        $product = new Product;
        $product->name          = validInput($request->input('name'));
        $product->description   = validInput($request->input('description'));
        $product->price         = floatval($request->input('price'));
        $product->save();

        //Storing URL
        if (!empty($request->input('product_url'))) {
            if (checkUrl($request->input('product_url'))) {
                $url = new Url;
                $url->name = $request->input('product_url');
                $product->url()->save($url);
            }
        }

        //format selected option, extract store_id
        if ($request->input('store') > 0) {
            foreach ($request->input('store') as $store) {
                $circuit = new StoreCircuit;
                $circuit->product_id = $product->id;
                $circuit->store_id = $store;
                $circuit->save();
            }
        }
        $items = Product::all();
        return view("products.index", compact('items'));
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
        $stores = Store::all();

        return view("products.edit", compact('item', 'stores'));
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
        $this->validate($request, [
            'name' => 'max:200',
            'description' => 'max:500',
        ]);

        $product = Product::findOrFail($id);
        $product->name          = validInput($request->input('name'));
        $product->description   = validInput($request->input('description'));
        $product->price         = floatval($request->input('price'));
        $product->update(
            [
                'name' => validInput($request->input('name')),
                'description' => validInput($request->input('description')),
                'price' => floatval($request->input('price'))
            ]
        );

        //Storing URL
        if (!empty($request->input('product_url'))) {
            if (checkUrl($request->input('product_url'))) {
                $url = new Url;
                $url->name = $request->input('product_url');
                $product->url()->save($url);
            }
        }

        if ($request->input('store') > 0) {
            foreach ($request->input('store') as $store) {
                $circuit = new StoreCircuit;
                $circuit->product_id = $product->id;
                $circuit->store_id = $store;
                $circuit->save();
            }
        }

        //format selected option, extract store_id
        // $storeId = getStringBetween($request->input('store'), "x", "y");
        $storeId = ($request->input('store') > 0) ? $request->input('store') : $product->stores;

        // dd($storeId);
        if ($storeId > 0) {
            $circuit = StoreCircuit::where('store_id', $storeId)->where('product_id', $product->id)->first();
            // dd($circuit);
            $circuit->update([
                'product_id' => $product->id,
                'store_id' => $storeId
            ]);
        }


        $items = Product::all();
        return view("products.index", compact('items'));
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

        $items = Product::all();
        return view("products.index", compact('items'));
    }
}
