<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ResultController extends Controller
{
    public  function __construct(){
        $this->middleware('auth');
    }

    public  function getResults(){
        $matches = DB::table('matches as M')
            ->join('teams as T1', 'T1.id', '=', 'M.team1')
            ->join('teams as T2', 'T2.id', '=', 'M.team2')
            ->select(
                'M.id as match_id',
                'M.score1 as score1',
                'M.score2 as score2',
                'T1.name as team1',
                'T2.name as team2',
                'T1.short_name as team1_short_name',
                'T2.short_name as team2_short_name',


                'M.date'
            )->get();

        return view('results.index')->with(['matches'=>$matches]);
    }
}
