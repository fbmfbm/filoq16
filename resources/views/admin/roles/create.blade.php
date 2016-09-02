@extends('layouts.admin_main')

@section('title','Roles création')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class="">Création d'un Role</h3>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Role</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/role')}}">
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
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="description" value="">

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
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
