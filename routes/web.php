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
Route::group(
    ['middleware' => ['auth']],
    function () {

        Route::get(
            '/',
            function () {
                return redirect()->route('payments.create');
            }
        );

        Route::get(
            '/home',
            function () {
                return redirect()->route('payments.create');
            }
        );

        foreach (['payment', 'receipt', 'invoice', 'adjustment'] as $resource) {
            $controller = ucfirst($resource) . 'Controller';
            Route::resource(Str::plural($resource), $controller)->except(['edit', 'update']);
        }
        foreach (['account', 'chartaccount', 'subaccount'] as $resource) {
            $controller = ucfirst($resource) . 'Controller';
            Route::resource(Str::plural($resource), $controller)->except(['create', 'show']);
        }

        Route::get(
            '/general',
            function () {
                return redirect()->route('payments.create');
            }
        )->name('general_ledger');
    }
);

Route::middleware('auth')->prefix('api/')->group(
    function () {


        Route::get(
            'accountsOfChart',
            function (Request $request) {
                $chart_id = request()->input('chart_id');
                $accounts = App\Account::where('chartid', '=', $chart_id)->get();
                $query = App\Account::where('chartid', '=', $chart_id)->toSql();
                return compact('accounts', 'query');
            }
        )->name('accountsOfChart');

        Route::get(
            'subaccountsOfAccount',
            function (Request $request) {
                $account_id = request()->input('account_id');
                $subAccounts = App\Subaccount::where('accountid', '=', $account_id)->get();
                return compact('subAccounts');
            }
        )->name('subaccountsOfAccount');
    }
);

Route::any(
    'core/{uri}',
    function ($uri) {
        serve_core($uri);
    }
);

Route::fallback(
    function () {
        return 'I am sorry - I cant find ' . request()->getRequestUri();
    }
);


// Verb        Path                            Action  Route Name
// -------------------------------------------------------------------
// GET         /resource                       index   resource.index
// GET         /resource/create                create  resource.create
// POST        /resource                       store   resource.store
// GET         /resource/{resource}            show    resource.show
// GET         /resource/{resource}/edit       edit    resource.edit
// PUT/PATCH   /resource/{resource}            update  resource.update
// DELETE      /resource/{resource}            destroy resource.destroy
