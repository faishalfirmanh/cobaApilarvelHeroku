<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

    Route::get('/',function(){  //home leanding page
        return view('Travel.pages.home');
    });
   
    Route::get('dashAdminTravel', 'Travel\Admin\DashboardController@index')->middleware(['auth','admin'])->name('dashAdminTravel');

    Route::get('home','Travel\HomeController@index')->name('home'); //cara moderen langsung panggil home, tanpa prefixnya
    Route::get('cekoutSucces', 'Travel\CheckoutController@index')->name('cekoutSucces');
    Route::get('detail','Travel\DetailController@index');
    Route::get('cek','Travel\CheckoutController@index');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) { //email ferirication
        $request->fulfill();
        return redirect('Travel/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    
    Route::resource('travel-pacage','Travel\Admin\TravelPackageController');
    Route::resource('gallery','Travel\Admin\GalleryController');
    Route::resource('transactions','Travel\Admin\TransactionsController');


    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () { //bawaan ketiak install auth jetstream
        return view('dashboard');
    })->name('dashboard');


});


