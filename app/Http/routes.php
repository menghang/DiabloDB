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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('admin', 'AdminController@index');

Route::get('login', 'Auth\AuthController@getLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::get('register', 'Auth\AuthController@getRegister');
Route::get('profile', 'HomeController@profile');

Route::get('character/{$name}', 'CharacterController@view');

Route::post('members', ['as' => 'member.post', 'uses' => 'ApiController@storeMember']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('members', ['as' => 'admin.member.list', 'uses' => 'AdminController@members']);
    Route::get('characters', ['as' => 'admin.character.list', 'uses' => 'AdminController@characters']);
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
