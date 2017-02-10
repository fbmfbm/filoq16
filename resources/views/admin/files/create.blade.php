@extends('layouts.admin_main')

@section('title','Gestion des Fichiers et annexes')

@section('content')
    <div class="container-fluid" ng-controller="FileCtrl">
        <div class="row text-center">
            <div class="col-md-12">
                <h3 class=""><i class="fa  fa-files-o text-primary"></i> CRÉATION D'UN DOCUMENT TÉLÉCHARGABLE</h3>
                <hr>
            </div>
        </div>
        <div class="col-sm-12 col-md-6  offset-md-3">
            <a href="{{ url('/admin/file/') }}"><i class="fa fa-undo" aria-hidden="true"></i> Retour à la liste des fichiers</a>
            <div class="card">
                <div class="card-header">
                    <h4>Sélection d'un ichier</h4>
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
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/admin/file')}}">
                    {!! csrf_field() !!}
                        <p>
                            <i>Sélectionner un fichier à importer. le fichier ne peut excéder la taille de 10 Mo et ne peut être constitué que des types suivants :</i>
                        <ul>
                            <li>PDF</li>
                            <li>CSV</li>
                            <li>ODS</li>
                            <li>PPT</li>
                            <li>DOC</li>
                            <li>XLS/XLSX</li>
                            <li>IMAGES (JPG/JPEG/GIF/PNG)</li>
                        </ul>
                        </p>
                        <br>

                        <input type=file name="filefield" accept=".xlsx,.xls,image/*,.doc, .docx.,.ppt, .pptx,.txt,.pdf" file-model="file">

                        <div >

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class=" control-label">Nom</label>
                            <input type="text" class="form-control" name="name" ng-model="file.name" readonly>
                            @if ($errors->has('name'))
                                <span class="help-block text-info">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class=" control-label">Titre</label>
                            <input type="text" class="form-control" name="title" >
                            @if ($errors->has('title'))
                                <span class="help-block text-info">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class=" control-label">Description</label>
                            <textarea rows="4" cols="50"class="form-control" name="description"></textarea>
                            @if ($errors->has('description'))
                                <span class="help-block text-info">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class=" control-label">Type</label>

                            <input ng-if="file.type==''" type="text" class="form-control" name="type"  value="" readonly>
                            <input ng-if="file.type!=''" type="text" class="form-control" name="type" ng-model="file.type" readonly>
                            @if ($errors->has('type'))
                                <span class="help-block text-info">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                            @endif
                        </div>
                          <div class="form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                                <label for="size" class=" control-label">Taille </label>
                                <input type="text" class="form-control" name="size" ng-model="file.size" readonly>
                              <p>@{{ file.size }} octets, soit @{{ file.size/1024 | number : 0}} Ko ou @{{ file.size/102400 | number : 1}} Mo</p>
                                @if ($errors->has('size'))
                                    <span class="help-block text-info">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                @endif
                          </div>
                        <div class="form-group">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                Enregistrer
                            </button>
                            <a href="{{ url('/admin/file') }}" class="btn btn-outline-secondary"><i
                                        class="fa fa-undo" aria-hidden="true"></i> Annuler</a>

                        </div>
                        </div><!-- end ng)if -->
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection