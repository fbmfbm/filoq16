@extends('layouts.admin_main')

@section('title','User édition')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class="">Édition d'un Utilisateur</h3>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Utilisateur {{$user->name}}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="PUT" action="{{ url('/admin/user/'.$user->id) }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nom</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="description" value="{{ $user->email }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Enregistrer
                                    </button>
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
