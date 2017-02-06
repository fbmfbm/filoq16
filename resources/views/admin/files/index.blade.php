@extends('layouts.admin_main')

@section('title','Gestion des Fichiers et annexes')

@section('content')
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class=""><i class="fa  fa-files-o text-primary"></i> LISTE DES DOCUMENTS TÉLÉCHARGABLES</h3>
                <hr>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-outline-primary" href="/admin/file/create" data-toggle="tooltip"
                       data-placement="top" title="Ajouter un nouveau role">
                        <i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
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
                    @if (1 > 0)
                    <table class="table table-bordered table-hover table-striped table-sm">
                            <tr>
                                <th>id</th>
                                <th>nom</th>
                                <th>titre</th>
                                <th>type</th>
                                <th>active</th>
                                <th></th>
                            </tr>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{$file}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                 <td></td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            <p>Votre application ne possède aucun fichiers en téléchargement</p>
                        @endif
                    </div>
                </div>
        </div>
    </div>

@endsection