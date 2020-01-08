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

Route::resource('bosses.users.leaves', 'LeaveController')->only('show');// second route
Route::resource('bosses.leaves', 'LeaveController')->only('index');// first route
Route::resource('users.leaves', 'LeaveController')->only('create','store');// third route

