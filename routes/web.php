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

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return redirect()->route('payment.create');
    });

    Route::get('/home', function () {
         return redirect()->route('payment.create');
    });

    Route::get('/payment', 'PaymentController@index')->name('payment.index');
    Route::get('/payment/create', 'PaymentController@create')->name('payment.create');
    Route::post('/payment', 'PaymentController@store')->name('payment.store');
    Route::get('/payment/{payment}', 'PaymentController@show')->name('payment.show');
    Route::get('/payment/{payment}/edit', 'PaymentController@edit')->name('payment.edit');
    Route::patch('/payment/{payment}', 'PaymentController@update')->name('payment.update');
    Route::delete('/payment/{payment}', 'PaymentController@destroy')->name('payment.destroy');

});

Route::middleware('auth')->prefix('api/')->group(function(){


    Route::get('accountsOfChart', function(Request $request){
        $chart_id = request()->input('chart_id');
        $accounts= App\Account::where('chartid','=',$chart_id)->get();
        $query=App\Account::where('chartid','=',$chart_id)->toSql();
        return compact('accounts','query');
    })->name('accountsOfChart');

    Route::get('subaccountsOfAccount', function(Request $request){
        $account_id = request()->input('account_id');
        $subAccounts= App\Subaccount::where('accountid','=',$account_id)->get();
        return compact('subAccounts');
    })->name('subaccountsOfAccount');

});

Route::any('core/{uri}', function ($uri) {
    serve_core($uri);
});

Route::fallback(function () {
    return 'I am sorry - I cant find ' . request()->getRequestUri();
});


// Verb        Path                            Action  Route Name
// -------------------------------------------------------------------
// GET         /resource                       index   resource.index
// GET         /resource/create                create  resource.create
// POST        /resource                       store   resource.store
// GET         /resource/{resource}            show    resource.show
// GET         /resource/{resource}/edit       edit    resource.edit
// PUT/PATCH   /resource/{resource}            update  resource.update
// DELETE      /resource/{resource}            destroy resource.destroy
