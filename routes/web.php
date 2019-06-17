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
    return view('umum/welcome');
});

Auth::routes();


//Login
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'],function(){


Route::get('/admin', function () {
    return view('/admin/menuawal');
})->name('admin');

Route::get('/rumah', function () {
    return view('/admin/master/datarumah');
})->name('rumah');

Route::get('/user', function () {
    return view('/admin/master/datauser');
})->name('user');

Route::get('/kreditur', function () {
    return view('/admin/master/datakreditur');
})->name('kreditur');

Route::get('/bank', function () {
    return view('/admin/master/databank');
})->name('bank');



});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/produk', function () {
    return view('/umum/produk');
})->name('produk');

