@extends('layouts.admin_main')

@section('title','Roles administration')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class="">Roles de l'application</h3>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-hover table-striped">
                    <tr><th>id</th><th>Nom</th><th>Date</th></tr>
                    @foreach( $roles as $role)
                        <tr><td>{{$role->id}}</td><td><a href="/admin/role/{{$role->id}}">{{$role->name}}</a></td><td>{{date('F d, Y', strtotime($role->created_at))}}</td></tr>
                    @endforeach
                </table>
                <a class="btn btn-default" href="/admin/role/create">Créer un nouveau Role</a>
            </div>
        </div>
        </div>
    </div>
@endsection
