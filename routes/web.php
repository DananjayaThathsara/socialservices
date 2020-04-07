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


Route::group(['namespace'=>'front'],function (){

    Route::resource('/','serviceController');

    Route::get('get-city-list','serviceController@getCityList');
    Route::get('search','serviceController@search');
    Route::get('category/{id}','serviceController@categoryShow')->name('category');
});
Route::group(['namespace'=>'admin'],function (){
    Route::resource('/admin/home', 'HomeController');
    Route::resource('/adminCategory','categoryController');
    Route::resource('/adminService','serviceController');
    Route::post('/adminService/approve/{id}','serviceController@approve')->name('adminService.approve');
    Route::post('/adminService/reject/{id}','serviceController@reject')->name('adminService.reject');
    // Admin Auth Routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login.form');
    Route::post('admin-login', 'Auth\LoginController@login')->name('login');
    Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
});
Route::get('/home', 'HomeController@index')->name('home');
