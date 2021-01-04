<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Url;
use App\Models\StoreCircuit;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product, Request $request)
    {
        $storeId = getStringBetween($request->input('store'), "y", "z");
        $check = Store::find($storeId)->products->find($product->id)->url;

        if ($check !== null) {
            $url = new Url;
            $url->name = $product->name . $storeId . "data" . time();
            $product->url()->save($url);
        }
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        $product->url()->delete();
    }
}
