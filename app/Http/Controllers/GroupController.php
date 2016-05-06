<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\UsersGroups;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class GroupController extends Controller
{

    public  function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $groups = $this->getMyGroups();
       // return view('groups.index')->with(['groups'=>$groups]);
        echo '<a class="btn btn-warning" href="'.url('groups/create').'"> Create new group </a><a class="btn btn-warning" href="#" style="margin-left: 50px"> Join more groups </a>';

        $this->buildGroup($groups, 0);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('groups.creategroup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
       if(!isset($request->type)){
           $request->type = 0;
       }
        $group_id = DB::table('groups')
            ->InsertGetId([
            'parent'=>0,
            'name'=>$request->name,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id,
            'is_private'=>$request->type,
            'avatar'=>'sdsds'
        ]);

        $users_groups = new UsersGroups();
        $users_groups->AddToGroup(Auth::user()->id, $group_id);
        return redirect('groups');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $group = DB::table('groups')
        ->join('users', 'groups.user_id', '=', 'users.id')
        ->where('groups.id', $id)
        ->select(
        'groups.*',
        'users.name as creator'
        )
        ->get();

        $members = DB::table('users as U')
            ->join('users_groups as UG', 'U.id', '=', 'UG.user_id')
            ->where('UG.group_id', $id)
            ->select(
                'U.name as name'
            )
            ->get();
        return view('groups.profile')->with(['group'=>$group, 'members'=>$members]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $creator = Group::find($id)->user_id;
        if($creator == Auth::user()->id){
            // go to edit page
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getMyGroups(){
        $groups = Group::where('user_id', Auth::user()->id)->orderBy('parent')->get()->toArray();
        return $groups;
    }

    public  function buildGroup($array, $currentParent, $currLevel = 0, $prevLevel = -1){

            foreach ($array as $k => $category) {
                if ($currentParent == $category['parent']) {
                    if ($currLevel > $prevLevel && $currentParent == 0) echo " <ul class='nav nav-stacked sTree'> ";
                    if ($currLevel > $prevLevel && $currentParent != 0) echo " <ul>";

                    if ($currLevel == $prevLevel) echo " </li> ";
                    echo "<a href='".url('groups/show/'.$category['id'])."'><li data-id='" . $category['id'] . "' data-parent-id='" . $category['parent'] . "' >
                <div>" . $category['name'] . "

                </div></li></a>";

                    if ($currLevel > $prevLevel) {
                        $prevLevel = $currLevel;
                    }

                    $currLevel++;

                    $this->buildGroup($array, $category['id'], $currLevel, $prevLevel);

                    $currLevel--;
                }

            }


        }
}
