<!DOCTYPE html >
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>FILOCOM Au Quartier</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
 <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

</head>
<body id="app-layout" ng-app="app">

    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-btn fa-bar-chart text-info"></i> FILOCOM au quartier</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active"><a class="nav-link" href="{{ url('/home') }}">Accueil</a></li>
                <li class="nav-item "><a class="nav-link" href="{{ url('/zonage') }}">Zonage</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/ressources') }}">Ressources</a></li>
            </ul>
            <!-- Left Side Of Navbar -->
            <!-- Right Side Of Navbar -->
            <ul class="nav nav-pill mr-5">
                @if( !Auth::user())
                <li class="nav-item">
                    <a class="nav-link active bg-light "  href="{{ url('/login') }}" role="button" aria-haspopup="true" ><i class="fa fa-user" aria-hidden="true"></i> Connexion</a>

                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link active bg-light dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}</a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/logout') }}" ><i class="fa fa-btn fa-sign-out"></i> Déconnexion</a>
                        @can('display_file')
                        <a class="dropdown-item" href="{{ url('/admin') }}" ><i class="fa fa-cogs" aria-hidden="true"></i> Administration</a>
                        @endcan
                    </div>
                </li>
                    @endif

            </ul>
        </div>
    </nav>
    
    @yield('content')

    </div>

    <!-- JavaScripts -->
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" crossorigin="anonymous"></script>--}}
    {{--<script src="//lightswitch05.github.io/table-to-json/javascripts/jquery.tabletojson.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"  crossorigin="anonymous"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"  crossorigin="anonymous"></script>--}}
    <script src="{{ elixir('js/all.js') }}"></script> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-i18n/1.5.6/angular-locale_fr-fr.min.js"></script>

</body>
</html>
