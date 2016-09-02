@extends('layouts.admin_main')

@section('title','Users administration')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class="">Utilisateurs de l'application</h3>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped">
                    <tr><th>id</th><th>Nom</th><th>Role</th><th>Date</th></tr>
                    @foreach( $users as $user)
                        <tr><td>{{$user->id}}</td><td><a href="/admin/user/{{$user->id}}">{{$user->name}}</a></td><td>{{$user->role_id}}</td><td>{{date('F d, Y', strtotime($user->created_at))}}</td></tr>
                    @endforeach
                </table>
                <a class="btn btn-default" href="/admin/user/create">Créer un nouvel Utilisateur</a>
            </div>
        </div>
        </div>
    </div>
@endsection
