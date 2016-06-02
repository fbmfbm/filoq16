@extends('layouts.app')

@section('content')
<br>
<div class="container" ng-controller="ZonageCtrl">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
             <div class="card-header">Zonage</div>
                <div class="card-block">
                   
                    <h4 class="card-title">Selection d'un territoire</h4>
                    <h6 class="card-subtitle text-muted">Définition d'un territoire d'étude</h6>

                        <br>
                        <div class="card-text">
                       
                        
                       <div id="map">
                            <div id="info"></div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
    </div>
</div>
@endsection
