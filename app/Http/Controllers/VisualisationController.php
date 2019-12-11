<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use App\Http\Requests;
use App\Survey;
use App\ResultGlobal;
use App\ResultRegion;
use App\Region;
use App\Indicator;
use DB;

class VisualisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::all();
        
            $survey = DB::table('surveys')->first();
            if($survey) {
            $year=Survey::select('year')->where('id',$survey->id)->first();
                    $indicator = Indicator::where('id_survey','=',$survey->id)->first();
                return view('admin.affichage.visualisation',compact('surveys','resultregions','survey', 'indicator', 'year'));
        }
        else return 'Aucune donnée disponible pour l\'instant.';
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indicators(Request $request)
    {
       $id_surveys = Input::get('id_survey');
       $indicators = Indicator::where('id_survey','=',$id_surveys)->get();
       return response()->json($indicators);
    }



     public function findyear(Request $request)
    {
      $p=Survey::select('year')->where('id',$request->id)->first();
      return response()->json($p);
    }

     

     public function triertable(Request $request)
    {
      if(request()->ajax())
      {
        if($request->id_indicators)
        {
           $data = DB::table('result_regions')
                    ->join('indicators','indicators.id','=','result_regions.id_indicator') 
                    ->join('regions','regions.id','=','result_regions.id_region')
                    ->select('result_regions.value','regions.name')
                    ->where('result_regions.id_indicator',$request->id_indicators);
                            
        }

        else
        {
                $surveys = DB::table('surveys')->first();
                //print_r($surveys);
                if($surveys) {
                    $indicators = Indicator::where('id_survey','=',$surveys->id)->first();
                //print_r($indicators);
               /*$data = DB::table('result_regions')
                    ->join('indicators','indicators.id','=','result_regions.id_indicator') 
                    ->join('regions','regions.id','=','result_regions.id_region')
                    ->select('result_regions.value','regions.name');*/
                    $data = DB::table('result_regions')
                    ->join('indicators','indicators.id','=','result_regions.id_indicator') 
                    ->join('regions','regions.id','=','result_regions.id_region')
                    ->select('result_regions.value','regions.name')
                    ->where('result_regions.id_indicator',$indicators->id);
                }
                else $data = array();
                

        }
            return datatables()->of($data)->make(true);
      }
    }

    

/*$id_indicators = Input::get('id_indicator');
       $result_regions = DB::table('result_regions')
                           ->join('regions','regions.id','=','result_regions.id_region')
                          ->join('indicators','indicators.id','=','result_regions.id_indicator')
                            
                          ->select('regions.name','result_regions.value')
                          ->where('id_indicator','=',$id_indicators)
                          ->get();
       return response()->json($result_regions);*/

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
}
