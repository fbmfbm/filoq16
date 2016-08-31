@extends('layouts.app')

@section('content')
<div id="wrarpper">
<div class="jumbotron jumbotron-fluid" style="margin-top:-50px">
<div class="container">
    <div class="row" ng-controller="MainCtrl">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h1 class="display-4 "><i class="fa fa-btn fa-bar-chart text-info" aria-hidden="true"></i> FILOCOM au quartier</h1>
                <h3>Premiers effets de la rénovation urbaine</h3>
                <h5 class="fbm-font-light">Offre de logements et mobilités résidentielles</h5>
                <br>
                 @if (Auth::guest())
                <h1 clas="display-3">Bienvenue </h1>
                <div class="lead">
                </div>
                <br>
                <p><a class="btn btn-outline-primary" href  ng-click="toggleLogin()" > <i class="fa fa-sign-in" aria-hidden="true"></i> Connectez-vous</a>  pour accèder aux fonctionnalités complètes du site</p>
                 <div class="card" id="login-form" ng-hide="showLogin">
             <div class="card-header text-info">Connexion</div>
             <div class="card-block">
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} text-primary">
                            <label for="email" class="col-md-4 control-label text-primary">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} text-primary" >
                            <label for="password" class="col-md-4 control-label text-primary">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" > <span class="text-primary">Se souvenir de moi</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="btn-submit_login">
                                    <i class="fa fa-btn fa-sign-in"></i> Connexion
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Mot de passe oublié ?</a>
                            </div>
                        </div>
                    </form>

             </div>
         </div>
                @else
                <h2 clas="display-3">Bienvenue  <span class="text-info">{{ Auth::user()->name }}</span></h2>
                        <div class="row">
                            <div class="fbm-card-negative center-block" ng-click="goToURL('zonnage/')">
                                <i class="fa fa-btn fa-pie-chart text-info fbm-picto-block" aria-hidden="true"></i><p>Zonage aux quartiers</p>
                            </div>
                             <div class="fbm-card-negative center-block">
                                <i class="fa fa-btn fa-file-text text-info fbm-picto-block" aria-hidden="true"></i><p>Lexique des indicateurs</p>
                            </div>
                        </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
     <div class="row col-md-10 col-md-offset-1">
     @if (Auth::guest())
         <div class="card" id="login-form">
             <div class="card-header">Connexion</div>
             <div class="card-block">
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="btn-submit_login">
                                    <i class="fa fa-btn fa-sign-in"></i> Connexion
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Mot de passe oublié ?</a>
                            </div>
                        </div>
                    </form>

             </div>
         </div>
         @endif
     </div>
 </div> 
 </div>
@endsection
