
app.controller('OffreCtrl', ['$scope', '$window', 'GeoJsonData', 'PGData', '$q', function($scope, $window,  GeoJsonData, PGData, $q){

	$scope.offreCtrlMsg = "Message Offre Controller";


	$scope.codeRef = $window._convent;

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

	 getPGData( $scope.codeRef, 'quart').then(function(result1){

	 		$scope.ter1Label = result1[0].nom_terr;
			$scope.codeDep   = result1[0].code_dep;
			$scope.codecom   = result1[0].code_com;
	 		$scope.dt1 = result1;

		getPGData($scope.codecom+'_R500', 'border').then(function(result2){

			$scope.dt2 = result2;

			getPGData( $scope.codecom , 'horq').then(function(result3){

				$scope.dt3 = result3;
				console.log($scope.dt3[0].ta)

			});
		});
	});
	

}]);
