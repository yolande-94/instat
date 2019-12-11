 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administrateur</a>
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
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Deconnexion
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
                                    <a href="{{ url('/interface') }}">Importation</a>
                                </li>
                                
                            </ul>
                            
                        </li>

                        
                        <li>
                            
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('enquete.index')}}">creation enquete</a>
                                </li>
                                
                            </ul>
                            
                        </li>


                        
                       <!-- <li>
                         <ul class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Creation</a>
                            <div class="dropdown-menu">
                            <li><a href="{{route('enquete.index')}}">Enquete</a></li>
                            <li><a href="{{route('enquete.index')}}">Anneé</a></li>
                            <li><a href="{{route('enquete.index')}}">Groupement</a></li>
                        </div>
                          
                      </ul>
                        </li>-->
                            
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
        </nav>