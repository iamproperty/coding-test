<?php

if (!function_exists("flashSession")) {
    function flashSession($key, $value = null)
    {
        $key = is_array($key) ? $key : [$key => $value];

        foreach ($key as $k => $v) {
            session()->flash($k, $v);
        }
    }
}

if (!function_exists("flashErrorSession")) {
    function flashErrorSession($message)
    {
        flashSession([
            'sessionStatus' => 'error',
            'statusMessage' => $message
        ]);
    }
}

if (!function_exists("flashSuccessSession")) {
    function flashSuccessSession($message)
    {
        flashSession([
            'sessionStatus' => 'success',
            'statusMessage' => $message
        ]);
    }
}
