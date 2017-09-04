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
    return view('admin.master');
});

Route::resource('layanan','jenisPelayananController');
Route::resource('bayar','jenisPembayaranController');
Route::resource('pasien','pasienController');
Route::resource('kamar','kamarController');
Route::resource('petugas','petugasController');
Route::resource('diagnosis','diagnosisController');
Route::resource('riwayat','riwayatController');

Route::get('/getLayanan', 'kamarController@getLayanan');

// * ADMIN---------------------------------------------------------------------------------------------------------

// Home dashboard
Route::get('/adm_dash', 'c_admin@index');
Route::get('/login', 'c_admin@login');

// Pasien
Route::get('/adm_pasien', 'c_admin@pasien');

// Laporan
Route::get('/adm_d_makanan', 'c_admin@d_makanan');
Route::get('/adm_t_makanan', 'c_admin@t_makanan');

// Profil
Route::get('/adm_profil', 'c_admin@profil');

// Laporan
Route::get('/adm_lap_in', 'c_admin@laporan_internal');
Route::get('/adm_lap_ex', 'c_admin@laporan_external');
Route::get('/adm_lap_ex_rl12', 'c_admin@laporan_external_rl12');
Route::get('/adm_lap_ex_rl13', 'c_admin@laporan_external_rl13');
Route::get('/adm_lap_ex_rl31', 'c_admin@laporan_external_rl31');
Route::get('/adm_lap_ex_rl4a', 'c_admin@laporan_external_rl4a');
Route::get('/adm_lap_ex_rl53', 'c_admin@laporan_external_rl53');

// Cetak Laporan
Route::get('/adm_ctk_lap_in', 'c_admin@cetak_internal');
Route::get('/adm_ctk_lap_ex_rl12', 'c_admin@cetak_laporan_external_rl12');
Route::get('/adm_ctk_lap_ex_rl13', 'c_admin@cetak_laporan_external_rl13');
Route::get('/adm_ctk_lap_ex_rl31', 'c_admin@cetak_laporan_external_rl31');
Route::get('/adm_ctk_lap_ex_rl4a', 'c_admin@cetak_laporan_external_rl4a');
Route::get('/adm_ctk_lap_ex_rl53', 'c_admin@cetak_laporan_external_rl53');

// Master
//Route::get('/adm_m_jenis_pel', 'c_admin@m_jenis_pelayanan');
Route::get('/adm_m_jenis_pem', 'c_admin@m_jenis_pembayaran');
Route::get('/adm_m_dat_kam', 'c_admin@m_data_kamar');
Route::get('/adm_m_dat_pas', 'c_admin@m_data_pasien');

// Transaksi
Route::get('/adm_t_pas_masuk', 'c_admin@t_pasien_masuk');
Route::get('/adm_t_pas_keluar', 'c_admin@t_pasien_keluar');


// Print
Route::get('/adm_print', 'c_admin@print');

// Testimoni
Route::get('/adm_testimoni', 'c_admin@testimoni');
Route::get('/adm_d_testimoni', 'c_admin@d_testimoni');

// Master
Route::get('/adm_master', 'c_admin@master');
Route::get('/adm_coba', 'c_admin@coba');
