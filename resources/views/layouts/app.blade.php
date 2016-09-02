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
    <nav class="navbar navbar-fixed-top navbar-dark bg-primary">
                 <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#fbmCollapsingNavbar2" aria-controls="fbmCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
                         <i class="fa fa-bars" aria-hidden="true"></i>
                 </button>
                 <div class="collapse navbar-toggleable-xs" id="fbmCollapsingNavbar2">
                <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-btn fa-bar-chart text-info"></i> FILOCOM au quartier</span></a>
                 <ul class="nav navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="{{ url('/home') }}">Accueil</a></li>
                    <li class="nav-item active"><a class="nav-link" href="{{ url('/zonage') }}">Zonage</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ressources</a></li>
                </ul>
                <!-- Left Side Of Navbar -->
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav pull-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Connexion</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Enregistrement</a></li>-->
                    @else
                        <li class="nav-item ">
                            <div class="dropdown">
                            <a  href="#" class="btn btn-outline-secondary dropdown-toggle" id="dropdownMenuLink" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a>
                            </div>
                            </div>
                    
                        </li>
                    @endif
                </ul>
             </div> <!--end collapsible content fbm -->
    </nav>
    
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"  crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"  crossorigin="anonymous"></script>
    <script src="{{ elixir('js/all.js') }}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-i18n/1.5.6/angular-locale_fr-fr.min.js"></script>
</body>
</html>
