
<nav class="navbar navbar-fixed-top navbar-light" style="background-color: #e0f1d0;">
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#fbmCollapsingNavbar2" aria-controls="fbmCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
    <div class="collapse navbar-toggleable-xs" id="fbmCollapsingNavbar2">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-cogs" aria-hidden="true"></i><span class="text-primary"> Administration :</span> @yield('title')</a>
        <ul class="nav navbar-nav">
            <li class="nav-item active"><a class="nav-link" href="{{ url('/admin') }}">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Visualiser le site</a> </li>
            <li class="nav-item"><a class="nav-link" href="#">Ressources</a></li>
        </ul>
        <!-- Left Side Of Navbar -->
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav pull-right">
            <!-- Authentication Links -->

                <li class="nav-item ">
                    <div class="dropdown">
                        <a  href="#" class="btn btn-outline-primary dropdown-toggle" id="dropdownMenuLink" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenuLink">
                            <a href class="dropdown-item"><i class="fa fa-users"></i>{{Auth::user()->roles()->first()->display_name}}</a>
                            <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a>
                        </div>
                    </div>
                </li>
        </ul>
    </div> <!--end collapsible content fbm -->
</nav>


  