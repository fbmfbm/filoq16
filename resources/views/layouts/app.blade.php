<!DOCTYPE html >
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>FILOCOM Au Quartier</title>

 <link href="{{ elixir('css/app.css') }}" rel="stylesheet">


</head>
<body id="app-layout" ng-app="app">
    <nav class="navbar navbar-fixed-top navbar-dark bg-primary">
        
                <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-btn fa-bar-chart text-info"></i> FILOCOM au quartier</span></a>
                 <ul class="nav navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="{{ url('/home') }}">Accueil</a></li>
                    <li class="nav-item active"><a class="nav-link" href="{{ url('/zonage') }}">Zonage</a></li>
                    <li class="nav-item active"><a class="nav-link" href="{{ url('/thema/offre') }}">Offre</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/ressource') }}">Ressources</a></li>
                </ul>
                <!-- Left Side Of Navbar -->
               

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav pull-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Connexion</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Enregistrement</a></li>
                    @else
                        <li class="dropdown">
                            <a  href="#" class="btn btn-secondary-outline dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a>
                            </div>
                        </li>
                    @endif
                </ul>
       
    </nav>
    
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{ elixir('js/all.js') }}"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-i18n/1.5.6/angular-locale_fr-fr.min.js"></script>
</body>
</html>
