<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Match;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class BetController extends Controller
{
   public  function __construct(){
       $this->middleware('auth');
   }

    public  function getIndex(){
       $matches = DB::table('matches as M')
           ->leftJoin('bets as B', function($join){
                $join->on('M.id', '=', 'B.match_id')->where('B.user_id', '=', Auth::user()->id);
           } )
           ->join('teams as T1', 'T1.id', '=', 'M.team1')
           ->join('teams as T2', 'T2.id', '=', 'M.team2')
           ->join('points as P', 'M.id', '=', 'P.match_id')
           ->select(
               'P.team1 as point1',
               'P.team2 as point2',
               'P.draw as draw',
               'M.id',
               'M.date',
               'T1.name as team1',
               'T2.name as team2',
               'T1.id as team1_id',
               'T2.id as team2_id',
               'B.user_id as user_id',
               'B.pick as pick'
           )
           ->get();

        return view('bets.my_bets')->with(['matches' => $matches]);
    }

    public  function getBet($match_id){
        if(count(Bet::where('user_id', Auth::user()->id)->where('match_id', $match_id)->get()->toArray()) == 0) {
            $matches = DB::table('matches as M')
                ->leftJoin('bets as B', function ($join) {
                    $join->on('M.id', '=', 'B.match_id')->where('B.user_id', '=', Auth::user()->id);
                })
                ->join('teams as T1', 'T1.id', '=', 'M.team1')
                ->join('teams as T2', 'T2.id', '=', 'M.team2')
                ->join('points as P', 'M.id', '=', 'P.match_id')
                ->where('M.id', $match_id)
                ->select(
                    'P.team1 as point1',
                    'P.team2 as point2',
                    'P.draw as draw',
                    'M.id',
                    'M.date',
                    'T1.name as team1',
                    'T2.name as team2',
                    'T1.id as team1_id',
                    'T2.id as team2_id',
                    'B.user_id as user_id',
                    'B.pick as pick'
                )
                ->get();

            return view('bets.bet')->with(['matches' => $matches]);
        }
        else{
            return redirect()->back();
        }
    }

    public  function postBet(Request $request){
        Bet::Insert(['user_id' => Auth::user()->id, 'match_id' => $request['match_id'], 'pick' => $request['pick']]);
        return redirect('bets');
    }
}
