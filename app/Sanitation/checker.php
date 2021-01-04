<?php

use App\Models\Url;

if (!function_exists('checkRequest')) {
    function checkUrl(string $url)
    {
        return (Url::where('name', $url)->first() === null) ? false : true;
    }
}

if (!function_exists('checkStore')) {
    function checkStore($array1, $array2)
    {   
        return $array1->diff($array2);
    }
}
