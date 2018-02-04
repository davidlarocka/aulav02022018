<!DOCTYPE html>
<html>
<head>	
    <meta charset="utf-8">

<style type="text/css">
*{	margin: 10 px;


}

.cover{
   background-size: cover;
   background-attachment: fixed;
   background-repeat: no-repeat;
   background-color: #fff;
   background-image: url(../assets/img/fontLogin.jpg);
}
.titulo{
   color: white;
}
.tabla{
	background-color: white;
	padding: 10px 10px;
}
</style>

	<title>@yield('title') ~ San Nicolas Diacono</title>




	<link rel="stylesheet" href="{{ asset('plugins/css/main.css') }} ">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"  href="{{ asset('plugins/chosen/chosen.css')}} ">
	<link rel="stylesheet"  href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }} ">

	<!-- <link rel="stylesheet"  href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">  --> 		

</head>
<body class="cover">

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="background-color: #00809d">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
<img src="{{ URL::to('/') }}/images_n/pizarra.jpg" class="" width="50" style="margin-top:10px " />
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="color: white">
                       Aula Virtual
                    </a>
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" style="color: white">Ingresar</a></li>
                            <li><a href="{{ route('register') }}" style="color: white">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    		

	</div>
</div>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script  src="{{ asset('plugins/jquery/js/jquery-3.2.1.js')}}"></script>
<script  src="{{ asset('plugins/jquery/js/bootstrap.js')}}"></script>
<script  src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
<script  src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
 
<!--<script  src="{{ asset('plugins/bootstrap/css/bootstrap.css')}}"></script>  -->
@yield('js')
</body>


</html>

