<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('template/{nombre}', function($nombre){
   $nombre = str_replace('-', ' ', $nombre);
   return View::make('template')->with('nombre', $nombre); 
});

Route::resource('admin', 'AdminController');