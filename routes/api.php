<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('Product','ProductController@store');
Route::resource('Product', 'ProductController');
// Route::get('ProductGet','ProductController@index');
// Route::delete('ProductDel/{id}','ProductController@destroy');

Route::post('Prod/{id}','ProductController@updateNew');

Route::post('Kategori','ProductController@ByKategory');

Route::get('Nextartikel/{id}', 'ProductController@Nextartikel');

Route::post('NextArticelCategory', 'ProductController@NextArticelCategory');

Route::post('Cariarticel', 'ProductController@Cariarticel');