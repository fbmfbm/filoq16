@extends('layouts.admin_main')

@section('title','User édition')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class=""><i class="fa fa-user text-primary" aria-hidden="true"></i> Édition d'un Utilisateur</h3>
                <hr/>
            </div>

            <div class="col-sm-12 col-md-7  offset-md-2">

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-user" aria-hidden="true"></i> Utilisateur <span
                                    class="text-primary font-weight-bold">{{$user->name}}</span></h4>
                        <h6 class="card-subtitle text-muted">Données utilisateur :</h6>
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

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/admin/user/'.$user->id) }}">

                            {{ method_field('PATCH') }}

                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class=" control-label">Nom</label>

                                <input type="text" class="form-control" name="name" value="{{$user->name}}">

                                @if ($errors->has('name'))
                                    <span class="help-block text-info">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="email" class=" control-label">Email</label>

                                <input type="text" class="form-control" name="email" id="email"
                                       value="{{$user->email}}">

                                @if ($errors->has('email'))
                                    <span class="help-block text-info">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="role_id" class="col-sm-12 col-form-label">Role</label>
                                <select class="form-control" name="role_id" id="role_id">
                                    @foreach( $roles as $role)
                                        <option value="{{ $role->id }}" {{ ($role->id == $user->role_id) ? ' selected="selected"' : '' }}>{{$role->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-sm-12 col-form-label">Mot de passe (Min. 6
                                    caractères)</label>

                                <input type="password" class="form-control" name="password" id="password" value="">

                                @if ($errors->has('password'))
                                    <span class="help-block text-info">
                               <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif

                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm"
                                       class="col-sm-3 col-form-label">Confirmation</label>


                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block text-info">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                @endif

                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"
                                                                                 aria-hidden="true"></i>
                                    Enregistrer
                                </button>
                                <a href="{{ url('/admin/user') }}" class="btn btn-outline-secondary"><i
                                            class="fa fa-undo" aria-hidden="true"></i> Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
