<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
    public function index()
    {
        $groups = $this->getAllGroups();

        $this->buildGroup($groups, 0);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function getAllGroups(){
        $groups = Group::orderBy('parent')->get()->toArray();
        return $groups;
    }

    public  function buildGroup($array, $currentParent, $currLevel = 0, $prevLevel = -1){

            foreach ($array as $k => $category) {
                if ($currentParent == $category['parent']) {

                    if ($currLevel > $prevLevel && $currentParent == 0) echo " <ul class='nav nav-stacked sTree'> ";
                    if ($currLevel > $prevLevel && $currentParent != 0) echo " <ul>";

                    if ($currLevel == $prevLevel) echo " </li> ";
                    echo "<li data-id='" . $category['id'] . "' data-parent-id='" . $category['parent'] . "' >
                <div>" . $category['name'] . "

                </div>";

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
