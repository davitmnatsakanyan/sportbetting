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
use App\Models\Match;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('layouts.login');
});
Route::get('/welcome', function () {
    return view('layouts.welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/mybets', function () {
    return view('mybets');
});
/*
 * User Authentication
 */
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

/*
 * admin part
 */
Route::get('admin/dashboard', 'AdminController@getIndex');

/*
 * matches part
 */
Route::controller('admin/matches', 'MatchController');


/*
 * team part
 */
Route::controller('admin/teams', 'TeamController');

/*
 * Bet part
 */
Route::controller('bets', 'BetController');

/*
 * Results part
 */
Route::controller('results', 'ResultController');
/*
 * Groups
 */
Route::controller('groups','GroupController');

Route::get('blank', function(){
   return view('blank');
});

Route::get('achievements', function(){
    $results = DB::table('matches as M')
        ->join('points as P', 'M.id', '=', 'P.match_id')
        ->join('bets as B', 'B.match_id', '=', 'M.id')
        ->where('B.user_id', Auth::user()->id)
        ->whereNotNull('M.score1')
        ->whereNotNull('M.score2')
        ->select(
            'M.*',
            'P.team1 as point1',
            'P.team2 as point2',
            'P.draw',
            'B.pick as pick'
        )
        ->get();
    dd($results);

    foreach($results as $result){
       $match = new Match();
       // dd($match->result($result->id));
         //dd($result);
        if($match->pick == $match->result($result->id)){
            // to do
        }
        else{
            echo "filed";
        }
    }

});

Route::any('test', 'TestController@index');


