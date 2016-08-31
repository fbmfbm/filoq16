app.controller('MainCtrl', ['$scope', function($scope){


	$scope.msgMain = "Hello le monde";
	
	$scope.showLogin = true;


	$scope.toggleLogin = function(){

		console.log("Hrlp");	
		$scope.showLogin = !$scope.showLogin;
	}

	$scope.goToURL = function(url){

		window.location = "zonage/"
	}

	
}])