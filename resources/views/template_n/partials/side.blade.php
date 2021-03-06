<style type="text/css"> 
  .msn:hover
  {
    color: #fff;
    background-color: #fff;
  }
  .msn:link {
    color: #fff;
    text-decoration:none;
  }
</style> 
<section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="#" class="logo"><b>Aula Virtual</b></a>
            <!--logo end-->
            @if( strtoupper(Auth::user()->type) !='ADMIN' )
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Tienes 4 Tareas Pendientes</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Trabajos Proyecto 1</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Ejercicios Matematica</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Tareas Recibidas</div>
                                        <div class="percent">80%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">Proyectos Recibidos</div>
                                        <div class="percent">70%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Complete (Important)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="external">
                                <a href="#">Ver Todas Las tareas</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">@include('admin.messenger.unread-count')</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                              <!--<a class="msn" href="{!! url('admin/messages'); !!}">Tienes @include('admin.messenger.unread-count') Nuevos Mensajes</a>-->
                            </li>
                            
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            @endif
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
             <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} {{ Auth::user()->primer_apellido }}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('salir') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('salir') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>                       
                                </ul>
                            </li>
                        @endif                        
                   <a href="profile.html"> <class="img-circle" width="60"> </a>                
                    </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="{!! url('admin/alumnoPerfil'); !!}"> <class="img-circle" width="60"><img src="{{ URL::to('/') }}/images_n/users/{{ $imagen }}" class="img-circle" width="60" /> </a></p>
                  <h5 class="centered">{{ Auth::user()->name  }} {{ Auth::user()->primer_apellido  }}</h5>
                  
                  <li class="mt">
                      <a class="active" href="#">
                          <i class="fa fa-dashboard"></i>
                          <span>Mi Aula Virtual</span>
                      </a>
                  </li>

                  @if( strtoupper(Auth::user()->type) =='ADMIN' ) 
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Menu Administrador</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{!! url('admin/users'); !!}">Administrar Usuarios</a></li>
                          <li><a  href="{!! url('admin/asignatura_admin'); !!}">Administrar Asignaturas</a></li>
                          <li><a  href="{!! url('admin/cursos'); !!}">Administrar Cursos</a></li>
                      </ul>
                  </li>
                  @endif

                  @if( strtoupper(Auth::user()->type) =='PROFESOR' ) 
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-graduation-cap"></i>
                          <span>Menu Profesor</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{!! url('admin/asignaturas'); !!}">Mi Departamento</a></li>            
                          <li><a  href="#">Foros</a></li>
                      </ul>
                  </li>
                  @endif
                  @if( strtoupper(Auth::user()->type) =='ALUMNO' ) 
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-pencil"></i>
                          <span>Menu Alummo</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{!! url('admin/alumnoAsig'); !!}">Mis Asignaturas</a></li>            
                          <li><a  href="#">Foros</a></li>
                      </ul>
                  </li>
                  @endif

                  <li class="mt option-mobile">
                      <a href="{{ route('salir') }}"
                                              onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">

                          <span class="glyphicon glyphicon-off">
                              Salir
                            
                          </span>  
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-9 main-chart">
                    @yield('content')
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->             
                  <div class="col-lg-3 ds mensajes-bar">
                    <!--COMPLETED ACTIONS DONUTS CHART-->

                    @if( strtoupper(Auth::user()->type) !='ADMIN' )
                    <h3>Mensajes 
                      @if( strtoupper(Auth::user()->type) =='PROFESOR' ) 
                        de Alumnos 
                      @endif
                    </h3>         
                                        
                      <!-- First Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>2 Minutes Ago</muted><br/>
                             <a href="#">Jaime Martinez</a> Comentó Foro.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Second Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>3 Hours Ago</muted><br/>
                             <a href="#">Diana Kennedy</a> Comentó Foro.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Third Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>7 Hours Ago</muted><br/>
                             <a href="#">Belkis rodriguez</a> Comentó Foro.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Fourth Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>11 Hours Ago</muted><br/>
                             <a href="#">Mark Twain</a> Comentó Foro.<br/>
                          </p>
                        </div>
                      </div>
                      <!-- Fifth Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>18 Hours Ago</muted><br/>
                             <a href="#">Daniel Pratt</a> Comentó Foro.<br/>
                          </p>
                        </div>
                      </div>
                      @endif
                       <!-- USERS ONLINE SECTION -->
           

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><!--/row -->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!--footer start-->
  <footer class="site-footer">
    <div class="text-center">
        2018 - Desarrollo
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
        </a>
    </div>
  </footer>
  <!--footer end-->  
  

  <style>
    
      /* MOBILE MODE */
      @media (max-width:768px) {
        .mensajes-bar{
          display:none;
        }

        .site-footer{
          display: none;
        }


      }

      @media (min-width:768px){
        .option-mobile{
          display:none;
        }

      }

          



  </style>





  </body>
</html>
