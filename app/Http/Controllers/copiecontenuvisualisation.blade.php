<div id="page-wrapper">
          

            
            <div class="row">
                 <div style="width:100%; height:auto; text-align: left;">
                        <div style="width: 800px;display: inline-block; margin-left: 25px;color: rgb();" id="container">
                            <div class="centre">
                                <div class="titre_centre">
                                    <select id="choix" class="liste">
                                        
                                        @foreach($survs as $surv)
                                        <option >{{$surv->name}}</option>
                                         @endforeach
                                    </select>
                                    <select id="choix" class="liste">
                                        
                                        @foreach($anneres as $annere)
                                        <option >{{$annere->year}}</option>
                                         @endforeach
                                    </select>
                                    <select id="choix" class="liste">
                                        <option >selectionnez un indicateurs</option>
                                        @foreach($indicas as $indica)
                                        <option >{{$indica->id}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                        
                    </div>
            
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
                                            
                                                 @foreach($visuals as $visual)
                                                <tr>
                                                    
                                                    <td>{{$visual->name}}</td>
                                                    <td>{{$visual->value}}</td>
                                                    
                                                    
                                                </tr>
                                                @endforeach
                                               
                                            
                                        </table>
                                        
                                    </div>
                                    <!-- /.table-responsive -->
                                
                                
                     </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->


                 $type = empty($_GET['type']) ?'indicator' : $_GET['type'];
        if ($type === 'indicator') {
              
              $table = 'indicators';
              $foreign = 'id_survey';

        }else if ($type === 'year'){
            $table = 'result_regions';
              $foreign = 'id_indicator';
        }else{
            throw new Exception("Unknown type" . $type);
            
        }

        $query = DB::table("select id,title FROM $table where $foreign = ?");
        $query->execute([$_GET['filter']]);
        $items = $query->fetcAll();