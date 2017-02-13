@extends('layouts.app')

@section('content')
    <br>
    <div class="container container-fluid"  >
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-sitemap text-info" aria-hidden="true"></i> Ressources</h3>
                <hr>

            </div>
            <div class="col-md-11">
            <h5 class="text-info"><i class="fa fa-arrow-circle-right " aria-hidden="true"></i> 1 - Méthodologie</h5>
            <hr>
            <p><i><span class="bold">Ressources méthodologiques pour la compréhension et l’analyse des données de la base FiloQ.</span> La base FiloQ a été réalisée à partir du fichier Filocom et contient des données correspondant au périmètre exact des quartiers (QRU ou QPV). Cette base a été réalisée sur la base de l’ancienne géographie prioritaire (celle des ZUS). Les données sont disponibles pour les millésimes 2003 et 2013 pour les ZUS ayant fait l’objet d’une convention ANRU ainsi que pour l’échelle communale. Par ailleurs, les données sont également disponibles pour l’ensemble des « bordures » de 500 m autour des quartiers, cette échelle n’est disponible que pour la somme des bordures présentent dans une même commune (dans le cas d’un commune comptant plusieurs ZUS).
            </i></p>
                @foreach($files as $file)
                    @if($file->rubrique_id==1)
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
                        @endif
                @endforeach
                <br>
                    <h5 class="text-info"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> 2 - Études et rapport</h5>
                    <hr>
                @foreach($files as $file)
                    @if($file->rubrique_id==2)
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
                    @endif
                @endforeach
                <br>
                <h5 class="text-info"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> 3 - Textes réglementaires</h5>
                <hr>
                @foreach($files as $file)
                    @if($file->rubrique_id==3)
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
                    @endif
                @endforeach
        </div>
    </div>
@endsection