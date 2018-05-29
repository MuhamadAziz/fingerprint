<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/admin', function () {
    return view('auth.login');
});
Route::get('/adminguru', function () {
    return view('auth.loginguru');
});
Route::post('guru_login', 'Guru\LoginController@login')->name('admin_guru');
Auth::routes();

Route::get('/guru', 'HomeController@guru')->name('guru');

Route::get('/', 'UserDataController@indexguru')->name('rumah');

Route::get('/home', 'HomeController@index1')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/keluar', 'Guru\LoginController@logout')->name('keluar');

Route::get('sinkronisasi/guru', 'UserDataController@sinkronguru')->name('guruSinkronisasi');

Route::get('/ketidakhadiranguru','UserDataController@gurutidakhadir')->middleware('admin')->name('ketidakhadiranguru');
Route::post('/ketidakhadiranguru/input','UserDataController@inputguru')->middleware('admin')->name('input_ketidakhadiranguru');

Route::get('/absensi', 'UserDataController@index')->middleware('petugas_piket')->name('index');
Route::get('/ketidakhadiran','UserDataController@tampil_tidak_hadir')->middleware('petugas_piket')->name('ketidakhadiran');
Route::post('/ketidakhadiran/input','UserDataController@input')->middleware('petugas_piket')->name('input_ketidakhadiran');
Route::get('sinkronisasi', 'UserDataController@sinkronisasi')->middleware('petugas_piket')->name('sinkronisasi');
Route::get('sinkronisasi/ajax', 'UserDataController@sinkron')->middleware('petugas_piket')->name('ajaxSinkronisasi');


Route::group(['prefix' => 'fingerprint'], function() {
  Route::get('/', 'FPController@index')->middleware('admin')->name('fingerprint_index');
  Route::get('create', 'FPController@create')->middleware('admin')->name('fingerprint_create');
  Route::post('create', 'FPController@store')->middleware('admin')->name('fingerprint_store');
  Route::get('{id}/edit', 'FPController@edit')->middleware('admin')->name('fingerprint_edit');
  Route::post('update', 'FPController@update')->middleware('admin')->name('fingerprint_update');
  Route::get('{id}/delete', 'FPController@delete')->middleware('admin')->name('fingerprint_delete');
  Route::get('{id}/check-connection', 'FPController@check_connection')->middleware('admin')->name('fingerprint_check_connection');
  Route::get('{id}/active', 'FPController@active')->middleware('admin')->name('fingerprint_active');
  Route::get('{id}/deactive', 'FPController@deactive')->middleware('admin')->name('fingerprint_deactive');
});

Route::group(['prefix' => 'fingerprintguru'], function() {
  Route::get('/', 'FPGController@index')->middleware('admin')->name('fingerprintguru_index');
  Route::get('create', 'FPGController@create')->middleware('admin')->name('fingerprintguru_create');
  Route::post('create', 'FPGController@store')->middleware('admin')->name('fingerprintguru_store');
  Route::get('{id}/edit', 'FPGController@edit')->middleware('admin')->name('fingerprintguru_edit');
  Route::post('update', 'FPGController@update')->middleware('admin')->name('fingerprintguru_update');
  Route::get('{id}/delete', 'FPGController@delete')->middleware('admin')->name('fingerprintguru_delete');
  Route::get('{id}/check-connection', 'FPGController@check_connection')->middleware('admin')->name('fingerprintguru_check_connection');
  Route::get('{id}/active', 'FPGController@active')->middleware('admin')->name('fingerprintguru_active');
  Route::get('{id}/deactive', 'FPGController@deactive')->middleware('admin')->name('fingerprintguru_deactive');
});

