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

                    <div class="col-lg-12">
                        <h3 align="center"> Nouveau Enquete </h3>
                    </div>

                 </div>

                    @if ($errors->any()) 

                    <div class="alert alert-danger">
                        veuillez remplir le champ<br>
                        <ul>
                            @foreach ($errors as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>

                     @endif

            <form action="{{route('enquete.store')}}" method="POST">
                @csrf
                 <div class="form-group">
                     <input type="text" class="form-control" name="name" placeholder="rentrer un nom de l'enquete...">
                     
                 </div>
                 <div class="form-group">
                     <input type="year" class="form-control" name="year" placeholder="rentrer l'anneé de l'enquete...">
                     
                 </div>
  
                <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Ajouter</button> 
                    <a href="{{route('enquete.index')}}" class="btn btn-success">Voir</a>
                </div>
               </div> 
            </form>
            
            </div>


        </div>
       

    </div>
    
    @include('admin.include.stylfoot')

</body>

</html>