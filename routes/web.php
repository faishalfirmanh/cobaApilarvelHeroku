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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/test','Travel\CobaTanpaReload@Coba');



Route::prefix('Travel')->group(function () 
{   
    Route::get('coba', 'Travel\CobaTanpaReload@Coba');
    Route::get('tesview',function(){
        return view('Travel.pages.Cek');
    });

    Route::get('/',function(){
        return view('Travel.pages.home');
    });
   
    Route::get('blade', 'Travel\Admin\DashboardController@index');

    Route::get('home','Travel\HomeController@index')->name('home'); //cara moderen langsung panggil home, tanpa prefixnya
    Route::get('cekoutSucces', 'Travel\CheckoutController@index')->name('cekout');


    Route::get('detail','Travel\DetailController@index');
    Route::get('cek','Travel\CheckoutController@index');


});