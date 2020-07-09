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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home','Adminarea\HomeController@AdminareaIndex')->name('admin-view');



Route::get('/admin/addPort','Adminarea\PortfolioController@PortIndex')->name('admin-add');

Route::get('/admin/showPort','Adminarea\PortfolioController@PortShow')->name('admin-show');

Route::post('/admin/storePort','Adminarea\PortfolioController@PortStore')->name('admin-store');

Route::get('/admin/editPort/{id}','Adminarea\PortfolioController@PortEdit')->name('admin-edit');

Route::put('/admin/updatePort/{id}','Adminarea\PortfolioController@PortUpdate')->name('admin-update');

Route::delete('/admin/deletePort/{id}','Adminarea\PortfolioController@PortDelete')->name('admin-delete');


Route::get('/admin/changePortStatus','Adminarea\PortfolioController@changePortStatus')->name('admin-changePortStatus');



Route::get('/', 'HomepageController@prohome');
