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


Route::get('/produk', 'Master\rumahController@menu')->name('pageproduct');
Route::get('/produk/showcaseRumah', 'Master\rumahController@showcaseRumah')->name('pageproduct');
Route::get('/produk/showDetailRumah', 'Master\rumahController@showDetailRumah');
Route::get('/home', 'HomeController@index')->name('home');



//Login
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/postlogin', 'Auth\LoginController@postlogin');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/registermember', 'Master\krediturController@showFormRegistrasi');
Route::post('/postRegister', 'Master\krediturController@register')->name('registermember');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'admin', 'middleware' => 'hakakses:admin'], function () {

        Route::get('/', function () {
            return view('/admin/menuawal');
        })->name('admin');

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'Master\userController@index')->name('pageuser');
            Route::get('/showUser', 'Master\userController@showUser');
            Route::post('/insertUser', 'Master\userController@insertUser');
            Route::post('/editUser', 'Master\userController@editUser');
            Route::post('/editPassword', 'Master\userController@editPassword');
            Route::delete('/deleteUser', 'Master\userController@delete');
        });


        Route::group(['prefix' => 'rumah'], function () {
            Route::get('/', 'Master\rumahController@index')->name('pagerumah');
            Route::get('/showRumah', 'Master\rumahController@showRumah');
            Route::get('/showEditRumah', 'Master\rumahController@showEditRumah');

            Route::post('/insertRumah', 'Master\rumahController@insertRumah');
            Route::post('/editRumah', 'Master\rumahController@editRumah');
            Route::delete('/deleteData', 'Master\rumahController@deleteData');
        });

        Route::group(['prefix' => 'bank'], function () {
            Route::get('/', 'Master\bankController@index')->name('pagebank');
            Route::get('/showBank', 'Master\bankController@showBank');
            Route::get('/showEditBank', 'Master\bankController@showEditBank');
            Route::post('/insertBank', 'Master\bankController@insertBank');
            Route::post('/editBank', 'Master\bankController@editBank');
            Route::delete('/deleteData', 'Master\bankController@deleteData');
        });

        Route::group(['prefix' => 'kreditur'], function () {
            Route::get('/', 'Master\krediturController@index')->name('pagekreditur');
            Route::get('/showKreditur', 'Master\krediturController@showKreditur');
            Route::get('/showEditKreditur', 'Master\krediturController@showEditKreditur');
            Route::get('/showDetailKreditur', 'Master\krediturController@showDetailKreditur');
            Route::post('/insertKreditur', 'Master\krediturController@insertKreditur');
            Route::post('/editKreditur', 'Master\krediturController@editKreditur');
            Route::delete('/deleteData', 'Master\krediturController@deleteData');
        });





    });


});

