<?php

if (!function_exists('valid_input')) {
    function validInput($data): ?string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);

        return $data;
    }
}