Route::group(['prefix' => 'siswa'], function() {
  Route::get('/', 'SiswaController@index')->middleware('admin')->name('siswa_index');
  Route::get('create', 'SiswaController@create')->middleware('admin')->name('siswa_create');
  Route::post('create', 'SiswaController@store')->middleware('admin')->name('siswa_store');
  Route::get('{nis}/edit', 'SiswaController@edit')->middleware('admin')->name('siswa_edit');
  Route::post('{nis}/update', 'SiswaController@update')->middleware('admin')->name('siswa_update');
  Route::get('{nis}/delete', 'SiswaController@delete')->middleware('admin')->name('siswa_delete');
});

Route::group(['prefix' => 'dguru'], function() {
  Route::get('/', 'GuruController@index')->middleware('admin')->name('guru_index');
  Route::get('create', 'GuruController@create')->middleware('admin')->name('guru_create');
  Route::post('create', 'GuruController@store')->middleware('admin')->name('guru_store');
  Route::get('{nip}/edit', 'GuruController@edit')->middleware('admin')->name('guru_edit');
  Route::post('{nip}/update', 'GuruController@update')->middleware('admin')->name('guru_update');
  Route::get('{nip}/delete', 'GuruController@delete')->middleware('admin')->name('guru_delete');
});

Route::group(['prefix' => 'jurusan'], function() {
  Route::get('/', 'JurusanController@index')->middleware('admin')->name('jurusan_index');
  Route::get('create', 'JurusanController@create')->middleware('admin')->name('jurusan_create');
  Route::post('create', 'JurusanController@store')->middleware('admin')->name('jurusan_store');
  Route::get('{id_jurusan}/edit', 'JurusanController@edit')->middleware('admin')->name('jurusan_edit');
  Route::post('{id_jurusan}/update', 'JurusanController@update')->middleware('admin')->name('jurusan_update');
  Route::get('{id_jurusan}/delete', 'JurusanController@delete')->middleware('admin')->name('jurusan_delete');
});
Route::group(['prefix' => 'rayon'], function() {
  Route::get('/', 'RayonController@index')->middleware('admin')->name('rayon_index');
  Route::get('create', 'RayonController@create')->middleware('admin')->name('rayon_create');
  Route::post('create', 'RayonController@store')->middleware('admin')->name('rayon_store');
  Route::get('{id_rayon}/edit', 'RayonController@edit')->middleware('admin')->name('rayon_edit');
  Route::post('{id_rayon}/update', 'RayonController@update')->middleware('admin')->name('rayon_update');
  Route::get('{id_rayon}/delete', 'RayonController@delete')->middleware('admin')->name('rayon_delete');
});

Route::group(['prefix' => 'rombel'], function() {
  Route::get('/', 'RombelController@index')->middleware('admin')->name('rombel_index');
  Route::get('create', 'RombelController@create')->middleware('admin')->name('rombel_create');
  Route::post('create', 'RombelController@store')->middleware('admin')->name('rombel_store');
  Route::get('{id_rombel}/edit', 'RombelController@edit')->middleware('admin')->name('rombel_edit');
  Route::post('{id_rombel}/update', 'RombelController@update')->middleware('admin')->name('rombel_update');
  Route::get('{id_rombel}/delete', 'RombelController@delete')->middleware('admin')->name('rombel_delete');
});

Route::get('/laporan_kehadiran','LaporanController@laporan_kehadiran')->name('laporan');
Route::get('/laporan_harian/{rombel}/{tanggal}','LaporanController@laporan_harian')->name('laporan_har');
Route::post('/laporan_harian/tampil','LaporanController@laporan_harian_tampil')->name('laporan_harian');
Route::get('/laporan_bulanan/{rombel}/{bulan}/{tahun}', 'LaporanController@laporan_bulanan')->name('laporan_bulanan');
Route::get('/laporan_bulanan_siswa/{nis}', 'LaporanController@laporan_bulanan_siswa')->name('laporan_bul');
Route::post('/laporan_bulanan/tampil', 'LaporanController@laporan_bulanan_tampil')->name('laporan_bu');

Route::post('/print_harian/{rombel}/{tanggal}','LaporanController@print_harian'); 
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/credit', 'HomeController@credit')->name('credit');