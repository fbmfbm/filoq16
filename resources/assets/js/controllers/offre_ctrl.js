
app.controller('OffreCtrl', ['$scope', '$window', 'GeoJsonData', 'PGData', '$q', function($scope, $window,  GeoJsonData, PGData, $q){

	$scope.offreCtrlMsg = "Message Offre Controller";


	$scope.codeRef = $window._convent;

	$scope.refScale = 'quart';

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

			//console.log(result);
			
			 defered.resolve(result.data);

		});

		return defered.promise;
	}


	getPGData( $scope.codeRef, 'quart').then(function(result1){

	 		$scope.ter1Label = result1[0].nom_terr;
			$scope.codeDep   = result1[0].code_dep;
			$scope.codecom   = result1[0].code_com;
	 		$scope.dt1 = result1;

		getPGData($scope.codecom+'_R500', 'border').then(function(result2){

			$scope.dt2 = result2;

			getPGData( $scope.codecom , 'horq').then(function(result3){

				$scope.dt3 = result3;
				getGeoJsonQuartier()//----------- build map !!
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

	 	console.log(layersStack.length);

		map = new ol.Map({
            logo: false,
            controls: ol.control.defaults({ attribution: false,zoom: false}).extend([]),
            interactions: ol.interaction.defaults({ zoomWheelEnabled: false, dragPan: false}).extend([]),
            target: document.getElementById('map'),
            renderer: 'canvas',
            layers: layersStack,
            view: new ol.View({
            })
        });

		var zoomCenter = layersStack[1].getSource().getExtent();
		map.getView().fit(zoomCenter	, map.getSize());
        		
		layersStack[1].getSource().on("change", function(evt){
			var extent = layersStack[1].getSource().getExtent();	
    		console.log(extent);
    		map.getView().fit(extent, map.getSize());
    	});
     }

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
      	var quartierLayer =  new ol.layer.Vector({
              source: quartierSource,
              style: new ol.style.Style({
                  stroke: new ol.style.Stroke({color: "rgba(194,26,1,0.9)", lineDash: null, width: 2}),
                  fill: new ol.style.Fill({color: "rgba(223,14,70,0.4)"})
              }),
              title: "Quartiers PRU",
              name : "vector_pru",
              bloccolor: "rgb(194,26,1)",
              blocpicto: "fa-square"
      });

      var zusLayer =  new ol.layer.Vector({
              source: zusSource,
              style: new ol.style.Style({
                  stroke: new ol.style.Stroke({color: "rgba(255,127,0,0.9)", lineDash: null, width: 2}),
                  fill: new ol.style.Fill({color: "rgba(255,127,0,0.3)"})
              }),
              title: "ZUS IDF",
              name : "vector_zus",
              bloccolor: "rgb(255,127,0)",
              blocpicto: "fa-square"
      });

	   	var layersStack = [baseLayer,comLayer, borderLayer, zusLayer, quartierLayer];
	   	return layersStack;
     }
 

	 //############## END MAP ####################
	

}]);
