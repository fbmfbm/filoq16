@extends('layouts.app')

@section('content')
<br>
<div class="container container-fluid" ng-controller="OffreCtrl">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
             <div class="card-header">THÉMATIQUES :</div>
                <div class="card-block">
                   
                    <h4 class="card-title">Structure de l'offre de logement et profil démographique</h4>
                    <h6 class="card-subtitle text-muted">FILOCOM au Quartier - Premiers effets de la rénovation urbaine</h6>

                        <br>
                        <div class="card-text">
                            @{{offreCtrlMsg}}
                          </div>
                                </div>
                            </div>
                             </div>
                        </div>
                            <div class="row">
                                <div class="col-md-6">

                                <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right">@{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" >
                                  <th></th>
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center"></th>
                                  <th class="text-center">%</th>
                                  <th class="text-center"></th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row">Nombre total de lgts</td><td>@{{dt1[0].a0 | number:0}}</td><td></td><td>@{{dt1[1].a0 | number:0}}</td><td></td></tr>
                                <tr><td scope="row">Dt lgts vacants</td><td>@{{(dt1[0].a62*1) + (dt1[0].a63*1)| number:0 }}</td><td>@{{(((dt1[0].a62*1) + (dt1[0].a63*1))/dt1[0].a0*1)*100| number:1 }}%</td><td>@{{(dt1[1].a62*1) + (dt1[1].a63*1)| number:0 }}</td><td>@{{(((dt1[1].a62*1) + (dt1[1].a63*1))/dt1[1].a0*1)*100| number:1 }}%</td></tr>
                                <tr><td scope="row">dt privé </td><td>@{{dt1[0].a62  | number:0}}</td><td>@{{((dt1[0].a62*1)/((dt1[0].a62*1)+(dt1[0].a2*1)+(dt1[0].a3*1)))*100 | number:1 }}%</td><td>@{{dt1[1].a62  | number:0}}</td><td>@{{((dt1[1].a62*1)/((dt1[1].a62*1)+(dt1[1].a2*1)+(dt1[1].a3*1)))*100 | number:1 }}%</td></tr>
                                <tr><td scope="row">dt public </td><td>@{{dt1[0].a63 | number:0}}</td><td>@{{(dt1[0].a63*1) /((dt1[0].a4*1)+(dt1[0].a63*1))*100| number:1 }}%</td><td>@{{dt1[1].a63 | number:0}}</td><td>@{{(dt1[1].a63*1) /((dt1[1].a4*1)+(dt1[1].a63*1))*100| number:1 }}%</td></tr>
                               </tbody>
                            </table>
                        </div>
                         <div class="col-md-3">
                                     <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right">Environnement (frange 500m)</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" > 
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
                                <tr><td>@{{dt2[0].a0 | number:0}}</td><td></td><td>@{{dt2[1].a0 | number:0}}</td><td></td></tr>
                                <tr><td>@{{(dt2[0].a62*1) + (dt2[0].a63*1)| number:0 }}</td><td>@{{(((dt2[0].a62*1) + (dt2[0].a63*1))/dt2[0].a0*1)*100| number:1 }}%</td><td>@{{(dt2[1].a62*1) + (dt2[1].a63*1)| number:0 }}</td><td>@{{(((dt2[1].a62*1) + (dt2[1].a63*1))/dt2[1].a0*1)*100| number:1 }}%</td></tr>
                                <tr><td>@{{dt2[0].a62  | number:0}}</td><td>@{{((dt2[0].a62*1)/((dt2[0].a62*1)+(dt2[0].a2*1)+(dt2[0].a3*1)))*100 | number:1 }}%</td><td>@{{dt2[1].a62  | number:0}}</td><td>@{{((dt2[1].a62*1)/((dt2[1].a62*1)+(dt2[1].a2*1)+(dt2[1].a3*1)))*100 | number:1 }}%</td></tr>
                                <tr><td>@{{dt2[0].a63 | number:0}}</td><td>@{{(dt2[0].a63*1) /((dt2[0].a4*1)+(dt2[0].a63*1))*100| number:1 }}%</td><td>@{{dt2[1].a63 | number:0}}</td><td>@{{(dt2[1].a63*1) /((dt2[1].a4*1)+(dt2[1].a63*1))*100| number:1 }}%</td></tr>
                               </tbody>
                            </table>
                                 </div>
                                <div class="col-md-3">
                                    <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right">Commune hors ZUS et QPV</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" >
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
                                <tr><td>@{{dt3[0].a0 | number:0}}</td><td></td><td>@{{dt3[1].a0 | number:0}}</td><td></td></tr>
                                <tr><td>@{{(dt3[0].a62*1) + (dt3[0].a63*1)| number:0 }}</td><td>@{{(((dt3[0].a62*1) + (dt3[0].a63*1))/dt3[0].a0*1)*100| number:1 }}%</td><td>@{{(dt3[1].a62*1) + (dt3[1].a63*1)| number:0 }}</td><td>@{{(((dt3[1].a62*1) + (dt3[1].a63*1))/dt3[1].a0*1)*100| number:1 }}%</td></tr>
                                <tr><td>@{{dt3[0].a62  | number:0}}</td><td>@{{((dt3[0].a62*1)/((dt3[0].a62*1)+(dt3[0].a2*1)+(dt3[0].a3*1)))*100 | number:1 }}%</td><td>@{{dt3[1].a62  | number:0}}</td><td>@{{((dt3[1].a62*1)/((dt3[1].a62*1)+(dt3[1].a2*1)+(dt3[1].a3*1)))*100 | number:1 }}%</td></tr>
                                <tr><td>@{{dt3[0].a63 | number:0}}</td><td>@{{(dt3[0].a63*1) /((dt3[0].a4*1)+(dt3[0].a63*1))*100| number:1 }}%</td><td>@{{dt3[1].a63 | number:0}}</td><td>@{{(dt3[1].a63*1) /((dt3[1].a4*1)+(dt3[1].a63*1))*100| number:1 }}%</td></tr>
                               </tbody>
                            </table>
                                </div>
                                <div class="col-md-12">
                                <hr>
                                <span class="fbm-table-enphase">Poids du quartier dans la commune - LOGTS :</span>
                                <hr>    
                                </div>
                            </div>
                         <!-- ########################################## TABLEAU B ################################################################## -->
                         <div class="row">
                                <div class="col-md-6">

                                <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right">@{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" >
                                  <th></th>
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center"></th>
                                  <th class="text-center">%</th>
                                  <th class="text-center"></th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row">Résidences principales</td><td>@{{dt1[0].a1 | number:0}}</td><td></td><td>@{{dt1[1].a1 | number:0}}</td><td></td></tr>
                                <tr><td scope="row">Propriétaires occupants</td><td>@{{dt1[0].a2 | number:0}}</td><td>@{{(dt1[0].a2 /dt1[0].a1)*100 | number:1}}%</td><td>@{{dt1[1].a2 | number:0}}</td><td>@{{(dt1[1].a2 /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Locataires du parc privé</td><td>@{{dt1[0].a3 | number:0}}</td><td>@{{(dt1[0].a3 /dt1[0].a1)*100 | number:1}}%</td><td>@{{dt1[1].a3 | number:0}}</td><td>@{{(dt1[1].a3 /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Total Parc Privé</td><td>@{{(dt1[0].a2*1) +(dt1[0].a3*1) | number:0}}</td><td>@{{(((dt1[0].a2*1)+(dt1[0].a3*1))/dt1[0].a1)*100 | number:1}}%</td><td>@{{(dt1[1].a2*1) +(dt1[1].a3*1) | number:1}}</td><td>@{{(((dt1[1].a2*1) +(dt1[1].a3*1)) /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Locataires du HLM</td><td>@{{dt1[0].a4 | number:0}}</td><td>@{{(dt1[0].a4 /dt1[0].a1)*100 | number:1}}%</td><td>@{{dt1[1].a4 | number:0}}</td><td>@{{(dt1[1].a4 /dt1[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">Autres</td><td>@{{dt1[0].a5 | number:0}}</td><td>@{{(dt1[0].a5 /dt1[0].a1)*100 | number:1}}%</td><td>@{{dt1[1].a5 | number:0}}</td><td>@{{(dt1[1].a5 /dt1[1].a1)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                        </div>
                         <div class="col-md-3">
                                     <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right">Environnement (frange 500m)</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" > 
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
                                <tr><td>@{{dt2[0].a1 | number:0}}</td><td></td><td>@{{dt2[1].a1 | number:0}}</td><td></td></tr>
                                <tr><td>@{{dt2[0].a2 | number:0}}</td><td>@{{(dt2[0].a2 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a2 | number:0}}</td><td>@{{(dt2[1].a2 /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a3 | number:0}}</td><td>@{{(dt2[0].a3 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a3 | number:0}}</td><td>@{{(dt2[1].a3 /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{(dt2[0].a2*1) +(dt2[0].a3*1) | number:0}}</td><td>@{{(((dt2[0].a2*1)+(dt2[0].a3*1))/dt2[0].a1)*100 | number:1}}%</td><td>@{{(dt2[1].a2*1) +(dt2[1].a3*1) | number:1}}</td><td>@{{(((dt2[1].a2*1) +(dt2[1].a3*1)) /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a4 | number:0}}</td><td>@{{(dt2[0].a4 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a4 | number:0}}</td><td>@{{(dt2[1].a4 /dt2[1].a1)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a5 | number:0}}</td><td>@{{(dt2[0].a5 /dt2[0].a1)*100 | number:1}}%</td><td>@{{dt2[1].a5 | number:0}}</td><td>@{{(dt2[1].a5 /dt2[1].a1)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                                 </div>
                                <div class="col-md-3">
                                    <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right">Commune hors ZUS et QPV</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" >
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
                                <tr><td>@{{dt3[0].a1 | number:0}}</td><td></td><td>@{{dt3[1].a1 | number:0}}</td><td></td></tr>
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
                                <span class="fbm-table-enphase">Poids du quartier dans la commune - HLM :</span>
                                <hr>    
                                </div>
                            </div>
                             <!-- ########################################## TABLEAU C ################################################################## -->
                         <div class="row">
                                <div class="col-md-6">

                                <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right">@{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" >
                                  <th></th>
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center"></th>
                                  <th class="text-center">%</th>
                                  <th class="text-center"></th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row">1 à 2 pièces</td><td>@{{dt1[0].a66 | number:0}}</td><td>@{{dt1[0].a66/dt1[0].ta66_a68*100 | number:1}}%</td><td>@{{dt1[1].a66 | number:0}}</td><td>@{{dt1[1].a66/dt1[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td scope="row">3 à 4 pièces</td><td>@{{dt1[0].a67 | number:0}}</td><td>@{{dt1[0].a67/dt1[0].ta66_a68*100 | number:1}}%</td><td>@{{dt1[1].a67 | number:0}}</td><td>@{{dt1[1].a67/dt1[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>5 pièces ou plus</td><td>@{{dt1[0].a68 | number:0}}</td><td>@{{dt1[0].a68/dt1[0].ta66_a68*100 | number:1}}%</td><td>@{{dt1[1].a68 | number:0}}</td><td>@{{dt1[1].a68/dt1[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td scope="row" colspan="5"><br></tr>
                                <tr><td scope="row">Population fiscale</td><td>@{{dt1[0].b61 | number:0}}</td><td>@{{dt1[0].b61/(dt1[0].a66*1+dt1[0].a67*1+dt1[0].a68*1)| number:1}}%</td><td>@{{dt1[1].b61 | number:0}}</td><td>@{{dt1[1].b61/(dt1[1].a66*1+dt1[1].a67*1+dt1[1].a68*1)| number:1}}%</td></tr>
                                <tr><td scope="row">Taille moyenne des ménages</td><td>@{{dt1[0].b60 | number:1}}</td><td></td><td>@{{dt1[1].b60 | number:1}}</td><td></td></tr>
                               </tbody>
                            </table>
                        </div>
                         <div class="col-md-3">
                                     <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right">Environnement (frange 500m)</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" > 
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
                                <tr><td>@{{dt2[0].a66 | number:0}}</td><td>@{{dt2[0].a66/dt2[0].ta66_a68*100 | number:1}}%</td><td>@{{dt2[1].a66 | number:0}}</td><td>@{{dt2[1].a66/dt2[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a67 | number:0}}</td><td>@{{dt2[0].a67/dt2[0].ta66_a68*100 | number:1}}%</td><td>@{{dt2[1].a67 | number:0}}</td><td>@{{dt2[1].a67/dt2[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a68 | number:0}}</td><td>@{{dt2[0].a68/dt2[0].ta66_a68*100 | number:1}}%</td><td>@{{dt2[1].a68 | number:0}}</td><td>@{{dt2[1].a68/dt2[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td scope="row" colspan="5"><br></tr>
                                <tr><td>@{{dt2[0].b61 | number:0}}</td><td>@{{dt2[0].b61/(dt2[0].a66*1+dt2[0].a67*1+dt2[0].a68*1)| number:1}}%</td><td>@{{dt2[1].b61 | number:0}}</td><td>@{{dt2[1].b61/(dt2[1].a66*1+dt2[1].a67*1+dt2[1].a68*1)| number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].b60 | number:1}}</td><td></td><td>@{{dt2[1].b60 | number:1}}</td><td></td></tr>
                               </tbody>
                            </table>
                                 </div>
                                <div class="col-md-3">
                                    <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right">Commune hors ZUS et QPV</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" >
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
                                <tr><td>@{{dt3[0].a66 | number:0}}</td><td>@{{dt3[0].a66/dt3[0].ta66_a68*100 | number:1}}%</td><td>@{{dt3[1].a66 | number:0}}</td><td>@{{dt3[1].a66/dt3[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a67 | number:0}}</td><td>@{{dt3[0].a67/dt3[0].ta66_a68*100 | number:1}}%</td><td>@{{dt3[1].a67 | number:0}}</td><td>@{{dt3[1].a67/dt3[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a68 | number:0}}</td><td>@{{dt3[0].a68/dt3[0].ta66_a68*100 | number:1}}%</td><td>@{{dt3[1].a68 | number:0}}</td><td>@{{dt3[1].a68/dt3[1].ta66_a68*100 | number:1}}%</td></tr>
                                <tr><td scope="row" colspan="5"><br></tr>
                                <tr><td>@{{dt3[0].b61 | number:0}}</td><td>@{{dt3[0].b61/(dt3[0].a66*1+dt3[0].a67*1+dt3[0].a68*1)| number:1}}%</td><td>@{{dt3[1].b61 | number:0}}</td><td>@{{dt3[1].b61/(dt3[1].a66*1+dt3[1].a67*1+dt3[1].a68*1)| number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].b60 | number:1}}</td><td></td><td>@{{dt3[1].b60 | number:1}}</td><td></td></tr
                               </tbody>
                            </table>
                                </div>
                                <div class="col-md-12">
                                <hr>
                                <span class="fbm-table-enphase">Poids du quartier dans la commune - POP° :</span>
                                <hr>    
                                </div>
                            </div>
                            <!-- ########################################## TABLEAU D ################################################################## -->
                         <div class="row">
                                <div class="col-md-6">

                                <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right">@{{ter1Label}} (@{{codeDep}})</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" >
                                  <th></th>
                                  <th colspan="2">2003</th>
                                  <th colspan="2">2013</th>
                                </tr>
                                <tr  class="table-active">
                                  <th></th>
                                  <th class="text-center"></th>
                                  <th class="text-center">%</th>
                                  <th class="text-center"></th>
                                  <th class="text-center">%</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                <tr><td scope="row">< 30 ans</td><td>@{{dt1[0].a18 | number:0}}</td><td>@{{(dt1[0].a18/ dt1[0].t18_22)*100 | number:1}}%</td><td>@{{dt1[1].a18 | number:0}}</td><td>@{{(dt1[1].a18/ dt1[1].t18_22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">30-39 ans</td><td>@{{dt1[0].a19 | number:0}}</td><td>@{{(dt1[0].a19/ dt1[0].t18_22)*100 | number:1}}%</td><td>@{{dt1[1].a19 | number:0}}</td><td>@{{(dt1[1].a19/ dt1[1].t18_22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">40-59 ans</td><td>@{{dt1[0].a20 | number:0}}</td><td>@{{(dt1[0].a20/ dt1[0].t18_22)*100 | number:1}}%</td><td>@{{dt1[1].a20 | number:0}}</td><td>@{{(dt1[1].a20/ dt1[1].t18_22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">60-75 ans</td><td>@{{dt1[0].a21 | number:0}}</td><td>@{{(dt1[0].a21/ dt1[0].t18_22)*100 | number:1}}%</td><td>@{{dt1[1].a21 | number:0}}</td><td>@{{(dt1[1].a21/ dt1[1].t18_22)*100 | number:1}}%</td></tr>
                                <tr><td scope="row">> 75 ans</td><td>@{{dt1[0].a22 | number:0}}</td><td>@{{(dt1[0].a22/ dt1[0].t18_22)*100 | number:1}}%</td><td>@{{dt1[1].a22 | number:0}}</td><td>@{{(dt1[1].a22/ dt1[1].t18_22)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                        </div>
                         <div class="col-md-3">
                                     <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                              <tr>
                                  <th colspan="5" class="fbm-table-right">Environnement (frange 500m)</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" > 
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
                                 <tr><td>@{{dt2[0].a18 | number:0}}</td><td>@{{(dt2[0].a18/ dt2[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt2[1].a18 | number:0}}</td><td>@{{(dt2[1].a18/ dt2[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a19 | number:0}}</td><td>@{{(dt2[0].a19/ dt2[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt2[1].a19 | number:0}}</td><td>@{{(dt2[1].a19/ dt2[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a20 | number:0}}</td><td>@{{(dt2[0].a20/ dt2[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt2[1].a20 | number:0}}</td><td>@{{(dt2[1].a20/ dt2[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a21 | number:0}}</td><td>@{{(dt2[0].a21/ dt2[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt2[1].a21 | number:0}}</td><td>@{{(dt2[1].a21/ dt2[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt2[0].a22 | number:0}}</td><td>@{{(dt2[0].a22/ dt2[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt2[1].a22 | number:0}}</td><td>@{{(dt2[1].a22/ dt2[1].ta18_a22)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                                 </div>
                                <div class="col-md-3">
                                    <table class="table table-sm table-bordered table-striped fbm-table">
                              <thead>
                                <tr>
                                  <th colspan="5" class="fbm-table-right">Commune hors ZUS et QPV</th>
                                </tr>
                                <tr class="table-inverse text-center fbm-table-header" >
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
                                <tr><td>@{{dt3[0].a18 | number:0}}</td><td>@{{(dt3[0].a18/ dt3[0].ta18_a22)| number:1}}%</td><td>@{{dt3[1].a18 | number:0}}</td><td>@{{(dt3[1].a18/ dt3[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a19 | number:0}}</td><td>@{{(dt3[0].a19/ dt3[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt3[1].a19 | number:0}}</td><td>@{{(dt3[1].a19/ dt3[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a20 | number:0}}</td><td>@{{(dt3[0].a20/ dt3[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt3[1].a20 | number:0}}</td><td>@{{(dt3[1].a20/ dt3[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a21 | number:0}}</td><td>@{{(dt3[0].a21/ dt3[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt3[1].a21 | number:0}}</td><td>@{{(dt3[1].a21/ dt3[1].ta18_a22)*100 | number:1}}%</td></tr>
                                <tr><td>@{{dt3[0].a22 | number:0}}</td><td>@{{(dt3[0].a22/ dt3[0].ta18_a22)*100 | number:1}}%</td><td>@{{dt3[1].a22 | number:0}}</td><td>@{{(dt3[1].a22/ dt3[1].ta18_a22)*100 | number:1}}%</td></tr>
                               </tbody>
                            </table>
                                </div>
                                <div class="col-md-12">
                                <hr>
                                <span class="fbm-table-enphase">Taux de ménages de 60 ans et plus :
                                  <i class="fa fa-arrow-circle-right text-info" aria-hidden="true"></i> 2003 = @{{(((dt3[0].a21/ dt3[0].ta18_a22))+((dt3[0].a22/ dt3[0].ta18_a22)))*100| number:1}}%   
                                  <i class="fa fa-arrow-circle-right " aria-hidden="true"></i> 2013 = @{{(((dt3[1].a21/ dt3[1].ta18_a22))+((dt3[1].a22/ dt3[1].ta18_a22)))*100| number:1}}%
                                </span>
                                <hr>    
                                </div>
                            </div>
</div>
@endsection
