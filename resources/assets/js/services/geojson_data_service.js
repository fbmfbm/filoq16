
app.service('GeoJsonData',['$http', function($http){

    return {
       
        getGeoData: function(refCode, refScale, refDep){

            var prop_query, filter_query, geom_query = '';

            switch(refScale){

            case 'dep':
                prop_query = " SELECT 'dep' AS scale, codegeo AS code, libgeo AS label ";
                geom_query = " ST_AsGeoJSON(ST_UNION(ST_TRANSFORM(lg.geom,4326)),5)::json As geometry, ";
                filter_query = " FROM geodep15 As lg WHERE  geom IS NOT NULL  GROUP BY codegeo, libgeo ";
                break;
            case 'com':
                prop_query = " SELECT 'com' AS scale, insee AS code, nom AS label ";
                geom_query = " ST_AsGeoJSON(ST_TRANSFORM(lg.geom,4326),5)::json As geometry, ";
                filter_query = " FROM geocom15 As lg WHERE dep like '"+refCode+"' AND geom IS NOT NULL  ORDER BY nom ";
                break;
            case 'comselect':
                prop_query = " SELECT 'comselect' AS scale, insee AS code, nom AS label ";
                geom_query = " ST_AsGeoJSON(ST_TRANSFORM(lg.geom,4326),5)::json As geometry, ";
                filter_query = " FROM geocom15 As lg WHERE insee like '"+refCode+"' AND geom IS NOT NULL  ORDER BY nom ";
                break; 
            default:
               prop_query = "  SELECT 'quart' AS scale ,id_convent AS code, nom AS label  ";
                geom_query = " ST_AsGeoJSON(ST_TRANSFORM(lg.geom,4326),5)::json As geometry, ";
                filter_query = " FROM qru16 As lg WHERE geom IS NOT NULL ORDER BY id_convent";
            }


            var promise = $http.post('/jx/geojson', {refScale: refScale, refCode: refCode, geomQuery : geom_query, propQuery : prop_query, filterQuery : filter_query}).then(function(response){

                return response.data;
            });


            return promise;
        },  

    }

    }]);
