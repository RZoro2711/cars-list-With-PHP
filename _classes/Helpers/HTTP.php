<?php
namespace Helpers;

class HTTP
{
    static $base = "http://localhost/cars";
    static function redirect($uri, $query="")
    {
        $url = static::$base . $uri;
        if($query)
            $url = "$url?$query";
            header("location:$url");
            exit();
        
    }
}
