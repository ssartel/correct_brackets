<?php

if (!function_exists('debug')) {
    function debug ($data, $isExit = false): void
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        if($isExit)
        {
            exit;
        }
    }
}

if (!function_exists('redirect')) {
    function redirect (string $location = '', bool $replace = true, int $response_code = 302): void
    {
        header("Location: {$_SERVER['HTTP_ORIGIN']}/" .  $location, $replace, $response_code);
        exit;
    }
}
