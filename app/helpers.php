<?php

/** These are here while the PHP core version is still served
 * and it will be removed at the end */

use Hamcrest\Type\IsNumeric;

if (!function_exists('dbconnection')) {
    function dbconnection()
    {
        $core = 'database.connections.core';
        $host = config("$core.host")  . ':' . config("$core.port");
        $database = config("$core.database");
        $username = config("$core.username");
        $password = config("$core.password");
        return mysqli_connect($host, $username, $password, $database);
    }
}

if (!function_exists('serve_core')) {
    function serve_core($uri = null)
    {
        $target = app_path("core/") . ($uri ?? 'login.php');
        $target = realpath($target);
        $target = $target ? $target : app_path("core/login.php");
        include $target;
    }
}
/**  --------------------------------------------------------  */

if (!function_exists('activeIfAt')) {

    function activeIfAt($pages)
    {
        $uri = request()->getUri();
        if (is_array($pages)) {
            foreach ($pages as $page) {
                if (strpos($uri, $page) !== false) {
                    echo ' class="active" ';
                    return void;
                }
            }
        } elseif (is_string($pages)) {
            if (strpos($uri, $pages) !== false) {
                echo ' class="active" ';
                return void;
            }
        }
    }
}

if (!function_exists('activeIfRoute')) {

    function activeIfRoute($routes)
    {
        $currentroute = Route::currentRouteName();
        if (is_array($routes)) {
            foreach ($routes as $route) {
                if (strpos($currentroute, $route) !== false) {
                    echo ' class="active" ';
                }
            }
        } elseif (is_string($routes)) {
            if (strpos($currentroute, $routes) !== false) {
                echo ' class="active" ';
            }
        }
    }
}

if (!function_exists('array_insert')) {
    function array_insert_array($array1, $offset, $array2)
    {
        if (is_string($offset)) {
            $keys=array_keys($array1);
            $offset=array_search($offset, $keys);
        }
        $a1 = array_slice($array1, 0, $offset, true);
        $a3= array_slice($array1, $offset);
        $newarray=array_merge($a1, $array2, $a3);
        return $newarray;
    }
}
