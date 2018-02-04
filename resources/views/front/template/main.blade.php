<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">

	<title>@yield('title') ~ Nelson castellano</title>
	<link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}">
	<!--<link rel="stylesheet" href="{{ asset('css/general.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.6.3/css/font-awesome.min.css') }}">  -->
</head>
<body>


	<div class="container">
		@yield('content')
	
		<footer>
			<hr>
			Todos los derechos reservados &copy {{ date('Y')}}
		</footer>

	</div>
	
	<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.j') }}"> </script>
</body>
</html>