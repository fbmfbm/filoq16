app.controller('FileCtrl', ['$scope', function($scope){

    $scope.file = null;

    $scope.$watch('file', function (newVal) {
        if (newVal)
            console.log(newVal);
    })

}]);
