app.controller('ZonageCtrl', ['$scope', 'GeoJsonData', 'olData', function($scope, GeoJsonData, olData){

	$scope.zonageCtrlMsg = "Message du Zonage Controller";

	console.log("ok pour test");

	var inited = false;
	$scope.refScale = 'dep';
    var map; 
	var vectorSource = new ol.source.Vector();
  var quartierSource = new ol.source.Vector();
  var bordureSource = new ol.source.Vector();
  var zusSource = new ol.source.Vector();

	var featureOverlay;
	var layerVector;

  


var getGeoJsonData = function(){


        GeoJsonData.getGeoData($scope.refCode, $scope.refScale, $scope.refDep).then(function(result){

            var featureCollection = JSON.parse(result.data[0].row_to_json);
            var geojsonFormat = new ol.format.GeoJSON();
            var allFeatures = geojsonFormat.readFeatures(featureCollection, {featureProjection: 'EPSG:3857'});
           	vectorSource.addFeatures(allFeatures);
            buildMap(featureCollection);
        });
        
    };

  var getGeoJsonQuartier = function(){


        GeoJsonData.getGeoData($scope.refCode, "border", $scope.refDep).then(function(result){

            var featureCollection = JSON.parse(result.data[0].row_to_json);
            var geojsonFormat = new ol.format.GeoJSON();
            var allFeatures = geojsonFormat.readFeatures(featureCollection, {featureProjection: 'EPSG:3857'});
            bordureSource.addFeatures(allFeatures);
            buildMap(featureCollection);

            GeoJsonData.getGeoData($scope.refCode, "quartier", $scope.refDep).then(function(result){

                var featureCollection = JSON.parse(result.data[0].row_to_json);
                var geojsonFormat = new ol.format.GeoJSON();
                var allFeatures = geojsonFormat.readFeatures(featureCollection, {featureProjection: 'EPSG:3857'});
                quartierSource.addFeatures(allFeatures);
                buildMap(featureCollection);

              GeoJsonData.getGeoData($scope.refCode, "zus", $scope.refDep).then(function(result){

                    var featureCollection = JSON.parse(result.data[0].row_to_json);
                    var geojsonFormat = new ol.format.GeoJSON();
                    var allFeatures = geojsonFormat.readFeatures(featureCollection, {featureProjection: 'EPSG:3857'});
                    zusSource.addFeatures(allFeatures);
                    buildMap(featureCollection);
               });//---end zus


            });//--end pru


        });//----end border

        
    };


   var buildLayers = function(){

	   	var baseLayer = new ol.layer.Group({'title': 'Fond de plan',layers: [new ol.layer.Tile({title: 'Stamen toner', opacity: 0.2, source: new ol.source.Stamen({layer: 'toner'})})]});

      baseLayer.set('name', 'fond de plan');
      baseLayer.set('baselayer', true);

	   	layerVector = new ol.layer.Vector({
	            source: vectorSource,
	            style: new ol.style.Style({
	                stroke: new ol.style.Stroke({color: "rgba(11,113,127,0.8)", lineDash: [5, 10 ], width: 2}),
	                fill: new ol.style.Fill({color: "rgba(200,200,200,0.11)"})
	            }),
	            title: "Limites de territoires",
	            name : "vector"
	        });

      var borderLayer =  new ol.layer.Vector({
              source: bordureSource,
              style: new ol.style.Style({
                  stroke: new ol.style.Stroke({color: "rgba(50,122,128,0.1)", lineDash: null, width: 2}),
                  fill: new ol.style.Fill({color: "rgba(50,100,196,0.1)"})
              }),
              title: "Bordures 500",
              name : "vector_border"
          });
      var quartierLayer =  new ol.layer.Vector({
              source: quartierSource,
              style: new ol.style.Style({
                  stroke: new ol.style.Stroke({color: "rgba(94,26,1,0.51)", lineDash: null, width: 2}),
                  fill: new ol.style.Fill({color: "rgba(223,14,70,0.7)"})
              }),
              title: "Quartiers PRU",
              name : "vector_pru"
      });

      var zusLayer =  new ol.layer.Vector({
              source: zusSource,
              style: new ol.style.Style({
                  stroke: new ol.style.Stroke({color: "rgba(255,127,0,0.6)", lineDash: null, width: 2}),
                  fill: new ol.style.Fill({color: "rgba(255,127,0,0.6)"})
              }),
              title: "ZUS IDF",
              name : "vector_zus"
      });

	   	layerVector.setVisible(true);

	   	var layersStack = [baseLayer, layerVector, borderLayer, quartierLayer, zusLayer];

	   	return layersStack;

   }

   var initMap = function(){

   		var select = new ol.interaction.Select({
            layer : layerVector,
            style : new ol.style.Style({
                stroke: new ol.style.Stroke({color: "rgba(211,246,0,0.51)", lineDash:null, width: 4}),
                fill: new ol.style.Fill({color: "rgba(50,239,217,0.21)"}),
            }),
            wrapX: false
        });

        var over = new ol.interaction.Select({
	   		condition: ol.events.condition.pointerMove,
	   		layer : layerVector,
	   		style : new ol.style.Style({
                stroke: new ol.style.Stroke({color: "rgba(211,246,0,0.51)", lineDash:null, width: 4}),
                fill: new ol.style.Fill({color: "rgba(50,255,98,0.41)"}),
            }),
	   	})

   			var layersStack = buildLayers();
   			map = new ol.Map({
                controls: ol.control.defaults().extend([]),
                interactions: ol.interaction.defaults().extend([select, over]),
                target: document.getElementById('map'),
                renderer: 'canvas',
                layers: layersStack,
                view: new ol.View({
                })
            });

          //########## LAYER SWITCHER #######
          new LayerSwitcher({
              map: map, 
              div: 'layerSwitcher',
              cssPath: 'css/app.css'
          });

         //######### END LAYER SWITCHER ########


            var extent = layersStack[1].getSource().getExtent();

            map.getView().fit(extent, map.getSize());

            layersStack[1].getSource().on("change", function(evt){
            	extent = layersStack[1].getSource().getExtent();
            	console.log(extent);
            	map.getView().fit(extent, map.getSize());
			});

			buildVectorOverlay();

			map.on('pointermove', function(evt) {

	            if (evt.dragging) {
	                //info.tooltip('hide');
	                return;
	            }

           		var pixel = map.getEventPixel(evt.originalEvent);
            		
            	displayFeatureInfo(pixel);
        	});



      map.on('click', function(evt) {

            //displayFeatureInfo(evt.pixel);
            var pixel = map.getEventPixel(evt.originalEvent);
            var feature = map.forEachFeatureAtPixel(pixel, function(feature, layer) {
                return feature;
            });

            $scope.refDep = '75';

            switch(feature.get('scale')){
                case  'reg':

                    $scope.refScale = 'dep';
                    break;
                case  'dep':
                    $scope.refDep = feature.get('code').substring(0, 2);
                    $scope.refScale = 'com';
                    break;
               case  'com':
                   $scope.refDep = feature.get('code').substring(0, 2);
                   $scope.refScale = 'comselect';
                    break;
               case  'comselect':
                   $scope.refDep = feature.get('code').substring(0, 2);
                   $scope.refScale= 'quartier';
                    break;
              case  'quart':
                   var code = feature.get('code');

                   window.location = "/thema/offre/"+code;
                   
                    break;
            }

            $scope.refCode = feature.get('code');

            console.log( $scope.refCode,  $scope.refScale, $scope.refDep);
              if(feature.get('scale')!='pars') { searchData() };
        });


      //############# End initialisation ###########

     inited = true;

   }


   var displayFeatureInfo = function(pixel) {

	        var info = $('#info');

	        info.tooltip({
	            animation: false,
	            trigger: 'manual'
	        });

            info.css({
                left: (pixel[0]+10) + 'px',
                top: (pixel[1]+110) + 'px'
            });

            var feature = map.forEachFeatureAtPixel(pixel, function(feature, layer) {
                return feature;
            });

            if (feature) {

                info.tooltip('hide')
                    .attr('data-original-title', (feature.get('label')+" ("+feature.get('code')+")") )
                    .tooltip('fixTitle')
                    .tooltip('show');
            }else{

                info.tooltip('hide');
            }

        };




   var buildVectorOverlay = function(){


   	
	        

   }

   var clearVectorLayer = function(){

        console.log(map.getLayers());
        var vectorLayer = map.getLayers().a[1].getSource().clear();
    };


   var buildMap = function(geoJsonDataFeature){

   		 if(!inited){

   		 	initMap();

        
        }//--end if

   }


   var searchData = function(){

      if($scope.refScale== 'quartier'){


      };

      clearVectorLayer();
      getGeoJsonData();

   }

   getGeoJsonQuartier();
   getGeoJsonData();



}])