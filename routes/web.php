<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

/* FRONT END ROUTES */
// home
Route::get('/', 'App\Http\Controllers\Home@index');
Route::get('home', 'App\Http\Controllers\Home@index');
Route::get('kontak', 'App\Http\Controllers\Home@kontak');
Route::get('about', 'App\Http\Controllers\Home@about');
Route::get('home/about', 'App\Http\Controllers\Home@about');
Route::get('features', 'App\Http\Controllers\Home@features');
Route::get('gallery', 'App\Http\Controllers\Home@gallery');
Route::get('team', 'App\Http\Controllers\Home@team');
Route::get('pricing', 'App\Http\Controllers\Home@pricing');

// login
Route::get('login', 'App\Http\Controllers\Login@index');
Route::get('login/lupa', 'App\Http\Controllers\Login@lupa');
Route::get('login/logout', 'App\Http\Controllers\Login@logout');
Route::post('login/proses-login', 'App\Http\Controllers\Login@proses_login');
Route::post('proses-login', 'App\Http\Controllers\Login@proses_login');

// signin
Route::get('signin', 'App\Http\Controllers\Signin@index');
Route::get('signin/logout', 'App\Http\Controllers\Signin@logout');
Route::post('signin/proses-login', 'App\Http\Controllers\Signin@proses_login');

// dashboard
Route::get('dasbor', 'App\Http\Controllers\Dasbor@index');

// produk
Route::get('produk', 'App\Http\Controllers\Produk@index');
Route::get('produk/kategori/{id}', 'App\Http\Controllers\Produk@kategori');
Route::get('produk/detail/{id}', 'App\Http\Controllers\Produk@detail');
Route::post('produk/add', 'App\Http\Controllers\Produk@add');

// keranjang
Route::get('keranjang', 'App\Http\Controllers\Keranjang@index');
Route::get('keranjang/kosongkan', 'App\Http\Controllers\Keranjang@kosongkan');
Route::get('keranjang/checkout', 'App\Http\Controllers\Keranjang@checkout');
Route::get('keranjang/sukses/{id}', 'App\Http\Controllers\Keranjang@sukses');
Route::post('keranjang/update', 'App\Http\Controllers\Keranjang@update');
Route::post('keranjang/proses-checkout', 'App\Http\Controllers\Keranjang@proses_checkout');

/* END FRONT END ROUTES */

/* BACKEND ROUTES */
// dasbor
Route::get('admin/dasbor', 'App\Http\Controllers\Admin\Dasbor@index');
// konfigurasi
Route::get('admin/konfigurasi', 'App\Http\Controllers\Admin\Konfigurasi@index');
Route::get('admin/konfigurasi/logo', 'App\Http\Controllers\Admin\Konfigurasi@logo');
Route::get('admin/konfigurasi/profil', 'App\Http\Controllers\Admin\Konfigurasi@profil');
Route::get('admin/konfigurasi/icon', 'App\Http\Controllers\Admin\Konfigurasi@icon');
Route::get('admin/konfigurasi/email', 'App\Http\Controllers\Admin\Konfigurasi@email');
Route::get('admin/konfigurasi/gambar', 'App\Http\Controllers\Admin\Konfigurasi@gambar');
Route::get('admin/konfigurasi/pembayaran', 'App\Http\Controllers\Admin\Konfigurasi@pembayaran');
Route::post('admin/konfigurasi/proses', 'App\Http\Controllers\Admin\Konfigurasi@proses');
Route::post('admin/konfigurasi/proses_logo', 'App\Http\Controllers\Admin\Konfigurasi@proses_logo');
Route::post('admin/konfigurasi/proses_icon', 'App\Http\Controllers\Admin\Konfigurasi@proses_icon');
Route::post('admin/konfigurasi/proses_email', 'App\Http\Controllers\Admin\Konfigurasi@proses_email');
Route::post('admin/konfigurasi/proses_gambar', 'App\Http\Controllers\Admin\Konfigurasi@proses_gambar');
Route::post('admin/konfigurasi/proses_pembayaran', 'App\Http\Controllers\Admin\Konfigurasi@proses_pembayaran');
Route::post('admin/konfigurasi/proses_profil', 'App\Http\Controllers\Admin\Konfigurasi@proses_profil');

