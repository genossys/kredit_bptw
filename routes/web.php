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
Route::get('/produk/showKreditRumah', 'Master\rumahController@showKreditRumah');
Route::get('/pencarianBank', 'Master\bankController@pencarianBank');
Route::get('/home', 'HomeController@index')->name('home');



//Login
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/postlogin', 'Auth\LoginController@postlogin');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/registermember', 'Master\krediturController@showFormRegistrasi');
Route::post('/postRegister', 'Master\krediturController@register')->name('registermember');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'kreditur', 'middleware' => 'hakakses:kreditur'], function () {

        Route::group(['prefix' => 'kredit'], function () {
            Route::post('/insertKredit', 'Master\kreditController@insertKredit');
        });

        Route::group(['prefix' => 'transaksi'], function () {
            Route::get('/historyTransaksi', 'Master\kreditController@historyTransaksi')->name('historyTransaksiKreditur');
        });

        Route::group(['prefix' => 'angsuran'], function () {
            Route::get('/', 'Master\angsuranController@index')->name('pageangsuran');
            Route::get('/showAngsuranKreditur', 'Master\angsuranController@showAngsuranKreditur');
        });
    });

    Route::group(['prefix' => 'bank', 'middleware' => 'hakakses:bank'], function () {
        Route::get('/', function () {
            return view('/bank/menuawal');
        })->name('bank');

        Route::group(['prefix' => 'angsuran'], function () {
            Route::get('/', 'Master\angsuranController@index')->name('pageangsuran');
            Route::get('/showAngsuran', 'Master\angsuranController@showAngsuran');
            Route::post('/bayarAngsuran', 'Master\angsuranController@bayarAngsuran');
            Route::get('/showKredit', 'Master\angsuranController@showKredit');
            Route::get('/showEditAngsuran', 'Master\angsuranController@showEditAngsuran');
            Route::get('/laporanangsuranbank', 'Master\angsuranController@laporanangsuranbank')->name('bankLaporanAngsuran');
            Route::get('/showBankLaporanAngsuran', 'Master\angsuranController@showBankLaporanAngsuran');
        });

        Route::group(['prefix' => 'kredit'], function () {
            Route::get('/', 'Master\kreditController@index')->name('pagekreditbank');
            Route::get('/laporanKreditbank', 'Master\kreditController@laporanKreditbank')->name('bankLaporanKredit');
            Route::get('/showBankLaporanKredit', 'Master\kreditController@showBankLaporanKredit');
            Route::get('/showKredit', 'Master\kreditController@showKredit');
            Route::get('/showEditKredit', 'Master\kreditController@showEditKredit');
            Route::get('/showDetailKredit', 'Master\kreditController@showDetailKredit');
        });


        Route::group(['prefix' => 'cetak'], function () {
            Route::get('/bankCetakKredit', 'pdfmaker@bankCetakKredit')->name('bankCetakKredit');
            Route::get('/bankCetakAngsuran', 'pdfmaker@bankCetakAngsuran')->name('bankCetakAngsuran');
        });
    });


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

        Route::group(['prefix' => 'kredit'], function () {
            Route::get('/', 'Master\kreditController@index')->name('pagekredit');
            Route::get('/showKredit', 'Master\kreditController@showKredit');
            Route::get('/showEditKredit', 'Master\kreditController@showEditKredit');
            Route::get('/showDetailKredit', 'Master\kreditController@showDetailKredit');
            Route::get('/laporanKredit', 'Master\kreditController@laporanKredit')->name('adminLaporanKredit');
            Route::get('/showAdminLaporanKredit', 'Master\kreditController@showAdminLaporanKredit');
            Route::post('/insertKredit', 'Master\kreditController@insertKredit')->name('insertKredit');
            Route::post('/editKredit', 'Master\kreditController@editKredit');
            Route::delete('/deleteData', 'Master\kreditController@deleteData');
        });

        Route::group(['prefix' => 'angsuran'], function () {
            Route::get('/laporanangsuran', 'Master\angsuranController@laporanangsuran')->name('adminLaporanAngsuran');
            Route::get('/showAdminLaporanAngsuran', 'Master\angsuranController@showAdminLaporanAngsuran');
        });

        Route::group(['prefix' => 'cetak'], function () {
            Route::get('/adminCetakKredit', 'pdfmaker@adminCetakKredit')->name('adminCetakKredit');
            Route::get('/adminCetakAngsuran', 'pdfmaker@adminCetakAngsuran')->name('adminCetakAngsuran');
        });
    });
});
