
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">{{ Auth::user()->name }}</a>
    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/pruebita/public/admin/home">Inicio</a></li>
        @if(Auth::user()->admin())
        <li><a href="/pruebita/public/admin/users">Usuario</a></li>
        @endif
        <li><a href="/pruebita/public/admin/categorias">Categorías</a></li>
        <li><a href="/pruebita/public/admin/articulos">Artículos</a></li>
        <li><a href="/pruebita/public/admin/tags">Tags</a></li>
        <li><a href="/pruebita/public/admin/imagenes">Imagenes</a></li>

     </ul>
     
        <div  class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Entrar</a></li>
                            <li><a href="{{ route('register') }}">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name  }} {{ Auth::user()->primer_apellido  }} <span class="caret"></span>

                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                       
                                </ul>
                            </li>
                        @endif
                        
                        <figure>
                            <img src="http://localhost/pruebita/public/images_n/img/avatar-male.png" alt="Avatar" class="img-responsive_av">
                        </figure>
                
                    </ul>

                </div>
       </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
