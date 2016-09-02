<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#menu-toggle" class="" id="menu-toggle"><i class="fa fa-bars"></i></a></li>
        <li class="active"><a href="/" target="_blank"><i class="fa fa-building"></i>  Visualiser le FrontEnd du site </a></li>
      </ul>
     @if (Auth::check())
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
      @else
        <ul class="nav navbar-nav navbar-right">
          <li><a type="submit" class="" href="/login"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
        </ul>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>