// user
Route::get('admin/user', 'App\Http\Controllers\Admin\User@index');
Route::get('admin/user/tambah', 'App\Http\Controllers\Admin\User@tambah');
Route::get('admin/user/edit/{id}', 'App\Http\Controllers\Admin\User@edit');
Route::get('admin/user/delete/{id}', 'App\Http\Controllers\Admin\User@delete');
Route::post('admin/user/proses-tambah', 'App\Http\Controllers\Admin\User@proses_tambah');
Route::post('admin/user/proses-edit', 'App\Http\Controllers\Admin\User@proses_edit');
Route::post('admin/user/proses', 'App\Http\Controllers\Admin\User@proses');

// merek
Route::get('admin/merek', 'App\Http\Controllers\Admin\Merek@index');
Route::get('admin/merek/tambah', 'App\Http\Controllers\Admin\Merek@tambah');
Route::get('admin/merek/edit/{id}', 'App\Http\Controllers\Admin\Merek@edit');
Route::get('admin/merek/delete/{id}', 'App\Http\Controllers\Admin\Merek@delete');
Route::post('admin/merek/proses-tambah', 'App\Http\Controllers\Admin\Merek@proses_tambah');
Route::post('admin/merek/proses-edit', 'App\Http\Controllers\Admin\Merek@proses_edit');
Route::post('admin/merek/proses', 'App\Http\Controllers\Admin\Merek@proses');

// kategori
Route::get('admin/kategori', 'App\Http\Controllers\Admin\Kategori@index');
Route::get('admin/kategori/tambah', 'App\Http\Controllers\Admin\Kategori@tambah');
Route::get('admin/kategori/edit/{id}', 'App\Http\Controllers\Admin\Kategori@edit');
Route::get('admin/kategori/delete/{id}', 'App\Http\Controllers\Admin\Kategori@delete');
Route::post('admin/kategori/proses-tambah', 'App\Http\Controllers\Admin\Kategori@proses_tambah');
Route::post('admin/kategori/proses-edit', 'App\Http\Controllers\Admin\Kategori@proses_edit');
Route::post('admin/kategori/proses', 'App\Http\Controllers\Admin\Kategori@proses');

// produk
Route::get('admin/produk', 'App\Http\Controllers\Admin\Produk@index');
Route::get('admin/produk/tambah', 'App\Http\Controllers\Admin\Produk@tambah');
Route::get('admin/produk/edit/{id}', 'App\Http\Controllers\Admin\Produk@edit');
Route::get('admin/produk/delete/{id}', 'App\Http\Controllers\Admin\Produk@delete');
Route::get('admin/produk/kategori/{id}', 'App\Http\Controllers\Admin\Produk@kategori');
Route::get('admin/produk/merek/{id}', 'App\Http\Controllers\Admin\Produk@merek');
Route::get('admin/produk/status-produk/{id}', 'App\Http\Controllers\Admin\Produk@status_produk');

Route::get('admin/produk/cetak/{id}', 'App\Http\Controllers\Admin\Produk@cetak');
Route::get('admin/produk/unduh', 'App\Http\Controllers\Admin\Produk@unduh');

Route::get('admin/produk/cari', 'App\Http\Controllers\Admin\Produk@cari');
Route::post('admin/produk/proses-tambah', 'App\Http\Controllers\Admin\Produk@proses_tambah');
Route::post('admin/produk/proses-edit', 'App\Http\Controllers\Admin\Produk@proses_edit');
Route::post('admin/produk/proses', 'App\Http\Controllers\Admin\Produk@proses');

Route::get('admin/transaksi', 'App\Http\Controllers\Admin\Transaksi@index');
Route::get('admin/transaksi/detail/{id}', 'App\Http\Controllers\Admin\Transaksi@detail');
Route::get('admin/transaksi/cetak/{id}', 'App\Http\Controllers\Admin\Transaksi@cetak');
Route::get('admin/transaksi/edit/{id}', 'App\Http\Controllers\Admin\Transaksi@edit');
Route::post('admin/transaksi/update', 'App\Http\Controllers\Admin\Transaksi@update');
Route::post('admin/transaksi/proses', 'App\Http\Controllers\Admin\Transaksi@proses');
Route::post('admin/transaksi/proses-edit', 'App\Http\Controllers\Admin\Transaksi@proses_edit');

/* END BACKEND ROUTES */










