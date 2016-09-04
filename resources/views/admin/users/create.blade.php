@extends('layouts.admin_main')

@section('title','Gestion utilsateurs')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class="">Création d'un Utilisateur</h3>
                <hr>
            </div>

            <div class="col-sm-12 col-md-6  offset-md-3">

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">Utilisateur</h4>
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/user')}}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class=" col-form-label">Nom</label>

                                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">

                                @if ($errors->has('name'))
                                    <span class="help-block text-info">
                              <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class=" col-form-label">Email</label>

                                <input type="text" class="form-control" name="email" id="email"
                                       value="{{old('email')}}">

                                @if ($errors->has('email'))
                                    <span class="help-block text-info">
                               <strong>{{ $errors->first('email') }}</strong>
                             </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class=" col-form-label">Mot de passe (Min. 6 caractères)</label>

                                <input type="password" class="form-control" name="password" id="password" value="">

                                @if ($errors->has('password'))
                                    <span class="help-block text-info">
                               <strong>{{ $errors->first('password') }}</strong>
                            </span>
                                @endif

                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class=" col-form-label">Confirmation</label>


                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block text-info">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                    Enregistrer
                                </button>
                                <a href="{{ url('/admin/user') }}" class="btn btn-outline-secondary"><i class="fa fa-undo" aria-hidden="true"></i> Annuler</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
