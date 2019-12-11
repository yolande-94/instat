<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/', 'ImportCsvController@index');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/importfile', function () {
    return view('/admin.import.importfile');
});

Route::get('/interface', 'ImportCsvController@index');

Route::post('/interface', 'ImportCsvController@import')->name('import');
Route::get('/findan','ImportCsvController@findan');

Route::resource('enquete','AdminController');

Route::get('/visualisation','VisualisationController@index');
Route::get('/json-indicators','VisualisationController@indicators');
Route::get('/findyear','VisualisationController@findyear');
Route::get('/triertable','VisualisationController@triertable');






/*

 if (request()->ajax()) {
                if($request->indicators){
                       $data = DB::table('resultregions')
                         ->join('regions','regions.id','=','result_regions.id_region')
                            ->join('indicators','indicators.id','=','result_regions.id_indicator')
                            
                            ->select('regions.name','result_regions.value','resultregions.title')
                            ->where('resultregions.title','=',$request->indicators);
                }
                else{
                        $data = DB::table('resultregions')
                                ->join('regions','regions.id','=','result_regions.id_region')
                                ->join('indicators','indicators.id','=','result_regions.id_indicator')
                                ->select('regions.name','result_regions.value','resultregions.title');
                }
                return datatables()->of($data)->make(true);
            }



$(document).ready(function(){
        fecth_data();
        function fecth_data(indicators = '')
        {
              $('#tb1').DataTable({
                processing:true,
                ServerSide:true,
                ajax:{

                      url: {!!URL::to('visualisation')!!}
                      data:{indicators:indicators}

                },

                columns:[
                {
                         data: name
                         name: name

                },
                {
                         data: value
                         name: value

                }
                ]
              });
        }
        $('#indicators').change(function(){

            var id_indi = $('#indicators').val();
                $('#tb1').DataTable().destroy();
                fecth_data(id_indi);

        });
      });
*/





