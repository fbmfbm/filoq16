@extends('layouts.app')

@section('content')
<br>
<div class="container" ng-controller="ZonageCtrl">
    <div class="row">
        <div class="col-md-12">

                <h4 class="card-title"><i class="fa fa-list text-info" aria-hidden="true"></i> Selection d'un Quartier de Rénovation Urbaine </h4>
                 <h6 class="card-subtitle text-muted">Recherche d'un quartier</h6>    
                 <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" id="dep" ng-model="search.dep" placeholder="Dep." size="5">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="code" ng-model="search.code" placeholder="Code" size="8">
                </div>
                <div class="form-group">
                                        <input type="text" class="form-control" ng-model="search.nom" id="Nom" placeholder=" ou Nom">
                </div>
                <div class="form-group">
                    <select class="form-control" ng-model="selectedPru" ng-change="zoomOnFeature(selectedPru)">
                                <option value="" selected>sélectionnez</option>
                                <option ng-repeat="pru in refPru| filter:{nom_conv:search.nom} | filter:{code_dep:search.dep, code:search.code} " value="@{{pru.code}}">@{{pru.nom_conv}} ( @{{pru.code}} )</option>
                    </select>
                    <button  class="btn btn-info" ng-click="zoomOnFeature(selectedPru)"> <i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </form>
            <br/>
            <div class="card ">
             <div class="card-header">
             Zonage
                    <div class="btn btn-info btn-sm pull-right" ng-click="displayLegend=!displayLegend" data-toggle="tooltip" data-placement="top" title="Légende et affichage des calques de la carte"><i class="fa fa-list" aria-hidden="true"></i></div>
                    <div class="pull-right" ng-show="displayLegend">
                        <div id="layerSwitcher"></div>
                    </div>
             </div>
                <div class="card-block">
                    <h4 class="card-title"><i class="fa fa-map-marker text-info" aria-hidden="true"></i> Cliquez sur un territoire pour accéder aux données</h4>    
                        <br>
                     <div id="map">
                        <div id="info"></div>
                    </div>
                    <a id="export-png" class="btn btn-info-outline" download="map.png" ng-click="exportPNG()"><i class="fa fa-download"></i> PNG</a>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
