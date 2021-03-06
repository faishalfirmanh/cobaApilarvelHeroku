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



Route::get('/test',function(){
    return view('Travel.pages.transactionNotif.unfinish');
});



Route::prefix('Travel')->group(function () 
{   
    Route::get('coba', 'Travel\CobaTanpaReload@Coba');
    Route::get('tesview',function(){
        return view('Travel.pages.Cek');
    });

    // Route::get('/',function(){  //home leanding page
    //     return view('Travel.pages.home');
    // });
    Route::get('/','Travel\HomeController@index');

    Route::get('dashAdminTravel', 'Travel\Admin\DashboardController@index')->middleware(['auth','admin'])->name('dashAdminTravel');

    Route::get('home','Travel\HomeController@index')->name('home'); //cara moderen langsung panggil home, tanpa prefixnya
    Route::get('cekoutSucces', 'Travel\CheckoutController@index')->name('cekoutSucces');
    Route::get('detail/{slug}','Travel\DetailController@index');
    Route::get('checkout','Travel\CheckoutController@index')->name('checkout');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) { //email ferirication
        $request->fulfill();
        return redirect('Travel/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    
    Route::resource('travel-pacage','Travel\Admin\TravelPackageController');
    Route::resource('gallery','Travel\Admin\GalleryController');
    Route::resource('transactions','Travel\Admin\TransactionsController');

    //cehckout
    Route::post('/checkout/{id}','Travel\CheckoutController@process')->name('checkout_process')->middleware(['auth','verified']); //verifed dimail trap email harus difrefikasi dulu
    Route::get('/checkout/{id}','Travel\CheckoutController@index')->name('checkout')->middleware(['auth','verified']);
    Route::post('/checkout/create/{detail_id}','Travel\CheckoutController@create')->name('checkout_create')->middleware(['auth','verified']);
    Route::get('/checkout/remove/{detail_id}','Travel\CheckoutController@remove')->name('checkout_remove')->middleware(['auth','verified']);
    Route::get('/checkout/confirm/{id}','Travel\CheckoutController@succes')->name('checkout_succes')->middleware(['auth','verified']);
    //batas checkout
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () { //bawaan ketiak install auth jetstream
        return view('dashboard');
    })->name('dashboard');

    //midtrans
    Route::post('/midtrans/callback','Travel\MidtransController@notificationHandler');
    Route::get('/midtrans/finish','Travel\MidtransController@finishRedirect');
    Route::get('/midtrans/unfinish','Travel\MidtransController@unfinishRedirect');
    Route::get('/midtrans/error','Travel\MidtransController@errorRedirect');
    //mid

});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () { //bawaan ketiak install auth jetstream
    return view('dashboard');
})->name('dashboard');

