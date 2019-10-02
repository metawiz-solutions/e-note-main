var myApp = angular.module('myApp',[]);

myApp.controller('FormController', ['$scope', function($scope){
	$scope.register = function() {
		$scope.msg = 'Registerd Succesfully';
		
		
	}
}]);