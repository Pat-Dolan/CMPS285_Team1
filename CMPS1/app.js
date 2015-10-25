/**
 * Created by Code5 on 10/10/2015.
 */
(function(){
    var app = angular.module('sga',[]);
    app.controller('MainController', function($scope,$http){
        $scope.login = function(username, password) {
            if (username == null || password == null) {

                $scope.istrue = function (bool) {


                    return bool;
                }
            }
            else {
                var req = {
                    method: 'POST',
                    url: 'http://localhost/CMPS1/API/index.php/login_controller/validate',
                    data: {
                        'username': username,
                        'password': password,
                    },
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }

                $http(req).then(function (response) {

                    bool = response.data;
                    if (bool) {
                        window.open('../CMPS1/index.html', "_self");

                    }
                    else {
                        $scope.istrue = function(bool) {


                                return istrue;

                        }
                    }
                });
            }
        }

    });


})();
