app.controller('MainCtrl', ['$scope', function($scope){

	$scope.mainCtrlMsg = "Rejoindre la sélection par zonage de territoire";

	console.log("ok pour test");


	$scope.goToURL = function(url){

		window.location = "zonage/"
	}

	
}])