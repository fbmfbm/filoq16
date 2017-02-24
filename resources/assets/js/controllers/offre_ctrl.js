
app.controller('OffreCtrl', ['$scope', '$window', 'GeoJsonData', 'PGData', 'CSVService', '$q', function($scope, $window,  GeoJsonData, PGData, CSVService, $q){

	$scope.offreCtrlMsg = "Message Offre Controller";


	$scope.codeRef = $window._convent;

	$scope.refScale = 'quart';
  $scope.setTab = 1;

	$scope.dt1 = {};
	$scope.dt2 = {};
	$scope.dt3 = {};

	var comSource = new ol.source.Vector();
  var quartierSource = new ol.source.Vector();
  var bordureSource = new ol.source.Vector();
  var zusSource = new ol.source.Vector();

	//############# GET STAT DATA ##########################
	var getPGData = function(code, scale ){

		var defered = $q.defer();

		PGData.getPGData(code, scale).then(function(result){

			console.log(result);
			
			 defered.resolve(result.data);

		});

		return defered.promise;
	};


	getPGData( $scope.codeRef, 'quart').then(function(result1){

	 		$scope.ter1Label = result1[0].nom_terr;
			$scope.codeDep   = result1[0].code_dep;
			$scope.codecom   = result1[0].code_com;

	 		$scope.dt1 = result1;

      console.log(result1);

		getPGData($scope.codecom+'_R500', 'border').then(function(result2){

			$scope.dt2 = result2;

			getPGData( $scope.codecom , 'horq').then(function(result3){

				$scope.nomcom   = result3[0].nom_com;
        
        $scope.dt3 = result3;
				getGeoJsonQuartier();//----------- build map !!
			});
		});
	});

	//############### END GET STAT DATA ###########

	 //################### MAP ###################
	  
	 var getGeoJsonQuartier = function(refCode){

        (!refCode)?refCode='':refCode=refCode;

         GeoJsonData.getGeoData($scope.codecom , 'comselect',refCode).then(function(result){

            comSource.addFeatures(result);

	        GeoJsonData.getGeoData($scope.refCode, "border",refCode).then(function(result){

	            bordureSource.addFeatures(result);

	            GeoJsonData.getGeoData($scope.refCode, "quartier", refCode).then(function(result){

	                quartierSource.addFeatures(result);

	              	GeoJsonData.getGeoData($scope.refCode, "zus", refCode).then(function(result){

	                    zusSource.addFeatures(result);
	                    initMap();

               	});//---end zus
            });//--end pru
        });//----end border       
     });//----end com 

    };

	var initMap = function(){

	 	var layersStack = buildLayers();

	 	//console.log(layersStack.length);

		map = new ol.Map({
            logo: false,
            controls: ol.control.defaults({ attribution: false,zoom: false}).extend([]),
            interactions: ol.interaction.defaults({ zoomWheelEnabled: false, dragPan: false}).extend([]),
            target: document.getElementById('map2'),
            renderer: 'canvas',
            layers: layersStack,
            view: new ol.View({
            })
        });

		var zoomCenter = layersStack[1].getSource().getExtent();
		map.getView().fit(zoomCenter	, map.getSize());
        		
		layersStack[1].getSource().on("change", function(){
			var extent = layersStack[1].getSource().getExtent();	
    		//console.log(extent);
    		map.getView().fit(extent, map.getSize());
    	});
     };

     var buildLayers = function(){

     	var baseLayer = new ol.layer.Tile({source: new ol.source.BingMaps({ key: 'Ann-y97gpi1eYfOK806hTKFoZz8z8763yMvIg96gwTMvkGQbhaVN_Yx5qoRUCq9z', imagerySet: 'Aerial' })});

     	var comLayer =  new ol.layer.Vector({
              source: comSource,
              style: new ol.style.Style({
                  stroke: new ol.style.Stroke({color: "rgba(90,200,230,0.7)", lineDash: null, width: 1}),
                  fill: new ol.style.Fill({color: "rgba(90,200,250,0.3)"})
              }),
              title: "zone hors q",
              name : "vector_horsq",
              bloccolor: "rgb(90,200,230)",
              blocpicto: "fa-square"
          });
     	
     	var borderLayer =  new ol.layer.Vector({
              source: bordureSource,
              style: new ol.style.Style({
                  stroke: new ol.style.Stroke({color: "rgba(50,122,128,0.7)", lineDash: null, width: 2}),
                  fill: new ol.style.Fill({color: "rgba(50,100,196,0.3)"})
              }),
              title: "Bordures 500",
              name : "vector_border",
              bloccolor: "rgb(90,150,230)",
              blocpicto: "fa-square"
          });
      	quartierLayer =  new ol.layer.Vector({
              source: quartierSource,
              style: new ol.style.Style({
                  stroke: new ol.style.Stroke({color: "rgba(250,127,0,0.9)", lineDash: null, width: 2}),
                  fill: new ol.style.Fill({color: "rgba(255,127,0,0.4)"})
              }),
              title: "Quartiers PRU",
              name : "vector_pru",
              bloccolor: "rgb(255,127,0)",
              blocpicto: "fa-square"
      });

      var zusLayer =  new ol.layer.Vector({
              source: zusSource,
              style: new ol.style.Style({
                  stroke: new ol.style.Stroke({color: "rgba(224,117,80,0.9)", lineDash: null, width: 2}),
                  fill: new ol.style.Fill({color: "rgba(224,117,100,0.3)"})
              }),
              title: "ZUS IDF",
              name : "vector_zus",
              bloccolor: "rgb(224,117,100)",
              blocpicto: "fa-square",
              visible: false
      });

	   	return [baseLayer,comLayer, borderLayer, zusLayer, quartierLayer];

     };
 

	 //############## END MAP ####################

    $scope.tableToJson = function(idTable, filename){
        var tableRef = [];
        var now = new Date();
        filename = filename+'_'+now.getDay()+''+(now.getMonth()+1)+''+now.getFullYear()+'_'+now.getHours()+''+now.getMinutes()+''+now.getSeconds();
        if(idTable==1){
        tableRef = [
            {
                name: 'Total logements et Vacance',
                ref : [
                    {tag: '#table_1a', nbcol: 5, headings: ['value', 'nban1', 'pcan1', 'nban2', 'pcan2']},
                    {tag: '#table_1b', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']},
                    {tag: '#table_1c', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']}],
                type: 'table'
            },
            {
                name: 'Statut d\'occupation',
                ref : [
                    {tag: '#table_2a', nbcol: 5, headings: ['value', 'nban1', 'pcan1', 'nban2', 'pcan2']},
                    {tag: '#table_2b', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']},
                    {tag: '#table_2c', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']}],
                type: 'table'
            },
            {
                name: 'Typologie',
                ref : [
                    {tag: '#table_3a', nbcol: 5, headings: ['value', 'nban1', 'pcan1', 'nban2', 'pcan2']},
                    {tag: '#table_3b', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']},
                    {tag: '#table_3c', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']}],
                type: 'table'
            },
            {
                name: 'Age personne de référence du ménage',
                ref : [
                    {tag: '#table_4a', nbcol: 5, headings: ['value', 'nban1', 'pcan1', 'nban2', 'pcan2']},
                    {tag: '#table_4b', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']},
                    {tag: '#table_4c', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']}],
                type: 'table'
            }
        ];
        }else{
            tableRef = [
                {
                    name: 'Revenus des ménages',
                    ref : [
                        {tag: '#table_5a', nbcol: 5, headings: ['value', 'nban1', 'pcan1', 'nban2', 'pcan2']},
                        {tag: '#table_5b', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']},
                        {tag: '#table_5c', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']}],
                    type: 'table'
                },
                {
                    name: 'Rapport quartier / environnement et commune hors ZUS',
                    ref : [
                        {tag: '#table_6a', nbcol: 5, headings: ['value', 'nban1', 'pcan1', 'nban2', 'pcan2']},
                        {tag: '#table_6b', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']},
                        {tag: '#table_6c', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']}],
                    type: 'table'

                },
                {
                    name: 'Mobilités',
                    ref : [
                        {tag: '#table_7a', nbcol: 5, headings: ['value', 'nban1', 'pcan1', 'nban2', 'pcan2']},
                        {tag: '#table_7b', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']},
                        {tag: '#table_7c', nbcol: 4, headings: ['nban1', 'pcan1', 'nban2', 'pcan2']}],
                    type: 'table'

                }
            ];

        }

        var csvString = 'Quartier PRU : '+ $scope.ter1Label + '(' + $scope.codeRef + ')\r\n';
        csvString += 'Commune : ' + $scope.nomcom + '(' + $scope.dt1[0].code_com + ')\r\n\r\n\r\n';
        csvString += 'OFFRE DE LOGEMENT et PROFIL DÉMOGRAPHIQUE\r\n';

        CSVService.buildCSV(tableRef, filename, csvString);
    };

}]);
