var app = angular.module('app',[]);

app.controller('AppCtrl', function ($scope, $http) {
	$scope.message =  "Hello World";
	var req = {
	method: 'POST',
	url: 'http://localhost/CMPS/index.php/login_controller/validate',
	data: {
		'username': 'yash',
		'password':'malla'
	},
    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
	};

	$http(req).then(function(res){
		console.log(res.data);
	});
});

