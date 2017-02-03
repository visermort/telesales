<?php

namespace App\helpers;

use Illuminate\Support\Facades\Request;

/**
 * Class Navigate
 * @package App\helpers
 */
class Navigate
{

    public static function isActive($url)
    {
        $path = Request::path();

        return (strpos($path, $url) === 0 ? "active" : "");
    }
}