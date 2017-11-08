@extends('layouts.admin_main')

@section('title','Logs de l\'application')

@section('content')

 <div class="container-fluid">
        <div class="row text-center">
            <div class="col-md-12">
    
    <h2 class="page-title"><i class="fa fa-line-chart text-primary" aria-hidden="true"></i> LOG ET USAGES</h2>
     <p>Les traces sont stockées en base de données.</p>
    <div class="card">

            <div class="card-body">
            @if(count($stats) > 0)
                            {!! $stats->render(new \Illuminate\Pagination\BootstrapFourPresenter($stats)) !!}
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
                                    <td>{{ $logstat->description }}</td>
                                    <td>({{ $logstat->user_id }}) {{ $logstat->user_name }}</td>
                                    <td>{{ $logstat->user_ip }}</td>
                                    <td>{{ date('d/m/Y | H\h i-s', strtotime($logstat->created_at)) }}</td>
                     <td>
                        <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                     </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
               {!! $stats->render(new \Illuminate\Pagination\BootstrapFourPresenter($stats)) !!}
          @else
            <p>Pas de donnée dans votre base</p>
            @endif
            </div>
    </div>

    </div>
</div>
</div>
@stop

                
