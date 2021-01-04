<?php

namespace App\Observers;

use App\Models\Url;

class UrlObserver
{
    /**
     * Handle the Url "created" event.
     *
     * @param  \App\Models\Url  $url
     * @return void
     */
    public function created(Url $url)
    {
        //
    }

    /**
     * Handle the Url "updated" event.
     *
     * @param  \App\Models\Url  $url
     * @return void
     */
    public function updated(Url $url)
    {
        //
    }

    /**
     * Handle the Url "deleted" event.
     *
     * @param  \App\Models\Url  $url
     * @return void
     */
    public function deleted(Url $url)
    {
        //
    }

    /**
     * Handle the Url "restored" event.
     *
     * @param  \App\Models\Url  $url
     * @return void
     */
    public function restored(Url $url)
    {
        //
    }

    /**
     * Handle the Url "force deleted" event.
     *
     * @param  \App\Models\Url  $url
     * @return void
     */
    public function forceDeleted(Url $url)
    {
        //
    }
}
