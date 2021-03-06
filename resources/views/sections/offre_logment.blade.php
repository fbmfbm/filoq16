@extends('layouts.app')

@section('content')
<br>
<div class="container container-fluid" ng-controller="OffreCtrl" >
<script type="text/javascript">
    var _convent = '{{$convent}}';
</script>
    <div class="row">
        <div class="col-md-12">
        <a href="{{ url('/zonage') }}"><i class="fa fa-hand-o-left text-info" aria-hidden="true"></i> Selectionner un autre territoire</a>
        <hr>
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" ng-href=""><i class="fa fa-th-list text-info" aria-hidden="true"></i> Structure de l'offre et profil des ménages </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/thema/construct/@{{codeRef}}"><i class="fa fa-th-list text-info" aria-hidden="true"></i> Dynamique de construction et mobilités</a>
          </li>
        </ul>
            <div class="card ">
                <div class="card-header">Structure de l'offre de logement et profil démographique </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class='lead'>
                                <p><span class="text-muted">Quartier PRU : </span><strong class="text-info">@{{ter1Label}}</strong> <span class='text-muted'>(@{{codeRef}})</span><br><br>
                                    Commune :<strong>@{{nomcom}}</strong> <span class='text-muted'>(@{{dt1[0].code_com}})</span><br>
                                    <span class="small">Population totale : @{{ dt3[0].b61_com | number:0}}</span></p>
                                <p class="text-info">Le quartier compte @{{dt1[1].b61 | number:0}} habitants</p>
                                <p>Il représente : </p>

                                <span class="fbm-chiffre-cle"><i class="fa fa-home" aria-hidden="true"></i>  <span class="fbm-badge"> @{{(dt1[1].a0 / dt3[0].a0_com)*100 | number:1}} % </span> </span> des logements de la commune<br>
                                <span class="fbm-chiffre-cle"><i class="fa fa-building" aria-hidden="true"></i>  <span class="fbm-badge">  @{{(dt1[1].a4 / dt3[0].a4_com)*100 | number:1}} % </span></span> des logements HLM de la commune<br>
                                <span class="fbm-chiffre-cle"><i class="fa fa-male" aria-hidden="true"></i> <span class="fbm-badge">  @{{(dt1[1].b61 / dt3[0].b61_com)*100 | number:1}} % </span> de la population de la commune</span>
                                <br>
                                {{--<p><span class="font-italic fbm-sm">( soit Population totale pour la commune  @{{nomcom}} : @{{ dt3[0].b61_com | number:0}} et population du territoire @{{ter1Label}} : @{{dt1[1].b61 | number:0}} )</span></p>--}}
                            </h1>
                            <br>
                        </div>
                    </div><!-- end row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="fbm-encart">
                                <h4><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:#000;"></i> Remarques sur les échelles : </h4>
                                <p><strong class="text-primary" data-toggle="tooltip" data-placement="top" title="Quartier Programme de Rénovation Urbaine">QRU :</strong> Le périmètre comprend l’ensemble du QRU. En cas de PRU intercommunal les logements situés sur la ou les commune(s) limitrophe(s) sont inclus.</p>
                                <p><strong class="text-primary" data-toggle="tooltip" data-placement="top" title="Bordures des 500m du quartier">Bordures 500m du quartier :</strong> Le périmètre comprend la somme des bordures de l’ensemble des QRU et des ZUS présents sur la commune. Attention les données diffusées ne concernent que les données communales, même lorsque la bordure dépasse la frontière communale.</p>
                                <p><strong class="text-primary" data-toggle="tooltip" data-placement="top" title="Commune hors limites QRU">Commune hors QRU :</strong> Les données diffusées concernent l’ensemble de la commune hors QRU et hors ZUS.</p>
                                {{--<p><i>Attention en cas de PRU intercommunal les données de référence (bordure et commune) ne concernent que la commune principale (commune sur laquelle le PRU est implanté le plus largement).</i></p>--}}
                            </div>

                            <div id="map2" class=""> </div>
                            <p class="fbm-sources-sm text-right" style="margin-right: 2em;">sources : OpenStreetMap & GéoPortail 2017</p>
                        </div>
                    </div><!-- end row -->
                    <br>
                </div>
            </div><!-- end card -->
        </div>
    </div><!-- end row -->
    <!-- start tabs-->

        <ul class="nav nav-tabs fbm-print-remove" role="tablist">
          <li class="nav-item">
            <a class="nav-link" ng-class="{active : setTab === 1}"  data-toggle="tab" href="#sec1" role="tab" >Offre de logement et profil démographique</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" ng-class="{active : setTab === 2}" data-toggle="tab" href="#sec2" role="tab" >Revenus et mobilité des ménages</a>
          </li>
        </ul>

     <!-- end tabs-->
     <!-- Tab panes -->
     <div class="tab-content ">
         <div  class="tab-pane  active"  id="sec1" role="tabpanel"><!-- tab sec 1 -->
            <div class="row">
                
                <div class="col-md-12">
                  <br>
                    <a href="#"  class="btn btn-info btn-sm btn-export" ng-click="tableToJson(1, 'logmt_demo')" data-toggle="tooltip" data-placement="top" title="Exporter les données au format CSV"><i class="fa fa-floppy-o" aria-hidden="true"></i> csv</a><h3 class="fbm-tab-sec-title">OFFRE DE LOGEMENT et PROFIL DÉMOGRAPHIQUE</h3>
                 <i>(<i class="fa fa-line-chart text-info" aria-hidden="true"></i><span class="text-muted"> = Données en taux d'évolution</span>)</i>
                 </div>
                 
            </div><!-- end row -->
            <div class="row">
                <div class="col-md-6" >
                   <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Total logements et vacance </span>
                      <table class="table table-sm table-bordered table-striped fbm-table" id="table_1a">
                              <thead>
                              <tr id="title">
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-pru" aria-hidden="true"></i> @{{ter1Label}} (@{{codeDep}})</th>
                              </tr>
                              <tr class="text-center fbm-table-header" id="date">
                                  <th></th>
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                              </tr>
                                <tr  class="table-active" id="tr_header">
                                  <th></th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row">Nombre total de lgts</td><td><span class="secret-value" ng-if="dt1[0].a0=='s'">S</span>@{{dt1[0].a0 | number:0}}</td><td></td><td><span class="secret-value" ng-if="dt1[1].a0=='s'">S</span>@{{dt1[1].a0 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].a0*1)-(dt1[0].a0*1))/(dt1[1].a0*1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row" class="pl-4">Dt. lgts vacants</td><td><span class="secret-value" ng-if="dt1[0].a62=='s'|| dt1[0].a63=='s'">S</span>@{{(dt1[0].a62*1) + (dt1[0].a63*1)| number:0 }}</td><td>@{{(((dt1[0].a62*1) + (dt1[0].a63*1))/dt1[0].a0*1)*100| number:1 }}%</td><td><span class="secret-value" ng-if="dt1[1].a62=='s'||t1[1].a63=='s'">S</span>@{{(dt1[1].a62*1) + (dt1[1].a63*1)| number:0 }}</td><td>@{{(((dt1[1].a62*1) + (dt1[1].a63*1))/dt1[1].a0*1)*100| number:1 }}%</td></tr>
                                <tr><td scope="row" class="pl-5">Dt. privé (% / parc priv.)</td><td><span class="secret-value" ng-if="dt1[0].a62=='s'">S</span>@{{dt1[0].a62  | number:0}}</td><td>@{{((dt1[0].a62*1)/((dt1[0].a62*1)+(dt1[0].a2*1)+(dt1[0].a3*1)))*100 | number:1 }}%</td><td>@{{dt1[1].a62  | number:0}}</td><td><span class="secret-value" ng-if="dt1[1].a62=='s'">S</span>@{{((dt1[1].a62*1)/((dt1[1].a62*1)+(dt1[1].a2*1)+(dt1[1].a3*1)))*100 | number:1 }}%</td></tr>
                                <tr><td scope="row" class="pl-5">Dt. public (% / parc HLM)</td><td><span class="secret-value" ng-if="dt1[0].a63=='s'">S</span>@{{dt1[0].a63 | number:0}}</td><td>@{{(dt1[0].a63*1) /((dt1[0].a4*1)+(dt1[0].a63*1))*100| number:1 }}%</td><td><span class="secret-value" ng-if="dt1[1].a63=='s'">S</span>@{{dt1[1].a63 | number:0}}</td><td>@{{(dt1[1].a63*1) /((dt1[1].a4*1)+(dt1[1].a63*1))*100| number:1 }}%</td></tr>
                               </tbody>
                          </table>
                   </div>
                   <div class="col-md-3">
                    <br>
                     <table class="table table-sm table-bordered table-striped fbm-table" id="table_1b">
                       <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (bordure 500m)</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" > 
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td><span class="secret-value" ng-if="dt2[0].a0=='s'">S</span>@{{dt2[0].a0 | number:0}}</td><td></td><td><span class="secret-value" ng-if="dt2[0].a0=='s'">S</span>@{{dt2[1].a0 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt2[1].a0*1)-(dt2[0].a0*1))/(dt2[1].a0*1)*100 | number:1}}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt2[0].a62=='s'||dt2[0].a63=='s'">S</span>@{{(dt2[0].a62*1) + (dt2[0].a63*1)| number:0 }}</td><td>@{{(((dt2[0].a62*1) + (dt2[0].a63*1))/dt2[0].a0*1)*100| number:1 }}%</td><td><span class="secret-value" ng-if="dt2[0].a0=='s'">S</span>@{{(dt2[1].a62*1) + (dt2[1].a63*1)| number:0 }}</td><td>@{{(((dt2[1].a62*1) + (dt2[1].a63*1))/dt2[1].a0*1)*100| number:1 }}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt2[0].a62=='s'">S</span>@{{dt2[0].a62  | number:0}}</td><td>@{{((dt2[0].a62*1)/((dt2[0].a62*1)+(dt2[0].a2*1)+(dt2[0].a3*1)))*100 | number:1 }}%</td><td><span class="secret-value" ng-if="dt2[0].a0=='s'">S</span>@{{dt2[1].a62  | number:0}}</td><td>@{{((dt2[1].a62*1)/((dt2[1].a62*1)+(dt2[1].a2*1)+(dt2[1].a3*1)))*100 | number:1 }}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt2[0].a63=='s'">S</span>@{{dt2[0].a63 | number:0}}</td><td>@{{(dt2[0].a63*1) /((dt2[0].a4*1)+(dt2[0].a63*1))*100| number:1 }}%</td><td><span class="secret-value" ng-if="dt2[0].a0=='s'">S</span>@{{dt2[1].a63 | number:0}}</td><td>@{{(dt2[1].a63*1) /((dt2[1].a4*1)+(dt2[1].a63*1))*100| number:1 }}%</td></tr>
                               </tbody>
                       </table>
                    </div>
                    <div class="col-md-3">
                       <br>
                        <table class="table table-sm table-bordered table-striped fbm-table" id="table_1c">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors QRU et ZUS</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td>@{{dt3[0].a0 | number:0}}</td><td></td><td>@{{dt3[1].a0 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt3[1].a0*1)-(dt3[0].a0*1))/(dt3[1].a0*1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{(dt3[0].a62*1) + (dt3[0].a63*1)| number:0 }}</td><td>@{{(((dt3[0].a62*1) + (dt3[0].a63*1))/dt3[0].a0*1)*100| number:1 }}%</td><td>@{{(dt3[1].a62*1) + (dt3[1].a63*1)| number:0 }}</td><td>@{{(((dt3[1].a62*1) + (dt3[1].a63*1))/dt3[1].a0*1)*100| number:1 }}%</td></tr>
                                <tr><td>@{{dt3[0].a62  | number:0}}</td><td>@{{((dt3[0].a62*1)/((dt3[0].a62*1)+(dt3[0].a2*1)+(dt3[0].a3*1)))*100 | number:1 }}%</td><td>@{{dt3[1].a62  | number:0}}</td><td>@{{((dt3[1].a62*1)/((dt3[1].a62*1)+(dt3[1].a2*1)+(dt3[1].a3*1)))*100 | number:1 }}%</td></tr>
                                <tr><td>@{{dt3[0].a63 | number:0}}</td><td>@{{(dt3[0].a63*1) /((dt3[0].a4*1)+(dt3[0].a63*1))*100| number:1 }}%</td><td>@{{dt3[1].a63 | number:0}}</td><td>@{{(dt3[1].a63*1) /((dt3[1].a4*1)+(dt3[1].a63*1))*100| number:1 }}%</td></tr>
                               </tbody>
                            </table>
                      </div>
                <p class="fbm-sources-sm">Sources : FILOCOM 2013 - MEEM d'après DGFIP </p>
                </div><!-- end row -->
                 <!-- ########################################## TABLEAU B ################################################################## -->
                <div class="row">
                   <div class="col-md-6">
                                <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Statut d'occupation</span>
                                <table class="table table-sm table-bordered table-striped fbm-table" id="table_2a">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-pru" aria-hidden="true"></i> @{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th></th>
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row">Total Résidences principales</td><td><span class="secret-value" ng-if="dt1[0].a1=='s'">S</span>@{{dt1[0].a1 | number:0}}</td><td></td><td>@{{dt1[1].a1 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].a1*1)-(dt1[0].a1*1))/(dt1[1].a1*1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row" class="pl-4">Dt. logements Parc Privé</td><td><span class="secret-value" ng-if="dt1[0].a2=='s'||dt1[0].a3=='s'">S</span>@{{(dt1[0].a2*1) +(dt1[0].a3*1) | number:0}}</td><td>@{{(((dt1[0].a2*1)+(dt1[0].a3*1))/dt1[0].a1)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a2=='s'||dt1[1].a3=='s'">S</span>@{{(dt1[1].a2*1) +(dt1[1].a3*1) | number:0}}</td><td>@{{(((dt1[1].a2*1) +(dt1[1].a3*1)) /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row" class="pl-5">Dt. Propriétaires occupants</td><td><span class="secret-value" ng-if="dt1[0].a2=='s'">S</span>@{{dt1[0].a2 | number:0}}</td><td>@{{(dt1[0].a2 /dt1[0].a1)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a2=='s'">S</span>@{{dt1[1].a2 | number:0}}</td><td>@{{(dt1[1].a2 /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row" class="pl-5">Dt. Locataires du parc privé</td><td><span class="secret-value" ng-if="dt1[0].a3=='s'">S</span>@{{dt1[0].a3 | number:0}}</td><td>@{{(dt1[0].a3 /dt1[0].a1)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a3=='s'">S</span>@{{dt1[1].a3 | number:0}}</td><td>@{{(dt1[1].a3 /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row" class="pl-4">Dt. Locataires du HLM</td><td><span class="secret-value" ng-if="dt1[0].a4=='s'">S</span>@{{dt1[0].a4 | number:0}}</td><td>@{{(dt1[0].a4 /dt1[0].a1)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a4=='s'">S</span>@{{dt1[1].a4 | number:0}}</td><td>@{{(dt1[1].a4 /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row" class="pl-4">Dt. Autres statuts d'occupation</td><td><span class="secret-value" ng-if="dt1[0].a5=='s'">S</span>@{{dt1[0].a5 | number:0}}</td><td>@{{(dt1[0].a5 /dt1[0].a1)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a5=='s'">S</span>@{{dt1[1].a5 | number:0}}</td><td>@{{(dt1[1].a5 /dt1[1].a1)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                  </div>
                   <div class="col-md-3">
                                      <br>
                                     <table class="table table-sm table-bordered table-striped fbm-table" id="table_2b">
                              <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (bordure 500m)</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" > 
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td>@{{dt2[0].a1 | number:0}}</td><td></td><td>@{{dt2[1].a1 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt2[1].a1*1)-(dt2[0].a1*1))/(dt2[1].a1*1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{(dt2[0].a2*1) +(dt2[0].a3*1) | number:0}}</td><td>@{{(((dt2[0].a2*1)+(dt2[0].a3*1))/dt2[0].a1)*100 | number:1}}%</td><td>@{{(dt2[1].a2*1) +(dt2[1].a3*1) | number:1}}</td><td>@{{(((dt2[1].a2*1) +(dt2[1].a3*1)) /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a2 | number:0}}</td><td>@{{(dt2[0].a2 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a2 | number:0}}</td><td>@{{(dt2[1].a2 /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a3 | number:0}}</td><td>@{{(dt2[0].a3 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a3 | number:0}}</td><td>@{{(dt2[1].a3 /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a4 | number:0}}</td><td>@{{(dt2[0].a4 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a4 | number:0}}</td><td>@{{(dt2[1].a4 /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a5 | number:0}}</td><td>@{{(dt2[0].a5 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a5 | number:0}}</td><td>@{{(dt2[1].a5 /dt2[1].a1)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
               </div>
               <div class="col-md-3">
                <br>
                   <table class="table table-sm table-bordered table-striped fbm-table" id="table_2c">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors QRU et ZUS</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center"></th>
                                  <th class="text-center">%</th>
                                  <th class="text-center"></th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td>@{{dt3[0].a1 | number:0}}</td><td></td><td>@{{dt3[1].a1 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt3[1].a1*1)-(dt3[0].a1*1))/(dt3[1].a1*1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{(dt3[0].a2*1) +(dt3[0].a3*1) | number:0}}</td><td>@{{(((dt3[0].a2*1)+(dt3[0].a3*1))/dt3[0].a1)*100 | number:1}}%</td><td>@{{(dt3[1].a2*1) +(dt3[1].a3*1) | number:1}}</td><td>@{{(((dt3[1].a2*1) +(dt3[1].a3*1)) /dt3[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a2 | number:0}}</td><td>@{{(dt3[0].a2 /dt3[0].a1)*100 | number:1}}%</td><td>@{{dt3[1].a2 | number:0}}</td><td>@{{(dt3[1].a2 /dt3[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a3 | number:0}}</td><td>@{{(dt3[0].a3 /dt3[0].a1)*100 | number:1}}%</td><td>@{{dt3[1].a3 | number:0}}</td><td>@{{(dt3[1].a3 /dt3[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a4 | number:0}}</td><td>@{{(dt3[0].a4 /dt3[0].a1)*100 | number:1}}%</td><td>@{{dt3[1].a4 | number:0}}</td><td>@{{(dt3[1].a4 /dt3[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a5 | number:0}}</td><td>@{{(dt3[0].a5 /dt3[0].a1)*100 | number:1}}%</td><td>@{{dt3[1].a5 | number:0}}</td><td>@{{(dt3[1].a5 /dt3[1].a1)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                                </div>
                                <div class="col-md-12">
                                <hr>
   
                 </div>
                    <p class="fbm-sources-sm">Sources : FILOCOM 2013 - MEEM d'après DGFIP </p>

             </div><!-- end row -->
            <p style="page-break-before: always">
             <!-- ########################################## TABLEAU C ################################################################## -->
             <div class="row">
                 <div class="col-md-6">
                                  <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Typologie</span>
                                <table class="table table-sm table-bordered table-striped fbm-table" id="table_3a">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-pru" aria-hidden="true"></i> @{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th></th>
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row">1 à 2 pièces</td><td><span class="secret-value" ng-if="dt1[0].a66=='s'">S</span>@{{dt1[0].a66 | number:0}}</td><td>@{{dt1[0].a66/dt1[0].ta66_a68*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a66=='s'">S</span>@{{dt1[1].a66 | number:0}}</td><td>@{{dt1[1].a66/dt1[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td scope="row">3 à 4 pièces</td><td><span class="secret-value" ng-if="dt1[0].a67=='s'">S</span>@{{dt1[0].a67 | number:0}}</td><td>@{{dt1[0].a67/dt1[0].ta66_a68*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a67=='s'">S</span>@{{dt1[1].a67 | number:0}}</td><td>@{{dt1[1].a67/dt1[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>5 pièces ou plus</td><td><span class="secret-value" ng-if="dt1[0].a68=='s'">S</span>@{{dt1[0].a68 | number:0}}</td><td>@{{dt1[0].a68/dt1[0].ta66_a68*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a68=='s'">S</span>@{{dt1[1].a68 | number:0}}</td><td>@{{dt1[1].a68/dt1[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td scope="row" colspan="5"><br></tr>
                                <tr><td scope="row">Population fiscale</td><td><span class="secret-value" ng-if="dt1[0].b61=='s'">S</span>@{{dt1[0].b61 | number:0}}</td><td></td><td>@{{dt1[1].b61 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].b61*1)-(dt1[0].b61*1))/(dt1[0].b61*1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Taille moy. des ménages</td><td><span class="secret-value" ng-if="dt1[0].b60=='s'">S</span>@{{dt1[0].b61/dt1[0].a1 | number:2}}</td><td></td><td><span class="secret-value" ng-if="dt1[1].b60=='s'">S</span>@{{dt1[1].b61/dt1[1].a1  | number:2}}</td><td></td></tr>
                               </tbody>
                            </table>
           </div>
          <div class="col-md-3">
              <br>
                 <table class="table table-sm table-bordered table-striped fbm-table" id="table_3b">
                              <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (bordure 500m)</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" > 
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td>@{{dt2[0].a66 | number:0}}</td><td>@{{dt2[0].a66/dt2[0].ta66_a68*100 | number:1}}%</td><td>@{{dt2[1].a66 | number:0}}</td><td>@{{dt2[1].a66/dt2[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a67 | number:0}}</td><td>@{{dt2[0].a67/dt2[0].ta66_a68*100 | number:1}}%</td><td>@{{dt2[1].a67 | number:0}}</td><td>@{{dt2[1].a67/dt2[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a68 | number:0}}</td><td>@{{dt2[0].a68/dt2[0].ta66_a68*100 | number:1}}%</td><td>@{{dt2[1].a68 | number:0}}</td><td>@{{dt2[1].a68/dt2[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td scope="row" colspan="5"><br></td></tr>
                                <tr><td>@{{dt2[0].b61 | number:0}}</td><td></td><td>@{{dt2[1].b61 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt2[1].b61*1)-(dt2[0].b61*1))/(dt2[0].b61*1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].b61/dt2[0].a1 | number:2}}</td><td></td><td>@{{dt2[1].b61/dt2[1].a1 | number:2}}</td><td></td></tr>
                               </tbody>
              </table>
           </div>
            <div class="col-md-3">
               <br>
                  <table class="table table-sm table-bordered table-striped fbm-table" id="table_3c">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors QRU et ZUS</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td>@{{dt3[0].a66 | number:0}}</td><td>@{{dt3[0].a66/dt3[0].ta66_a68*100 | number:1}}%</td><td>@{{dt3[1].a66 | number:0}}</td><td>@{{dt3[1].a66/dt3[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a67 | number:0}}</td><td>@{{dt3[0].a67/dt3[0].ta66_a68*100 | number:1}}%</td><td>@{{dt3[1].a67 | number:0}}</td><td>@{{dt3[1].a67/dt3[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a68 | number:0}}</td><td>@{{dt3[0].a68/dt3[0].ta66_a68*100 | number:1}}%</td><td>@{{dt3[1].a68 | number:0}}</td><td>@{{dt3[1].a68/dt3[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td scope="row" colspan="5"><br></tr>
                                <tr><td>@{{dt3[0].b61 | number:0}}</td><td></td><td>@{{dt3[1].b61 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt3[1].b61*1)-(dt3[0].b61*1))/(dt3[0].b61*1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].b61/dt3[0].a1 | number:2}}</td><td></td><td>@{{dt3[1].b61/dt3[1].a1 | number:2}}</td><td></td></tr>
                               </tbody>
               </table>
             </div>
             <p class="fbm-sources-sm">Sources : FILOCOM 2013 - MEEM d'après DGFIP </p>

            </div><!-- end row -->
             <!-- ########################################## TABLEAU D ################################################################## -->

             <div class="row">
                 <div class="col-md-6">

                    <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Age personne de référence du ménage</span>
                     <table class="table table-sm table-bordered table-striped fbm-table" id="table_4a">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-pru" aria-hidden="true"></i> @{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th></th>
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row">< 30 ans</td><td><span class="secret-value" ng-if="dt1[0].a18=='s'">S</span>@{{dt1[0].a18 | number:0}}</td><td>@{{(dt1[0].a18/ dt1[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt1[1].a18 | number:0}}</td><td>@{{(dt1[1].a18/ dt1[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">30-39 ans</td><td><span class="secret-value" ng-if="dt1[0].a19=='s'">S</span>@{{dt1[0].a19 | number:0}}</td><td>@{{(dt1[0].a19/ dt1[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt1[1].a19 | number:0}}</td><td>@{{(dt1[1].a19/ dt1[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">40-59 ans</td><td><span class="secret-value" ng-if="dt1[0].a20=='s'">S</span>@{{dt1[0].a20 | number:0}}</td><td>@{{(dt1[0].a20/ dt1[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt1[1].a20 | number:0}}</td><td>@{{(dt1[1].a20/ dt1[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">60-75 ans</td><td><span class="secret-value" ng-if="dt1[0].a21=='s'">S</span>@{{dt1[0].a21 | number:0}}</td><td>@{{(dt1[0].a21/ dt1[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt1[1].a21 | number:0}}</td><td>@{{(dt1[1].a21/ dt1[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">> 75 ans</td><td><span class="secret-value" ng-if="dt1[0].a22=='s'">S</span>@{{dt1[0].a22 | number:0}}</td><td>@{{(dt1[0].a22/ dt1[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt1[1].a22 | number:0}}</td><td>@{{(dt1[1].a22/ dt1[1].ta18_a22)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                  </div>
                  <div class="col-md-3">
                  <br>
                     <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right" id="table_4b">
                              <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (bordure 500m)</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" > 
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                 <tr><td>@{{dt2[0].a18 | number:0}}</td><td>@{{(dt2[0].a18/ dt2[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt2[1].a18 | number:0}}</td><td>@{{(dt2[1].a18/ dt2[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a19 | number:0}}</td><td>@{{(dt2[0].a19/ dt2[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt2[1].a19 | number:0}}</td><td>@{{(dt2[1].a19/ dt2[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a20 | number:0}}</td><td>@{{(dt2[0].a20/ dt2[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt2[1].a20 | number:0}}</td><td>@{{(dt2[1].a20/ dt2[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a21 | number:0}}</td><td>@{{(dt2[0].a21/ dt2[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt2[1].a21 | number:0}}</td><td>@{{(dt2[1].a21/ dt2[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a22 | number:0}}</td><td>@{{(dt2[0].a22/ dt2[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt2[1].a22 | number:0}}</td><td>@{{(dt2[1].a22/ dt2[1].ta18_a22)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                </div>
                <div class="col-md-3">
                   <br>
                    <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right" id="table_4c">
                       <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors QRU et ZUS</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td>@{{dt3[0].a18 | number:0}}</td><td>@{{(dt3[0].a18/ dt3[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt3[1].a18 | number:0}}</td><td>@{{(dt3[1].a18/ dt3[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a19 | number:0}}</td><td>@{{(dt3[0].a19/ dt3[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt3[1].a19 | number:0}}</td><td>@{{(dt3[1].a19/ dt3[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a20 | number:0}}</td><td>@{{(dt3[0].a20/ dt3[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt3[1].a20 | number:0}}</td><td>@{{(dt3[1].a20/ dt3[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a21 | number:0}}</td><td>@{{(dt3[0].a21/ dt3[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt3[1].a21 | number:0}}</td><td>@{{(dt3[1].a21/ dt3[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a22 | number:0}}</td><td>@{{(dt3[0].a22/ dt3[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt3[1].a22 | number:0}}</td><td>@{{(dt3[1].a22/ dt3[1].ta18_a22)*100 | number:1}}%</td></tr>
                               </tbody>
                     </table>
                 </div>
                  <div class="col-md-12">
                      <span class="fbm-table-enphase">Taux de ménages de 60 ans et plus :
                                  <i class="fa fa-arrow-circle-right " aria-hidden="true"></i> 2003 = @{{(((dt1[0].a21/ dt1[0].ta18_a22))+((dt1[0].a22/ dt1[0].ta18_a22)))*100 | number:1}}%   
                                  <i class="fa fa-arrow-circle-right " aria-hidden="true"></i> 2013 = @{{(((dt1[1].a21/ dt1[1].ta18_a22))+((dt1[1].a22/ dt1[1].ta18_a22)))*100 | number:1}}%
                       </span>
                       <hr>    
                   </div>
                 <p class="fbm-sources-sm">Sources : FILOCOM 2013 - MEEM d'après DGFIP </p>
                 </div> <!-- end row -->
                 <!-- ########################################## TABLEAU section 2 A ################################################################## -->
                   <br>
       </div><!-- end tab sec 1 -->
        <div  class="tab-pane "  id="sec2" role="tabpanel"><!-- tab sec 2-->
         
          <div class="row">
            <br>
            <div class="col-md-12">
                <br>
                <a href="#"  class="btn btn-info btn-sm btn-export" ng-click="tableToJson(2,'rev_mob')" data-toggle="tooltip" data-placement="top" title="Exporter les données au format CSV"><i class="fa fa-floppy-o" aria-hidden="true"></i> csv</a><h3 class="fbm-tab-sec-title">REVENUS ET MOBILITÉS DES MÉNAGES </h3>
                 <i>(<i class="fa fa-line-chart text-info" aria-hidden="true"></i><span class="text-muted"> = Données en taux d'évolution</span>)</i>
             </div>
          </div><!-- end row -->
          <div class="row">
             <div class="col-md-6">
                  <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Revenus des ménages</span>
               <table class="table table-sm table-bordered table-striped fbm-table" id="table_5a">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-pru" aria-hidden="true"></i> @{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th></th>
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center"></th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row">Revenu médian par uc</td><td>@{{dt1[0].a15 | number:0}} &#8364</td><td></td><td>@{{dt1[1].a15 | number:0}} &#8364</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].a15 - dt1[0].a15)/dt1[0].a15)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">1<sup>er</sup> décile revenus par uc</td><td>@{{dt1[0].a16 | number:0}} &#8364</td><td></td><td>@{{dt1[1].a16 | number:0}} &#8364</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].a16 - dt1[0].a16)/dt1[0].a16)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Dernier décile revenus par uc</td><td>@{{dt1[0].a17 | number:0}} &#8364</td><td></td><td>@{{dt1[1].a17 | number:0}} &#8364</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].a17 - dt1[0].a17)/dt1[0].a17)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Rapport interdécile</td><td>@{{dt1[0].a17 / dt1[0].a16 | number:2}}</td><td></td><td>@{{dt1[1].a17 / dt1[1].a16 | number:2}}</td><td class="fbm-evol"></td></tr>
                               </tbody>
              </table>
            </div>
             <div class="col-md-3">
                 <br>
                    <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right" id="table_5b">
                              <thead>
                                <tr>
                                  <th colspan="4" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (bordure 500m)</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center"></th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td>@{{dt2[0].a15 | number:0}} &#8364</td><td></td><td>@{{dt2[1].a15 | number:0}} &#8364</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt2[1].a15 - dt2[0].a15)/dt2[0].a15)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a16 | number:0}} &#8364</td><td></td><td>@{{dt2[1].a16 | number:0}} &#8364</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt2[1].a16 - dt2[0].a16)/dt2[0].a16)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a17 | number:0}} &#8364</td><td></td><td>@{{dt2[1].a17 | number:0}} &#8364</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt2[1].a17 - dt2[0].a17)/dt2[0].a17)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a17 / dt2[0].a16 | number:2}}</td><td></td><td>@{{dt2[1].a17 / dt2[1].a16 | number:2}}</td><td class="fbm-evol"> </td></tr>
                               </tbody>
                            </table>
                              
             </div>
            <div class="col-md-3">
                <br>
                  <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right" id="table_5c">
                              <thead>
                                <tr>
                                  <th colspan="4" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors QRU et ZUS</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center"></th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td>@{{dt3[0].a15 | number:0}} &#8364</td><td></td><td>@{{dt3[1].a15 | number:0}} &#8364</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt3[1].a15 - dt3[0].a15)/dt3[0].a15)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a16 | number:0}} &#8364</td><td></td><td>@{{dt3[1].a16 | number:0}} &#8364</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt3[1].a16 - dt3[0].a16)/dt3[0].a16)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a17 | number:0}} &#8364</td><td></td><td>@{{dt3[1].a17 | number:0}} &#8364</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt3[1].a17 - dt3[0].a17)/dt3[0].a17)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a17 / dt3[0].a16 | number:2}}</td><td></td><td>@{{dt3[1].a17 / dt3[1].a16 | number:2}}</td><td class="fbm-evol"></td></tr>
                               </tbody>
                            </table>
             </div>
              <p class="fbm-sources-sm">Sources : FILOCOM 2013 - MEEM d'après DGFIP </p>
             </div><!-- end row -->
             <!-- ########################################## TABLEAU section 2 B ################################################################## -->
              <div class="row">
                  <div class="col-md-6">
                     <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Rapport quartier / environnement et commune hors ZUS</span>
                     <table class="table table-sm   fbm-table" id="table_6a">
                        <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right text-white">--------------</th>
                                </tr>
                                <tr class=" text-center " >
                                  <th></th></th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center"></th></th>
                                </tr>
                              </thead>
                                <tbody class="">
                                  <tr><td scope="row" class="text-right">Revenu médian</td></tr>
                                  <tr><td scope="row" class="text-right">1<sup>er</sup> décile revenus par uc</td></tr>
                                  <tr><td scope="row" class="text-right">Dernier décile revenus par uc</td></tr>
                                </tbody>
                            </table>
                  </div>
                  <div class="col-md-3">
                              <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right" id="table_6b">
                              <thead>
                                <tr>
                                  <th colspan="2" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (bordure 500m)</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th colspan="1">2003</th>
                                  <th colspan="1">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">%</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td>@{{(dt1[0].a15 / dt2[0].a15) *100 | number:0}}%</td><td>@{{(dt1[1].a15 / dt2[1].a15) *100 | number:0}}%</td></tr>
                                <tr><td>@{{(dt1[0].a16 / dt2[0].a16) *100 | number:0}}%</td><td>@{{(dt1[1].a16 / dt2[1].a16) *100 | number:0}}%</td></tr>
                                <tr><td>@{{(dt1[0].a17 / dt2[0].a17) *100 | number:0}}%</td><td>@{{(dt1[1].a17 / dt2[1].a17) *100 | number:0}}%</td></tr>
                               </tbody>
                            </table>
                  </div>
                  <div class="col-md-3">
                              <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right" id="table_6c">
                              <thead>
                                <tr>
                                  <th colspan="2" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors QRU et ZUS</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th colspan="1">2003</th>
                                  <th colspan="1">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">%</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td>@{{(dt1[0].a15 / dt3[0].a15) *100 | number:0}}%</td><td>@{{(dt1[1].a15 / dt3[1].a15) *100 | number:0}}%</td></tr>
                                <tr><td>@{{(dt1[0].a16 / dt3[0].a16) *100 | number:0}}%</td><td>@{{(dt1[1].a16 / dt3[1].a16) *100 | number:0}}%</td></tr>
                                <tr><td>@{{(dt1[0].a17 / dt3[0].a17) *100 | number:0}}%</td><td>@{{(dt1[1].a17 / dt3[1].a17) *100 | number:0}}%</td></tr>
                               </tbody>
                            </table>

                </div>
                  <p class="fbm-sources-sm">Sources : FILOCOM 2013 - MEEM d'après DGFIP </p>
                </div><!-- end row -->
                  <div class="row">
                      <div class="col-md-6">
                                 <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Mobilités</span>
                                 <table class="table table-sm table-bordered table-striped fbm-table" id="table_7a">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-pru" aria-hidden="true"></i> @{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th></th>
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row">Nombre d'emménagés récents</td><td><span class="secret-value" ng-if="dt1[0].a27=='s'">S</span>@{{dt1[0].a27 | number:0}}</td><td>@{{(dt1[0].a27 / dt1[0].a1)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a27=='s'">S</span>@{{dt1[1].a27 | number:0}}</td><td>@{{(dt1[1].a27 / dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Propriétaires occ. (% / tot. PO)</td><td><span class="secret-value" ng-if="dt1[0].a28=='s'">S</span>@{{dt1[0].a28 | number:0}}</td><td>@{{(dt1[0].a28 / dt1[0].a2)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a28=='s'">S</span>@{{dt1[1].a28 | number:0}}</td><td>@{{(dt1[1].a28 / dt1[1].a2)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Locataires parc privé (% / tot. LP)</td><td><span class="secret-value" ng-if="dt1[0].a29=='s'">S</span>@{{dt1[0].a29 | number:0}}</td><td>@{{(dt1[0].a29 / dt1[0].a3)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a29=='s'">S</span>@{{dt1[1].a29 | number:0}}</td><td>@{{(dt1[1].a29 / dt1[1].a3)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Locataires du HLM (% / tot. HLM)</td><td><span class="secret-value" ng-if="dt1[0].a30=='s'">S</span>@{{dt1[0].a30 | number:0}}</td><td>@{{(dt1[0].a30 / dt1[0].a4)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a30=='s'">S</span>@{{dt1[1].a30 | number:0}}</td><td>@{{(dt1[1].a30 / dt1[1].a4)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Autres (% / tot. autres)</td><td><span class="secret-value" ng-if="dt1[0].a31=='s'">S</span>@{{dt1[0].a31  | number:0}}</td><td>@{{(dt1[0].a31 / dt1[0].a5)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt1[1].a31=='s'">S</span>@{{dt1[1].a31  | number:0}}</td><td>@{{(dt1[1].a31 / dt1[1].a5)*100 | number:1}}%</td></tr>
                               </tbody>
                         </table>
                     </div>
                     <div class="col-md-3">
                           <br>
                              <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right" id="table_7b">
                              <thead>
                                <tr>
                                  <th colspan="4" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (bordure 500m)</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                                <tbody class="">
                                <tr><td><span class="secret-value" ng-if="dt2[0].a27=='s'">S</span>@{{dt2[0].a27 | number:0}}</td><td>@{{(dt2[0].a27 / dt2[0].a1)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt2[1].a27=='s'">S</span>@{{dt2[1].a27 | number:0}}</td><td>@{{(dt2[1].a27 / dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt2[0].a28=='s'">S</span>@{{dt2[0].a28 | number:0}}</td><td>@{{(dt2[0].a28 / dt2[0].a2)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt2[1].a28=='s'">S</span>@{{dt2[1].a28 | number:0}}</td><td>@{{(dt2[1].a28 / dt2[1].a2)*100 | number:1}}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt2[0].a29=='s'">S</span>@{{dt2[0].a29 | number:0}}</td><td>@{{(dt2[0].a29 / dt2[0].a3)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt2[1].a29=='s'">S</span>@{{dt2[1].a29 | number:0}}</td><td>@{{(dt2[1].a29 / dt2[1].a3)*100 | number:1}}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt2[0].a30=='s'">S</span>@{{dt2[0].a30 | number:0}}</td><td>@{{(dt2[0].a30 / dt2[0].a4)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt2[1].a30=='s'">S</span>@{{dt2[1].a30 | number:0}}</td><td>@{{(dt2[1].a30 / dt2[1].a4)*100 | number:1}}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt2[0].a31=='s'">S</span>@{{dt2[0].a31  | number:0}}</td><td>@{{(dt2[0].a31 / dt2[0].a5)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt2[1].a31=='s'">S</span>@{{dt2[1].a31  | number:0}}</td><td>@{{(dt2[1].a31 / dt2[1].a5)*100 | number:1}}%</td></tr>
                               </tbody>
                              </table>
                  </div>
                  <div class="col-md-3">
                               <br>
                              <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right" id="table_7c">
                              <thead>
                                <tr>
                                  <th colspan="4" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors QRU et ZUS</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                                <tbody class="">
                                <tr><td><span class="secret-value" ng-if="dt3[0].a27=='s'">S</span>@{{dt3[0].a27 | number:0}}</td><td>@{{(dt3[0].a27 / dt3[0].a1)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt3[1].a27=='s'">S</span>@{{dt3[1].a27 | number:0}}</td><td>@{{(dt3[1].a27 / dt3[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt3[0].a28=='s'">S</span>@{{dt3[0].a28 | number:0}}</td><td>@{{(dt3[0].a28 / dt3[0].a2)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt3[1].a28=='s'">S</span>@{{dt3[1].a28 | number:0}}</td><td>@{{(dt3[1].a28 / dt3[1].a2)*100 | number:1}}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt3[0].a29=='s'">S</span>@{{dt3[0].a29 | number:0}}</td><td>@{{(dt3[0].a29 / dt3[0].a3)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt3[1].a29=='s'">S</span>@{{dt3[1].a29 | number:0}}</td><td>@{{(dt3[1].a29 / dt3[1].a3)*100 | number:1}}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt3[0].a30=='s'">S</span>@{{dt3[0].a30 | number:0}}</td><td>@{{(dt3[0].a30 / dt3[0].a4)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt3[1].a30=='s'">S</span>@{{dt3[1].a30 | number:0}}</td><td>@{{(dt3[1].a30 / dt3[1].a4)*100 | number:1}}%</td></tr>
                                <tr><td><span class="secret-value" ng-if="dt3[0].a31=='s'">S</span>@{{dt3[0].a31  | number:0}}</td><td>@{{(dt3[0].a31 / dt3[0].a5)*100 | number:1}}%</td><td><span class="secret-value" ng-if="dt3[1].a31=='s'">S</span>@{{dt3[1].a31  | number:0}}</td><td>@{{(dt3[1].a31 / dt3[1].a5)*100 | number:1}}%</td></tr>
                               </tbody>
                              </table>
                     </div>
                      <p class="fbm-sources-sm">Sources : FILOCOM 2013 - MEEM d'après DGFIP </p>
                    </div><!-- end row -->
              </div> <!-- end tab sec 2 -->
              
  </div><!-- end tabs content -->
  <br>
</div>
@endsection