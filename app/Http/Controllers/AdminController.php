<?php

namespace App\Http\Controllers;
use App\Survey;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $surveys = Survey::orderBy('name')->get();

        return view('crud.crud',compact('surveys'))->with('i');

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   

        $data = request()->validate([
              
              'name' => 'required|min:3',
              'year' => 'required'

        ]);
        
        
        Survey::create($data);


        return redirect()->route('enquete.index')->with('success', 'succeful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $survey = Survey::findorFail($id);
        return view('crud.show',compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = Survey::findorFail($id);
        return view('crud.edit',compact('survey'));
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
        $request->validate([
              
              'name' => 'required|min:3', 
              'year' => 'required'

        ]);

        Survey::findOrFail($id)->update($request->all());
        return redirect()->route('enquete.index')->with('success', 'update  succefully');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Survey::findOrFail($id)->delete();
        return redirect()->route('enquete.index')->with('success', 'delete  succefully');
    }
}