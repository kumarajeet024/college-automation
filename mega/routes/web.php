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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth','guest');

Route::get('/admin',function(){
    return view('admin');
})->middleware('auth','role:admin');

Route::get('/hod',function(){
    return view('hod');
})->middleware('auth','role:Hod');

Route::get('/faculty',function(){
    return view('faculty');
})->middleware('auth','role:faculty');

Route::get('/student',function(){
    return view('student');
})->middleware('auth','role:student');

Route::get('/mistake',function(){
    return view('mistaken');
})->name('mistake');