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
}
