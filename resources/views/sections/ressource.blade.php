@extends('layouts.app')

@section('content')
    <br>
    <div class="container container-fluid" ng-controller="OffreCtrl" >
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-hand-o-left text-info" aria-hidden="true"></i> Ressources</h3>
                <hr>
            </div>
            <div class="col-md-8">
                @foreach($files as $file)
                    <div class="card">
                        <div class="card-block">
                            <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> {{$file->short_title}}
                            <p class="fbm-sm"><i>{{$file->description}}</i></p>
                        </div>
                        <div class="card-footer">
                            @if($file->type == 'xls' || $file->type == 'sxsl')
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i> <a href="{{route('getfileentry', $file->name)}}">Télécharger le fichier au format Excel <i>({{round($file->size/1024,0)}}Ko/{{round($file->size/1048576,1)}}Mo)</i></a>
                            @elseif($file->type == 'pdf')
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <a href="{{route('getfileentry', $file->name)}}">Télécharger le fichier au format PDF <i>({{round($file->size/1024,0)}}Ko/{{round($file->size/1048576,1)}}Mo)</i></a>
                            @elseif($file->type == 'doc' || $file->type == 'docs')
                                <i class="fa fa-file-word-o" aria-hidden="true"></i> <a href="{{route('getfileentry', $file->name)}}">Télécharger le fichier au format Word<i>({{round($file->size/1024,0)}}Ko/{{round($file->size/1048576,1)}}Mo)</i></a>
                            @elseif($file->type == 'csv' || $file->type == 'txt' )
                                <i class="fa fa-file-text-o" aria-hidden="true"></i> <a href="{{route('getfileentry', $file->name)}}">Télécharger le fichier au format txt <i>({{round($file->size/1024,0)}}Ko/{{round($file->size/1048576,1)}}Mo)</i></a>
                            @elseif($file->type == 'png' || $file->type == 'gif' ||$file->type == 'jpg'  || $file->type == 'jpeg')
                                <i class="fa fa-file-picture-o" aria-hidden="true"></i> <a href="{{route('getfileentry', $file->name)}}">Télécharger le fichier au format image <i>({{round($file->size/1024,0)}}Ko/{{round($file->size/1048576,1)}}Mo)</i></a>
                            @else
                                <i class="fa fa-file" aria-hidden="true"></i> <a href="{{route('getfileentry', $file->name)}}">Télécharger le fichier <i>({{round($file->size/1024,0)}}Ko/{{round($file->size/1048576,1)}}Mo)</i></a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection