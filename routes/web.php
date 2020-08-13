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
Route::get('/support', 'HomeController@support')->name('support');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/rules', 'HomeController@rules')->name('rules');
# FRONT PAGES


# PROFILE
route::group(['prefix' => 'wallet'], function () {
    Route::get('/profile', 'ProfileController@profile')->name('profiles.profile');
    Route::get('/deposit', 'ProfileController@deposit')->name('profiles.deposit');
    Route::get('/widthdraw', 'ProfileController@widthdraw')->name('profiles.widthdraw');
    Route::get('/b-transfer', 'ProfileController@bTransfer')->name('profiles.btransfer');
    Route::get('/change-club', 'ProfileController@changeClub')->name('profiles.changeclub');
    Route::get('/change-password', 'ProfileController@changePassword')->name('profiles.changepassword');
    Route::get('/statement', 'ProfileController@statement')->name('profiles.statement');
    Route::get('/sponsor', 'ProfileController@sponsor')->name('profiles.sponsor');
    Route::get('/oneten', 'ProfileController@oneten')->name('profiles.oneten')->middleware('auth');
});
# PROFILE


# -----------------============= END CLIENT SIDE ROUTES ===========-------------------------



# START DASHBOARD | ADMIN SIDE
route::group(['prefix' => 'admin'], function () {

    # START BACKEND CONTROLLER ---- ALL THE INDEX PAGES OF ALL CONTROLLERS ARE CONTROLLED HERE.
    Route::get('/', 'backendController@index')->name('admin.index');
    Route::get('/setting', 'backendController@settings')->name('admin.setting');
    Route::get('/notice', 'backendController@notices')->name('admin.notice');
    Route::get('/users', 'backendController@users')->name('admin.users');
    # END BACKEND CONTROLLER

    #===================================================================================================

    #-- START USER CONTROLLERS
    Route::get('/users/add', 'UserController@add')->name('users.add');  //admin
    Route::post('/users/store', 'UserController@store')->name('users.store');  //admin
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');  //admin
    Route::post('/users/update', 'UserController@update')->name('users.update');  //admin
    Route::get('/users/{user}/destroy', 'UserController@destroy')->name('users.destroy');  //admin
    # --END USER CONTROLLERS


    #-- START SETTINGS CONTROLLER
    Route::post('/setting/store', 'settingsController@settingStore')->name('admin.setting.store');
    Route::post('/setting/update/{id}', 'settingsController@settingUpdate')->name('admin.setting.update');
    #-- END SETTINGS CONTROLLER


    #-- NOTICE CONTROLLER
    Route::post('/notice/store', 'noticeController@noticeStore')->name('admin.notice.store');
    Route::post('/notice/update/{id}', 'noticeController@noticeUpdate')->name('admin.notice.update');
    #-- END CONTROLLER

});
