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
    public function created(Product $product)
    {
        if (empty($product->url)) {
            $url = new Url;
            $url->name = $product->name . rand(100, 999) . "data" . time();
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
