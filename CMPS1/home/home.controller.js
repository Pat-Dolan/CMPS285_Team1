(function () {
    'use strict';

    angular
        .module('app')
        .controller('HomeController', HomeController);

    HomeController.$inject = ['$location', 'AuthenticationService', 'FlashService','$rootScope'];
    function HomeController($location, AuthenticationService, FlashService , $rootScope) {
        var vm = this;

        vm.logout = logout;
        vm.refresh = refresh;
        vm.getUsername = getUsername;
        vm.getEmail = getEmail;
        vm.checkAdmin = checkAdmin;

        function logout(){
            AuthenticationService.ClearCredentials();
            $location.path('/login');
        }
        function refresh(){
            location.reload();
        }
        function getUsername(){
            return $rootScope.globals.currentUser.username;
        }

        function getEmail(){
            return $rootScope.globalProperties.properties.email;
        }
        function checkAdmin(){
            return $rootScope.globalProperties.properties.type === "Admin";
        }
    }

})();