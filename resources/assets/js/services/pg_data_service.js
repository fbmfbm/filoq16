
app.service('PGData',['$http', function($http){

    var tbleFiloq = " filoq ";

    var queryDynamique = "";
    queryDynamique += " sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a4::DEC) a4,  sum(c18::DEC) c18, sum(c19::DEC) c19, sum(c20::DEC) c20, sum(c21::DEC) c21, sum(c22::DEC) c22, sum(c23::DEC) c23, sum(c24::DEC) c24, sum(c25::DEC) c25, sum(c30::DEC) c30, sum(c31::DEC) c31, sum(c32::DEC) c32, sum(c33::DEC) c33, sum(c40::DEC) c40, sum(c41::DEC) c41, sum(c42::DEC) c42, sum(c43::DEC) c43, sum(c44::DEC) c44, sum(c45::DEC) c45, sum(c46::DEC) c46, sum(c47::DEC) c47, sum(c50::DEC) c50, sum(c51::DEC) c51, sum(c52::DEC) c52, sum(c55::DEC) c55, sum(c56::DEC) c56, sum(c57::DEC) c57, sum(b6::DEC) b6, sum(b7::DEC) b7, sum(b8::DEC) b8, sum(b9::DEC) b9, sum(b10::DEC) b10, sum(b11::DEC) b11, sum(b12::DEC) b12, sum(b13::DEC) b13, sum(b18::DEC) b18, sum(b19::DEC) b19, sum(b20::DEC) b20, sum(b21::DEC) b21, sum(b22::DEC) b22, sum(b61::DEC) b61, ";
    queryDynamique += " (sum(c40::DEC) + sum(c41::DEC) + sum(c42::DEC) + sum(c45::DEC) + sum(c46::DEC)  + sum(c47::DEC) + sum(c50::DEC) + sum(c51::DEC) + sum(c52::DEC) + sum(c55::DEC) + sum(c56::DEC) + sum(c57::DEC)) AS  ens_occ_03, ";
    queryDynamique += " (sum(c40::DEC) + sum(b6::DEC) + sum(c41::DEC) + sum(c10::DEC) + sum(c18::DEC) + sum(b18::DEC) + sum(c45::DEC) + sum(b7::DEC) +  sum(c46::DEC) + sum(b11::DEC) + sum(c19::DEC) + sum(b19::DEC) + sum(c50::DEC) + sum(b8::DEC) + sum(c51::DEC) + sum(b12::DEC) + sum(c20::DEC) + sum(b20::DEC) + sum(c55::DEC) + sum(b9::DEC) + sum(c56::DEC) + sum(b13::DEC) + sum(c21::DEC) + sum(b21::DEC) ) AS ens_occ_13, ";
    queryDynamique += " (sum(c40::DEC) + sum(c41::DEC) + sum(c18::DEC) + sum(c45::DEC) + sum(c46::DEC)  + sum(c19::DEC) + sum(c50::DEC) + sum(c51::DEC) + sum(c20::DEC) + sum(c55::DEC) + sum(c56::DEC) + sum(c21::DEC)) AS ens_occ_parc_inf06, ";
    queryDynamique += " (sum(c30::DEC) + sum(c22::DEC) + sum(c31::DEC)  + sum(c23::DEC) + sum(c32::DEC) + sum(c24::DEC) + sum(c33::DEC) + sum(c25::DEC) )AS ens_er_parc_inf06, ";
    queryDynamique += " (sum(b18::DEC) + sum(b6::DEC) + sum(b10::DEC) + sum(b19::DEC) + sum(b7::DEC) + sum(b11::DEc) + sum(b20::DEC) + sum(b8::DEC) + sum(b12::DEC) + sum(b21::DEC) + sum(b9::DEC) + sum(b13::DEC)) AS ens_occ_parc_sup06, ";
    queryDynamique += " (sum(c40::DEC) + sum(c41::DEC) + sum(c45::DEC) + sum(c46::DEC) + sum(c50::DEC)  + sum(c51::DEC) + sum(c55::DEC) + sum(c56::DEC)) AS  pp_occ_03, ";
    queryDynamique += " (sum(c40::DEC) + sum(b6::DEC) + sum(c41::DEC) + sum(b10::DEC) + sum(c45::DEC) + sum(b7::DEC) + sum(c46::DEC) + sum(b11::DEC) + sum(c50::DEC) + sum(b8::DEC)+ sum(c51::DEC) + sum(b12::DEC) + sum(c55::DEC) + sum(b9::DEC) + sum(c56::DEC) + sum(c13::DEC)) AS pp_occ_13, ";
    queryDynamique += " (sum(c40::DEC) + sum(c41::DEC) + sum(c45::DEC) + sum(c46::DEC) +sum(c50::DEC) + sum(c51::DEC) + sum(c55::DEC) + sum(c56::DEC)) AS pp_occ_parc_inf06,  ";
    queryDynamique += " (sum(c30::DEC) + sum(c31::DEC) + sum(c32::DEC) + sum(c33::DEC)) AS pp_occ_er_parc_inf06, ";
    queryDynamique += " (sum(b6::DEC) + sum(b10::DEC) + sum(b7::DEC) + sum(b11::DEC) + sum(b8::DEC) + sum(b12::DEC) + sum(b9::DEc) + sum(b13::DEC)) AS pp_occ_parc_sup06, ";
    queryDynamique += " (sum(c42::DEC) + sum(c47::DEC) + sum(c52::DEC) + sum(c57::DEC)) ps_occ_03, ";
    queryDynamique += " (sum(c18::DEC) + sum(b18::DEC) + sum(c19::DEC) + sum(b19::DEC) + sum(c20::DEC) + sum(b20::DEC) + sum(c21::DEC) + sum(b21::DEC)) AS ps_occ_13, ";
    queryDynamique += " (sum(c18::DEC) + sum(c19::DEC) + sum(c20::DEC) + sum(c21::DEC)) AS ps_occ_parc_inf06, ";
    queryDynamique += " (sum(c22::DEC) + sum(c23::DEC) + sum(c24::DEC) + sum(c25::DEC)) AS ps_er_parc_inf06, ";
    queryDynamique += " (sum(b18::DEC) + sum(b19::DEC) + sum(b20::DEC) + sum(b21::DEC)) AS ps_occ_parc_sup06, ";
    queryDynamique += " (sum(c40::DEC) + sum(c45::DEC) + sum(c50::DEC) + sum(c55::DEC)) AS po_occ_03, ";
    queryDynamique += " (sum(c40::DEC) + sum(b6::DEC) + sum(c45::DEC) + sum(B7::DEC) + sum(c50::DEC) + sum(B8::DEC) + sum(c55 ::DEC) + sum(B9::DEC)) AS po_occ_13, ";
    queryDynamique += " (sum(C30::DEC) - sum(C14::DEC) + sum(C31::DEC) - sum(C15::DEC) + sum(C32::DEC) - sum(c16::DEC) + sum(c33::DEC) - sum(C17::DEC)) AS po_occ_er_parc_inf06, ";
    queryDynamique += " (sum(b6::DEC) + sum(b7::DEC) + sum(b8::DEC) + sum(b9::DEC)) AS po_occ_parc_sup06, ";
    queryDynamique += " (sum(c41::DEC) + sum(c46::DEC) + sum(c51::DEC) + sum(c56::DEC)) AS lp_occ_03, ";
    queryDynamique += " (sum(c41::DEC) + sum(b10::DEC) + sum(c46::DEC) + sum(B11::DEC) + sum(c51::DEC) + sum(B12::DEC) + sum(c56::DEC) + sum(b13::DEC)) AS lp_occ_13, ";
    queryDynamique += " (sum(C41::DEC) + sum(C46::DEC) + sum(C51::DEC) + sum(C56::DEC)) AS lp_occ_parc_inf06, ";
    queryDynamique += " (sum(c14::DEC) + sum(c15::DEC) + sum(c16::DEC) + sum(c17::DEC)) AS lp_er_parc_inf06, ";
    queryDynamique += " (sum(c10::DEC) + sum(c11::DEC) + sum(c12::DEC) + sum(c13::DEC)) AS lp_occ_parc_sup06 ";





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

            switch(refScale) {

                 //////////////////////////////
                 ///// PAGE OFFRE /////////////
                //////////////////////////////

            case 'quart':
               // prop_query = " SELECT milesim,code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, code_comm_pru_zus_np as code_com, territoire_np as type_ter, q_hors_q, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b1::DEC) b1, sum(b2::DEC) b2, sum(b3::DEC) b3, sum(b4::DEC) b4, sum(b5::DEC) b5, sum(b6::DEC) b6, sum(b7::DEC) b7, sum(b60::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68, sum(c1::DEC) c1,  sum(c2::DEC) c2,  sum(c3::DEC) c3,  sum(c4::DEC) c4,  sum(c5::DEC) c5  ";
                prop_query = " SELECT milesim,code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, code_comm_pru_zus_np as code_com, territoire_np as type_ter, q_hors_q, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b1::DEC) b1, sum(b2::DEC) b2, sum(b3::DEC) b3, sum(b4::DEC) b4, sum(b5::DEC) b5, sum(b6::DEC) b6, sum(b7::DEC) b7, sum(b9::DEC) b8, sum(b9::DEC) b9, sum(b10::DEC) b10, sum(b11::DEC) b11, sum(b12::DEC) b12, sum(b13::DEC) b13, sum(b14::DEC) b14, sum(b15::DEC) b15, sum(b16::DEC) b16, sum(b17::DEC) b17, sum(b18::DEC) b18, sum(b19::DEC) b19, sum(b20::DEC) b20, sum(b22::DEC) b21, sum(b23::DEC) b23, sum(b60::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68, sum(c1::DEC) c1, sum(c2::DEC) c2, sum(c3::DEC) c3, sum(c4::DEC) c4, sum(c5::DEC) c5, sum(c6::DEC) c6, sum(c7::DEC) c7, sum(c8::DEC) c8, sum(c9::DEC) c9, sum(c10::DEC) c10, sum(c11::DEC) c11, sum(c12::DEC) c12, sum(c13::DEC) c13, sum(c14::DEC) c14, sum(c15::DEC) c15, sum(c16::DEC) c16, sum(c17::DEC) c17, sum(c18::DEC) c18, sum(c19::DEC) c19, sum(c20::DEC) c20, sum(c21::DEC) c21, sum(c22::DEC) c22, sum(c23::DEC) c23, sum(c24::DEC) c24, sum(c25::DEC) c25, sum(c26::DEC) c26, sum(c27::DEC) c27, sum(c28::DEC) c28, sum(c29::DEC) c29, sum(c40::DEC) c40, sum(c41::DEC) c41, sum(c42::DEC) c42, sum(c43::DEC) c43, sum(c44::DEC) c44, sum(c45::DEC) c45, sum(c46::DEC) c46, sum(c47::DEC) c47, sum(c48::DEC) c48, sum(c49::DEC) c49, sum(c50::DEC) c50, sum(c51::DEC) c51, sum(c52::DEC) c52, sum(c53::DEC) c53, sum(c54::DEC) c54, sum(c55::DEC) c55, sum(c56::DEC) c56, sum(c57::DEC) c57, sum(c58::DEC) c58  ";
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE code_conv ='"+refCode+"' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim, code_conv, nom_terr_np, code_dep_cn, code_comm_pru_zus_np, territoire_np, q_hors_q ORDER BY milesim  ";
                break;
            case 'border':
                //prop_query = " SELECT milesim, code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b60::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68 ";
                prop_query = " SELECT milesim, code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b1::DEC) b1, sum(b2::DEC) b2, sum(b3::DEC) b3, sum(b4::DEC) b4, sum(b5::DEC) b5, sum(b6::DEC) b6, sum(b7::DEC) b7, sum(b9::DEC) b8, sum(b9::DEC) b9, sum(b10::DEC) b10, sum(b11::DEC) b11, sum(b12::DEC) b12, sum(b13::DEC) b13, sum(b14::DEC) b14, sum(b15::DEC) b15, sum(b16::DEC) b16, sum(b17::DEC) b17, sum(b18::DEC) b18, sum(b19::DEC) b19, sum(b20::DEC) b20, sum(b22::DEC) b21, sum(b23::DEC) b23, sum(b60::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68, sum(c1::DEC) c1, sum(c2::DEC) c2, sum(c3::DEC) c3, sum(c4::DEC) c4, sum(c5::DEC) c5, sum(c6::DEC) c6, sum(c7::DEC) c7, sum(c8::DEC) c8, sum(c9::DEC) c9, sum(c10::DEC) c10, sum(c11::DEC) c11, sum(c12::DEC) c12, sum(c13::DEC) c13, sum(c14::DEC) c14, sum(c15::DEC) c15, sum(c16::DEC) c16, sum(c17::DEC) c17, sum(c18::DEC) c18, sum(c19::DEC) c19, sum(c20::DEC) c20, sum(c21::DEC) c21, sum(c22::DEC) c22, sum(c23::DEC) c23, sum(c24::DEC) c24, sum(c25::DEC) c25, sum(c26::DEC) c26, sum(c27::DEC) c27, sum(c28::DEC) c28, sum(c29::DEC) c29, sum(c40::DEC) c40, sum(c41::DEC) c41, sum(c42::DEC) c42, sum(c43::DEC) c43, sum(c44::DEC) c44, sum(c45::DEC) c45, sum(c46::DEC) c46, sum(c47::DEC) c47, sum(c48::DEC) c48, sum(c49::DEC) c49, sum(c50::DEC) c50, sum(c51::DEC) c51, sum(c52::DEC) c52, sum(c53::DEC) c53, sum(c54::DEC) c54, sum(c55::DEC) c55, sum(c56::DEC) c56, sum(c57::DEC) c57, sum(c58::DEC) c58 ";
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE  geo_filoc ='"+refCode+"' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim, code_conv, nom_terr_np, code_dep_cn ORDER BY milesim ";
                break;
            case 'horq':
                //prop_query = " SELECT tb2.*, tb1.* FROM (SELECT milesim, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b61::DEC)/sum(c1::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68 ";
                prop_query = " SELECT tb2.*, tb1.* FROM (SELECT milesim, sum(a1::DEC)+sum(a75::DEC) AS a0, sum(a1::DEC) a1, sum(a2::DEC) a2, sum(a3::DEC) a3, sum(a4::DEC) a4, sum(a5::DEC) a5, sum(a15::DEC) a15, sum(a16::DEC) a16, sum(a17::DEC) a17, sum(a18::DEC) a18, sum(a19::DEC) a19, sum(a20::DEC) a20, sum(a21::DEC) a21, sum(a22::DEC) a22, sum(a26::DEC) a26, sum(a27::DEC) a27, sum(a28::DEC) a28, sum(a29::DEC) a29, sum(a30::DEC) a30, sum(a31::DEC) a31, sum(a60::DEC) a60, sum(a61::DEC) a61, sum(a62::DEC) a62, sum(a63::DEC) a63, sum(a66::DEC) a66, sum(a67::DEC) a67, sum(a68::DEC) a68, sum(b1::DEC) b1, sum(b2::DEC) b2, sum(b3::DEC) b3, sum(b4::DEC) b4, sum(b5::DEC) b5, sum(b6::DEC) b6, sum(b7::DEC) b7, sum(b9::DEC) b8, sum(b9::DEC) b9, sum(b10::DEC) b10, sum(b11::DEC) b11, sum(b12::DEC) b12, sum(b13::DEC) b13, sum(b14::DEC) b14, sum(b15::DEC) b15, sum(b16::DEC) b16, sum(b17::DEC) b17, sum(b18::DEC) b18, sum(b19::DEC) b19, sum(b20::DEC) b20, sum(b22::DEC) b21, sum(b23::DEC) b23, sum(b60::DEC) b60, sum(b61::DEC) b61, (sum(a18::DEC)+sum(a19::DEC)+sum(a20::DEC)+sum(a21::DEC)+sum(a22::DEC)) AS ta18_a22, (sum(a66::DEC)+sum(a67::DEC)+sum(a68 ::DEC))AS ta66_a68, sum(c1::DEC) c1, sum(c2::DEC) c2, sum(c3::DEC) c3, sum(c4::DEC) c4, sum(c5::DEC) c5, sum(c6::DEC) c6, sum(c7::DEC) c7, sum(c8::DEC) c8, sum(c9::DEC) c9, sum(c10::DEC) c10, sum(c11::DEC) c11, sum(c12::DEC) c12, sum(c13::DEC) c13, sum(c14::DEC) c14, sum(c15::DEC) c15, sum(c16::DEC) c16, sum(c17::DEC) c17, sum(c18::DEC) c18, sum(c19::DEC) c19, sum(c20::DEC) c20, sum(c21::DEC) c21, sum(c22::DEC) c22, sum(c23::DEC) c23, sum(c24::DEC) c24, sum(c25::DEC) c25, sum(c26::DEC) c26, sum(c27::DEC) c27, sum(c28::DEC) c28, sum(c29::DEC) c29, sum(c40::DEC) c40, sum(c41::DEC) c41, sum(c42::DEC) c42, sum(c43::DEC) c43, sum(c44::DEC) c44, sum(c45::DEC) c45, sum(c46::DEC) c46, sum(c47::DEC) c47, sum(c48::DEC) c48, sum(c49::DEC) c49, sum(c50::DEC) c50, sum(c51::DEC) c51, sum(c52::DEC) c52, sum(c53::DEC) c53, sum(c54::DEC) c54, sum(c55::DEC) c55, sum(c56::DEC) c56, sum(c57::DEC) c57, sum(c58::DEC) c58 ";
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE  nom_terr_np IN('"+refCode+"') AND q_hors_q = 'hors q' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim ORDER BY milesim ) AS tb1, (SELECT geo_filoc as code_com, nom_terr_np as nom_com,  sum(a1::DEC)+sum(a75::DEC) AS a0_com, sum(a4::DEC) AS a4_com, sum(b61::DEC) AS b61_com FROM filoq WHERE  geo_filoc IN('"+refCode+"') AND q_hors_q = 'total' AND territoire_np = 'commune' AND (milesim LIKE '__"+milesim2+"') group by geo_filoc, nom_terr_np) tb2"; 
                break;

                //////////////////////////////
                ///// PAGE DYNAMIQUE /////////
                //////////////////////////////

            case 'quart_dyna1':
                prop_query = "  SELECT milesim,code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, code_comm_pru_zus_np as code_com, territoire_np as type_ter, q_hors_q, ";
                prop_query += queryDynamique;
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE code_conv ='"+refCode+"' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim, code_conv, nom_terr_np, code_dep_cn, code_comm_pru_zus_np, territoire_np, q_hors_q ORDER BY milesim  ";
                break;
           case 'border_dyna1':
                prop_query = "  SELECT milesim,code_conv, nom_terr_np as nom_terr,code_dep_cn AS code_dep, ";
                prop_query += queryDynamique;
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE geo_filoc ='"+refCode+"' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim, code_conv, nom_terr_np, code_dep_cn ORDER BY milesim ";
                break;
            case 'horq_dyna1':
                prop_query = "  SELECT tb2.*, tb1.* FROM (SELECT milesim,  ";
                prop_query += queryDynamique;
                from_query = " FROM "+tbleFiloq;
                filter_query = " WHERE  nom_terr_np IN('"+refCode+"') AND q_hors_q = 'hors q' AND (milesim LIKE '__"+milesim1+"' OR milesim LIKE '__"+milesim2+"') GROUP BY milesim ORDER BY milesim ) AS tb1, (SELECT geo_filoc as code_com, nom_terr_np as nom_com,  sum(a1::DEC)+sum(a75::DEC) AS a0_com, sum(a4::DEC) AS a4_com, sum(b61::DEC) AS b61_com FROM filoq WHERE  geo_filoc IN('"+refCode+"') AND q_hors_q = 'total' AND territoire_np = 'commune' AND (milesim LIKE '__"+milesim2+"') group by geo_filoc, nom_terr_np) tb2";
                break;
             case 'evol_tot':
               prop_query = " SELECT CASE WHEN t13.v0 / t03.v1 > 1.05 then 'Fragilistation' WHEN t13.v0 / t03.v1 < 0.95 then 'Diversification' else 'sans effet' END as tot_status,  CASE  WHEN t13.v2 / t03.v3 > 1.05 then 'Fragilistation'  WHEN t13.v2 / t03.v3 < 0.95 then 'Diversification' else 'sans effet' END as pp_status ,  CASE  WHEN t13.v4 / t03.v5 > 1.05 then 'Fragilistation'  WHEN t13.v4 / t03.v5 < 0.95 then 'Diversification' else 'sans effet' END as ps_status ";
               prop_query += " FROM (SELECT (sum(C40::DEC) + sum(B6::DEC) + sum(C41::DEC) + sum(B10::DEC) + sum(C18::DEC) + sum(B18::DEC)) / (sum(C40::DEC) + sum(B6::DEC) + sum(C41::DEC) + sum(B10::DEC) + sum(C18::DEC) + sum(B18::DEC) +sum(C45::DEC) + sum(B7::DEC)+ sum(C46::DEC) + sum(B11::DEC) + sum(C19::DEC) + sum(B19::DEC)+sum(C50::DEC) + sum(B8::DEC) + sum(C51::DEC) + sum(C20::DEC) + sum(C20::DEC) + sum(B20::DEC)+sum(C55::DEC) + sum(B9::DEC) + sum(C56::DEC) + sum(B13::DEC)+ sum(C21::DEC) + sum(B21::DEC)) AS v0,  (sum(C40::DEC) + sum(B6::DEC) + sum(C41::DEC) + sum(B10::DEC))/(sum(C40::DEC) + sum(B6::DEC) + sum(C41::DEC) + sum(B10::DEC)+ sum(C45::DEC) + sum(B7::DEC) + sum(C46::DEC) + sum(B11::DEC)+sum(C50::DEC) + sum(B8::DEC) + sum(C51::DEC) + sum(B12::DEC)+sum(C55::DEC) + sum(B9::DEC) + sum(C56::DEC) + sum(B13::DEC)) AS v2, (sum(C18::DEC) + sum(B18::DEC))/(sum(C18::DEC) + sum(B18::DEC)+sum(C19::DEC) + sum(B19::DEC)+sum(C20::DEC) + sum(B20::DEC)+sum(C21::DEC) + sum(B21::DEC)) AS v4   ";
               prop_query += " FROM "+tbleFiloq+" WHERE code_conv = '"+refCode+"' AND territoire_np = 'pru' AND  milesim LIKE '__013') t13, ";
               prop_query += " (SELECT (sum(C40::DEC) +sum(C41::DEC) +sum(C42::DEC))/(sum(C40::DEC) + sum(C41::DEC) + sum(C42::DEC)+sum(c45::DEC)+ sum(c46::DEC) + sum(C47::DEC)+sum(c50::DEC) + sum(c51::DEC) + sum(C52::DEC)+sum(c55::DEC) + sum(c56::DEC) +sum( C57::DEC))AS  v1, (sum(c40::DEC) + sum(c41::DEC))/(sum(c40::DEC) + sum(c41::DEC)+sum(c45::DEC) + sum(c46::DEC)+sum(c50::DEC) + sum(c51::DEC)+sum(c55::DEC) + sum(c56::DEC)) AS v3,  (sum(C42::DEC))/(sum(C42::DEC)+sum(C47::DEC)+sum(C52::DEC)+ sum(C57::DEC)) AS v5   ";
               from_query = " ";
               filter_query = " FROM "+tbleFiloq+" WHERE code_conv = '"+refCode+"' AND territoire_np = 'pru' AND milesim LIKE '__003') t03 ";
               break;
               case 'evol_exist':
                prop_query = " SELECT CASE WHEN t13.v0 / t03.v1 > 1.05 then 'Fragilistation' WHEN t13.v0 / t03.v1 < 0.95 then 'Diversification' else 'sans effet' END as tot_status,  CASE  WHEN t13.v2 / t03.v3 > 1.05 then 'Fragilistation'  WHEN t13.v2 / t03.v3 < 0.95 then 'Diversification' else 'sans effet' END as pp_status , CASE  WHEN t13.v4 / t03.v5 > 1.05 then 'Fragilistation'  WHEN t13.v4 / t03.v5 < 0.95 then 'Diversification' else 'sans effet' END as ps_status ";
                prop_query += " FROM (SELECT (sum(c40::DEC)+sum(c41::DEC) + sum(C18::DEC))/(sum(c40::DEC) + sum(c41::DEC) + sum(C18::DEC)+sum(c45::DEC) + sum(c46::DEC) + sum(C19::DEC)+sum(c50::DEC) + sum(c51::DEC) + sum(c20::DEC)+sum(c55::DEC) + sum(c56::DEC) + sum(c21::DEC)) as v0, (sum(C40::DEC)+sum(C41::DEC)+sum(C42::DEC))/(sum(C40::DEC)+sum(C41::DEC)+sum(C42::DEC)+sum(c45::DEC)+sum(c46::DEC)+sum(C47::DEC)+sum(c50::DEC)+sum(c51::DEC)+sum(C52::DEC)+sum(c55::DEC)+sum(c56::DEC)+sum(C57::DEC)) AS v2, (sum(C18::DEC))/(sum(C18::DEC)+sum(C19::DEC)+sum(C20::DEC)+sum(C21::DEC)) AS v4 ";
                prop_query += " FROM "+tbleFiloq+" WHERE code_conv = '"+refCode+"' AND territoire_np = 'pru' AND  milesim LIKE '__013') t13, ";
                prop_query += " (SELECT  (sum(c40::DEC)+sum(c41::DEC))/(sum(c40::DEC)+sum(c41::DEC)+sum(c4::DEC)+sum(c46::DEC)+sum(c50::DEC)+sum(c51::DEC)+sum(c55::DEC)+sum(c56::DEC)) as v1, (sum(c40::DEC)+sum(c41::DEC))/(sum(c40::DEC)+sum(c41::DEC)+sum(c45::DEC)+sum(c46::DEC)+sum(c50::DEC)+sum(c51::DEC)+sum(c55::DEC)+sum(c56::DEC)) AS v3, sum(C42::DEC)/(sum(C42::DEC)+sum(C47::DEC)+sum(C52::DEC)+sum(C57::DEC)) AS v5 ";
                from_query = " ";
                filter_query = " FROM "+tbleFiloq+" WHERE code_conv = '"+refCode+"' AND territoire_np = 'pru' AND milesim LIKE '__003') t03 ";
                break;

            };

            filter_query =   prop_query +  from_query +  filter_query;

            console.log(filter_query);

            var promise = $http.post('/jx/pgdata', {refScale: refScale, refCode: refCode,  filterQuery : filter_query}).then(function(response){

                return response.data;
            });

            return promise;
        },  

    }

    }]);
