<!DOCTYPE html>
<html lang="fr">
<html>
<head>
	<meta charset="utf-8">
	<title>Institut National de la Statistique</title>
   
    
    

    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    

    <!-- Morris Charts CSS -->
    <link href="{{ asset('admin')}}/vendor/morrisjs/morris.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="{{ asset('admin')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!- Bootstrap Core CSS -->
    <link href="{{ asset('admin')}}/vendor/bootstrap/css/bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin')}}/vendor/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin')}}/vendor/datatables/css/dataTables.bootstrap4.min.css">
    <style type="text/css">
    	#mapsvg:hover {
   fill: blue;
 }


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

         .image{
                        
			     text-align: left;
			     right: : 10px;
			     height:50px;
			     width: 80px;
			     top: 0px;
			    }

		.navbar-brand
		  {
		      color: white;
		      position: absolute;
		      left: 100px;
 
          }
          
        #panel{
                   margin-left: 20px;
                   min-height: 620px;
                   background-color: white;
                   width: 50%;
        	  }
        #page-wrapper{
              
              background-color: gray;
             
                    }
        #nav{
              
              background-color: #005a57;
             
        }
    </style>


</head>
<body>
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">-->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0" id="nav">
			<div class="navbar-header">
                                          
               <img src="{{asset('admin/image/instat.png')}}" class="image">
               <a class="navbar-brand" style="color: white;">Institut National de la Statistique</a> 
            </div>
            <ul class="nav navbar-top-links">
            <li><a href="{{ route('visualize') }}">Visualisation</a></li>
            </ul>
            <ul class="nav navbar-top-links navbar-right">
                
                
                <li class="dropdown">
                     <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" style="color: white;"><i class="fa fa-sign-out fa-fw" style="white"></i> Deconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                        </li>
                   
                </li>
                <!-- /.dropdown -->
            </ul>
            

             
    </nav>
    <br>

	<!-- Debut crud Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">creation de nouveau enquete</h5>

		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div><br>
		      <form action="{{action('CrudSurveyController@store')}}" method="POST">

					{{csrf_field()}}
				
				        
				<div class="modal-body">
				  <div class="form-group">
				    <label >Nom Enquete:</label>
				    <input type="text" name="name" class="form-control"  placeholder="entrer un enquete...">
				    
				  </div>

				  <div class="form-group">
				    <label >Alias Enquete:</label>
				    <input type="text" name="alias_survey" class="form-control"  placeholder="entrer l'alias de l'enquete...">
				  </div>  

				  <div class="form-group">
				    <label >Année Enquete:</label>
				    <input type="date" name="year" class="form-control">
				  </div>  

				  
				  </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
				        <button type="submit" class="btn btn-primary">Sauvegarder</button>
				      </div>
				   </form>
				    </div>
				  </div>
				</div>
		<!--fin crud modal-->

        <!-- Debut Edit Modal -->
		<div class="modal fade" id="edit_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel">Modification</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		
		<form action="/enquete" method="POST" id="edit_survey">

			{{csrf_field()}}
			{{ method_field('PUT') }}
		<div class="modal-body">
		        
		
		  <div class="form-group">
		    <label >Nom Enquete:</label>
		    <input type="text" name="name" class="form-control" id="name" placeholder="entrer un enquete...">
		    
		  </div>

		  <div class="form-group">
		    <label >Alias Enquete:</label>
		    <input type="text" name="alias_survey" class="form-control" id="alias_survey" placeholder="entrer l'alias de l'enquete...">
		  </div>  

		  <div class="form-group">
		    <label >Année Enquete:</label>
		    <input type="text" name="year" class="form-control" id="year">
		  </div>  

		  
		  </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
		        <button type="submit" class="btn btn-primary">Modifier</button>
		      </div>
		   </form>
		    </div>
		  </div>
		</div>
		<!-- Fin Edit Modal -->

		<!-- Debut Delete Modal -->
		<div class="modal fade" id="delete_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel">Suppression</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		
		<form action="/enquete" method="POST" id="delete_survey">

			{{csrf_field()}}
			{{ method_field('DELETE') }}
		<div class="modal-body">
		        
		  <input type="hidden" name="methode" value="DELETE">
		  <p>voulez-vous le supprimer vraiment?</p>
		  
		  </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
		        <button type="submit" class="btn btn-primary">Oui, supprimer</button>
		      </div>
		   </form>
		    </div>
		  </div>
		</div>
		<!-- Fin Delete Modal -->


		<div class="container">

			<div class="container">
			<h3 align="center"> Listes des Enquetes </h3>
			@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
				
			</div>
			@endif

			@if(\Session::has('success'))
			<div class=" alert alert-success">
				<p>{{ \Session::get('success') }}</p>

			</div>
			@endif
			
	        <a href="{{ url('/importation') }}"class="btn btn-secondary"> Importation </a>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  Ajouter
		    </button>
		  
		   
	<br><br>
			<table id="datatable" class="table table-bordered table-striped table-dark ">
	  <thead>
	    <tr>
	      <th scope="col">ID Enquete</th>
	      <th scope="col">Nom Enquete</th>
	      <th scope="col">Alias Enquete</th>
	      <th scope="col">Année Enquete</th>
	      <th scope="col">Action</th>
	      
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($survs as $surv)
	    <tr>
	      <th>{{$surv->id }}</th>
	      <td>{{$surv->name }}</td>
	      <td>{{$surv->alias_survey }}</td>
	      <td>{{$surv->year }}</td>
	      <td>
	      	<a href="#"  class="btn btn-success edit">Modifier</a>
	      	<a href="#" class="btn btn-danger delete">Supprimer</a>
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
		</div>


<!-- code java script -->
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>-->

<script src="{{ asset('admin')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('admin')}}/vendor/bootstrap/js/bootstrap4.min.js"></script>
    <script src="{{ asset('admin')}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    
<script src="{{ asset('admin')}}/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var table = $('#datatable').DataTable({

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

		});

		table.on('click','.edit', function(){

			$tr = $(this).closest('tr');
			if ($($tr).hasClass('child')){
				$tr = $tr.prev('.parent');
			}

			var data = table.row($tr).data();
			console.log(data);

			$('#name').val(data[1]);
			$('#alias_survey').val(data[2]);
			$('#year').val(data[3]);

			$('#edit_survey').attr('action','/enquete/'+ data[0]);
			$('#edit_modal').modal('show');

			
		});

		//debut script suppression
		table.on('click','.delete', function(){

			$tr = $(this).closest('tr');
			if ($($tr).hasClass('child')){
				$tr = $tr.prev('.parent');
			}

			var data = table.row($tr).data();
			console.log(data);

			
			$('#delete_survey').attr('action','/enquete/'+ data[0]);
			$('#delete_modal').modal('show');
            });

		
	});
</script>



</body>
</html>
