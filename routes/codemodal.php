
        
        <!-- Debut Edit Modal -->
		<div class="modal fade" id="edit_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel">Formulaire</h5>
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

		<script type="text/javascript">
	$(document).ready(function(){
		var table = $('#datatable').DataTable();

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

		
	});
</script>

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

         return redirect('/enquete')->with('/success', 'donnée modifié');

            <button type="button" class="button btn-primary" data-toogle="modal" data-target="#exampl"></button>

         	<!-- Debut ajout Modal -->
		<div class="modal fade" id="addsurvey" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="staticBackdropLabel">Formulaire</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		
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
		    <input type="text" name="year" class="form-control" >
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
		<!-- Fin ajout Modal -->

	<div class="container">
		<h2 align="center"> Creation Enquete</h2>
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
		
		
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
		  Nouveau Enquete
		</button>

   <br><br>
  <table id="datatable" class="table table-bordered table-striped ">
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
      	<a href=""  class="btn btn-success edit">Modifier</a>
      	<a href="" class="btn btn-danger">Supprimer</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

	</div>
	
