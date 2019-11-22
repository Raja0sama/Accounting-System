<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


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


if (!function_exists('dbconnection')) {
    function dbconnection()
    {
        $host = env('DB_CORE_HOST') . ':' . env('DB_CORE_PORT');
        $database = env('DB_CORE_DATABASE');
        $username = env('DB_CORE_USERNAME');
        $password = env('DB_CORE_PASSWORD');
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
Auth::routes();
Route::group(['auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
});


Route::any('core/{uri}', function ($uri) {
    serve_core($uri);
});

Route::fallback(function () {
    return 'I am sorry - I cant find ' . request()->getRequestUri();
});
