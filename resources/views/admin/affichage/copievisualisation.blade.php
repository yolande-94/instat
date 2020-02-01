<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>visualisation</title>
    
    <!-- Bootstrap Core CSS -->
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
         #tb1{
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
    <!--<script src="jquery-3.4.1.js"></script>-->
    <div id="soft-all-wrapper">
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>-->

        <!-- Navigation --> 
        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0" id="nav">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                       
                <a class="navbar-brand" href="{{route('affichage.index')}}">Administrateur</a>
            </div>

              <ul class="nav navbar-top-links navbar-right">
                
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Profil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Parametres</a>
                        </li>
                        <li class="divider"></li>

                        
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i> Deconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

            
        </nav>



        <div id="page-wrapper">
          
             
             <form action="">
                 <div class="row">
                     
                     <div class="col-sm-4">

                         <div class="form-group">
                             <select id="survey" class="form-control">
                                 
                                 <?php foreach ($surveys as $survey): ?>
                                 <option value="<?= $survey->id; ?>"><?= $survey->name; ?></option>
                                 <?php endforeach ?>

                             </select>
                         </div>
                         <div class="form-group">
                             
                                 <?php foreach ($indicatorsBySurvey as $id_survey => $indicators): ?>
                                 <select id="survey-<?= $id_survey; ?>" class="form-control">
                                 <?php foreach ($indicators as $id => $title): ?>
                                 
                                  <option value="<?= $id; ?>"><?= $title; ?></option>
                                  
                                 <?php endforeach ?>
                                 </select>
                                 <?php endforeach ?>

                             
                         </div>
                         <!--<div class="form-group">
                             <select id="year" class="form-control">
                                 <option value="0">Selectionnez year</option>
                             </select>
                         </div>-->
                         
                     </div>

                 </div>
             </form>
           



                <div class="col-lg-8">
                    
                    
                    <!-- /.panel -->
                    
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body" >
                            <div class="row">
                                
                                    <div class="table-responsive">
                                        <table class="table table-bordered  table-striped" id="tb1">
                                        
                                                <tr>
                                                    
                                                    <th width="200px">Nom Region</th>
                                                    <th width="100px">Valeur</th>
                                                    
                                                </tr>
                                            
                                                 <?php foreach ($yearByIndicator as $id_indicator => $resultregions): ?>
                                                 <?php foreach ($resultregions as $id => $value): ?>
                                                <tr>
                                                    
                                                    <td></td>
                                                    <td>{{$value}}</td>
                                                    
                                                    
                                                </tr>
                                                <?php endforeach ?>
                                                <?php endforeach ?>
                                               
                                            
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

<script src="jquery-3.4.1.js"></script>
<script>
    (function($){

        $('#survey').change(function(event){

            var value = $this.val();
            alert(value);
        })

        });
</script>


</body>


</html>
