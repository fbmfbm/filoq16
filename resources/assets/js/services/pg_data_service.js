
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
               // prop_query = " SELECT milesim,code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, code_comm_pru_zus_np as code_com, territoire_np as type_ter, q_hors_q, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b1::DEC) b1, sum(b2::DEC) b2, sum(b3::DEC) b3, sum(b4::DEC) b4, sum(b5::DEC) b5, sum(b6::DEC) b6, sum(b7::DEC) b7, sum(b60::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68, sum(c1::DEC) c1,  sum(c2::DEC) c2,  sum(c3::DEC) c3,  sum(c4::DEC) c4,  sum(c5::DEC) c5  ";
                prop_query = " SELECT milesim,code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, code_comm_pru_zus_np as code_com, territoire_np as type_ter, q_hors_q, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b1::DEC) b1, sum(b2::DEC) b2, sum(b3::DEC) b3, sum(b4::DEC) b4, sum(b5::DEC) b5, sum(b6::DEC) b6, sum(b7::DEC) b7, sum(b9::DEC) b8, sum(b9::DEC) b9, sum(b10::DEC) b10, sum(b11::DEC) b11, sum(b12::DEC) b12, sum(b13::DEC) b13, sum(b14::DEC) b14, sum(b15::DEC) b15, sum(b16::DEC) b16, sum(b17::DEC) b17, sum(b18::DEC) b18, sum(b19::DEC) b19, sum(b20::DEC) b20, sum(b22::DEC) b21, sum(b23::DEC) b23, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68, sum(c1::DEC) c1, sum(c2::DEC) c2, sum(c3::DEC) c3, sum(c4::DEC) c4, sum(c5::DEC) c5, sum(c6::DEC) c6, sum(c7::DEC) c7, sum(c8::DEC) c8, sum(c9::DEC) c9, sum(c10::DEC) c10, sum(c11::DEC) c11, sum(c12::DEC) c12, sum(c13::DEC) c13, sum(c14::DEC) c14, sum(c15::DEC) c15, sum(c16::DEC) c16, sum(c17::DEC) c17, sum(c18::DEC) c18, sum(c19::DEC) c19, sum(c20::DEC) c20, sum(c21::DEC) c21, sum(c22::DEC) c22, sum(c23::DEC) c23, sum(c24::DEC) c24, sum(c25::DEC) c25, sum(c26::DEC) c26, sum(c27::DEC) c27, sum(c28::DEC) c28, sum(c29::DEC) c29, sum(c40::DEC) c40, sum(c41::DEC) c41, sum(c42::DEC) c42, sum(c43::DEC) c43, sum(c44::DEC) c44, sum(c45::DEC) c45, sum(c46::DEC) c46, sum(c47::DEC) c47, sum(c48::DEC) c48, sum(c49::DEC) c49, sum(c50::DEC) c50, sum(c51::DEC) c51, sum(c52::DEC) c52, sum(c53::DEC) c53, sum(c54::DEC) c54, sum(c55::DEC) c55, sum(c56::DEC) c56, sum(c57::DEC) c57, sum(c58::DEC) c58  ";
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE code_conv ='"+refCode+"' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim, code_conv, nom_terr_np, code_dep_cn, code_comm_pru_zus_np, territoire_np, q_hors_q ORDER BY milesim  ";
                break;
            case 'border':
                //prop_query = " SELECT milesim, code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b60::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68 ";
                prop_query = " SELECT milesim, code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b1::DEC) b1, sum(b2::DEC) b2, sum(b3::DEC) b3, sum(b4::DEC) b4, sum(b5::DEC) b5, sum(b6::DEC) b6, sum(b7::DEC) b7, sum(b9::DEC) b8, sum(b9::DEC) b9, sum(b10::DEC) b10, sum(b11::DEC) b11, sum(b12::DEC) b12, sum(b13::DEC) b13, sum(b14::DEC) b14, sum(b15::DEC) b15, sum(b16::DEC) b16, sum(b17::DEC) b17, sum(b18::DEC) b18, sum(b19::DEC) b19, sum(b20::DEC) b20, sum(b22::DEC) b21, sum(b23::DEC) b23, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68, sum(c1::DEC) c1, sum(c2::DEC) c2, sum(c3::DEC) c3, sum(c4::DEC) c4, sum(c5::DEC) c5, sum(c6::DEC) c6, sum(c7::DEC) c7, sum(c8::DEC) c8, sum(c9::DEC) c9, sum(c10::DEC) c10, sum(c11::DEC) c11, sum(c12::DEC) c12, sum(c13::DEC) c13, sum(c14::DEC) c14, sum(c15::DEC) c15, sum(c16::DEC) c16, sum(c17::DEC) c17, sum(c18::DEC) c18, sum(c19::DEC) c19, sum(c20::DEC) c20, sum(c21::DEC) c21, sum(c22::DEC) c22, sum(c23::DEC) c23, sum(c24::DEC) c24, sum(c25::DEC) c25, sum(c26::DEC) c26, sum(c27::DEC) c27, sum(c28::DEC) c28, sum(c29::DEC) c29, sum(c40::DEC) c40, sum(c41::DEC) c41, sum(c42::DEC) c42, sum(c43::DEC) c43, sum(c44::DEC) c44, sum(c45::DEC) c45, sum(c46::DEC) c46, sum(c47::DEC) c47, sum(c48::DEC) c48, sum(c49::DEC) c49, sum(c50::DEC) c50, sum(c51::DEC) c51, sum(c52::DEC) c52, sum(c53::DEC) c53, sum(c54::DEC) c54, sum(c55::DEC) c55, sum(c56::DEC) c56, sum(c57::DEC) c57, sum(c58::DEC) c58 ";
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE  geo_filoc ='"+refCode+"' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim, code_conv, nom_terr_np, code_dep_cn ORDER BY milesim ";
                break;
            case 'horq':
                //prop_query = " SELECT tb2.*, tb1.* FROM (SELECT milesim, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b61::DEC)/sum(c1::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68 ";
                prop_query = " SELECT tb2.*, tb1.* FROM (SELECT milesim, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b1::DEC) b1, sum(b2::DEC) b2, sum(b3::DEC) b3, sum(b4::DEC) b4, sum(b5::DEC) b5, sum(b6::DEC) b6, sum(b7::DEC) b7, sum(b9::DEC) b8, sum(b9::DEC) b9, sum(b10::DEC) b10, sum(b11::DEC) b11, sum(b12::DEC) b12, sum(b13::DEC) b13, sum(b14::DEC) b14, sum(b15::DEC) b15, sum(b16::DEC) b16, sum(b17::DEC) b17, sum(b18::DEC) b18, sum(b19::DEC) b19, sum(b20::DEC) b20, sum(b22::DEC) b21, sum(b23::DEC) b23, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68, sum(c1::DEC) c1, sum(c2::DEC) c2, sum(c3::DEC) c3, sum(c4::DEC) c4, sum(c5::DEC) c5, sum(c6::DEC) c6, sum(c7::DEC) c7, sum(c8::DEC) c8, sum(c9::DEC) c9, sum(c10::DEC) c10, sum(c11::DEC) c11, sum(c12::DEC) c12, sum(c13::DEC) c13, sum(c14::DEC) c14, sum(c15::DEC) c15, sum(c16::DEC) c16, sum(c17::DEC) c17, sum(c18::DEC) c18, sum(c19::DEC) c19, sum(c20::DEC) c20, sum(c21::DEC) c21, sum(c22::DEC) c22, sum(c23::DEC) c23, sum(c24::DEC) c24, sum(c25::DEC) c25, sum(c26::DEC) c26, sum(c27::DEC) c27, sum(c28::DEC) c28, sum(c29::DEC) c29, sum(c40::DEC) c40, sum(c41::DEC) c41, sum(c42::DEC) c42, sum(c43::DEC) c43, sum(c44::DEC) c44, sum(c45::DEC) c45, sum(c46::DEC) c46, sum(c47::DEC) c47, sum(c48::DEC) c48, sum(c49::DEC) c49, sum(c50::DEC) c50, sum(c51::DEC) c51, sum(c52::DEC) c52, sum(c53::DEC) c53, sum(c54::DEC) c54, sum(c55::DEC) c55, sum(c56::DEC) c56, sum(c57::DEC) c57, sum(c58::DEC) c58 ";
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
