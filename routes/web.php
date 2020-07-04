<?php

use Illuminate\Support\Facades\Auth;
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

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'namespace' => 'Auth'], function () {

    Route::post('/login', 'LoginController@postAdminLogin')->name('postAdminLogin');
    Route::get('/logout', 'LoginController@getAdminLogout')->name('getAdminLogout');
    Route::get('/login', 'LoginController@showLoginForm')->name('getAdminLogin');
    Route::get('/admin-forgot-password', 'LoginController@getAdminForgotPassword')->name('getAdminForgotPassword');
    Route::post('/forgot-password', 'LoginController@postAdminForgotPassword')->name('postAdminForgotPassword');
    Route::get('/recover-password/verify/{token}', 'LoginController@adminRecoverPassword')->name('adminRecoverPassword');
    Route::post('/update-password', 'LoginController@adminUpdatePassword')->name('adminUpdatePassword');
    Route::get('/change-password', 'LoginController@getChangePassword')->name('getChangePassword');
    Route::post('/change-password', 'LoginController@postChangePassword')->name('postChangePassword');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'AdminCheck'], function () {
    Route::get('/home', 'Home\DashboardController@index')->name('getAdminDashboard');
    Route::get('/admin-profile', 'Home\AdminController@showAdminProfile')->name('showAdminProfile');
    Route::get('/edit-profile', 'Home\AdminController@getAdminProfile')->name('getAdminProfile');
    Route::post('/edit-profile', 'Home\AdminController@postAdminProfile')->name('postAdminProfile');

/*****************************User************************************************** */
Route::get('/user-list', 'User\userController@index')->name('getUserList');
Route::get('/user-edit/{id}', 'User\userController@edit')->name('getUserEdit');
Route::get('/user-delete/{id}', 'User\userController@delete')->name('getUserDelete');

Route::resource('roles','User\userPermissionController');

});