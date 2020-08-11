<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

# Route::get('/home', 'HomeController@index')->name('home');

# START CLIENT SIDE ROUTES
Route::get('/', 'HomeController@index')->name('home');              //home page
Route::get('/mybet', 'HomeController@mybet')->name('mybet');
Route::get('/oneten', 'HomeController@oneten')->name('oneten');
Route::get('/support', 'HomeController@support')->name('support');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/rules', 'HomeController@rules')->name('rules');
# END CLIENT SIDE ROUTES

Auth::routes();
