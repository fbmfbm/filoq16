<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class AjaxController extends Controller
{
    public function getGeoJson(\Illuminate\Http\Request $request)
    {

    	$db_bis =  DB::connection('pgsql2');


    	$refScale = $request->refScale;
        $refCode = $request->refCode;
        $refDep = $request->refDep;
        $prop_query = $request->propQuery;
        $filter_query = $request->filterQuery;
        $geom_query = $request->geomQuery;

         $query = " SELECT row_to_json(fc)";
         $query .= " FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features";
         $query .= " FROM (SELECT 'Feature' As type, ";
         $query .= $geom_query;
         $query .= " row_to_json((SELECT l FROM (".$prop_query.") As l )) As properties ";
         $query .= " ".$filter_query." ) As f )  As fc; ";

         $data_geo = $db_bis->select(DB::raw($query));

    	$response = array(
            'status' => 'success',
            'msg' => 'recupération des objets GeoJson réalisé',
            'data'   => $data_geo
        );

        return \Response::json( $response );
    }

    public function getPGData(\Illuminate\Http\Request $request)
    {

        $db_bis =  DB::connection('pgsql2');
        $refScale = $request->refScale;
        $refCode = $request->refCode;
        $filter_query = $request->filterQuery;
        $query =  $filter_query;
        $data = $db_bis->select(DB::raw($query));

        $response = array(
            'status' => 'success',
            'msg' => 'recupération des données dans la table réalisée',
            'data'   => $data
        );

        return \Response::json( $response );
    }
}