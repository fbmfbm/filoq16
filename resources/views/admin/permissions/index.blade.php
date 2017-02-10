@extends('layouts.admin_main')

@section('title','Gestion des Permissions')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class=""><i class="fa fa-clone text-primary" aria-hidden="true"></i> LISTE DES PERMISSSIONS</h3>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @can('add_perm')
                        <a class="btn btn-outline-primary" href="/admin/permission/create" data-toggle="tooltip" data-placement="top" title="Ajouter une nouvelle permission"> <i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                        @else
                            <button class="btn btn-outline-primary" href="#" data-toggle="tooltip" data-placement="top" title="Ajouter une nouvelle permission" disabled> <i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
                        @endcan
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
                    <tr><th>id</th><th>Nom</th><th>Affichage</th><th>Date</th><th></th></tr>
                    @foreach( $permissions as $permission)
                        <tr><td>{{$permission->id}}</td>
                            <td><a href="/admin/permission/{{$permission->id}}">{{$permission->name}}</a></td>
                            <td><a href="/admin/permission/{{$permission->id}}">{{$permission->display_name}}</a></td>
                            <td>{{date('d F Y', strtotime($permission->created_at))}}</td>
                            <td>

                                <form name="{{ 'roleDeletForm_'.$permission->id  }}"
                                      id="{{ 'roleDeletForm_'.$permission->id  }}" class="form-horizontal delete-me"
                                      role="form" method="POST"
                                      action="{{ url('/admin/permission/'.$permission->id) }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" id="id" value="{{ $permission->id }}">
                                </form>
                                @can('del_perm')
                                <button onclick="confirmeDelet('roleDeletForm_',{{$permission->id}});"
                                        class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                                    @else
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer" disabled>
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                @endcan
                            </td>
                    @endforeach
                </table>
                    </div>
                    <div class="card-footer" >

                    </div>
                </div>
            </div>
        </div>
@endsection
