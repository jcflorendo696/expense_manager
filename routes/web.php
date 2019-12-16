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

/* Homepage */
Route::get('/', 'HomeController@index');


/* Admin Dashboard */
Route::get('/accounts', 'AccountsController@index')->middleware('auth');
Route::get('/create_user', 'AccountsController@viewcreateaccount')->middleware('auth');
Route::post('/create_user','AccountsController@createaccount')->middleware('auth');;
Route::post('/accounts','AccountsController@deleteaccount')->middleware('auth');

/* Member Dashboard */
Route::get('/myaccount', 'AccountsController@myaccount')->middleware('auth');
Route::post('/myaccount', 'AccountsController@changePassword')->middleware('auth'); //change password on same page.