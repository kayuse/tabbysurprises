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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@view')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.post');
Route::get('api/token', 'Api\TokenController@appToken')->name('app.token');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/orders', 'OrderController@index')->name('orders');
    Route::get('/orders/pending', 'OrderController@pending')->name('orders.pending');
    Route::get('/orders/accepted', 'OrderController@accepted')->name('orders.accepted');
    Route::get('/orders/rejected', 'OrderController@rejected')->name('orders.rejected');
    Route::post('order/confirm', 'OrderDetailController@confirm')->name('order.confirm');
    Route::get('/orders/paid', 'OrderController@paid')->name('orders.paid');
    Route::get('/orders/completed', 'OrderController@completed')->name('orders.completed');
    Route::get('/order/{id}', 'OrderDetailController@index')->name('order');
    Route::post('/order/{id}', 'OrderDetailController@update')->name('order.update');
});
