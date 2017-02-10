@extends('layouts.admin_main')

@section('title', 'Gestion')

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
                            <div class="inner"><i class="fa fa-users" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">Utilisateurs</h4>
                        <h7 class="card-subtitle text-muted">Utilisateurs enregistrés</h7>
                        <br/>
                        <p class="card-text">Gestion des utilisateurs du site.</p>
                        <br>
                        <a href="{{ url('/admin/user') }}" class="btn btn-primary">Gérer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-img-top" style="background-color:#ad9800; width:100%; min-height:100px;" src="...">
                        <div class="cn">
                            <div class="inner"><i class="fa fa-files-o" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title">Documents</h4>
                        <h7 class="card-subtitle text-muted">Fichiers téléchargeables</h7>
                        <br/>
                        <p class="card-text">Gestion des fichiers téléchargeables à partir du site.</p>
                        <br/>
                        <a href="{{ url('/admin/file') }}" class="btn btn-primary">Gérer</a>
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
                        <h4 class="card-title">Permissions et Rôles</h4>
                        <h7 class="card-subtitle text-muted">Accès et droits de visualisation</h7>
                        <br/>
                        <p class="card-text">Gestions des droits d'accès aux sections du site</p>
                        <br/>
                        <a href="{{ url('/admin/permission') }}" class="btn btn-primary">Gérer</a>
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