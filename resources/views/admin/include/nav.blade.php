 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="{{asset('admin/image/instat.png')}}" class="image">
               <a class="navbar-brand" >Institut National de la Statistique</a>
            </div>

              <ul class="nav navbar-top-links navbar-right">
                
                
                <li class="dropdown">
                    
                         <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Deconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                        </li>
                   
                    
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="rechercher...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            
                        </li>
                        <li>
                            <a href="{{ url('/home') }}"><i class="fa fa-dashboard fa-fw"></i> Tableau de bord </a>
                        </li>
                        <li>
                            
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('enquete.index')}}">Consulter enquete</a>
                                </li>
                                
                            </ul>
                            
                        </li>

                        
                        
                        

                        
                      
                    </ul>
                </div>
                
            </div>
        </nav>