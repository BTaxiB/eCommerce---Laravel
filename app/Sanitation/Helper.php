<?php

namespace App\Traits;

class Helper
{

    function validInput($data): ?string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);

        return $data;
    }

    function get_string_between(string $string, $start = "", $end = ""): ?string
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);

        if ($ini == 0) return '';

        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;

        return substr($string, $ini, $len);
    }
}
