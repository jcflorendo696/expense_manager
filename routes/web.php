<?php

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


Auth::routes();

Route::get('/', 'HomeController@index');


Route::get('/accounts', 'AccountsController@index')->middleware('auth');

Route::get('/myaccount', 'AccountsController@myaccount')->middleware('auth');

Route::get('/create_user', 'AccountsController@viewcreateaccount')->middleware('auth');

Route::post('/create_user', 'AccountsController@createaccount');