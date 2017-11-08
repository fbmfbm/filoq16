@extends('layouts.app')

@section('content')
<br>
<div class="container container-fluid" ng-controller="ConstructCtrl" >
<script type="text/javascript">
    var _convent = '{{$convent}}';
</script>
    <div class="row">
        <div class="col-md-12">
        <a href="{{ url('/zonage') }}"><i class="fa fa-hand-o-left text-info" aria-hidden="true"></i> Selectionner un autre territoire</a>
        <hr>
         <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link " ng-href="/thema/offre/@{{codeRef}}"><i class="fa fa-th-list text-info" aria-hidden="true"></i> Structure de l'offre et profil des ménages </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href=""><i class="fa fa-th-list text-info" aria-hidden="true"></i> Dynamique de construction et mobilités</a>
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
                                <p><strong class="text-primary" data-toggle="tooltip" data-placement="top" title="Bordure des 500m du quartier">Bordures 500m du quartier :</strong> Le périmètre comprend la somme des bordures de l’ensemble des QRU et des ZUS présents sur la commune. Attention les données diffusées ne concernent que les données communales, même lorsque la bordure dépasse la frontière communale.</p>
                                <p><strong class="text-primary" data-toggle="tooltip" data-placement="top" title="Commune hors limites QRU">Commune hors QRU :</strong> Les données diffusées concernent l’ensemble de la commune hors QRU et hors ZUS.</p>
                                {{--<p><i>Attention en cas de PRU intercommunal les données de référence (bordure et commune) ne concernent que la commune principale (commune sur laquelle le PRU est implanté le plus largement).</i></p>--}}
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
            <a class="nav-link" ng-class="{active : setTab == 1}" data-toggle="tab" href="#sec1" role="tab" ngclick="{setTab=1;}">Programmation et avancement du PRU</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" ng-class="{active : setTab == 2}"  data-toggle="tab" href="#sec2" role="tab" ngclick="{setTab=2;}">Dynamique de construction</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" ng-class="{active : setTab == 3}"  data-toggle="tab" href="#sec3" role="tab" ngclick="{setTab=3;}">Revenus des ménages : occupants et nouveaux ménages</a>
          </li>
        </ul>

     <!-- end tabs-->
     <!-- Tab panes -->
     <div class="tab-content ">

         <div  class="tab-pane active"  id="sec1" role="tabpanel"><!-- tab sec 1-->
            <div class="row">
              <div class="col-md-12">
                  <br>
                  <a href="#"  class="btn btn-info btn-sm btn-export" ng-click="tableToJson(1, 'progamm')" data-toggle="tooltip" data-placement="top" title="Exporter les données au format CSV"><i class="fa fa-floppy-o" aria-hidden="true"></i> csv</a><h3 class="fbm-tab-sec-title">PROGRAMMATION ET AVANCEMENT DU PRU</h3>
                
              </div>
            </div><!-- end row -->
            <div class="row">
                <div class="col-md-12">
                  <table class="table table-sm table-bordered fbm-table" id="table_1a">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-pru" aria-hidden="true"></i> @{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th></th>
                                  <th >Livré en 2013</th>
                                  <th >À livrer</th>
                                  <th >Total programmé</th>
                                  <th >Tx de réalisation</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr><td scope="row">Démolition</td><td>@{{dt6[0].a25 | number:0}}</td><td>@{{dt6[0].a26 | number:0}}</td><td>@{{dt6[0].a27 | number:0}}</td><td>@{{dt6[0].a19 | number:1}}%</td></tr>
                                <tr><td scope="row">Reconstitution de l'offre sur site</td><td>@{{dt6[0].a28 | number:0}}</td><td>@{{dt6[0].a29 | number:0}}</td><td>@{{dt6[0].a30 | number:0}}</td><td>@{{dt6[0].a20 | number:1}}%</td></tr>
                                <tr><td scope="row">Diversification de l'offre</td><td>@{{dt6[0].a35 | number:0}}</td><td>@{{dt6[0].a36 | number:0}}</td><td>@{{dt6[0].a37 | number:0}}</td><td>@{{dt6[0].a21 | number:1}}%</td></tr>
                               </tbody>
                         </table> 
                         <br>
                    <div class="row">
                         <div class="col-md-5">
                          <table class="table fbm-table-enphase table-sm table-bordered fbm-table" id="table_1b">
                                <tbody>
                                  <tr><td scope="row">Taux de réalisation (démol. + construct.)</td><td>@{{dt6[0].a38 | number:1}}%</td></tr>
                                  <tr><td scope="row">Taux de renouvellement au terme du PRU</td><td>@{{dt6[0].a23 | number:1}}%</td></tr>
                                  <tr><td scope="row">Taux de diversification au terme du PRU</td><td>@{{dt6[0].a24 | number:1}}%</td></tr>
                                </tbody>
                          </table>
                          <br>
                          <span class="fbm-table-enphase" style="font-size: 15px !important;"><i class="fa fa-arrow-circle-right " aria-hidden="true"></i> Taux de LLS en 2003 : @{{(dt1[0].a63*1) /((dt1[0].a4*1)+(dt1[0].a63*1))*100| number:1 }}% </span><br>
                          <span class="fbm-table-enphase" style="font-size: 15px !important;"><i class="fa fa-arrow-circle-right " aria-hidden="true"></i> Taux de LLS en 2013 :  @{{(dt1[1].a63*1) /((dt1[1].a4*1)+(dt1[1].a63*1))*100| number:1 }}% </span><br>
                          <span class="fbm-table-enphase mt-1"><i class="fa fa-arrow-circle-right " aria-hidden="true"></i> Taux de LLS au terme du PRU :  @{{ dt6[0].a41 | number:1}}%  </span>
                          <hr>
                         </div>

                        <div class="col-md-6 offset-1 p-1">
                            <table class="table table-bordered">
                                <tr><td class="small">
                                        <p><i class="fa fa-info-circle text-primary" aria-hidden="true"></i><br>
                                            <span class="text-primary">Reconstitution de l'offre :</span> logements sociaux hors PLS pour compenser les démolitions
                                            <br>
                                        <span class="text-primary">Diversification de l'offre :</span> logements en accession ou locatifs non sociaux et PLS
                                            <br>
                                        <span class="text-primary">Renouvellement :</span> part du parc neuf dans l'ensemble du parc
                                            <br>
                                        <span class="text-primary">Diversification :</span> parc privé (et PLS) neuf dans l'ensemble du parc</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- end tab sec 1 -->
        <div  class="tab-pane "  id="sec2" role="tabpanel"><!-- tab sec 2-->
         
                  <div class="row">
                    <br>
                    <div class="col-md-12">
                        <br>
                        <a href="#"  class="btn btn-info btn-sm btn-export" ng-click="tableToJson(2, 'dynamique_construct')" data-toggle="tooltip" data-placement="top" title="Exporter les données au format CSV"><i class="fa fa-floppy-o" aria-hidden="true"></i> csv</a><h3 class="fbm-tab-sec-title">DYNAMIQUE DE CONSTRUCTION</h3>
                        
                     </div>
                  </div><!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                          <table class="table table-sm table-bordered fbm-table" id="table_2a">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right"><i class="fa fa-chevron-circle-down text-pru" aria-hidden="true"></i> @{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class=" text-center fbm-table-header" >
                                  <th></th>
                                  <th colspan="2">Parc d'avant 2006</th>
                                  <th colspan="2">Parc d'après 2006</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                  <th class="text-center">Nbr.</th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr><td scope="row">Total des résidences Principales</td><td>@{{dt10[1].c1 | number:0}}</td><td></td><td>@{{dt10[1].b1 | number:0}}</td><td></td></tr>
                                <tr><td scope="row" class="pl-4">Dt. Propriétaires du Parc Privé</td><td>@{{dt10[1].c2*1 + dt10[1].c3*1  | number:0}}</td><td>@{{((dt10[1].c2*1 + dt10[1].c3*1)  / dt10[1].c1)*100 | number:1}}%</td><td>@{{dt10[1].b2*1 + dt10[1].b3*1 | number:0}}</td><td>@{{((dt10[1].b2*1 + dt10[1].b3*1)  / dt10[1].b1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row" class="pl-5"> Dt. Prop. Occupants.</td><td>@{{dt10[1].c2 | number:0}}</td><td>@{{(dt10[1].c2 / dt10[1].c1)*100 | number:1}}%</td><td>@{{dt10[1].b2 | number:0}}</td><td>@{{(dt10[1].b2 / dt10[1].b1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row" class="pl-5"> Dt. Locataires du Parc Priv.</td><td>@{{dt10[1].c3 | number:0}}</td><td>@{{(dt10[1].c3 / dt10[1].c1)*100 | number:1}}%</td><td>@{{dt10[1].b3 | number:0}}</td><td>@{{(dt10[1].b3 / dt10[1].b1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row" class="pl-4">Dt. Locataires du parc social</td><td>@{{dt10[1].c4  | number:0}}</td><td>@{{(dt10[1].c4 / dt10[1].c1)*100 | number:1}}%</td><td>@{{dt10[1].b4  | number:0}}</td><td>@{{(dt10[1].b4 / dt10[1].b1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row" class="pl-4">Dt. Autres status d'occupation</td><td>@{{dt10[1].c5  | number:0}}</td><td>@{{(dt10[1].c5 / dt10[1].c1)*100 | number:1}}%</td><td>@{{dt10[1].b5  | number:0}}</td><td>@{{(dt10[1].b5 / dt10[1].b1)*100 | number:1}}%</td></tr>
                               </tbody>
                         </table> 
                        </div>             
                    </div><!-- end row -->
          </div> <!-- end tab sec 2 -->
         <div  class="tab-pane  "  id="sec3" role="tabpanel"><!-- tab sec 3 -->
            <div class="row">
                <div class="col-md-12">
                  <br>
                    <a href="#"  class="btn btn-info btn-sm btn-export" ng-click="tableToJson(3, 'revenus_men')" data-toggle="tooltip" data-placement="top" title="Exporter les données au format CSV"><i class="fa fa-floppy-o" aria-hidden="true"></i> csv</a><h3 class="fbm-tab-sec-title">REVENUS DES MÉNAGES : OCCUPANTS ET NOUVEAUX MÉNAGES</h3>
                
                 </div>
            </div><!-- end row -->
             <div class="row">
                 <div class="col-md-12">
                     <table class="table table-sm small" style="background-color: #F7F6F5;">
                         <tr><td colspan="4"><i class=" fa fa-info-circle text-primary" aria-hidden="true"></i>  Légende :</td></tr>
                         <tr><td class="text-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Tot. occ. 03</td><td>Ensemble des occupants en 2003</td><td class="text-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Occ parc < 2006</td><td>Ensemble des occupants du parc construit avant 2006, en 2013</td</tr>
                         <tr><td class="text-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Tot. occ. 13</td><td>Ensemble des occupants en 2013</td><td class="text-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Occ parc > 2006</td><td>Ensemble des occupants du parc construit en 2006 et après, en 2013</td></tr>
                         <tr><td></td><td></td><td class="text-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> ER. parc d'avant 2006</td><td>Emménagés en 2011 ou 2012 dans le parc construit avant 2006 en 2013</td></tr>
                     </table>
                 </div>
             </div>
            <div class="row">
                <div class="col-md-12">
                   <p><span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> Ressources des ménages (/plafond HLM) </span></p>
                      <table class="table table-sm table-bordered fbm-table" id="table_3a">
                              <thead>
                              <tr class="info">
                                  <th colspan="16" class="info"  ><i class="fa fa-chevron-circle-down text-pru" aria-hidden="true"></i> @{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr style="background-color:#dee0cb;">
                                  <th colspan="6" class="fbm-table-right">ENEMBLE DES MÉNAGES</th>
                                  <th colspan="5" class="fbm-table-right" style="background-color:#f6f9db;">PARC PRIVÉ</th>
                                  <th colspan="5" class="fbm-table-right">PARC SOCIAL</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center">Tot. occ. 03</th>
                                  <th class="text-center">Tot. occ. 13</th>
                                  <th class="text-center">Occ. parc < 2006</th>
                                  <th class="text-center">ER parc < 2006</th>
                                  <th class="text-center">Occ. parc ≥ 2006</th>
                                  <th class="text-center">Tot. occ. 03</th>
                                  <th class="text-center">Tot. occ. 13</th>
                                  <th class="text-center">Occ. parc < 2006</th>
                                  <th class="text-center">ER parc < 2006</th>
                                  <th class="text-center">Occ. parc ≥ 2006</th>
                                   <th class="text-center">Tot. occ. 03</th>
                                  <th class="text-center">Tot. occ. 13</th>
                                  <th class="text-center">Occ. parc < 2006</th>
                                  <th class="text-center">ER parc < 2006</th>
                                  <th class="text-center">Occ. parc ≥ 2006</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row"> < PLAI</td>
                                <td>@{{ (((dt1[0].c40*1) + (dt1[0].c41*1) + (dt1[0].c42*1)) / (dt1[0].ens_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c40*1) + (dt1[1].b6*1) + (dt1[1].c41*1) + (dt1[1].b10*1) + (dt1[1].c18*1) + (dt1[1].b18*1))/ (dt1[1].ens_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c18*1) + (dt1[1].c40*1) + (dt1[1].c41*1))/ (dt1[1].ens_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c30*1) + (dt1[1].c22*1))/ (dt1[1].ens_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b18*1) + (dt1[1].b6*1) + (dt1[1].b10*1))/ (dt1[1].ens_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt1[0].c40*1) + (dt1[0].c41*1)) / (dt1[0].pp_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c40*1) + (dt1[1].b6*1) + (dt1[1].c41*1) + (dt1[1].b10*1))/ (dt1[1].pp_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c40*1) + (dt1[1].c41*1))/ (dt1[1].pp_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c30*1))/ (dt1[1].pp_occ_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b6*1) + (dt1[1].b10*1))/ (dt1[1].pp_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt1[0].c42*1)) / (dt1[0].ps_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c18*1) + (dt1[1].b18*1))/ (dt1[1].ps_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c18*1))/ (dt1[1].ps_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c22*1))/ (dt1[1].ps_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b18*1))/ (dt1[1].ps_occ_parc_sup06*1)*100| number:1}}%</td>

                                </tr>
                                <tr><td scope="row"> > PLAI < PLUS </td>
                                <td>@{{ (((dt1[0].c45*1) + (dt1[0].c46*1) + (dt1[0].c47*1)) / (dt1[0].ens_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c45*1) + (dt1[1].b7*1) + (dt1[1].c46*1) + (dt1[1].b11*1) + (dt1[1].c19*1) + (dt1[1].b19*1))/ (dt1[1].ens_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c19*1) + (dt1[1].c45*1) + (dt1[1].c46*1))/ (dt1[1].ens_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c31*1) + (dt1[1].c23*1))/ (dt1[1].ens_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b19*1) + (dt1[1].b7*1) + (dt1[1].b11*1))/ (dt1[1].ens_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt1[0].c45*1) + (dt1[0].c46*1)) / (dt1[0].pp_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c45*1) + (dt1[1].b7*1) + (dt1[1].c46*1) + (dt1[1].b11*1))/ (dt1[1].pp_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c45*1) + (dt1[1].c46*1))/ (dt1[1].pp_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c31*1))/ (dt1[1].pp_occ_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b7*1) + (dt1[1].b11*1))/ (dt1[1].pp_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt1[0].c47*1)) / (dt1[0].ps_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c19*1) + (dt1[1].b19*1))/ (dt1[1].ps_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c19*1))/ (dt1[1].ps_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c23*1))/ (dt1[1].ps_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b19*1))/ (dt1[1].ps_occ_parc_sup06*1)*100| number:1}}%</td>
                                </tr>

                                <tr><td scope="row"> > PLUS < PLS </td>
                                <td>@{{ (((dt1[0].c50*1) + (dt1[0].c51*1) + (dt1[0].c52*1)) / (dt1[0].ens_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c50*1) + (dt1[1].b8*1) + (dt1[1].c51*1) + (dt1[1].b12*1) + (dt1[1].c20*1) + (dt1[1].b20*1))/ (dt1[1].ens_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c20*1) + (dt1[1].c50*1) + (dt1[1].c51*1))/ (dt1[1].ens_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c32*1) + (dt1[1].c24*1))/ (dt1[1].ens_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b20*1) + (dt1[1].b8*1) + (dt1[1].b12*1))/ (dt1[1].ens_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt1[0].c50*1) + (dt1[0].c51*1)) / (dt1[0].pp_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c50*1) + (dt1[1].b8*1) + (dt1[1].c51*1) + (dt1[1].b12*1))/ (dt1[1].pp_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c50*1) + (dt1[1].c51*1))/ (dt1[1].pp_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c32*1))/ (dt1[1].pp_occ_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b8*1) + (dt1[1].b12*1))/ (dt1[1].pp_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt1[0].c52*1)) / (dt1[0].ps_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c20*1) + (dt1[1].b20*1))/ (dt1[1].ps_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c20*1))/ (dt1[1].ps_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c24*1))/ (dt1[1].ps_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b20*1))/ (dt1[1].ps_occ_parc_sup06*1)*100| number:1}}%</td>
                                </tr>

                                <tr><td scope="row"> > PLS </td>
                                <td>@{{ (((dt1[0].c55*1) + (dt1[0].c56*1) + (dt1[0].c57*1)) / (dt1[0].ens_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c55*1) + (dt1[1].b9*1) + (dt1[1].c56*1) + (dt1[1].b13*1) + (dt1[1].c21*1) + (dt1[1].b21*1))/ (dt1[1].ens_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c21*1) + (dt1[1].c55*1) + (dt1[1].c56*1))/ (dt1[1].ens_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c33*1) + (dt1[1].c25*1))/ (dt1[1].ens_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b21*1) + (dt1[1].b9*1) + (dt1[1].b13*1))/ (dt1[1].ens_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt1[0].c55*1) + (dt1[0].c56*1)) / (dt1[0].pp_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c55*1) + (dt1[1].b9*1) + (dt1[1].c51*1) + (dt1[1].b12*1))/ (dt1[1].pp_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c55*1) + (dt1[1].c56*1))/ (dt1[1].pp_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c33*1))/ (dt1[1].pp_occ_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b9*1) + (dt1[1].b13*1))/ (dt1[1].pp_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt1[0].c57*1)) / (dt1[0].ps_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt1[1].c21*1) + (dt1[1].b21*1))/ (dt1[1].ps_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c21*1))/ (dt1[1].ps_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].c25*1))/ (dt1[1].ps_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt1[1].b21*1))/ (dt1[1].ps_occ_parc_sup06*1)*100| number:1}}%</td>
                                </tr>
                               </tbody>
                          </table>
                          <br>

                          <p><span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info " aria-hidden="true"></i> Référence ménages < PLAI </span></p>


                           <table class="table table-sm table-bordered fbm-table" id="table_3b">
                              <thead>
                               <tr class="info">
                                  <th colspan="16" class="info" ><i class="fa fa-chevron-circle-down text-border" aria-hidden="true"></i> Environnement (bordure 500m)</th>
                                </tr>
                                <tr style="background-color:#dee0cb;">
                                  <th colspan="6" class="fbm-table-right">ENEMBLE DES MÉNAGES</th>
                                  <th colspan="5" class="fbm-table-right" style="background-color:#f6f9db;">PARC PRIVÉ</th>
                                  <th colspan="5" class="fbm-table-right">PARC SOCIAL</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center">Tot. occ. 03</th>
                                  <th class="text-center">Tot. occ. 13</th>
                                  <th class="text-center">Occ. parc < 2006</th>
                                  <th class="text-center">ER parc < 2006</th>
                                  <th class="text-center">Occ. parc ≥ 2006</th>
                                  <th class="text-center">Tot. occ. 03</th>
                                  <th class="text-center">Tot. occ. 13</th>
                                  <th class="text-center">Occ. parc < 2006</th>
                                  <th class="text-center">ER parc < 2006</th>
                                  <th class="text-center">Occ. parc ≥ 2006</th>
                                   <th class="text-center">Tot. occ. 03</th>
                                  <th class="text-center">Tot. occ. 13</th>
                                  <th class="text-center">Occ. parc < 2006</th>
                                  <th class="text-center">ER parc < 2006</th>
                                  <th class="text-center">Occ. parc ≥ 2006</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row"> < PLAI</td>
                                <td>@{{ (((dt2[0].c40*1) + (dt2[0].c41*1) + (dt2[0].c42*1)) / (dt2[0].ens_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt2[1].c40*1) + (dt2[1].b6*1) + (dt2[1].c41*1) + (dt2[1].b10*1) + (dt2[1].c18*1) + (dt2[1].b18*1))/ (dt2[1].ens_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt2[1].c18*1) + (dt2[1].c40*1) + (dt2[1].c41*1))/ (dt2[1].ens_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt2[1].c30*1) + (dt2[1].c22*1))/ (dt2[1].ens_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt2[1].b18*1) + (dt2[1].b6*1) + (dt2[1].b10*1))/ (dt2[1].ens_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt2[0].c40*1) + (dt2[0].c41*1)) / (dt2[0].pp_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt2[1].c40*1) + (dt2[1].b6*1) + (dt2[1].c41*1) + (dt2[1].b10*1))/ (dt2[1].pp_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt2[1].c40*1) + (dt2[1].c41*1))/ (dt2[1].pp_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt2[1].c30*1))/ (dt2[1].pp_occ_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt2[1].b6*1) + (dt2[1].b10*1))/ (dt2[1].pp_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt2[0].c42*1)) / (dt2[0].ps_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt2[1].c18*1) + (dt2[1].b18*1))/ (dt2[1].ps_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt2[1].c18*1))/ (dt2[1].ps_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt2[1].c22*1))/ (dt2[1].ps_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt2[1].b18*1))/ (dt2[1].ps_occ_parc_sup06*1)*100| number:1}}%</td>
                               </tbody>
                          </table>
                          <p style="page-break-before: always"></p>

                           <table class="table table-sm table-bordered fbm-table" id="table_3c">
                              <thead>
                               <tr class="info">
                                  <th colspan="16" class="info"  ><i class="fa fa-chevron-circle-down text-horsq" aria-hidden="true"></i> Commune hors ZUS et QPV</th>
                                </tr>
                                <tr style="background-color:#dee0cb;">
                                  <th colspan="6" class="fbm-table-right">ENEMBLE DES MÉNAGES</th>
                                  <th colspan="5" class="fbm-table-right" style="background-color:#f6f9db;">PARC PRIVÉ</th>
                                  <th colspan="5" class="fbm-table-right">PARC SOCIAL</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center">Tot. occ. 03</th>
                                  <th class="text-center">Tot. occ. 13</th>
                                  <th class="text-center">Occ. parc < 2006</th>
                                  <th class="text-center">ER parc < 2006</th>
                                  <th class="text-center">Occ. parc ≥ 2006</th>
                                  <th class="text-center">Tot. occ. 03</th>
                                  <th class="text-center">Tot. occ. 13</th>
                                  <th class="text-center">Occ. parc < 2006</th>
                                  <th class="text-center">ER parc < 2006</th>
                                  <th class="text-center">Occ. parc ≥ 2006</th>
                                   <th class="text-center">Tot. occ. 03</th>
                                  <th class="text-center">Tot. occ. 13</th>
                                  <th class="text-center">Occ. parc < 2006</th>
                                  <th class="text-center">ER parc < 2006</th>
                                  <th class="text-center">Occ. parc ≥ 2006</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row"> < PLAI</td>
                                <td>@{{ (((dt3[0].c40*1) + (dt3[0].c41*1) + (dt3[0].c42*1)) / (dt3[0].ens_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt3[1].c40*1) + (dt3[1].b6*1) + (dt3[1].c41*1) + (dt3[1].b10*1) + (dt3[1].c18*1) + (dt3[1].b18*1))/ (dt3[1].ens_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt3[1].c18*1) + (dt3[1].c40*1) + (dt3[1].c41*1))/ (dt3[1].ens_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt3[1].c30*1) + (dt3[1].c22*1))/ (dt3[1].ens_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt3[1].b18*1) + (dt3[1].b6*1) + (dt3[1].b10*1))/ (dt3[1].ens_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt3[0].c40*1) + (dt3[0].c41*1)) / (dt3[0].pp_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt3[1].c40*1) + (dt3[1].b6*1) + (dt3[1].c41*1) + (dt3[1].b10*1))/ (dt3[1].pp_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt3[1].c40*1) + (dt3[1].c41*1))/ (dt3[1].pp_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt3[1].c30*1))/ (dt3[1].pp_occ_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt3[1].b6*1) + (dt3[1].b10*1))/ (dt3[1].pp_occ_parc_sup06*1)*100| number:1}}%</td>

                                <td>@{{ (((dt3[0].c42*1)) / (dt3[0].ps_occ_03*1))*100 | number:1 }}%</td>
                                <td>@{{ ((dt3[1].c18*1) + (dt3[1].b18*1))/ (dt3[1].ps_occ_13*1)*100| number:1}}%</td>
                                <td>@{{ ((dt3[1].c18*1))/ (dt3[1].ps_occ_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt3[1].c22*1))/ (dt3[1].ps_er_parc_inf06*1)*100| number:1}}%</td>
                                <td>@{{ ((dt3[1].b18*1))/ (dt3[1].ps_occ_parc_sup06*1)*100| number:1}}%</td>
                               </tbody>
                          </table>
                  </div>

              </div><!-- end row -->
              <div class="row">

                <div class="col-md-12">
                <p><span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i>  Evolution de l'occupation du parc (total) </span></p>
               
                 <table class="table table-sm table-bordered fbm-table" id="table_3d">
                              <thead>
                              <tr><th></th><th></th><th></th><th></th></tr>
                                <tr>
                                <th></th>
                                  <th class="fbm-table-right">TOTAL</th>
                                  <th  class="fbm-table-right">PARC PRIVÉ</th>
                                  <th  class="fbm-table-right">PARC SOCIAL</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr style="background-color:#dee0cb;text-align: center;">
                                <td scope="row">Ev° 2003-2013 </td>
                                <td style="text-align: center;" ng-class="{'Diversification':'bg-primary', 'Fragilisation':'bg-info'}[dt4[0].tot_status]">@{{dt4[0].tot_status}}</td>
                                <td style="text-align: center;" ng-class="{'Diversification':'bg-primary', 'Fragilisation':'bg-info'}[dt4[0].pp_status]">@{{dt4[0].pp_status}}</td>
                                <td style="text-align: center;" ng-class="{'Diversification':'bg-primary', 'Fragilisation':'bg-info'}[dt4[0].ps_status]">@{{dt4[0].ps_status}}</td>
                                </tr>
                               </tbody>
                          </table>

                          <br>
                          <br>
                          

                </div>
              </div>
             <div class="row">

                <div class="col-md-12">
                <p><span class="fbm-table-enphase"><i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i>  Evolution de l'occupation du parc construit avant 2006 </span></p>
               
                 <table class="table table-sm table-bordered fbm-table" id="table_3e">
                              <thead>
                              <tr><th></th><th></th><th></th><th></th></tr>
                                <tr>
                                <th></th>
                                  <th class="fbm-table-right">TOTAL</th>
                                  <th  class="fbm-table-right">PARC PRIVÉ</th>
                                  <th  class="fbm-table-right">PARC SOCIAL</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr style="background-color:#dee0cb;text-align: center;">
                                <td scope="row">Ev° 2003-2013 </td>
                                <td style="text-align: center;" ng-class="{'Diversification':'bg-primary', 'Fragilisation':'bg-info'}[dt5[0].tot_status]">@{{dt5[0].tot_status}}</td>
                                <td style="text-align: center;" ng-class="{'Diversification':'bg-primary', 'Fragilisation':'bg-info'}[dt5[0].pp_status]">@{{dt5[0].pp_status}}</td>
                                <td style="text-align: center;" ng-class="{'Diversification':'bg-primary', 'Fragilisation':'bg-info'}[dt5[0].ps_status]">@{{dt5[0].ps_status}}</td>
                                </tr>
                               </tbody>
                          </table>

                          <br>
                          <br>
                </div>
              </div>
          </div> <!-- end tab sec 3 -->
  </div><!-- end tabs content -->
</div>
@endsection