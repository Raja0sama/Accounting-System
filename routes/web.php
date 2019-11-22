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
function dbconnection()
{
    $host=env('DB_CORE_HOST') . ':' . env('DB_CORE_PORT') ;
    $database=env('DB_CORE_DATABASE');
    $username=env('DB_CORE_USERNAME');
    $password=env('DB_CORE_PASSWORD');
    return mysqli_connect($host,$username,$password,$database);
}

function serve_core($uri=null){
    $target=app_path("core/"). ( $uri ?? 'login.php');
    $target=realpath($target) ;
    $target=$target ? $target : app_path("core/login.php") ;
    include $target  ;
}

Route::any('core/{uri}', function($uri){ serve_core($uri); } );

Route::fallback(function(){ return redirect('core/login.php'); } );

