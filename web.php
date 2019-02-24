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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/desain', 'AllController@tampildesain')->name('desain.tampil')->middleware('role:admin');

Route::get('/ruang', 'RuangController@tampil')->name('ruang.tampil')->middleware('role:admin');
Route::post('/ruang/simpan', 'RuangController@simpan')->name('ruang.simpan')->middleware('role:admin');
Route::get('/ruang/hapus/{id}', 'RuangController@hapus')->name('ruang.hapus')->middleware('role:admin');
Route::get('/ruang/edit/{id}', 'RuangController@edit')->name('ruang.edit')->middleware('role:admin');
Route::post('/ruang/editproses', 'RuangController@editproses')->name('ruang.editproses')->middleware('role:admin');
Route::get('/ruang/cetak', 'RuangController@cetak')->name('ruang.cetak')->middleware('role:admin');

Route::get('/jenis', 'JenisController@tampil')->name('jenis.tampil')->middleware('role:admin');
Route::post('/jenis/simpan', 'JenisController@simpan')->name('jenis.simpan')->middleware('role:admin');
Route::get('/jenis/hapus/{id}', 'JenisController@hapus')->name('jenis.hapus')->middleware('role:admin');
Route::get('/jenis/edit/{id}', 'JenisController@edit')->name('jenis.edit')->middleware('role:admin');
Route::post('/jenis/editproses', 'JenisController@editproses')->name('jenis.editproses')->middleware('role:admin');
Route::get('/jenis/cetak', 'JenisController@cetak')->name('jenis.cetak')->middleware('role:admin');

Route::get('/inventaris', 'InventarisController@tampil')->name('inventaris.tampil')->middleware('role:admin');
Route::post('/inventaris/simpan', 'InventarisController@simpan')->name('inventaris.simpan')->middleware('role:admin');
Route::get('/inventaris/hapus/{id}', 'InventarisController@hapus')->name('inventaris.hapus')->middleware('role:admin');
Route::get('/inventaris/edit/{id}', 'InventarisController@edit')->name('inventaris.edit')->middleware('role:admin');
Route::post('/inventaris/editproses', 'InventarisController@editproses')->name('inventaris.editproses')->middleware('role:admin');
Route::get('/inventaris/cetak', 'InventarisController@cetak')->name('inventaris.cetak')->middleware('role:admin');

Route::get('/pegawai', 'PegawaiController@tampil')->name('pegawai.tampil')->middleware('role:admin|operator');
Route::post('/pegawai/simpan', 'PegawaiController@simpan')->name('pegawai.simpan')->middleware('role:admin|operator');
Route::get('/pegawai/hapus/{id}', 'PegawaiController@hapus')->name('pegawai.hapus')->middleware('role:admin|operator');
Route::get('/pegawai/edit/{id}', 'PegawaiController@edit')->name('pegawai.edit')->middleware('role:admin|operator');
Route::post('/pegawai/editproses', 'PegawaiController@editproses')->name('pegawai.editproses')->middleware('role:admin|operator');
Route::get('/pegawai/cetak', 'PegawaiController@cetak')->name('pegawai.cetak')->middleware('role:admin');

Route::get('/peminjaman', 'PeminjamanController@tampil')->name('peminjaman.tampil')->middleware('role:admin|operator|peminjam');
Route::post('/peminjaman/simpan', 'PeminjamanController@simpan')->name('peminjaman.simpan')->middleware('role:admin|operator|peminjam');
Route::get('/peminjaman/hapus/{id}', 'PeminjamanController@hapus')->name('peminjaman.hapus')->middleware('role:admin|operator|peminjam');
Route::get('/peminjaman/edit/{id}', 'PeminjamanController@edit')->name('peminjaman.edit')->middleware('role:admin|operator|peminjam');
Route::post('/peminjaman/editproses', 'PeminjamanController@editproses')->name('peminjaman.editproses')->middleware('role:admin|operator|peminjam');
Route::get('/peminjaman/cetak', 'PeminjamanController@cetak')->name('peminjaman.cetak')->middleware('role:admin');

Route::get('/pengembalian', 'PengembalianController@tampil')->name('pengembalian.tampil')->middleware('role:admin|operator');
Route::post('/pengembalian/simpan', 'PengembalianController@simpan')->name('pengembalian.simpan')->middleware('role:admin|operator');
Route::get('/pengembalian/hapus/{id}', 'PengembalianController@hapus')->name('pengembalian.hapus')->middleware('role:admin|operator');
Route::get('/pengembalian/edit/{id}', 'PengembalianController@edit')->name('pengembalian.edit')->middleware('role:admin|operator');
Route::post('/pengembalian/editproses', 'PengembalianController@editproses')->name('pengembalian.editproses')->middleware('role:admin|operator');
Route::get('/pengembalian/cetak', 'PengembalianController@cetak')->name('pengembalian.cetak')->middleware('role:admin');
