<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>visualisation</title>

    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
    
    
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>-->

    <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min<!--.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">
    
    
    <!-- Bootstrap Core CSS --
    <link href="{{ asset('admin')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    

    <!-- Morris Charts CSS -->
    <link href="{{ asset('admin')}}/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('admin')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
         #InnerDiv{
            overflow-y: scroll;
            height: 690px;
         }
         #value_indicator{
            float: left;
            width: 400px;
            margin-left: 0px;
            border: none;
         }
         #tb2{
            
            margin-left: 50px;
         }
         #panel1 {
             margin-left:5px;
              width: 400px;
               }
        #panel {
                      margin-left: 20px;
                      min-height: 620px;
                      background-color: white;
                      width: 50%;
        }
        #page-wrapper{
              
              background-color: white;
             
                    }
        #nav{
              
              background-color: #005a57;
             
        }


    </style>

    </head>

    <body>
    
    <div id="soft-all-wrapper">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

        <!-- Navigation --> 
        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0" id="nav">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                       
                <a class="navbar-brand" href="">Administrateur</a>
            </div>

              <ul class="nav navbar-top-links navbar-right">
                
                
            </ul>

            
        </nav>



        <div id="page-wrapper">
         <center>
              <span>Enquete</span>
              <select style="width: 200px;" class="surveyname" name="survey"  id="survey">
                <option value="0" disabled="true"> selectionner un enquete</option>
                       @foreach( $surveys as $key => $value) 
                       @if($value->id == $survey->id)          
                  <option value="{{$value->id}}" selected>{{$value->name}}</option>
                      @else
                      <option value="{{$value->id}}">{{$value->name}}</option>
                      @endif
                      @endforeach
              </select>

              <span>Anneé</span>
              <input type="text" name="year" class="year" id="year" value="{{$year->year}}">
 
              

              <span>Indicateurs</span>
              <select style="width: 200px;" id="indicators" name="indicators">

                  <option value="0" disabled="true">selectionner un indicateurs</option>
                  <option value="{{$indicator->id}}" selected>{{$indicator->title}}</option>
              </select>
              

              


          </center>

           



                <div class="col-lg-6">
                    
                    
                    <!-- /.panel -->
                   
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body" >
                          <h4><strong>Resulat enquete par region</strong></h4></br>
                            <div class="row">
                                
                                    <div class="table-responsive">
                                        <table class="table table-bordered  table-striped" id="value_indicator">
                                         <thead>
                                           
                                             <tr>
                                                    
                                                    <th width="10px">Nom Region</th>
                                                    <th width="10px">Valeur</th>
                                                    
                                                </tr>

                                         </thead>
                                                
                                            
                                                 
                                               
                                               
                                               
                                            
                                        </table>
                                        
                                    </div>
                                    <!-- /.table-responsive -->
                                
                                
                     </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        
                        <!-- /.panel-body -->
                    </div>
            
        </div>
                <!-- /.col-lg-8 -->
                

        </div>
       

    
    @include('admin.include.stylfoot')


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function() {
      $('#survey').on('change',function(e) {
        //console.log(e);

        var id_survey = e.target.value;

        $.get('/json-indicators?id_survey=' + id_survey,function(data){
                  console.log(data); 

        $('#indicators').empty();
        $('#indicators').append('<option value="0" disabled="true" selected="true">selectionner un indicateurs</option>');

        $.each(data, function(index, indicatorsObj){
        $('#indicators').append('<option value="' + indicatorsObj.id +'">'+ indicatorsObj.title +'</option>');

        })
            });
      });

      $(document).on('change','.surveyname',function(){

        //console.log("its change");
        var id_enquete = $(this).val();
        var a = $(this).parent();
        //console.log(id_enquete);
        var op="";
        $.ajax({
            type:'get',
            url:'{!!URL::to('findyear')!!}',
            data:{'id':id_enquete},
            dataType:'json',
            success:function(data){
              //console.log("year");
              //console.log(data.year);
              a.find('.year').val(data.year);
              //console.log(data.length);
            },
            //error:function(){}

        })


      });

      //$("#year").val(new Date().getFullYear());
      //console.log(new Date().getFullYear());

      
      fecth_data();
        
    
    $('#indicators').change(function(){

      var id = $('#indicators').val();
      $('#value_indicator').DataTable().destroy();
      
      console.log(id);
      fecth_data(id);

    })
});
     
function fecth_data(id_indicators ='')
        {
          $('#value_indicator').DataTable({
            //processing: true,
           // serverSide: true,
           'language': 
            {
              "sEmptyTable":     "Aucune donnée disponible dans le tableau",
              "sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
              "sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
              "sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
              "sInfoPostFix":    "",
              "sInfoThousands":  ",",
              "sLengthMenu":     "Afficher _MENU_ éléments",
              "sLoadingRecords": "Chargement...",
              "sProcessing":     "Traitement...",
              "sSearch":         "Rechercher :",
              "sZeroRecords":    "Aucun élément correspondant trouvé",
              "oPaginate": {
                  "sFirst":    "Premier",
                  "sLast":     "Dernier",
                  "sNext":     "Suivant",
                  "sPrevious": "Précédent"
              },
              "oAria": {
                  "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                  "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
              },
              "select": {
                      "rows": {
                          "_": "%d lignes sélectionnées",
                          "0": "Aucune ligne sélectionnée",
                          "1": "1 ligne sélectionnée"
                      } 
              }
},
            ajax:{
              url:'{!!URL::to('triertable')!!}',
              data:{id_indicators:id_indicators}
            },

            columns:[
                   
                   {
                      data:'name',
                      name:'name'

                   },
                   {
                      data:'value',
                      name:'value'

                   }
            ]

          });
        }
</script>



</body>


</html>
                    

                   