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
Route::group(array('before' => 'auth'), function()
{
    Route::get('admin', array('as' => 'admin', 'uses' => 'AdminController@index'));
    Route::get('admin/new', array('as' => 'new_project', 'uses' => 'AdminController@newProject'));
    Route::post('admin/new', array('as' => 'post_project', 'uses' => 'AdminController@postProject'));
    Route::get('admin/edit/{id}', array('as' => 'edit_project', 'uses' => 'AdminController@editProject'));
    Route::put('admin/edit/{id}', array('as' => 'post_edit_project', 'uses' => 'AdminController@postEditProject'));
    Route::put('admin/edit/{id}/logo', array('as' => 'edit_logo', 'uses' => 'AdminController@postEditLogo'));
    Route::delete('admin/delete/{id}', array('as' => 'delete_project', 'uses' => 'AdminController@deleteProject'));
    Route::get('admin/list', array('as' => 'admin_search', 'uses' => 'AdminController@search'));
    
    // form-logout
    Route::get('logout', array('as' => 'logout', 'uses' => 'AdminController@logout'));
});

Route::get('/', array('as' => 'index', 'uses' => 'AnarchyController@index'));

// form-login.
Route::get('login', array('as' => 'login', 'uses' => 'AdminController@showLogin'));

// validate form-login
Route::post('login', array('as' => 'post_login', 'uses' => 'AdminController@postLogin'));

// search
Route::get('list', array('as' => 'search', 'uses' => 'AnarchyController@search'));

// search
Route::get('/{id}', array('as' => 'viewProject', 'uses' => 'AnarchyController@viewProject'));

// AUTHENTICATION REQUIRED
