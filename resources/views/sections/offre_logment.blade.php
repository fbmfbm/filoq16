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
                <div class="card-block">
                   <div class="row">
                      <div class="col-md-12">
                          <h1 class='lead'>
                             <span class="text-muted">Quartier PRU :</span>
                             <p><strong class="text-info">@{{ter1Label}}</strong> <span class='text-muted'>(@{{codeRef}})</span><br>
                             Commune : <br>
                             <strong>@{{nomcom}}</strong> <span class='text-muted'>(@{{dt1[0].code_com}})</span></p>
                            <p class="text-info">Poids du quartier dans la commune :</p>
                             <span class="fbm-chiffre-cle"><i class="fa fa-home" aria-hidden="true"></i> Logement :  <span class="fbm-badge"> @{{(dt1[1].a0 / dt3[0].a0_com)*100 | number:1}} % </span> </span><br>
                             <span class="fbm-chiffre-cle"><i class="fa fa-building" aria-hidden="true"></i> HLM : <span class="fbm-badge">  @{{(dt1[1].a4 / dt3[0].a4_com)*100 | number:1}} % </span></span><br>
                             <span class="fbm-chiffre-cle"><i class="fa fa-male" aria-hidden="true"></i> Population : <span class="fbm-badge">  @{{(dt1[1].b61 / dt3[0].b61_com)*100 | number:1}} % </span> </span>
                          </h1>
                          <br>
                       </div>
                    </div><!-- end row -->
                     <div class="row">
                        <div class="col-md-12">
                              <div class="fbm-encart"> 
                              <h4><i class="fa fa-exclamation-triangle" aria-hidden="true" style="color:#000;"></i> Remarques sur les échelles : </h4>
                                  <p><strong>PRU :</strong> Le périmètre comprend l’ensemble du PRU. En cas de PRU intercommunal les logements situés sur la ou les commune(s) limitrophe(s) sont inclus.</p>
                                  <p><strong>Bordures 500m :</strong> Le périmètre comprend la somme des bordures de l’ensemble des PRU et des ZUS présents sur la commune. Attention les données diffusées ne concernent que les éléments compris sur la commune (filtre infra communal).</p>
                                  <p><strong>Commune hors QPV :</strong> Les données diffusées concernent l’ensemble de la commune hors PRU et hors ZUS.</p>
                                  <p><i>Attention en cas de PRU intercommunal les données de référence (bordure et commune) ne concernent que la commune principale (commune sur laquelle le PRU est implanté le plus largement).</i></p>
                              </div>
                          
                              <div id="map2" class=""> </div>
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
            <a class="nav-link" ng-class="{active : setTab === 2}" data-toggle="tab" href="#sec2" role="tab" >Revenus et mobilités des ménages</a>
          </li>
        </ul>

     <!-- end tabs-->
     <!-- Tab panes -->
     <div class="tab-content ">
         <div  class="tab-pane fade in active"  id="sec1" role="tabpanel"><!-- tab sec 1 -->
            <div class="row">
                
                <div class="col-md-12">
                  <br>
                 <h3 class="fbm-tab-sec-title">OFFRE DE LOGEMENT et PROFIL DÉMOGRAPHIQUE</h3>
                 <i>(<i class="fa fa-line-chart text-info" aria-hidden="true"></i><span class="text-muted"> = Données en taux d'évolution</span>)</i>
                 </div>
                 
            </div><!-- end row -->
            <div class="row">
                <div class="col-md-6" >
                    <a href="#"  class="btn btn-success" ng-click="tableToJson(1)">Exporter en csv</a>
                   <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Total logements et vacance </span>
                      <table class="table table-sm table-bordered table-striped fbm-table" id="table_1a">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-pru" aria-hidden="true"></i> @{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class="text-center fbm-table-header">
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
                                <tr><td scope="row">Nombre total de lgts</td><td>@{{dt1[0].a0 | number:0}}</td><td></td><td>@{{dt1[1].a0 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].a0*1)-(dt1[0].a0*1))/(dt1[1].a0*1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Dt lgts vacants</td><td>@{{(dt1[0].a62*1) + (dt1[0].a63*1)| number:0 }}</td><td>@{{(((dt1[0].a62*1) + (dt1[0].a63*1))/dt1[0].a0*1)*100| number:1 }}%</td><td>@{{(dt1[1].a62*1) + (dt1[1].a63*1)| number:0 }}</td><td>@{{(((dt1[1].a62*1) + (dt1[1].a63*1))/dt1[1].a0*1)*100| number:1 }}%</td></tr>
                                <tr><td scope="row">dt privé (% / parc priv.)</td><td>@{{dt1[0].a62  | number:0}}</td><td>@{{((dt1[0].a62*1)/((dt1[0].a62*1)+(dt1[0].a2*1)+(dt1[0].a3*1)))*100 | number:1 }}%</td><td>@{{dt1[1].a62  | number:0}}</td><td>@{{((dt1[1].a62*1)/((dt1[1].a62*1)+(dt1[1].a2*1)+(dt1[1].a3*1)))*100 | number:1 }}%</td></tr>
                                <tr><td scope="row">dt public (% / parc HLM)</td><td>@{{dt1[0].a63 | number:0}}</td><td>@{{(dt1[0].a63*1) /((dt1[0].a4*1)+(dt1[0].a63*1))*100| number:1 }}%</td><td>@{{dt1[1].a63 | number:0}}</td><td>@{{(dt1[1].a63*1) /((dt1[1].a4*1)+(dt1[1].a63*1))*100| number:1 }}%</td></tr>
                               </tbody>
                          </table>
                   </div>
                   <div class="col-md-3">
                    <br>
                     <table class="table table-sm table-bordered table-striped fbm-table" id="table_1b>
                       <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (frange 500m)</th>
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
                                <tr><td>@{{dt2[0].a0 | number:0}}</td><td></td><td>@{{dt2[1].a0 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt2[1].a0*1)-(dt2[0].a0*1))/(dt2[1].a0*1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{(dt2[0].a62*1) + (dt2[0].a63*1)| number:0 }}</td><td>@{{(((dt2[0].a62*1) + (dt2[0].a63*1))/dt2[0].a0*1)*100| number:1 }}%</td><td>@{{(dt2[1].a62*1) + (dt2[1].a63*1)| number:0 }}</td><td>@{{(((dt2[1].a62*1) + (dt2[1].a63*1))/dt2[1].a0*1)*100| number:1 }}%</td></tr>
                                <tr><td>@{{dt2[0].a62  | number:0}}</td><td>@{{((dt2[0].a62*1)/((dt2[0].a62*1)+(dt2[0].a2*1)+(dt2[0].a3*1)))*100 | number:1 }}%</td><td>@{{dt2[1].a62  | number:0}}</td><td>@{{((dt2[1].a62*1)/((dt2[1].a62*1)+(dt2[1].a2*1)+(dt2[1].a3*1)))*100 | number:1 }}%</td></tr>
                                <tr><td>@{{dt2[0].a63 | number:0}}</td><td>@{{(dt2[0].a63*1) /((dt2[0].a4*1)+(dt2[0].a63*1))*100| number:1 }}%</td><td>@{{dt2[1].a63 | number:0}}</td><td>@{{(dt2[1].a63*1) /((dt2[1].a4*1)+(dt2[1].a63*1))*100| number:1 }}%</td></tr>
                               </tbody>
                       </table>
                    </div>
                    <div class="col-md-3">
                       <br>
                        <table class="table table-sm table-bordered table-striped fbm-table" id="table_1c>
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors ZUS et QPV</th>
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
                </div><!-- end row -->
                 <!-- ########################################## TABLEAU B ################################################################## -->
                <div class="row">
                   <div class="col-md-6">
                                <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Statut d'occupation</span>
                                <table class="table table-sm table-bordered table-striped fbm-table">
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
                                <tr><td scope="row">Résidences principales</td><td>@{{dt1[0].a1 | number:0}}</td><td></td><td>@{{dt1[1].a1 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].a1*1)-(dt1[0].a1*1))/(dt1[1].a1*1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Propriétaires occupants</td><td>@{{dt1[0].a2 | number:0}}</td><td>@{{(dt1[0].a2 /dt1[0].a1)*100 | number:1}}%</td><td>@{{dt1[1].a2 | number:0}}</td><td>@{{(dt1[1].a2 /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Locataires du parc privé</td><td>@{{dt1[0].a3 | number:0}}</td><td>@{{(dt1[0].a3 /dt1[0].a1)*100 | number:1}}%</td><td>@{{dt1[1].a3 | number:0}}</td><td>@{{(dt1[1].a3 /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Total Parc Privé</td><td>@{{(dt1[0].a2*1) +(dt1[0].a3*1) | number:0}}</td><td>@{{(((dt1[0].a2*1)+(dt1[0].a3*1))/dt1[0].a1)*100 | number:1}}%</td><td>@{{(dt1[1].a2*1) +(dt1[1].a3*1) | number:0}}</td><td>@{{(((dt1[1].a2*1) +(dt1[1].a3*1)) /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Locataires du HLM</td><td>@{{dt1[0].a4 | number:0}}</td><td>@{{(dt1[0].a4 /dt1[0].a1)*100 | number:1}}%</td><td>@{{dt1[1].a4 | number:0}}</td><td>@{{(dt1[1].a4 /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Autres</td><td>@{{dt1[0].a5 | number:0}}</td><td>@{{(dt1[0].a5 /dt1[0].a1)*100 | number:1}}%</td><td>@{{dt1[1].a5 | number:0}}</td><td>@{{(dt1[1].a5 /dt1[1].a1)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                  </div>
                   <div class="col-md-3">
                                      <br>
                                     <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i>Environnement (frange 500m)</th>
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
                                <tr><td>@{{dt2[0].a2 | number:0}}</td><td>@{{(dt2[0].a2 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a2 | number:0}}</td><td>@{{(dt2[1].a2 /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a3 | number:0}}</td><td>@{{(dt2[0].a3 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a3 | number:0}}</td><td>@{{(dt2[1].a3 /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{(dt2[0].a2*1) +(dt2[0].a3*1) | number:0}}</td><td>@{{(((dt2[0].a2*1)+(dt2[0].a3*1))/dt2[0].a1)*100 | number:1}}%</td><td>@{{(dt2[1].a2*1) +(dt2[1].a3*1) | number:1}}</td><td>@{{(((dt2[1].a2*1) +(dt2[1].a3*1)) /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a4 | number:0}}</td><td>@{{(dt2[0].a4 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a4 | number:0}}</td><td>@{{(dt2[1].a4 /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a5 | number:0}}</td><td>@{{(dt2[0].a5 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a5 | number:0}}</td><td>@{{(dt2[1].a5 /dt2[1].a1)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
               </div>
               <div class="col-md-3">
                <br>
                   <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors ZUS et QPV</th>
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
                                <tr><td>@{{dt3[0].a2 | number:0}}</td><td>@{{(dt3[0].a2 /dt3[0].a1)*100 | number:1}}%</td><td>@{{dt3[1].a2 | number:0}}</td><td>@{{(dt3[1].a2 /dt3[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a3 | number:0}}</td><td>@{{(dt3[0].a3 /dt3[0].a1)*100 | number:1}}%</td><td>@{{dt3[1].a3 | number:0}}</td><td>@{{(dt3[1].a3 /dt3[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{(dt3[0].a2*1) +(dt3[0].a3*1) | number:0}}</td><td>@{{(((dt3[0].a2*1)+(dt3[0].a3*1))/dt3[0].a1)*100 | number:1}}%</td><td>@{{(dt3[1].a2*1) +(dt3[1].a3*1) | number:1}}</td><td>@{{(((dt3[1].a2*1) +(dt3[1].a3*1)) /dt3[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a4 | number:0}}</td><td>@{{(dt3[0].a4 /dt3[0].a1)*100 | number:1}}%</td><td>@{{dt3[1].a4 | number:0}}</td><td>@{{(dt3[1].a4 /dt3[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a5 | number:0}}</td><td>@{{(dt3[0].a5 /dt3[0].a1)*100 | number:1}}%</td><td>@{{dt3[1].a5 | number:0}}</td><td>@{{(dt3[1].a5 /dt3[1].a1)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                                </div>
                                <div class="col-md-12">
                                <hr>
   
                 </div>

             </div><!-- end row -->
            <p style="page-break-before: always">
             <!-- ########################################## TABLEAU C ################################################################## -->
             <div class="row">
                 <div class="col-md-6">
                                  <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Typologie</span>
                                <table class="table table-sm table-bordered table-striped fbm-table">
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
                                <tr><td scope="row">1 à 2 pièces</td><td>@{{dt1[0].a66 | number:0}}</td><td>@{{dt1[0].a66/dt1[0].ta66_a68*100 | number:1}}%</td><td>@{{dt1[1].a66 | number:0}}</td><td>@{{dt1[1].a66/dt1[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td scope="row">3 à 4 pièces</td><td>@{{dt1[0].a67 | number:0}}</td><td>@{{dt1[0].a67/dt1[0].ta66_a68*100 | number:1}}%</td><td>@{{dt1[1].a67 | number:0}}</td><td>@{{dt1[1].a67/dt1[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>5 pièces ou plus</td><td>@{{dt1[0].a68 | number:0}}</td><td>@{{dt1[0].a68/dt1[0].ta66_a68*100 | number:1}}%</td><td>@{{dt1[1].a68 | number:0}}</td><td>@{{dt1[1].a68/dt1[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td scope="row" colspan="5"><br></tr>
                                <tr><td scope="row">Population fiscale</td><td>@{{dt1[0].b61 | number:0}}</td><td></td><td>@{{dt1[1].b61 | number:0}}</td><td class="fbm-evol"><i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].b61*1)-(dt1[0].b61*1))/(dt1[0].b61*1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Taille moy. des ménages</td><td>@{{dt1[0].b60 | number:2}}</td><td></td><td>@{{dt1[1].b60 | number:2}}</td><td></td></tr>
                               </tbody>
                            </table>
           </div>
          <div class="col-md-3">
              <br>
                 <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (frange 500m)</th>
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
                                <tr><td>@{{dt2[0].b60 | number:2}}</td><td></td><td>@{{dt2[1].b60 | number:2}}</td><td></td></tr>
                               </tbody>
              </table>
           </div>
            <div class="col-md-3">
               <br>
                  <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors ZUS et QPV</th>
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
                                <tr><td>@{{dt3[0].b60 | number:2}}</td><td></td><td>@{{dt3[1].b60 | number:2}}</td><td></td></tr
                               </tbody>
               </table>
             </div>

            </div><!-- end row -->
             <!-- ########################################## TABLEAU D ################################################################## -->

             <div class="row">
                 <div class="col-md-6">

                    <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Age personne de référence du ménage</span>
                     <table class="table table-sm table-bordered table-striped fbm-table">
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
                                <tr><td scope="row">< 30 ans</td><td>@{{dt1[0].a18 | number:0}}</td><td>@{{(dt1[0].a18/ dt1[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt1[1].a18 | number:0}}</td><td>@{{(dt1[1].a18/ dt1[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">30-39 ans</td><td>@{{dt1[0].a19 | number:0}}</td><td>@{{(dt1[0].a19/ dt1[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt1[1].a19 | number:0}}</td><td>@{{(dt1[1].a19/ dt1[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">40-59 ans</td><td>@{{dt1[0].a20 | number:0}}</td><td>@{{(dt1[0].a20/ dt1[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt1[1].a20 | number:0}}</td><td>@{{(dt1[1].a20/ dt1[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">60-75 ans</td><td>@{{dt1[0].a21 | number:0}}</td><td>@{{(dt1[0].a21/ dt1[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt1[1].a21 | number:0}}</td><td>@{{(dt1[1].a21/ dt1[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">> 75 ans</td><td>@{{dt1[0].a22 | number:0}}</td><td>@{{(dt1[0].a22/ dt1[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt1[1].a22 | number:0}}</td><td>@{{(dt1[1].a22/ dt1[1].ta18_a22)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                  </div>
                  <div class="col-md-3">
                  <br>
                     <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right">
                              <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (frange 500m)</th>
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
                    <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right">
                       <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors ZUS et QPV</th>
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
                 </div> <!-- end row -->
                 <!-- ########################################## TABLEAU section 2 A ################################################################## -->
                   <br>
       </div><!-- end tab sec 1 -->
        <div  class="tab-pane fade"  id="sec2" role="tabpanel"><!-- tab sec 2-->
         
          <div class="row">
            <br>
            <div class="col-md-12">
                <br>
                 <h3 class="fbm-tab-sec-title">REVENUS ET MOBILITÉS DES MÉNAGES </h3>
                 <i>(<i class="fa fa-line-chart text-info" aria-hidden="true"></i><span class="text-muted"> = Données en taux d'évolution</span>)</i>
             </div>
          </div><!-- end row -->
          <div class="row">
             <div class="col-md-6">
                  <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Revenus des ménages</span>
               <table class="table table-sm table-bordered table-striped fbm-table">
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
                                <tr><td scope="row">Revenu médian par ucm</td><td>@{{dt1[0].a15 | number:0}} &#8364</td><td></td><td>@{{dt1[1].a15 | number:0}}</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].a15 - dt1[0].a15)/dt1[0].a15)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">1<sup>er</sup> décile revenus par ucm</td><td>@{{dt1[0].a16 | number:0}} &#8364</td><td></td><td>@{{dt1[1].a16 | number:0}}</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].a16 - dt1[0].a16)/dt1[0].a16)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Dernier décile revenus par ucm</td><td>@{{dt1[0].a17 | number:0}} &#8364</td><td></td><td>@{{dt1[1].a17 | number:0}}</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt1[1].a17 - dt1[0].a17)/dt1[0].a17)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Rapport interdécile</td><td>@{{dt1[0].a17 / dt1[0].a16 | number:2}}</td><td></td><td>@{{dt1[1].a17 / dt1[1].a16 | number:2}}</td><td class="fbm-evol"></td></tr>
                               </tbody>
              </table>
            </div>
             <div class="col-md-3">
                    <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right">
                              <thead>
                                <tr>
                                  <th colspan="4" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (frange 500m)</th>
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
                                <tr><td>@{{dt2[0].a15 | number:0}} &#8364</td><td></td><td>@{{dt2[1].a15 | number:0}}</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt2[1].a15 - dt2[0].a15)/dt2[0].a15)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a16 | number:0}} &#8364</td><td></td><td>@{{dt2[1].a16 | number:0}}</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt2[1].a16 - dt2[0].a16)/dt2[0].a16)*100 | number:1}}%</td></tr>
                                <tr><<td>@{{dt2[0].a17 | number:0}} &#8364</td><td></td><td>@{{dt2[1].a17 | number:0}}</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt2[1].a17 - dt2[0].a17)/dt2[0].a17)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a17 / dt2[0].a16 | number:2}}</td><td></td><td>@{{dt2[1].a17 / dt2[1].a16 | number:2}}</td><td class="fbm-evol"> </td></tr>
                               </tbody>
                            </table>
                              
             </div>
            <div class="col-md-3">
                  <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right">
                              <thead>
                                <tr>
                                  <th colspan="4" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors ZUS et QPV</th>
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
                                <tr><td>@{{dt3[0].a15 | number:0}} &#8364</td><td></td><td>@{{dt3[1].a15 | number:0}}</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt3[1].a15 - dt3[0].a15)/dt3[0].a15)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a16 | number:0}} &#8364</td><td></td><td>@{{dt3[1].a16 | number:0}}</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt3[1].a16 - dt3[0].a16)/dt3[0].a16)*100 | number:1}}%</td></tr>
                                <tr><<td>@{{dt3[0].a17 | number:0}} &#8364</td><td></td><td>@{{dt3[1].a17 | number:0}}</td><td class="fbm-evol"> <i class="fa fa-line-chart text-info" aria-hidden="true"></i> @{{((dt3[1].a17 - dt3[0].a17)/dt3[0].a17)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a17 / dt3[0].a16 | number:2}}</td><td></td><td>@{{dt3[1].a17 / dt3[1].a16 | number:2}}</td><td class="fbm-evol"></td></tr>
                               </tbody>
                            </table>
             </div>
             </div><!-- end row -->
             <!-- ########################################## TABLEAU section 2 B ################################################################## -->
              <div class="row">
                  <div class="col-md-6">
                     <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Rapport quartier / environnement et commune hors ZUS</span>
                     <table class="table table-sm table-bordered table-striped fbm-table">
                        <thead>
                                <tr>
                                  <th colspan="1" class="fbm-table-right"></th>
                                </tr>
                                <tr class=" text-center " >
                                  <th></th>
                                </tr>
                                <tr  class="table-active">
                                  <th class="text-center"></th>
                                </tr>
                              </thead>
                                <tbody class="">
                                  <tr><td scope="row">Revenu médian</td></tr>
                                  <tr><td scope="row">1<sup>er</sup> décile revenus par ucm</td></tr>
                                  <tr><td scope="row">Dernier décile revenus par ucm</td></tr>
                                </tbody>
                            </table>
                  </div>
                  <div class="col-md-3">
                              <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right" >
                              <thead>
                                <tr>
                                  <th colspan="2" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (frange 500m)</th>
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
                              <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right">
                              <thead>
                                <tr>
                                  <th colspan="2" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors ZUS et QPV</th>
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
                </div><!-- end row -->
                  <div class="row">
                      <div class="col-md-6">
                                 <span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Mobilités</span>
                                 <table class="table table-sm table-bordered table-striped fbm-table">
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
                                <tr><td scope="row">Nombre d'emménagés récents</td><td>@{{dt1[0].a27 | number:0}}</td><td>@{{(dt1[0].a27 / dt1[0].a1)*100 | number:1}}%</td><td>@{{dt1[1].a27 | number:0}}</td><td>@{{(dt1[1].a27 / dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Propriétaires occ. (% / tot. PO)</td><td>@{{dt1[0].a28 | number:0}}</td><td>@{{(dt1[0].a28 / dt1[0].a2)*100 | number:1}}%</td><td>@{{dt1[1].a28 | number:0}}</td><td>@{{(dt1[1].a28 / dt1[1].a2)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Locataires parc privé (% / tot. LP)</td><td>@{{dt1[0].a29 | number:0}}</td><td>@{{(dt1[0].a29 / dt1[0].a3)*100 | number:1}}%</td><td>@{{dt1[1].a29 | number:0}}</td><td>@{{(dt1[1].a29 / dt1[1].a3)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Locataires du HLM (% / tot. HLM)</td><td>@{{dt1[0].a30 | number:0}}</td><td>@{{(dt1[0].a30 / dt1[0].a4)*100 | number:1}}%</td><td>@{{dt1[1].a30 | number:0}}</td><td>@{{(dt1[1].a30 / dt1[1].a4)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Autres (% / tot. autres)</td><td>@{{dt1[0].a31  | number:0}}</td><td>@{{(dt1[0].a31 / dt1[0].a5)*100 | number:1}}%</td><td>@{{dt1[1].a31  | number:0}}</td><td>@{{(dt1[1].a31 / dt1[1].a5)*100 | number:1}}%</td></tr>
                               </tbody>
                         </table>
                     </div>
                     <div class="col-md-3">
                           <br>
                              <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right">
                              <thead>
                                <tr>
                                  <th colspan="4" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (frange 500m)</th>
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
                                <tr><td>@{{dt2[0].a27 | number:0}}</td><td>@{{(dt2[0].a27 / dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a27 | number:0}}</td><td>@{{(dt2[1].a27 / dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a28 | number:0}}</td><td>@{{(dt2[0].a28 / dt2[0].a2)*100 | number:1}}%</td><td>@{{dt2[1].a28 | number:0}}</td><td>@{{(dt2[1].a28 / dt2[1].a2)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a29 | number:0}}</td><td>@{{(dt2[0].a29 / dt2[0].a3)*100 | number:1}}%</td><td>@{{dt2[1].a29 | number:0}}</td><td>@{{(dt2[1].a29 / dt2[1].a3)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a30 | number:0}}</td><td>@{{(dt2[0].a30 / dt2[0].a4)*100 | number:1}}%</td><td>@{{dt2[1].a30 | number:0}}</td><td>@{{(dt2[1].a30 / dt2[1].a4)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a31  | number:0}}</td><td>@{{(dt2[0].a31 / dt2[0].a5)*100 | number:1}}%</td><td>@{{dt2[1].a31  | number:0}}</td><td>@{{(dt2[1].a31 / dt2[1].a5)*100 | number:1}}%</td></tr>
                               </tbody>
                              </table>
                  </div>
                  <div class="col-md-3">
                               <br>
                              <table class="table table-sm table-bordered table-striped fbm-table fbm-table-right">
                              <thead>
                                <tr>
                                  <th colspan="4" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors ZUS et QPV</th>
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
                                <tr><td>@{{dt3[0].a27 | number:0}}</td><td>@{{(dt3[0].a27 / dt3[0].a1)*100 | number:1}}%</td><td>@{{dt3[1].a27 | number:0}}</td><td>@{{(dt3[1].a27 / dt3[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a28 | number:0}}</td><td>@{{(dt3[0].a28 / dt3[0].a2)*100 | number:1}}%</td><td>@{{dt3[1].a28 | number:0}}</td><td>@{{(dt3[1].a28 / dt3[1].a2)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a29 | number:0}}</td><td>@{{(dt3[0].a29 / dt3[0].a3)*100 | number:1}}%</td><td>@{{dt3[1].a29 | number:0}}</td><td>@{{(dt3[1].a29 / dt3[1].a3)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a30 | number:0}}</td><td>@{{(dt3[0].a30 / dt3[0].a4)*100 | number:1}}%</td><td>@{{dt3[1].a30 | number:0}}</td><td>@{{(dt3[1].a30 / dt3[1].a4)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a31  | number:0}}</td><td>@{{(dt3[0].a31 / dt3[0].a5)*100 | number:1}}%</td><td>@{{dt3[1].a31  | number:0}}</td><td>@{{(dt3[1].a31 / dt3[1].a5)*100 | number:1}}%</td></tr>
                               </tbody>
                              </table>
                     </div>
                    </div><!-- end row -->
              </div> <!-- end tab sec 2 -->
              
  </div><!-- end tabs content -->
  <br>
</div>
@endsection