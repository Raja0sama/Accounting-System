<?php

/** These are here while the PHP core version is still served
 * and it will be removed at the end */

if (!function_exists('dbconnection')) {
    function dbconnection()
    {
        $core='database.connections.core';
        $host = config("$core.host")  . ':' . config("$core.port") ;
        $database = config("$core.database") ;
        $username = config("$core.username") ;
        $password = config("$core.password") ;
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
