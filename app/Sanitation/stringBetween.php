<?php

if (!function_exists('getStringBetween')) {
    function getStringBetween(string $string, $start = "", $end = ""): ?string
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);

        if ($ini == 0) return '';

        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;

        return substr($string, $ini, $len);
    }
}
