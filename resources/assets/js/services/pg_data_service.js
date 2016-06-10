
app.service('PGData',['$http', function($http){

    var tbleFiloq = " filoq ";
    return {
        getRefCode : function(typeRef){

           prop_query = " SELECT distinct code_conv as code, nom_terr_np as nom_conv,code_dep_cn AS code_dep, code_comm_pru_zus_np as code_com, territoire_np as type_ter, q_hors_q ";
           from_query = " FROM filoq ";
           filter_query = " WHERE territoire_np = '"+typeRef+"'  ORDER BY nom_conv ";

           filter_query =   prop_query +  from_query +  filter_query;

            var promise = $http.post('/jx/pgdata', {refScale: '', refCode: '',  filterQuery : filter_query}).then(function(response){

                return response.data;
            });

            return promise;
        },  
        getPGData: function(refCode, refScale){

            var prop_query, filter_query, geom_query = '';
            var milesim1 = '003';
            var milesim2 = '013';

            switch(refScale){

            case 'quart':
                //prop_query = " SELECT milesim,code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, code_comm_pru_zus_np as code_com, territoire_np as type_ter, q_hors_q, (a1::DEC)+(a75::DEC) AS a0, a1, a2, a3, a4, a5, a18, a19, a20, a21, a22, a60, a61, a62, a63, a66, a67, a68, b60, b61, ((a18::DEC)+(a19::DEC)+(a20::DEC)+(a21::DEC)+(a22::DEC)) AS ta18_a22, ((a66::DEC)+(a67::DEC)+(a68 ::DEC))AS ta66_a68 ";
                prop_query = " SELECT milesim,code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, code_comm_pru_zus_np as code_com, territoire_np as type_ter, q_hors_q, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b60::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68 ";
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE code_conv ='"+refCode+"' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim, code_conv, nom_terr_np, code_dep_cn, code_comm_pru_zus_np, territoire_np, q_hors_q ORDER BY milesim  ";
                break;
            case 'border':
                //prop_query = " SELECT milesim, code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, (a1::DEC)+(a75::DEC) AS a0, a1, a2, a3, a4, a5, a18, a19, a20, a21, a22, a62, a63, a66, a67, a68, b60, b61, (a18::DEC)+(a19::DEC)+(a20::DEC)+(a21::DEC)+(a22::DEC) ta18_a22,(a66::DEC)+(a67::DEC)+(a68 ::DEC) AS ta66_a68 ";
                prop_query = " SELECT milesim, code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b60::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68 ";
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE  geo_filoc ='"+refCode+"' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim, code_conv, nom_terr_np, code_dep_cn ORDER BY milesim ";
                break;
            case 'horq':
                //prop_query = " SELECT milesim, code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, (a1::DEC)+(a75::DEC) AS a0, a1, a2, a3, a4, a5, a18, a19, a20, a21, a22, a62, a63, a66, a67, a68, b60, b61, (a18::DEC)+(a19::DEC)+(a20::DEC)+(a21::DEC)+(a22::DEC) ta18_a22,(a66::DEC)+(a67::DEC)+(a68 ::DEC) AS ta66_a68 ";
                prop_query = " SELECT tb2.*, tb1.* FROM (SELECT milesim, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b61::DEC)/sum(c1::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68 ";
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE  nom_terr_np IN('"+refCode+"') AND q_hors_q = 'hors q' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim ORDER BY milesim ) AS tb1, (SELECT geo_filoc as code_com, nom_terr_np as nom_com,  sum(a1::DEC)+sum(a75::DEC) AS a0_com, sum(a4::DEC) AS a4_com, sum(b61::DEC) AS b61_com FROM filoq WHERE  geo_filoc IN('"+refCode+"') AND q_hors_q = 'total' AND territoire_np = 'commune' AND (milesim LIKE '__"+milesim2+"') group by geo_filoc, nom_terr_np) tb2"; 
                break;
            }

            filter_query =   prop_query +  from_query +  filter_query;

            //console.log(filter_query);

            var promise = $http.post('/jx/pgdata', {refScale: refScale, refCode: refCode,  filterQuery : filter_query}).then(function(response){

                return response.data;
            });

            return promise;
        },  

    }

    }]);
