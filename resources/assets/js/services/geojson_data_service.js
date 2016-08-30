
app.service('GeoJsonData',['$http', function($http){

    return {
       
        getGeoData: function(refCode, refScale, refDep){

            var prop_query, filter_query, geom_query = '';

            switch(refScale){

            case 'dep':
                prop_query = " SELECT 'dep' AS scale, codegeo AS code, libgeo AS label ";
                geom_query = " ST_AsGeoJSON(ST_UNION(ST_TRANSFORM(lg.geom,4326)),5)::json As geometry, ";
                filter_query = " FROM geodep15 As lg WHERE codegeo IN ('75', '92', '93', '94') AND geom IS NOT NULL  GROUP BY codegeo, libgeo ";
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
            case 'horsq':
                prop_query = " SELECT 'comselect' AS scale, lg.insee AS code, lg.nom AS label ";
                geom_query = " ST_AsGeoJSON(ST_TRANSFORM(ST_Difference(st_transform(lg.geom,'2154'), q.geom),4326),5)::json As geometry, ";
                filter_query = " FROM geocom15_5m As lg, qru16 AS q WHERE lg.insee like '"+refCode+"' AND lg.geom IS NOT NULL  ORDER BY lg.nom ";
                break;      
            case 'border':
                prop_query = " SELECT id_convent AS code, nom AS label ";
                geom_query = " ST_AsGeoJSON(ST_TRANSFORM(lg.geom,4326),5)::json As geometry, ";
                filter_query = " FROM border500_16 As lg WHERE geom IS NOT NULL  ORDER BY nom ";
                break;
            case 'zus':
                prop_query = " SELECT zus_id AS code, nomzus AS label ";
                geom_query = " ST_AsGeoJSON(lg.geom,5)::json As geometry, ";
                filter_query = " FROM idf_zus As lg WHERE zus_id IN ('01100010','01100020','01100040','01100080','01100090','01100110','01100160','01100270','01100280','01100290','01100310','01100350','01100380','01100390','01100400','01100440','01100450','01100460','01104010','01108010','01108030','01108040','01109010','01110050','01110070','01111030','01112030','01113030','01114010','01114030','01120020','01120030','01124010','01126020','01127010','01133030','01133040','01135010','01135020','01137010','01145020','01145030','01146010','01146030','01147010','01150020','01150030','01151010','01152040','01152050','01155090','01155110','01156020','01156040','01156070','01157050','01157080','01157090') AND  geom IS NOT NULL  ORDER BY zus_id ";
                break;  
            default:
               prop_query = "  SELECT 'quart' AS scale ,id_convent AS code, nom AS label  ";
                geom_query = " ST_AsGeoJSON(ST_TRANSFORM(lg.geom,4326),5)::json As geometry, ";
                filter_query = " FROM qru16 As lg WHERE geom IS NOT NULL ORDER BY id_convent";
            }


            var promise = $http.post('/jx/geojson', {refScale: refScale, refCode: refCode, geomQuery : geom_query, propQuery : prop_query, filterQuery : filter_query}).then(function(response){    

                var featureCollection = JSON.parse(response.data.data[0].row_to_json);
                var geojsonFormat = new ol.format.GeoJSON();
                var allFeatures = geojsonFormat.readFeatures(featureCollection, {featureProjection: 'EPSG:3857'});

                return allFeatures;
            });


            return promise;
        },  

    }

    }]);
