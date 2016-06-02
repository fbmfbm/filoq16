
app.service('PGData',['$http', function($http){

    return {
       
        getPGData: function(refCode, refScale){

            var prop_query, filter_query, geom_query = '';
            var milesim1 = '003';
            var milesim2 = '013';

            switch(refScale){

            case 'quart':
                prop_query = " SELECT milesim,code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, code_comm_pru_zus_np, territoire_np as type_ter, q_hors_q, (a1::DEC)+(a75::DEC) AS a0, a1, a2, a3, a4, a5, a18, a19, a20, a21, a22, a60, a61, a62, a63, a66, a67, a68, b60, b61, ((a18::DEC)+(a19::DEC)+(a20::DEC)+(a21::DEC)+(a22::DEC)) AS t18_22, ((a66::DEC)+(a67::DEC)+(a68 ::DEC))AS ta66_a68 ";
                from_query = " FROM filoq ";
                filter_query = " WHERE code_conv ='"+refCode+"' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') ORDER BY milesim ";
                break;
            case 'border':
                prop_query = " SELECT milesim, code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, (a1::DEC)+(a75::DEC) AS a0, a1, a2, a3, a4, a5, a18, a19, a20, a21, a22, a62, a63, a66, a67, a68, b60, b61, (a18::DEC)+(a19::DEC)+(a20::DEC)+(a21::DEC)+(a22::DEC) ta18_a22,(a66::DEC)+(a67::DEC)+(a68 ::DEC) AS ta66_a68 ";
                from_query = " FROM filoq ";
                filter_query = " WHERE  geo_filoc ='"+refCode+"' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') ORDER BY milesim ";
                break;
            case 'horq':
                prop_query = " SELECT milesim, code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, (a1::DEC)+(a75::DEC) AS a0, a1, a2, a3, a4, a5, a18, a19, a20, a21, a22, a62, a63, a66, a67, a68, b60, b61, (a18::DEC)+(a19::DEC)+(a20::DEC)+(a21::DEC)+(a22::DEC) ta18_a22,(a66::DEC)+(a67::DEC)+(a68 ::DEC) AS ta66_a68 ";
                from_query = " FROM filoq ";
                filter_query = " WHERE  nom_terr_np ='"+refCode+"' AND q_hors_q = 'hors q' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') ORDER BY milesim ";
                break;
            }

            filter_query =   prop_query +  from_query +  filter_query;

            console.log(filter_query);

            var promise = $http.post('/jx/pgdata', {refScale: refScale, refCode: refCode,  filterQuery : filter_query}).then(function(response){

                return response.data;
            });

            return promise;
        },  

    }

    }]);
