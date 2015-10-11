/**
 * Created by Yash on 10/10/2015.
 */
(function(){
    var app = angular.module('sga',[]);
    app.controller('MainController', function($scope,$http){
        $scope.login = function(username, password) {

            var req = {
                method: 'POST',
                url: 'http://localhost/CMPS1/API/index.php/login_controller/validate',
                data: {
                    'username': username,
                    'password': password
                },
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            };

            $http(req).then(function(response){
                var bool = false;
                 bool = response.data;
               if(bool){
                   window.open('index.html',"_self");

               }
                else{
                   alert("invalid user");
               }
            });
        };


    });
})();
