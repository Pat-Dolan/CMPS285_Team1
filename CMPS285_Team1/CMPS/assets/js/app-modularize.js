'use strict';


var HomeController = (function(){
	var HC = {};
	var App = angular.module('myApp', ['ui.bootstrap']);

	HC.setDTHML = function(){
		console.log(App);
		// App.controller('TableViewController', HC.TableViewController);
		// App.controller('FormController', HC.FormController);
	};

	HC.TableViewController = function($scope, $http) {
		$http({
			method: 'POST',
			url: '/code5/index.php/users/listAll',
			headers: {"Content-Type":"application/json"},
		}).success(function(data){
			$scope.rows = data;
		});		
	};

	HC.FormController = function ($scope, $http) {
		$scope.first_name = undefined;
		$scope.last_name = undefined;
		$scope.username = undefined;
		$scope.password = undefined;
		$scope.email = undefined;
		$scope.message = undefined;

	 	$scope.submitForm = function() { 		
	 		$http({
	 			method: 'POST',
	 			url: '/modelo/index.php/users/add',
	 			headers: {
	 				"Content-Type" :  "application/json"
	 			},
	 			data: JSON.stringify({first_name: $scope.first_name, last_name: $scope.last_name, username: $scope.username, password: $scope.password, email: $scope.email})
			})
	 		.success(function(data){
	 			alertify.notify(data.message, data.status, 5, function() { console.log(data.message); });
	 		});
	 	}
	};


	$(function(){
		HC.setDTHML();
	});

	return HC;

})();