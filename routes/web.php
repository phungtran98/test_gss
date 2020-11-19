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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Test VNPAY -- Trần Thanh Phụng
//Hướng dẫn: ANh Trần Thanh Phong

Route::post('/them-san-pham', 'SanPhamController@ajaxAddCart')->name('them-sp-gio-hang');

Route::get('/gio-hang', 'GioHangController@index')->name('gio-hang');

Route::get('/gio-hang-xoa-san-pham/{id}', 'GioHangController@destroy')->name('xoa-san-pham-gio-hang');

Route::post('/thanh-toan-vnpay', 'ThanhToanController@index')->name('thanh-toan');

Route::get('/thanh-toan-vnpay-return', 'ThanhToanController@store')->name('thanh-toan-return');

Route::get('/lich-su-giao-dich', 'ThanhToanController@LichSuGiaoDich')->name('lich-su-giao-dich');




