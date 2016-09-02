@extends('layouts.admin_main')

@section('title', 'Administration Home page')

@section('content')
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="">Tableau de bord</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-img-top" style="background-color:#009dad; width:100%; min-height:100px;" src="...">
                        <div class="cn">
                            <div class="inner"><i class="fa fa-cubes" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">Thématiques</h4>
                        <h7 class="card-subtitle text-muted">Sections de l'application</h7>
                        <br/>
                        <p class="card-text">Thématiques présentes sur le site.</p>
                        <br>
                        <a href="{{ url('/admin/logstat') }}" class="btn btn-primary">Gerer</a>
                        <a href="{{ url('/admin/logstat') }}" class="card-link">Visualiser</a>
                        <a href="{{ url('/admin/logstat') }}" class="card-link">info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-img-top" style="background-color:#ad9800; width:100%; min-height:100px;" src="...">
                        <div class="cn">
                            <div &class="inner"><i class="fa fa-line-chart" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">Statistiques</h4>
                        <h7 class="card-subtitle text-muted">Information</h7>
                        <br/>
                        <p class="card-text">Ensemble des rapports disponible pour le site.</p>
                        <br/>
                        <a href="{{ url('/admin/logstat') }}" class="btn btn-primary">Gerer</a>
                        <a href="{{ url('/admin/logstat') }}" class="card-link">Visualiser</a>
                        <a href="{{ url('/admin/logstat') }}" class="card-link">info</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-img-top" style="background-color:#ad5800; width:100%; min-height:100px;" src="...">
                        <div class="cn">
                            <div class="inner"><i class="fa fa-database" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">Données</h4>
                        <h7 class="card-subtitle text-muted">Bases de données</h7>
                        <br/>
                        <p class="card-text">Gestionnaire des éléments et des données disponibles</p>
                        <br/>
                        <a href="{{ url('/admin/user') }}" class="btn btn-primary">Gerer</a>
                        <a href="{{ url('/admin/user') }}" class="card-link">Visualiser</a>
                        <a href="{{ url('/admin/user') }}" class="card-link">info</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <hr/>


            </div>
        </div>
    </div>


@endsection