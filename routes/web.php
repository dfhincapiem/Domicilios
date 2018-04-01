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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');
//Route::get('/', 'HomeController@index')->name('home');
 Route::resource('home', 'HomeController')->names([
    'update' => 'home.update',
    'index' => 'home.index',
    'destroy' => 'home.destroy'
]);

Route::resource('edit', 'EditController')->only([
         'index', 'update'
     ])->names([

    'index' => 'edit.index',
    'update' => 'edit.update'
]);
// Route::resource('', 'HomeController');
//  Route::get('/{}', 'HomeController@update');
 //Route::post('/', 'HomeController@update')->name('home.update');
//  Route::resource('', 'HomeController')->only([
//      'index', 'update'
//  ]);