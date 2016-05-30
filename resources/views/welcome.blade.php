@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid" style="margin-top:-50px">
<div class="container-fluid">
    <div class="row">
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
                <p><a class="btn btn-info-outline" href="#btn-submit_login" >Connectez-vous</a> 
                     pour accèder aux fonctionnalités complètes du site
                    </p>
                @else
                <h2 clas="display-3">Bienvenue  <span class="text-info">{{ Auth::user()->name }}</span></h2>
                        <div class="lead">
                        <div class="col-md-4 fbm-card-negative ">
                            <p>Rejoignez-directement la section de zonage pour accèder aux données</p>
                        </div>
                        
                        </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid">
     <div class="row col-md-10 col-md-offset-1">
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
     </div>
 </div> 
@endsection
