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

Route::get('/', function () {
dd('Hello');

});

Route::resource('bosses.users.leaves', 'LeaveController')->except('index');
Route::resource('bosses.leaves', 'LeaveController')->only('index');// first route
