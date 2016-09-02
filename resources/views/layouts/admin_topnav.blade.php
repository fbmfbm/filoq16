<nav class="navbar navbar-dark navbar-fixed-top bg-inverse">
<button type="button" class="navbar-toggler hidden-sm-up" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Afficher le menu  de navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
</button>
 <a class="navbar-brand" href="#">@yield('title')</a>
      <div id="navbar">
        <nav class="nav navbar-nav pull-xs-left">
          <a class="nav-item nav-link" href="#">Tableau de bord</a>
          <a class="nav-item nav-link" href="#">Visualiser le site</a>
        </nav>
        <div class="pull-xs-right">
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-users"></i>{{Auth::user()->roles()->first()->display_name}}</a></li>
              <li><a href="#"><i class="fa fa-info-circle"></i> Info 1</a></li>
              <li><a href="#"><i class="fa fa-info-circle"></i> Info 2</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/logout"><i class="fa fa-sign-out"></i> Déconnexions</a></li>
            </ul>
          </li>
        </ul>
        </div>
      </div>
  </nav>



  