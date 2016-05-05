<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Point;
use App\Models\Team;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MatchController extends Controller
{
    public  function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function getIndex(){
        $teams = Team::all();

        $matches = DB::table('matches as M')
            ->join('teams as T1', 'M.team1', '=', 'T1.id')
            ->join('teams as T2', 'M.team2', '=', 'T2.id')
            ->join('points as P', 'M.id', '=', 'P.match_id')
            ->select(
                'P.team1 as point1',
                'P.team2 as point2',
                'P.draw as draw',
                'M.result',
                'M.id',
                'M.date',
                'T1.name as team1',
                'T2.name as team2',
                'T1.id as team1_id',
                'T2.id as team2_id'
            )
            ->get();
        foreach($matches as $match){
            if(!is_null($match->result) && $match->result == 0){
                $match->result = 'Draw';
                $match->result_id = 0;
            }
            elseif(!is_null($match->result)){
                $result = Team::where('id', $match->result)->get()->toArray();
                $match->result =  $result[0]['name'];
                $match->result_id =  $result[0]['id'];
            }
        }
        return view('admin.matches.index')->with(['matches'=> $matches, 'teams'=>$teams]);
    }

    public  function postStore(Request $request){

        $this->validate($request, [
            'team1' => 'required',
            'team2' => 'required',
            'date' => 'required',
        ]);

        $match_id = Match::insertGetId(['team1'=>$request->team1, 'team2'=>$request->team2, 'date'=>$request->date]);
        Point::insert(['match_id'=>$match_id, 'team1'=>$request->point1, 'team2'=>$request->point2, 'draw'=>$request->draw]);
        return redirect('admin/matches');
    }

    public  function postUpdate(Request $request){
        if($request->result == '')
            $request->result = null;

         Match::where('id', $request->match_id)->update(['team1'=>$request->team1, 'team2'=>$request->team2, 'date'=>$request->date, 'result'=>$request->result]);
         Point::where('match_id', $request->match_id)->update(['team1'=>$request->point1, 'team2'=>$request->point2, 'draw'=>$request->draw]);
        return redirect('admin/matches');
    }

    public  function postResult(Request $request){
        Match::where('id', $request->match_id)->update(['result'=>$request->result]);
        return redirect('admin/matches');
    }
}
