<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Survey;
use App\ResultGlobal;
use App\ResultRegion;
use App\Region;
use App\Indicator;
use DB;

class AffichageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');// effectuer la vérification de connexion (login)
    }

    public function index()
    {
        

        
            $surveys = Survey::orderBy('name')->get();
        
        
        
            $indicators = Indicator::all();
            $resglobs = ResultGlobal::all();
            $resregs = DB::table('result_regions')->orderBy('id_indicator')->get();
            $regs = Region::all();
            $groups = [
                "region"=>"region",
                "district"=>"district",
                "sexe"=>"sexe"
            ];

            $years = [
            "2018"=>"2018",
            "2019"=>"2019"
            ];

            $data = [
            'surveys' => $surveys,
            'groups'=>$groups,
            'years' =>$years
            ];
            

            
             

            return view('admin.affichage.resultat',compact('indicators','resglobs','regs','indics','resregs'))->with($data);

             

    }


    public function show($id)
    {
        
       
        $resultregions  = DB::table('result_regions')
                            ->join('regions','regions.id','=','result_regions.id_region')
                            
                            ->select('result_regions.id','regions.name','result_regions.value','result_regions.id_indicator','result_regions.year')
                            ->get();

        
        $surveys = DB::table('surveys')->select('id','name')->get();
        /*$years = DB::table('result_regions')->select('year')->get();*/
        $indicators = Indicator::all();
        $indicatorsBySurvey = array();
        foreach ($indicators as $indicator) {
            $indicatorsBySurvey[$indicator->id_survey][$indicator->id] = $indicator->title;

            /*dump($indicatorsBySurvey);*/
        }
        
        
        $yearByIndicator = array();
        foreach ($resultregions as $resultregion) {
            $yearByIndicator[$resultregion->id_indicator][$resultregion->id] = $resultregion->value;

            /*dump($indicatorsBySurvey);*/
        }
        /*$indicators = Indicator::findorFail($id);*/

        return view('admin.affichage.visualisation',compact('indicators','visuals','indicas','surveys','years','indicatorsBySurvey','yearByIndicator'))->with('i');

    }
}