<?php

namespace App\Http\Controllers;



use App\Models\Match;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public  function getIndex(){
        return view('admin.index');
    }

    public function getMatches(){
        $matches = Match::all();
        return view('admin.matches.index')->with(['matches'=> $matches]);
    }

    public  function postMatches(Request $request){
        $this->validate($request, [
            'team1' => 'required',
            'team2' => 'required',
            'date' => 'required',
        ]);

        Match::Insert(['team1'=>$request->team1, 'team2'=>$request->team2, 'date'=>$request->date]);
        return redirect('admin/matches');
    }
}
