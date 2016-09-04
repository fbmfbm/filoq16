@extends('layouts.admin_main')

@section('title','Logs de l\'application')

@section('content')

 <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
    
    <h2 class="page-title"><i class="fa fa-line-chart" aria-hidden="true"></i> LOG ET USAGES</h2>
     <p>Les traces sont stockées en base de données.</p>

    @if(count($stats) > 0)

                <table class="table table-bordered table-striped table-sm">
                        <thead class="">
                            <tr>
                                <th>Type</th>
                                <th>Nom</th>
                                <th>Util. ID</th>
                                <th>Util. IP</th>
                                <th>Date de création</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($stats as $logstat)
                        <tr>
                            <td>{{ $logstat->type }}</td>
                            <td>{{ $logstat->name }}</td>
                            <td>({{ $logstat->user_id }}) {{ $logstat->user_name }}</td>
                            <td>{{ $logstat->user_ip }}</td>           
                            <td>{{ date('D d M Y | H\h i-s', strtotime($logstat->created_at)) }}</td>           
             <td>
                <a href="" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
             </td>
            </tr>
        @endforeach
        </tbody>
        </table>
  @else
    <p>Pas de donnée dans votre base</p>
    @endif

    </div>
</div>
</div>
@stop

                
