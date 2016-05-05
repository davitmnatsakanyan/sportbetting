<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public  function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $teams = Team::all();
        return view('admin.teams.index')->with(['teams' => $teams]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(Request $request)
    {
        Team::Insert(['name' => $request->name, 'short_name' => $request->short_name]);
        return redirect('admin/teams');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request)
    {
        Team::where('id', $request->id)->update(['name'=>$request->name, 'short_name'=>$request->short_name]);
        return redirect('admin/teams');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function postDelete(Request $request)
    {
        Team::where('id', $request->id)->delete();
        return redirect('admin/teams');
    }
}
