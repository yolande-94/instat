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
                    
                  <div class="col-md-12">
                    
                    <h3>detail des enquetes</h3>
                   <hr>
                  </div>
                </div>


                 <div class="row">
                    <div class="col-md-12">
                        
                      <div class="form-group">
                        
                         <strong>Nom Enquete:</strong> {{$survey->name}}
                        

                      </div>

                    </div>

                    <div class="col-md-12">
                        
                      <div class="form-group">
                        
                         <strong>Année Enquete:</strong> {{$survey->year}}
                        

                      </div>

                    </div>

                    <div class="col-md-12">
                         <a href="{{route('enquete.index')}}" class="btn btn-success">Back</a>
                     </div>

                    </div>

                 </div>

                 </div>




        </div>


        </div>
       

    </div>
    
    @include('admin.include.stylfoot')

</body>

</html>