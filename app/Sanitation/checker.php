<?php

use App\Models\Url;

if (!function_exists('checkRequest')) {
    function checkUrl(string $url)
    {
        return (App\Models\Url::where('name', "=", $url)->first() === null) ? false : true;
    }
}
