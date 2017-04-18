<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
get('/','PostsController@index')->name('index');
resource('discussions','PostsController');
resource('comment','CommentsController');

get('/users/register','UsersController@register');
post('/users/register','UsersController@store');
get('/users/avatar','UsersController@avatar');
post('/avatar','UsersController@changeAvatar');
get('/login','SessionsController@create')->name('login');
post('/login','SessionsController@store');
post('/crop/api','UsersController@cropAvatar');
get('/logout','SessionsController@destroy')->name('logout');
