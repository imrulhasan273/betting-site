<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

# Route::get('/home', 'HomeController@index')->name('home');

# -----------------============= START CLIENT SIDE ROUTES ===========-------------------------

# FRONT PAGES
Route::get('/', 'HomeController@index')->name('home'); //home page
Route::get('/mybet', 'HomeController@mybet')->name('mybet');
Route::get('/oneten', 'HomeController@oneten')->name('oneten');
Route::get('/support', 'HomeController@support')->name('support');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/rules', 'HomeController@rules')->name('rules');
# FRONT PAGES


# PROFILE
route::group(['prefix' => 'wallet'], function () {
    Route::get('/profile', 'ProfileController@index')->name('profiles.profile');
    Route::get('/deposit', 'ProfileController@index')->name('profiles.deposit');
    Route::get('/widthdraw', 'ProfileController@index')->name('profiles.widthdraw');
    Route::get('/b-transfer', 'ProfileController@index')->name('profiles.btransfer');
    Route::get('/change-club', 'ProfileController@index')->name('profiles.changeclub');
    Route::get('/change-password', 'ProfileController@index')->name('profiles.changepassword');
    Route::get('/statement', 'ProfileController@index')->name('profiles.statement');
    Route::get('/sponsor', 'ProfileController@index')->name('profiles.sponsor');
    Route::get('/oneten', 'ProfileController@index')->name('profiles.oneten');
});
# PROFILE


# -----------------============= END CLIENT SIDE ROUTES ===========-------------------------



# START DASHBOARD | ADMIN SIDE
route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'backendController@index')->name('admin.index');

    Route::get('/setting', 'settingsController@index')->name('admin.setting');
    Route::post('/setting/store', 'settingsController@settingStore')->name('admin.setting.store');
    Route::post('/setting/update/{id}', 'settingsController@settingUpdate')->name('admin.setting.update');


    Route::get('/notice', 'noticeController@index')->name('admin.notice');
    Route::post('/notice/store', 'noticeController@settingStore')->name('admin.notice.store');
    Route::post('/notice/update/{id}', 'noticeController@settingUpdate')->name('admin.notice.update');

});

# END DASHBOARD | ADMIN SIDE



# START USER CONTROLLER ROUTE
//
# START USER CONTROLLER ROUTE



# START ---- CONTROLLER ROUTE
//
# START ---- CONTROLLER ROUTE



# START ---- CONTROLLER ROUTE
//
# START ---- CONTROLLER ROUTE
