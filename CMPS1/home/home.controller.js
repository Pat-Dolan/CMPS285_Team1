(function () {
    'use strict';

    angular
        .module('app')
        .controller('HomeController', HomeController);

    HomeController.$inject = ['$location', 'AuthenticationService', 'FlashService'];
    function HomeController($location, AuthenticationService, FlashService) {
        var vm = this;

        vm.logout = logout;
        vm.refresh = refresh;

        function logout(){
            AuthenticationService.ClearCredentials();
            $location.path('/login');
        }
        function refresh(){
            location.reload();
        }
    }

})();