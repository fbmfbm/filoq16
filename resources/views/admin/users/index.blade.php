@extends('layouts.admin_main')

@section('title','Gestion utilsateurs')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class=""><i class="fa fa-users" aria-hidden="true"></i> LISTE DES UTILISATEURS</h3>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-outline-primary" href="/admin/user/create" data-toggle="tooltip" data-placement="top" title="Ajouter un nouvel utilisateur">

                            <i class="fa fa-user-plus" aria-hidden="true"></i></a>
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
                        <table class="table table-bordered table-hover table-striped table-sm">
                            <tr>
                                <th></th>
                                <th>id</th>
                                <th>Nom</th>
                                <th>Role</th>
                                <th>Création</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach( $users as $user)
                                <tr>
                                    <td><input type="checkbox" name="opp" value="0"></td>
                                    <td>{{$user->id}}</td>
                                    <td><a href="{{ url('admin/user/'.$user->id) }}">{{$user->name}}</a></td>
                                    <td>
                                        <span class="{{ ( ! empty($user->role->display_name) ? 'tag tag-info' : 'tag tag-default') }}">{{$user->role->display_name or 'Utilisateur'}}</span>
                                    </td>
                                    <td>{{date('d F Y', strtotime($user->created_at))}}</td>
                                    <td>
                                        <form name="{{ 'userDeletForm_'.$user->id  }}"
                                              id="{{ 'userDeletForm_'.$user->id  }}" class="form-horizontal delete-me"
                                              role="form" method="POST"
                                              action="{{ url('/admin/user/'.$user->id) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                                        </form>
                                        <button onclick="confirmeDelet('userDeletForm_',{{$user->id}});"
                                                class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-trash"
                                                                                 aria-hidden="true"></i></button>
                                    </td>
                                    <td>
                                        @if (! $user->is_active)
                                            <a href="{{ url('admin/user/'.$user->id.'/active') }}"
                                               class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Activer l'utilisateur"><i class="fa fa-toggle-off"
                                                                                   aria-hidden="true"></i></a>
                                        @else
                                            <a href="{{ url('admin/user/'.$user->id.'/active') }}"
                                               class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Désactiver l'utiisateur"><i class="fa fa-toggle-on"
                                                                                 aria-hidden="true"></i></a>
                                        @endif
                                    </td>


                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer" >
                        <a class="btn btn-sm btn-outline-warning" href="">Supprimer les éléments selectionnés</a>
                    </div>
                </div>
            </div>
        </div>

@endsection
