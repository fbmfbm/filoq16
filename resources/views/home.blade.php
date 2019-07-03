@extends('layouts.app')

@section('content')
<br>
<div class="container" ng-controller="MainCtrl">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card ">
             <div class="card-header">Tableau de bord</div>
                
            
            <div class="card-body">

                    <h6 class="card-subtitle text-muted">Accès aux données en ligne</h6>

                    <br>
                    <div class="card-text fbm-title">
                        Vous êtes connecté !

                       <h4><a href="{{ url('/zonage') }}">  <i class="fa fa-sign-in" aria-hidden="true"></i>  Accéder directement à la section de  selection de territoires </a></h4>

                    </div>
                    
                </div>

                <div class="card-footer">
                        <a class="btn btn-outline-primary" href="{{ url('/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> deconnection</a>
                </div>
        </div>
    </div>
</div>
@endsection
