@extends('layouts.admin_main')

@section('title','Gestion des Fichiers et annexes')

@section('content')
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class=""><i class="fa  fa-files-o text-primary"></i> DOCUMENTS TÉLÉCHARGABLES</h3>
                <hr>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if($total_files_size < 800000000)
                    <a class="btn btn-outline-primary" href="/admin/file/create" data-toggle="tooltip"
                       data-placement="top" title="Ajouter un nouveau fichier">
                        <i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                        @else
                        <a class="btn btn-outline-primary disabled" href="#" data-toggle="tooltip" data-placement="top" title="Ajouter un nouveau fichier"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                        <div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Vous avez atteins les limites de votre espace de stockage (80Mo) et vous ne pouvez plus ajouter de fichiers</div>
                        @endif
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

                    @if(count($ref_files) > 0)
                            <table class="table table-bordered table-hover table-striped table-sm">
                                <tr>
                                    <th>id</th>
                                    <th>nom</th>
                                    <th>date de création</th>
                                    <th>titre</th>
                                    <th>type</th>
                                    <th>Taille</th>
                                    <th>visible</th>
                                    <th></th>
                                </tr>
                                @foreach($ref_files as $ref)
                                    <tr>
                                        <td>{{$ref->id}}</td>
                                        <td><a href="{{ url('/admin/file/'.$ref->id) }}" data-toggle="tooltip" data-placement="bottom" title="{{$ref->description}}">{{$ref->name}}</a></td>
                                        <td>{{date('d/m/Y', strtotime($ref->created_at))}}</td>
                                        <td>{{$ref->short_title}}</td>
                                        <td>{{$ref->type}}</td>
                                        <td>{{ round($ref->size/1024,1)}} Ko</td>
                                        <td>
                                            <a href="{{ url('/admin/file/visible/'.$ref->id) }}"  class="btn btn-sm btn-primary" ng-if="{{$ref->active}}" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{ url('/admin/file/visible/'.$ref->id) }}"  class="btn btn-sm btn-secondary" ng-if="{{$ref->active == 0}}"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <form name="{{ 'fileDeletForm_'.$ref->id  }}"
                                                  id="{{ 'fileDeletForm_'.$ref->id  }}" class="form-horizontal delete-me"
                                                  role="form" method="POST"
                                                  action="{{ url('/admin/file/'.$ref->id) }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" id="id" value="{{ $ref->id }}">
                                            </form>
                                            <button onclick="confirmeDelet('fileDeletForm_',{{$ref->id}});"
                                                    class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <div class="alert alert-info">Votre application ne possède aucun fichier en téléchargement</div>
                        @endif

                        @if (count($files) > 0)
                            <a href="#" ng-click="display_stock= !display_stock"><i class="fa fa-stack-overflow" aria-hidden="true"></i> Afficher/masquer l'espace de stockage actuel</a>
                            <br>
                            <div ng-show="display_stock" @{{ display_stock = false }}>
                                    <p class="text-primary"> <i class="fa fa-sitemap" aria-hidden="true"></i> Taille totale de stockage => <span class="badge">{{round($total_files_size/1024,0)}}Ko</span> soit <span class="badge">{{round($total_files_size/1048576,1)}}Mo</span></p>
                                    <table class="table table-bordered table-striped table-sm">
                                        <tr>
                                            <th>Fichiers </th>
                                        </tr>
                                        @foreach($files as $file)
                                            <tr>
                                                <td>{{$file}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p>Votre espace de stockage est vide</p>
                                @endif
                            </div>
                    </div>
                </div>
        </div>
    </div>

@endsection