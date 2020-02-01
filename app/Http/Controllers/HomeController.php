<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use DataTatables;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survs = Survey::orderBy('name')->get();
        return view('crud.crudsurvey',compact('survs'))->with('i');
    }
}
