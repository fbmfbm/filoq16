@extends('layouts.admin_main')

@section('title','Gestion des Roles')

@section('content')

    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class=""><i class="fa fa-cube text-primary"></i> LISTE DES ROLES</h3>
                <hr>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @can('add_role')
                        <a class="btn btn-outline-primary" href="/admin/role/create" data-toggle="tooltip"
                           data-placement="top" title="Ajouter un nouveau role">

                            <i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                            @else
                            <button class="btn btn-outline-primary" href="#" data-toggle="tooltip" data-placement="top" title="Ajouter un nouveau role" disabled> <i class="fa fa-plus-square-o" aria-hidden="true"></i></button>
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
                            <tr>
                                <th>id</th>
                                <th>Nom</th>
                                <th>Affichage</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            @foreach( $roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>

                                    <td><a href="/admin/role/{{$role->id}}">{{$role->name}}</a></td>
                                    <td>{{$role->display_name}}</td>
                                    <td>{{date('d F Y', strtotime($role->created_at))}}</td>
                                    <td>

                                        <form name="{{ 'roleDeletForm_'.$role->id  }}"
                                              id="{{ 'roleDeletForm_'.$role->id  }}" class="form-horizontal delete-me"
                                              role="form" method="POST"
                                              action="{{ url('/admin/role/'.$role->id) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="id" id="id" value="{{ $role->id }}">
                                        </form>
                                        @can('del_role')
                                        <button onclick="confirmeDelet('roleDeletForm_',{{ $role->id }} );"
                                                class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top"
                                                title="Supprimer">
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
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h3><i class="fa fa-clone" aria-hidden="true"></i> GESTION DES PERMISSIONS</h3>
                    </div>

                    <div class="card-block">
                        <table class="table table-bordered table-hover table-striped table-sm">
                            <tr>
                                <th>permissions</th>
                                @foreach( $roles as $role)
                                    <th>{{$role->name}}({{$role->id}})</th>
                                @endforeach
                                <th>Effacer</th>
                            </tr>
                            @foreach( $permissions as $perm)
                                <tr>
                                    <td>({{$perm->id}}) {{$perm->display_name}}</td>

                                    <!--- checkbox -->
                                    @foreach( $roles as $role)
                                        <td>
                                            {{$test = false}}
                                            @if(isset($role->Permissions->first()->name))
                                                @foreach($role->Permissions as $perm_check)
                                                    @if($perm->name == $perm_check->name)
                                                        {{$test=true}}
                                                    @endif
                                                @endforeach
                                            @else
                                            @endif
                                            @can('edit_perm')
                                            <input type="checkbox" id="" class=""
                                                   name="{{'check_perm'.$perm->id."_as_".$role->id}}"
                                                   {{($test==true)?'checked':''}} value="" onchange="togglePermission({{$role->id.','.$perm->id, url('admin/role')}})">
                                                @else
                                                <input type="checkbox" id="" class=""
                                                       name="{{'check_perm'.$perm->id."_as_".$role->id}}"
                                                       {{($test==true)?'checked':''}} disabled>
                                            @endcan
                                        </td>
                                @endforeach
                                <!-- end Checkbox -->


                                    <td>
                                        @can('edit_perm')
                                        <a href="#" class="btn btn-secondary btn-sm" data-toggle="tooltip"
                                           data-placement="top" title="Effacer la permission pour tous les roles"><i class="fa fa-eraser"
                                                                                              aria-hidden="true"></i></a>
                                            @else
                                            <a href="#" class="btn btn-secondary btn-sm disabled"  data-placement="top" title="Effacer la permission pour tous les roles"><i class="fa fa-eraser"aria-hidden="true"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
