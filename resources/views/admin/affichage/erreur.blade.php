<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>visualisation</title>
    
   <style type="text/css">
     #erreur{
        position: absolute;
        width: 100%;
        top: 40%;

      }
      .navbar-brand{
        color: red;

      }
   </style>
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
    
    
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>-->

    <!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/dist/css/style.css')}}">
    
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    

    <!-- Morris Charts CSS -->
    <link href="{{ asset('admin')}}/vendor/morrisjs/morris.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="{{ asset('admin')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
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

                       
                <a class="navbar-brand" href=""><mark>Resultat enquete par region</mark> </a>
            </div>

              <ul class="nav navbar-top-links navbar-right">
                
                
            </ul>

            
        </nav>



        <div id="page-wrapper">

          <h1 id="erreur" align="center"> Aucune donnée disponible pour l'instant </h1>


        </div>
         

           



                
            
  
       

    
    @include('admin.include.stylfoot')






</body>


</html>