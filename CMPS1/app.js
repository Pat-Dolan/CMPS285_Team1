/**
 * Created by Code5 on 10/10/2015.
 */
(function(){
    var app = angular.module('sga',[]);

    app.factory('ContentService', function () {
        return {
            url: "tpls/login.html"
        }
    })

    app.controller('IndexController', function($scope,$http,ContentService){
        $scope.content = ContentService;
        $scope.load = function(url){
            $scope.content.url = url;   
        };
    });

    app.controller('LoginController', function($scope,$http,ContentService){
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
                    headers: {'Content-Type': 'application/json'}
                }

                $http(req).then(function (response) {

                    bool = response.data;
                    if (bool) {
                        ContentService.url = '../CMPS1/tpls/main.html';

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
