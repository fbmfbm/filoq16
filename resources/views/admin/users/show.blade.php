@extends('layouts.admin_main')

@section('title','affichage d\'un Roles')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class="">Affichage de l'utilisateur</h3>
            </div>
            <div class="col-sm-12 col-md-6  offset-md-3">

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Utilisateur {{ $user->name }}</h4>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{url('/admin/user/'.$user->id)}}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">Nom</label>


                            <input type="text" class="form-control" name="name" value="{{$user->name}}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif

                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email</label>


                            <input type="text" class="form-control" name="description" value="{{$user->email}}">

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif

                        </div>
                        <div class="form-group">

                            <a href="{{ url('/admin/user') }}" class="btn btn-outline-secondary"><i class="fa fa-undo"
                                                                                                    aria-hidden="true"></i>
                                Annuler</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
