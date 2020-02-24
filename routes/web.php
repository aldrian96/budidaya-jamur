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
});
Route::get('/about', function () {
    return view('about');
});

// Login
Auth::routes();

// Home
Route::get('/home', 'HomeController@index')->name('home');

// Trash
Route::get('/members/trash', 'MembersController@trash');
Route::get('/members/restore/{id}', 'MembersController@restore');
Route::get('/members/restore_all', 'MembersController@restore_all');
Route::get('/members/delete/{id}', 'MembersController@delete');
Route::get('/members/delete_all', 'MembersController@delete_all');

// Export Excel
Route::get('/members/export_excel', 'MembersController@export_excel');

// Member
Route::post('pencarian', 'MembersController@cari')->name('members/pencarian');
Route::resource('/members', 'MembersController');

// Debit
Route::resource('/debits', 'DebitsController');

// Bank
Route::resource('/banks', 'BanksController');



