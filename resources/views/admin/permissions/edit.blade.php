@extends('layouts.admin_main')

@section('title','Gestion des permissions')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class=""><i class="fa fa-clone text-primary" aria-hidden="true"></i> Édition d'une Permission</h3>
                <hr/>
            </div>

            <div class="col-sm-12 col-md-6  offset-md-3">

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Permission <span
                                    class="text-primary font-weight-bold">{{$permission->name}}</span></h4>
                        <h6 class="card-subtitle text-muted">Données de la permission :</h6>
                    </div>
                    <div class="card-block">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="card-block">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/permission/'.$permission->id) }}">

                            {{ method_field('PATCH') }}
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="control-label">Nom</label>


                                    <input type="text" class="form-control" name="name" value="{{$permission->name}}">

                                    @if ($errors->has('name'))
                                        <span class="help-block text-info">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                            </div>
                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                <label for="display_name" class="control-label">Nom affiché</label>


                                <input type="text" class="form-control" name="display_name" value="{{$permission->display_name}}">

                                @if ($errors->has('dispaly_name'))
                                    <span class="help-block text-info">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="control-label">Description</label>


                                    <input type="text" class="form-control" name="description" value="{{$permission->description}}">

                                    @if ($errors->has('description'))
                                        <span class="help-block text-info">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif

                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Enregistrer
                                </button>
                                <a href="{{ url('/admin/permission') }}" class="btn btn-outline-secondary"><i
                                            class="fa fa-undo" aria-hidden="true"></i> Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
