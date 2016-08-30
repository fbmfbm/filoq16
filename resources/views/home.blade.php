@extends('layouts.app')

@section('content')
<br>
<div class="container" ng-controller="MainCtrl">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card ">
             <div class="card-header">Tableau de bord</div>
                <div class="card-block">
                   
                    <h4 class="card-title">Gestionnaire</h4>
                    <h6 class="card-subtitle text-muted">Gestion de vos données en ligne</h6>

                    <br>
                    <div class="card-text fbm-title">
                        Vous êtes connecté !

                       <h4><a href="{{ url('/zonage') }}">  <i class="fa fa-sign-in" aria-hidden="true"></i>  @{{mainCtrlMsg}} </a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
