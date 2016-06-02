
app.controller('OffreCtrl', ['$scope', 'GeoJsonData', 'PGData', '$q', function($scope,  GeoJsonData, PGData, $q){

	$scope.offreCtrlMsg = "Message Offre Controller";


	$scope.codeRef = '005';
	$scope.refScale = 'quart';

	$scope.dt1 = {};
	$scope.dt2 = {};
	$scope.dt3 = {};

	
	var getPGData = function(code, scale ){

		var defered = $q.defer();

		PGData.getPGData(code, scale).then(function(result){

			console.log(result);

			

			 defered.resolve(result.data);

		});

		return defered.promise;
	}

	 getPGData( '005', 'quart').then(function(result1){

	 		$scope.ter1Label = result1[0].nom_terr;
			$scope.codeDep= result1[0].code_dep;
			$scope.codeDep= result1[0].code_dep;
	 		$scope.dt1 = result1;

		getPGData('93005_R500', 'border').then(function(result2){

			$scope.dt2 = result2;

			getPGData('93005', 'horq').then(function(result3){

				$scope.dt3 = result3;

			});
		});
	});
	

}]);
