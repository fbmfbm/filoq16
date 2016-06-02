app.controller('MainCtrl', ['$scope', function($scope){

	$scope.mainCtrlMsg = "Message du Main Controller";

	console.log("ok pour test");


	$scope.goToURL = function(url){

		window.location = "zonage/"

	}

	
}])