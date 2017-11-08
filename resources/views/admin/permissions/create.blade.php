@extends('layouts.admin_main')

@section('title','Gestion des permissions')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class=""><i class="fa fa-clone text-primary" aria-hidden="true"></i> Création d'une Permission</h3>
                <hr>
            </div>

            <div class="col-sm-12 col-md-6  offset-md-3">

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Permission</h4>
                    </div>
                    <div class="card-body">
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

                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/permission')}}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class=" control-label">Nom</label>


                                <input type="text" class="form-control" name="name" >

                                @if ($errors->has('name'))
                                    <span class="help-block text-info">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="dispaly_name" class=" control-label">Nom affiché</label>


                                <input type="text" class="form-control" name="display_name" >

                                @if ($errors->has('display_name'))
                                    <span class="help-block text-info">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class=" control-label">Description</label>


                                <input type="text" class="form-control" name="description" >

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
    </div>
@endsection
