<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

# Route::get('/home', 'HomeController@index')->name('home');

# START CLIENT SIDE ROUTES
Route::get('/', 'HomeController@index')->name('home'); //home page
Route::get('/mybet', 'HomeController@mybet')->name('mybet');
Route::get('/oneten', 'HomeController@oneten')->name('oneten');
Route::get('/support', 'HomeController@support')->name('support');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/rules', 'HomeController@rules')->name('rules');
# END CLIENT SIDE ROUTES


# START DASHBOARD | ADMIN SIDE
route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'backendController@index')->name('admin.index');
    Route::get('/setting', 'backendController@settings')->name('admin.setting');
    Route::post('/setting/store', 'backendController@settingStore')->name('admin.setting.store');
    Route::post('/setting/update/{id}', 'backendController@settingUpdate')->name('admin.setting.update');
});
# END DASHBOARD | ADMIN SIDE



# START USER CONTROLLER ROUTE
//
# START USER CONTROLLER ROUTE



# START SETTING CONTROLLER ROUTE
//
# START SETTING CONTROLLER ROUTE



# START ---- CONTROLLER ROUTE
//
# START ---- CONTROLLER ROUTE



# START ---- CONTROLLER ROUTE
//
# START ---- CONTROLLER ROUTE
