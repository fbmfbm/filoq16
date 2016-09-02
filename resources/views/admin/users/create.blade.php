@extends('layouts.admin_main')

@section('title','Roles création')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class="">Création d'un Utilisateur</h3>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">User</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/user')}}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nom</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="email" value="">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Mot de passe</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" value="">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-user"></i> Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
