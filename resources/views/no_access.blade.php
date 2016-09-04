@extends('layouts.app')

@section('content')
    <br>
    <div class="container" >
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card ">
                    <div class="card-header">Contrôle d'accès</div>


                    <div class="card-block">

                        <h4 class="card-title">Gestionnaire</h4>

                        <br>
                        <div class="card-text">

                            <div class="alert alert-warning" role="alert">
                                <strong ><i class="fa fa-exclamation-circle fa-3x" aria-hidden="true"></i> Attention!</strong> Vous n'avez pas les droits suffisants pour accédrer à cette resource.
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

