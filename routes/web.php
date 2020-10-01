<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});

// try qrcode
Route::get('/qrcode', function () {
    $text = "atrem";
    return view('qrcode.index', compact('text'));
});

// try multi image upload
Route::prefix('image_upload')->group(function () {
    Route::get('/', 'ImageUploadController@index')->name('image_upload.index');
    Route::post('/store', 'ImageUploadController@store')->name('image_upload.store');
    Route::post('/delete', 'ImageUploadController@destroy')->name('image_upload.delete');
});

// try verified email login, turn to false to disable verified email checking and turn to true if you want to check it
Auth::routes(['verify'=>false]);

// try google login
Route::prefix('google')->group(function () {
    Route::get('/login', 'GoogleAuthController@redirectToProvider')->name('google.login');
    Route::get('/callback', 'GoogleAuthController@handleProviderCallback');
});

// try facebook login
Route::prefix('facebook')->group(function () {
    Route::get('/login', 'FacebookAuthController@redirectToProvider')->name('facebook.login');
    Route::get('/callback', 'FacebookAuthController@handleProviderCallback');
});

// try github login
Route::prefix('github')->group(function () {
    Route::get('/login/{provider}', 'GithubAuthController@redirectToProvider')->name('github.login');
    Route::get('/callback/{provider}', 'GithubAuthController@handleProviderCallback');
});

// data user CSV download
Route::get('user-csv', 'UserCSVController@userCSV');

// book to check import & export excel file
Route::prefix('books')->group(function () {
    Route::get('/', 'BookController@index')->name('books.index');
    Route::post('/import', 'BookController@import')->name('books.import');
    Route::get('/export', 'BookController@export')->name('books.export');
});

// avatar to check multi image upload
Route::prefix('avatar')->group(function () {
    Route::get('/create', 'AvatarController@index')->name('avatar.index');
    Route::post('/upload', 'AvatarController@upload')->name('avatar.upload');
});
