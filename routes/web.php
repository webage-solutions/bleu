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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// accounts
Route::get('accounts', 'AccountController@index')
    ->name('accounts.index')
    ->middleware('auth');
Route::get('accounts/create', 'AccountController@create')
    ->name('accounts.create')
    ->middleware('auth');
Route::post('accounts', 'AccountController@store')
    ->name('accounts.store')
    ->middleware('auth');

// entries / Revenues and Expenses
Route::get('entries', 'EntryController@index')
    ->name('entries.index')
    ->middleware('auth');
Route::get('entries/create/{type}', 'EntryController@create')
    ->name('entries.create')
    ->middleware('auth');
Route::post('entries/{type}', 'EntryController@store')
    ->name('entries.store')
    ->middleware('auth');

// transactions / Transfers and Payments
Route::get('transactions', 'TransactionController@index')
    ->name('transactions.index')
    ->middleware('auth');
Route::get('transactions/create', 'TransactionController@create')
    ->name('transactions.create')
    ->middleware('auth');
Route::post('transactions', 'TransactionController@store')
    ->name('transactions.store')
    ->middleware('auth');

Route::get('tags', 'TagController@index')
    ->name('tags.index')
    ->middleware('auth');