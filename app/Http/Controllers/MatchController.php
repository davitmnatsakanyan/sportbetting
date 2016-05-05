<?php

namespace App\Http\Controllers;

use App\Models\Match;
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

        $matches=DB::select(DB::raw('select M.id, M.date, T1.name as team1, T2.name as team2 from matches as M inner Join teams as T1 on M.team1=T1.id inner join teams as T2 on M.team2=T2.id'));

        return view('admin.matches.index')->with(['matches'=> $matches, 'teams'=>$teams]);
    }

    public  function postStore(Request $request){
        $this->validate($request, [
            'team1' => 'required',
            'team2' => 'required',
            'date' => 'required',
        ]);

        Match::Insert(['team1'=>$request->team1, 'team2'=>$request->team2, 'date'=>$request->date]);
        return redirect('admin/matches');
    }
}
