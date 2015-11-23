(function () {
    'use strict';

    angular
        .module('app')
        .controller('HomeController', HomeController);

    HomeController.$inject = ['$location', 'AuthenticationService','$cookieStore','$http'];
    function HomeController($location, AuthenticationService, $cookieStore,$http) {
        var vm = this;

        vm.logout = logout;
        vm.refresh = refresh;
        vm.getUsername = getUsername;
        vm.getEmail = getEmail;
        vm.checkAdmin = checkAdmin;
        vm.getType = getType;
        vm.getNews = getNews;

        function logout(){
            AuthenticationService.ClearCredentials();
            $location.path('/login');
        }
        function refresh(){
            location.reload();
        }
        function getUsername(){
            return  $cookieStore.get('globals')["currentUser"]["username"];
        }
        function getEmail(){
            return $cookieStore.get('globalProperties')["properties"]["email"];
        }
        function getType(){
            return $cookieStore.get('globalProperties')["properties"]["type"];
        }
        function checkAdmin(){
           return getType() == "Admin";

        }
        function getNews(){
            $http.get('http://localhost/CMPS1/API/index.php/news_controller/News')
                .success(function (data) {
                    console.log(data);
                });
        }
    }

})();