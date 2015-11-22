/**
 * Created by Yash on 11/21/2015.
 */
(function () {
    'use strict';

    angular
        .module('app')
        .controller('NewsController', NewsController);

    NewsController.$inject = ['$scope', '$http'];
    function NewsController($scope, $http) {
        var vm = this;

        vm.getNews = getNews;
        function getNews(){
            $http.get('http://localhost/CMPS1/API/index.php/news_controller/news')
                .success(function (data) {

                    $scope.news=data;
                });
        }
    }

})();
