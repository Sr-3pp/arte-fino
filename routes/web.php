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

Route::get('/', 'Controller@index');
Route::get('/catalogo', 'Controller@catalogo')->name('catalogo');
Route::get('/galeria', 'Controller@galeria')->name('galeria');
Route::get('/contacto', 'Controller@contacto')->name('contacto');
Route::get('/aviso-de-privacidad', 'Controller@privacy')->name('privacy');

Route::get('/art/{id}', 'Controller@goArt');

Route::get('/get-slides', 'SlidesController@get');
Route::get('/get-products', 'ProductController@get');
Route::get('/get-related-products', 'ProductController@related');
Route::get('/get-pdvs', 'PdvController@get');
Route::get('/get-gallery', 'ProductController@getGallery');

Route::post('/send-location-mail', 'Controller@locationMail');
Route::post('/send-contact', 'Controller@contactMail');

Route::post('/search', 'Controller@searchProduct');

Auth::routes();


Route::prefix('panel')->group(function(){
    Route::get('/', 'AdminController@index');  
    Route::post('/add-slide', 'AdminController@newSlide');
    Route::post('/update-slide/{id}', 'AdminController@updtSlide');
    Route::get('/delete-slide/{id}', 'AdminController@delSlide');

    Route::post('/add-product', 'AdminController@newProduct');
    Route::get('/get-all-products', 'AdminController@allProducts');
    Route::post('/update-product/{id}', 'AdminController@updateProduct');
    Route::get('/delete-product/{id}', 'AdminController@deleteProduct');
    
    Route::post('/add-pdv', 'AdminController@newPdv');
    Route::post('/update-pdv/{id}', 'AdminController@updatePdv');
    Route::get('/delete-pdv/{id}', 'AdminController@deletePdv');
    Route::get('/get-all-pdvs', 'AdminController@getAllPdvs');

    Route::post('/create-album', 'AdminController@newAlbum');
    Route::post('/upload-pictures', 'AdminController@uploadPictures');
    Route::post('/update-album', 'AdminController@updateAlbum');
    Route::get('/delete-pic/{id}', 'AdminController@deletePicture');
    Route::get('/delete-album/{id}', 'AdminController@deleteAlbum');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
