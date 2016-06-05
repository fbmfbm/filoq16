app.controller('ZonageCtrl', ['$scope', 'GeoJsonData', 'PGData', function($scope, GeoJsonData, PGData){

	$scope.zonageCtrlMsg = "Message du Zonage Controller";

	console.log("ok pour test");

	var inited = false;
	$scope.refScale = 'dep';
  var map; 
	var vectorSource = new ol.source.Vector();
  var quartierSource = new ol.source.Vector();
  var bordureSource = new ol.source.Vector();
  var zusSource = new ol.source.Vector();

  var quartierLayer;

	var featureOverlay;
	var layerVector;
  $scope.refPru  = [];



 var getRefPru = function(){

    PGData.getRefCode('pru').then(function(result){

      $scope.refPru = result.data;

      console.log(result);

      getGeoJsonQuartier();
      getGeoJsonData();

    })
 } ;

var getGeoJsonData = function(){

        GeoJsonData.getGeoData($scope.refCode, $scope.refScale, $scope.refDep).then(function(result){

           	vectorSource.addFeatures(result);
        });
    };

  var getGeoJsonQuartier = function(refCode){
    
        (!refCode)?refCode='':refCode=refCode;

        GeoJsonData.getGeoData($scope.refCode, "border",refCode).then(function(result){

            bordureSource.addFeatures(result);

            GeoJsonData.getGeoData($scope.refCode, "quartier", refCode).then(function(result){

                quartierSource.addFeatures(result);

              GeoJsonData.getGeoData($scope.refCode, "zus", refCode).then(function(result){

                    zusSource.addFeatures(result);
                    buildMap();
               });//---end zus
            });//--end pru
        });//----end border       
    };

   var buildLayers = function(){
    
      //var baseLayer = new ol.layer.Group({'title': 'Fond de plan',layers: [new ol.layer.Tile({source: new ol.source.OSM()}),new ol.layer.Tile({title: 'Stamen toner', opacity: 0.2, source: new ol.source.Stamen({layer: 'toner'})})]});
      var baseLayer = new ol.layer.Group({'title': 'Fond de plan',layers: [
          new ol.layer.Tile({source: new ol.source.BingMaps({ key: 'Ann-y97gpi1eYfOK806hTKFoZz8z8763yMvIg96gwTMvkGQbhaVN_Yx5qoRUCq9z', imagerySet: 'Aerial' })})
          //new ol.layer.Tile({source: new ol.source.BingMaps({ key: 'Ann-y97gpi1eYfOK806hTKFoZz8z8763yMvIg96gwTMvkGQbhaVN_Yx5qoRUCq9z', imagerySet: 'AerialWithLabels' })})
        ]});
     

      baseLayer.set('name', 'fond de plan');
      baseLayer.set('baselayer', true);

	   	layerVector = new ol.layer.Vector({
	            source: vectorSource,
	            style: new ol.style.Style({
	                stroke: new ol.style.Stroke({color: "rgba(200,200,200,0.5)", lineDash: [5, 10 ], width: 2}),
	                fill: new ol.style.Fill({color: "rgba(200,200,200,0.11)"})
	            }),
	            title: "Limites de territoires",
	            name : "vector"
	        });

      var borderLayer =  new ol.layer.Vector({
              source: bordureSource,
              style: new ol.style.Style({
                  stroke: new ol.style.Stroke({color: "rgba(50,122,128,0.6)", lineDash: null, width: 2}),
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

	   	layerVector.setVisible(true);

	   	var layersStack = [baseLayer, layerVector, borderLayer, zusLayer, quartierLayer];

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
                //fill: new ol.style.Fill({color: "rgba(50,255,98,0.0)"}),
            }),
	   	})

   			var layersStack = buildLayers();
   			map = new ol.Map({
                logo: false,
                controls: ol.control.defaults({ attribution: false }).extend([]),
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
              //if(feature.get('scale')!='pars') { searchData() };
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

  $scope.zoomOnFeature = function(codeFeature){

    if(codeFeature && codeFeature!=''){

    var features = quartierLayer.getSource().getFeatures();

        for(var i=0;i<features.length;i++){

            if(features[i].get('code')== codeFeature){

                var featureExtent = ol.extent.createEmpty(); 
                ol.extent.extend(featureExtent, features[i].getGeometry().getExtent()); 
                map.getView().fit(featureExtent, map.getSize());
            };
        };
     }//--if feature
 
  };

  var buildVectorOverlay = function(){


   	
	        

   }

   var clearVectorLayer = function(){

        console.log(map.getLayers());
        var vectorLayer = map.getLayers().a[1].getSource().clear();
    };


   var buildMap = function(){

   		 if(!inited){

   		 	initMap();

        
        }//--end if

   }


   var searchData = function(){

      if($scope.refScale== 'quartier'){

      }else{
        clearVectorLayer();
        getGeoJsonData();
      };
   }

     $scope.exportPNG = function () {

    canvas = document.getElementsByTagName('canvas')[0];
    canvas.toBlob(function (blob) {
        saveAs(blob, 'map.png');
    });
  };


  //#################### RUN ########### 


   getRefPru();





}])