/**
 * Created by fbmfbm on 01/02/2017.
 */
app.service('CSVService',['$http', function($http){

    var saveStringToCSV = function(csvData, filename){
        // ----- tip for save string to csv -----//
        var downloadLink = document.createElement("a");
        var blob = new Blob(["\ufeff", csvData]);
        var url = URL.createObjectURL(blob);
        downloadLink.href = url;
        downloadLink.download = filename+".csv";

        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    };

    return {
        buildCSV : function(tableRef, filename, csvString){

            var csvDelimiter = ';';
            var csvData = csvString;

            for(var i = 0; i<tableRef.length; i++){
                csvData += '\r\n';
                csvData += tableRef[i].name + ';;;\r\n';

                if(tableRef[i].ref.length > 1){
                    // SI tables avec reference 3 zonages
                    var tblObj0 = $(tableRef[i].ref[0].tag).tableToJSON({
                        headings: $(tableRef[i].ref[0].headings),
                    });
                    var tblObj1 = $(tableRef[i].ref[1].tag).tableToJSON({
                        headings: $(tableRef[i].ref[1].headings),
                    });
                    var tblObj2 = $(tableRef[i].ref[2].tag).tableToJSON({
                        headings: $(tableRef[i].ref[2].headings),
                    });

                    csvData += tblObj0[0].value + ';;;;;;' + tblObj1[0].nban1 + ';;;;;' + tblObj2[0].nban1 + ';;;;\r\n';
                    csvData += tblObj0[1].value + ';' + tblObj0[1].nban1 + ';' + tblObj0[1].pcan1 + ';' + tblObj0[1].nban2 + ';' + tblObj0[1].pcan2 + ';;' + tblObj1[1].nban1 + ';' + tblObj1[1].pcan1 + ';' + tblObj1[1].nban2 + ';' + tblObj1[1].pcan2 + ';;' + tblObj2[1].nban1 + ';' + tblObj2[1].pcan1 + ';' + tblObj2[1].nban2 + ';' + tblObj2[1].pcan2 + '\r\n';
                    csvData += tblObj0[2].value + ';' + tblObj0[2].nban1 + ';' + tblObj0[2].pcan1 + ';' + tblObj0[2].nban2 + ';' + tblObj0[2].pcan2 + ';;' + tblObj1[2].nban1 + ';' + tblObj1[2].pcan1 + ';' + tblObj1[2].nban2 + ';' + tblObj1[2].pcan2 + ';;' + tblObj2[2].nban1 + ';' + tblObj2[2].pcan1 + ';' + tblObj2[2].nban2 + ';' + tblObj2[2].pcan2 + '\r\n';
                    for(var j = 3; j<tblObj0.length; j++){
                        csvData += tblObj0[j].value + ';' + tblObj0[j].nban1 + ';' + tblObj0[j].pcan1 + ';' + tblObj0[j].nban2 + ';' + tblObj0[j].pcan2 + ';;' + tblObj1[j].nban1 + ';' + tblObj1[j].pcan1 + ';' + tblObj1[j].nban2 + ';' + tblObj1[j].pcan2 + ';;' + tblObj2[j].nban1 + ';' + tblObj2[j].pcan1 + ';' + tblObj2[j].nban2 + ';' + tblObj2[j].pcan2 + '\r\n';
                    }
                }else{
                    // sinon simple tableau
                    var tblObj0 = $(tableRef[i].ref[0].tag).tableToJSON({
                        headings: $(tableRef[i].ref[0].headings),
                    });
                    csvData += tblObj0[0].value + ';;;;;;'+'\r\n';
                    //csvData += tblObj0[1].value + ';' + tblObj0[1].nban1 + ';' + tblObj0[1].pcan1 + ';' + tblObj0[1].nban2 + ';' + tblObj0[1].pcan2 + '\r\n';
                    //csvData += tblObj0[2].value + ';' + tblObj0[2].nban1 + ';' + tblObj0[2].pcan1 + ';' + tblObj0[2].nban2 + ';' + tblObj0[2].pcan2 + '\r\n';
                    for(var j = 1; j<tblObj0.length; j++){
                        for(var a = 0; a<tableRef[i].ref[0].headings.length;a++){
                            csvData += tblObj0[j][tableRef[i].ref[0].headings[a]] + ';';
                        }
                        csvData +='\r\n';
                    }
                }

            }
            csvData = csvData.replace(/undefined/g, "");
            //console.log(csvData)
            saveStringToCSV(csvData, filename);
            return(filename);
        },
     }
}]);
