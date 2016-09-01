<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Application fbm - @yield('title')</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,900,100italic,400italic,900italic' rel='stylesheet' type='text/css'>
	
	<link href="{{ elixir('css/admin.css') }}" rel="stylesheet">

	@include('layouts.header')

</head>	
<body>
<div id="wrapper">
@include('layouts.admin_side_bar')
@include('layouts.admin_topnav')

@yield('content')

@include('layouts.footer')
</div>
<!-- Latest compiled and minified JavaScript -->
   <!-- JavaScripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"  crossorigin="anonymous"></script>
    <script src="{{ elixir('js/all.js') }}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-i18n/1.5.6/angular-locale_fr-fr.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>