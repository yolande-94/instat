<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use DataTatables;
use Carbon\Carbon;
class CrudSurveyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');// effectuer la vérification de connexion (login)
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $survs = Survey::orderBy('name')->get();
        return view('crud.crudsurvey',compact('survs'))->with('i');
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

        $this->validate($request, [
         

           'name' => 'required',
           'alias_survey'=> 'required',
           'year' =>'min:4|max:4',

        ]);


        //arnauld

        
        

        

          
                     $survs = new Survey;
                     $survs->name = $request->input('name');
                     $survs->alias_survey = $request->input('alias_survey');
                     $survs->year = $request->input('year');

                     $survs->save();

                     if( $survs)
                    {
                        return redirect('/enquete')->with('success', 'donnée sauvegardé');
                    }
                    
                    else{
                         
                         return redirect('/enquete')->with('success', 'donnée sauvegardé');

                    }
                     

                     



              


        

           
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
        

         $this->validate($request, [
         

           'name' => 'required',
           'alias_survey'=> 'required',
           'year' =>'required',

        ]);

         $survs = Survey::find($id);
         $survs->name = $request->input('name');
         $survs->alias_survey = $request->input('alias_survey');
         $survs->year = $request->input('year');

         $survs->save();

        

         return redirect('/enquete')->with('success', 'modification avec succès');

         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survs = Survey::find($id);
        $survs->delete();
         return redirect('/enquete')->with('success', 'suppression avec succès');
    } 
}
