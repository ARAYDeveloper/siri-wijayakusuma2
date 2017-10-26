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
Route::get('/', function (){
    return redirect(route('login.index'));
});
Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@postLogin')->name('login.post');

Route::group(["middleware" => "auth"], function (){

    Route::get('/logout', 'c_admin@logout')->name('logout.index');
    Route::get('/adm_dash', 'c_admin@index')->name('dashboard');

    Route::group(["middleware" => "rule:petugas"], function (){
        Route::resource('layanan','jenisPelayananController');
        Route::resource('bayar','jenisPembayaranController');
        Route::resource('pasien','pasienController');
        Route::resource('kamar','kamarController');
        Route::resource('petugas','petugasController');
        Route::resource('diagnosis','diagnosisController');
        Route::resource('riwayat','riwayatController');
        Route::resource('spesialis','spesialisController');

        Route::get('/getLayanan', 'kamarController@getLayanan')->middleware('rule:petugas');
    });


    // Laporan
    Route::get('/adm_lap_in', 'c_admin@laporan_internal')->middleware('rule:direktur|petugas');
    Route::get('/adm_lap_ex', 'c_admin@laporan_external')->middleware('rule:direktur|petugas');
    Route::get('/adm_lap_ex_rl12', 'c_admin@laporan_external_rl12')->middleware('rule:direktur|petugas');
    Route::get('/adm_lap_ex_rl13/{tahunnya?}', 'c_admin@laporan_external_rl13')->middleware('rule:direktur|petugas');
    Route::get('/adm_lap_ex_rl31', 'c_admin@laporan_external_rl31')->middleware('rule:direktur|petugas');
    Route::get('/adm_lap_ex_rl4a', 'c_admin@laporan_external_rl4a')->middleware('rule:direktur|petugas');
    Route::get('/adm_lap_ex_rl53', 'c_admin@laporan_external_rl53')->middleware('rule:direktur|petugas');

// Cetak Laporan
    Route::get('/adm_ctk_lap_in', 'c_admin@cetak_internal');
    Route::get('/adm_ctk_lap_ex_rl12', 'c_admin@cetak_laporan_external_rl12');
    Route::get('/adm_ctk_lap_ex_rl13', 'c_admin@cetak_laporan_external_rl13');
    Route::get('/adm_ctk_lap_ex_rl31', 'c_admin@cetak_laporan_external_rl31');
    Route::get('/adm_ctk_lap_ex_rl4a', 'c_admin@cetak_laporan_external_rl4a');
    Route::get('/adm_ctk_lap_ex_rl53', 'c_admin@cetak_laporan_external_rl53');

// Transaksi
    Route::get('/adm_t_pas_masuk', 'c_admin@t_pasien_masuk');
    Route::get('/adm_t_pas_keluar', 'c_admin@t_pasien_keluar');
});


