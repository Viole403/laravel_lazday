<?php

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

use App\Models\Transaction;

Route::get('/', function () {
    return view('auth.login');

    // $code = Transaction::getCode();
    // dd($code);
})->middleware('guest');

// Route::get('/adminlte', function () {
//     return view('template.app');
// });

Route::get('dashboard', function () {
    return view('admin.dashboard');
});

Route::get('loginer', function () {
    return view('admin.loginer');
});

// Route::get('transaction/user', function () {
// return view('admin.transaction.create');
// });

Auth::routes(['register' => false]);
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'TestController@index');

Route::group(['middleware' => ['auth']], function () {

    Route::get('users', 'Web\UserController@index')->name('data.users');
    Route::get('users/search', 'Web\UserController@search');
    Route::resource('user', 'Web\UserController');
    Route::resource('product', 'Web\ProductsController');
    Route::resource('transaction', 'Web\TransactionController');
    // Route::get('trasanction/user', 'Web\UserTransaction@index');
    // Route::get('product/search', 'Web\ProductsController@search');
    // Route::get('product/search', 'Web\ProductsController@search');
    // Route::get('product/', 'Web\ProductsController@index')->name('product.index');
    // Route::get('product/create', 'Web\ProductsController@create')->name('product.create');
    // Route::post('product/', 'Web\ProductsController@store')->name('product.store');
    // Route::get('product/{idproduct}', 'Web\ProductsController@show')->name('product.show');
    // Route::get('product/{idproduct}/edit', 'Web\ProductsController@edit')->name('product.edit');
    // Route::put('product/{idproduct}', 'Web\ProductsController@update')->name('product.update');
    // Route::delete('product/{idproduct}', 'Web\ProductsController@destroy')->name('product.destroy');
    // Route::get('usertransaction', 'Web\UserTransactionController');
    // Route::get('product/create', 'Web\UserTransactionController');
    // Route::get('usertransaction/create', 'Web\UserTransactionController');
});
