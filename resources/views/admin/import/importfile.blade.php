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


<style>
  .container{
    position: absolute;
    right: 18%;
    bottom: 8%;
  }

 .cs-loader {
  position: relative;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  margin-top: 10px;
}

.cs-loader-inner {
  transform: translateY(-50%);
  top: 50%;
  position: absolute;
  width: calc(100% - 200px);
  color: #005a57;
  padding: 0 100px;
  text-align: left;
}

#msg {
    font-weight: 500;
    color: #636363;
    font-family: 'arial';
    margin-left: 80px;
    text-align: left;
}

.cs-loader-inner label {
  font-size: 20px;
  opacity: 0;
  display:inline-block;
}

@keyframes lol {
  0% {
    opacity: 0;
    transform: translateX(-300px);
  }
  33% {
    opacity: 1;
    transform: translateX(0px);
  }
  66% {
    opacity: 1;
    transform: translateX(0px);
  }
  100% {
    opacity: 0;
    transform: translateX(300px);
  }
}

@-webkit-keyframes lol {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-300px);
  }
  33% {
    opacity: 1;
    -webkit-transform: translateX(0px);
  }
  66% {
    opacity: 1;
    -webkit-transform: translateX(0px);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateX(300px);
  }
}

.cs-loader-inner label:nth-child(6) {
  -webkit-animation: lol 3s infinite ease-in-out;
  animation: lol 3s infinite ease-in-out;
}

.cs-loader-inner label:nth-child(5) {
  -webkit-animation: lol 3s 100ms infinite ease-in-out;
  animation: lol 3s 100ms infinite ease-in-out;
}

.cs-loader-inner label:nth-child(4) {
  -webkit-animation: lol 3s 200ms infinite ease-in-out;
  animation: lol 3s 200ms infinite ease-in-out;
}

.cs-loader-inner label:nth-child(3) {
  -webkit-animation: lol 3s 300ms infinite ease-in-out;
  animation: lol 3s 300ms infinite ease-in-out;
}

.cs-loader-inner label:nth-child(2) {
  -webkit-animation: lol 3s 400ms infinite ease-in-out;
  animation: lol 3s 400ms infinite ease-in-out;
}

.cs-loader-inner label:nth-child(1) {
  -webkit-animation: lol 3s 500ms infinite ease-in-out;
  animation: lol 3s 500ms infinite ease-in-out;
}
.card{
  position: absolute;
  right: 50px;
  top: 30%;

}

</style>
    </head>

    <body>

    <div id="soft-all-wrapper">

        
       
          @include('admin.include.nav')
           <div id="page-wrapper">

            <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-6">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">

                        <h2 align="center" class="panel"><strong>Importation</strong></h2>
                        <br>
                    </div>

                    <div class="panel-body">
                        <form id="my_form" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                 <div class="form-group row{{ $errors->has('survey') ? 'has-error':'' }}">
                    <label form="survey" class="col-sm-2 col-form-label">Enquetes</label>
                    <div class="col-sm-10">
                        <select id="id_survey" class="select_survey" name="id_survey" >
                          <option value="0" disabled="true" selected="true">selectionner un enquetes...</option>
                                @foreach($surveys as $survey)
                                <option value="{{ $survey->id }}"> {{ $survey->alias_survey}} </option>
                                @endforeach
                        </select>     
                    </div>
                </div>
                
                <br>
                

                <div class="form-group row{{ $errors->has('year') ? 'has-error':'' }}">
                    <label form="year" class="col-sm-2 col-form-label">Anneé Enquete</label>
                    <div class="col-sm-10">
                        
                        <input type="text" name="year" id="year" class="taona">
                    </div>
                </div>
                <br>
                

                
                <div class="form-group row{{ $errors->has('file') ? 'has-error':'' }}">
                  
                  <label form="file" class="col-sm-2 col-form-label">fichier csv</label>
                  <div class="col-sm-6">
                          <input type="file" name="file" class="form-control-file">
                  </div>

                </div>
                

                <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" id="import" class="btn btn-primary">Importer</button>
                </div>
               </div>

                    <div id="server-results"><!-- For server results --></div>
                </form>
                <br>
                 <hr> 
                 <div id="upload-progress" style="display: none">
                    <p id="msg">Enregistrement en cours...</p>
                  <div class="cs-loader">
                      <div class="cs-loader-inner">
                        <label> ●</label>
                        <label> ●</label>
                        <label> ●</label>
                        <label> ●</label>
                        <label> ●</label>
                        <label> ●</label>
                        
                      </div>
                    </div>
                    
                  </div>
                 
                   <br>

                  
                    </div>
                </div>
            </div>
        </div>
    </div>
            
               



            <!-- /.row -->
        </div>

      </div>
    
    @include('admin.include.stylfoot')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>

    $(document).ready(function(){
      
      $(document).on('change','.select_survey',function(){

        //console.log("its change");
        var id = $(this).val();
        var a = $(this).parent();
        //console.log(id_enquete);
        //var op="";
        $.ajax({
            type:'get',
            url:'{!!URL::to('findan')!!}',
            data:{'id':id},
            success:function(data){
              console.log("year");
              console.log(data.year);

              $('#year').val(data.year);
              
              //console.log(data.length);
            },
             error:function(){}

        })


      });
});
    $(document).ready(function() {
        $("#my_form").submit(function(event) {
            event.preventDefault(); //prevent default action 
            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = new FormData(this); //Creates new FormData object
            $("#upload-progress").show();
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data,
                contentType: false,
                cache: false,
                processData:false,
            success: function(response) {
                $("#server-results").html(response);
                $("#upload-progress").hide();
                setTimeout(hideMsg,10000);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                $("#upload-progress").hide();
                alert(textStatus + " " + errorThrown);
            }

            });
        });
    });

    function hideMsg() {
        $("#server-results").html("");
    }



    
</script>
</body>

</html>