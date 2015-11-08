/**
 * Created by Code5 on 10/10/2015.
 */
(function () {
    var app = angular.module('sga', []);

    app.factory('ContentService', function () {
        return {
            url: "tpls/loading.html"
        }
    });

    app.controller('NewsController', function ($scope, $http, ContentService) {
        //$scope.get_news = function () {

            $http.get('http://localhost/CMPS1/API/index.php/news_controller/news')
                .success(function (data) {
                $scope.news = data;

            });
        //}
    });


    app.controller('IndexController', function ($scope, $http, ContentService) {
            $scope.content = ContentService;
            $scope.load = function (url) {
                $scope.content.url = url;
            };
                var req = {
                    method: 'GET',
                    url: 'http://localhost/CMPS1/API/index.php/login_controller/user',
                    headers: {'Content-Type': 'application/json'}
                }

                $http(req).then(function (response) {
                    if (response.data) {
                        ContentService.url = '../CMPS1/tpls/main.html';

                    }
                    else {
                       ContentService.url = '../CMPS1/tpls/login.html';
                    }
                });
            $scope.logout = function(){
                 $http.get('http://localhost/CMPS1/API/index.php/login_controller/logout')
                    .then(function (response) {
                     ContentService.url = '../CMPS1/tpls/login.html';
                    });
            }

         });

        app.controller('LoginController', function ($scope, $http, ContentService) {
            $scope.login = function (username, password) {
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
                            'password': password
                        },
                        headers: {'Content-Type': 'application/json'}
                }

                    $http(req).then(function (response) {

                        var bool = response.data;
                        if (bool) {
                            ContentService.url = '../CMPS1/tpls/main.html';

                        }
                        else {
                            $scope.istrue = function (bool) {
                                return istrue;
                            }
                        }
                    });
                }
            }
        });

    })();
