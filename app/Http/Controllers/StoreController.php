<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\Url;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Store::all();

        return view('stores.index', compact('items'));
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $item = Store::findOrFail($id);

        return view('stores.show', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores.create');
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
            'name' => 'required|unique:App\Models\Store|max:200',
            'website_url' => 'required|unique:App\Models\Store',
            'code' => 'required|unique:App\Models\Store',
        ]);


        $store = new Store;
        $store->name        = validInput($request->input('name'));
        $store->website_url = $request->input('website_url');
        $store->code        = $request->input('code');

        $store->save();

        $items = Store::all();

        return view('stores.index', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $item = Store::findOrFail($id);

        return view('stores.edit', compact('item'));
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
        $request->validate([
            'name' => 'max:200',
        ]);

        $store = Store::findOrFail($id);

        // if ($store) {
        if ($request->input('name')) {
            $store->name = validInput($request->input('name'));
        }

        if ($request->input('website_url')) {
            $store->website_url = $request->input('website_url');
        }

        if ($request->input('code')) {
            $store->code = $request->input('code');
        }

        $store->save();

        $items = Store::all();
        return view('stores.index', compact('items'));
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        $items = Store::all();
        return view('stores.index', compact('items'));
    }
}
