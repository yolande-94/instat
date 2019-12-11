<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>visualisation</title>
    
    @include('admin.include.stylhead')

    </head>

    <body>

    <div id="soft-all-wrapper">

        <!-- Navigation --> 
        @include('admin.include.nav')

        <div id="page-wrapper">
            
          <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <h3 align="center"> Liste Enquete</h3>
                    </div>

                  </div>
                  <br>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                      <p> {{$message}}</p>  
                    </div>

                     @endif

                     

                     <table class="table table-hover table-sm">
                         <tr>
                             <th width="100px"><b>No</b></th>
                             <th width="200px">Nom Enquete</th>
                             <th width="200px">Année</th>
                             <th width="180px">Action</th>

                         </tr>

                         @foreach ($surveys as $survey)
                             
                             <tr> 
                                   <td><b> {{++$i}}</b></td>
                                   <td>{{$survey->name}}</td>
                                   <td>{{$survey->year}}</td>
                             <td>
                                 <form action="{{route('enquete.destroy',$survey->id)}}" method="post">
                                    <a class="btn btn-sm btn-success" href="{{route('enquete.show',$survey->id)}}">Detail</a>
                                    <a class="btn btn-sm btn-warning" href="{{route('enquete.edit',$survey->id)}}">Editer</a>

                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                
                                 </form>

                             </td>  
                             </tr>
                         @endforeach  
                     </table>


                     <div class="row">
                        <div class="col-sm-6">
                            <a href="{{route('enquete.create')}}" class="btn btn-primary">Creer Enquete </a>
                            </div>
                     </div>
                        
                

            </div>
            
           

    </div>
</div>
    
    @include('admin.include.stylfoot')

</body>

</html>