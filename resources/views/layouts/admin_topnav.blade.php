{{--
<nav class="navbar navbar-fixed-top navbar-light" style="background-color: #e0f1d0;">

    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#fbmCollapsingNavbar2" aria-controls="fbmCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>

    <div class="collapse navbar-collapse" id="fbmCollapsingNavbar2">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-cogs" aria-hidden="true"></i><span class="text-primary"> Administration :</span> @yield('title')</a>
        <ul class="navbar-nav">
            <li class="nav-item active"><a class="nav-link" href="{{ url('/admin') }}">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Visualiser le site</a> </li>
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
                            <a href class="dropdown-item"><i class="fa fa-users"></i>{{Auth::user()->role()->first()->display_name}}</a>
                            <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Déconnexion</a>
                        </div>
                    </div>
                </li>
        </ul>
    </div> <!--end collapsible content fbm -->
</nav>--}}

<nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #e0f1d0;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-cogs" aria-hidden="true"></i><span class="text-primary"> Administration :</span> @yield('title')</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active"><a class="nav-link" href="{{ url('/admin') }}">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Visualiser le site</a> </li>
        </ul>
        <!-- Left Side Of Navbar -->
        <!-- Right Side Of Navbar -->
        <ul class="nav nav-pill mr-5">

                <li class="nav-item dropdown">
                    <a class="nav-link active bg-light dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}</a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ url('/logout') }}" ><i class="fa fa-btn fa-sign-out"></i> Déconnexion</a>
                    </div>
                </li>

        </ul>
    </div>
</nav>


  