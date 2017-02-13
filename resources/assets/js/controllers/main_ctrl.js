app.controller('MainCtrl', ['$scope', function($scope){

	$scope.msgMain = "Initialisation";
	$scope.showLogin = true;

	$scope.toggleLogin = function(){
		$scope.showLogin = !$scope.showLogin;
	}
	$scope.goToURL = function(url){
		window.location = "zonage/"
	}
}])