 'use strict';

 var App = angular.module('myApp', ['ui.bootstrap']);

 function FormController($scope, $http) {
 	$scope.first_name = undefined;
 	$scope.last_name = undefined;
	 $scope.username = undefined;
	 $scope.password = undefined;
	 $scope.email = undefined;
 	$scope.message = undefined;

 	$scope.submitForm = function() { 		
 		$http({
 			method: 'POST',
 			url: '/code5/index.php/users/add',
 			headers: {
 				"Content-Type" :  "application/json"
 			},
 			data: JSON.stringify({first_name: $scope.first_name, last_name: $scope.last_name, username: $scope.username, password: $scope.password, email: $scope.email})
 		}).success(function(data){
 			alertify.notify(data.message, data.status, 5, function() { console.log(data.message); });
 		});
 	}
 }


function TableViewController($scope, $http) {
	$http({
		method: 'POST',
		url: '/code5/index.php/users/listAll',
		headers: {"Content-Type":"application/json"},
	}).success(function(data){
		$scope.rows = data;
	});
}

App.controller('TableViewController', TableViewController);
App.controller('FormController', FormController);
