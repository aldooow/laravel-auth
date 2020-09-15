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

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->middleware('auth')->name('home'),
// Questa versione e valida come quella dentro HomeController.php.

//Route group admin
Route::prefix('admin') // sara il prefisso nel URL.
  ->namespace('Admin') // é la cartella che contiene i miei controllers.
  ->middleware('auth') // Solo Utenti AUTORIZZATI.
  ->group(function(){
    Route::resource('posts', 'PostController');
  });
