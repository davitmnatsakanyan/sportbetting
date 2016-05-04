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

use App\Group;

Route::get('/', function () {
    return view('home');
});

/*
 * User Authentication
 */
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

/*
 * Admin part
 */
Route::get('admin/dashboard', 'AdminController@getIndex');
Route::get('admin/matches', 'AdminController@getMatches');
Route::post('admin/matches', 'AdminController@postMatches');

/*
 * team part
 */
Route::resource('admin/team', 'TeamController');
/*
 * Groups
 */
Route::resource('groups','GroupController');


