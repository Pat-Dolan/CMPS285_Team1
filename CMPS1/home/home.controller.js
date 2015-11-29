(function () {
    'use strict';

    angular
        .module('app')
        .controller('HomeController', HomeController);

    HomeController.$inject = ['$location', 'AuthenticationService','$cookieStore','$http','$scope'];
    function HomeController($location, AuthenticationService, $cookieStore,$http,$scope) {

<<<<<<< HEAD
        $http.get('http://'+ window.location.host +'/CMPS1/API/index.php/news_controller/News')
=======
        $http.get('http://'+ window.location.host +'/CMPS1/API/index.php/news_controller/News')
>>>>>>> origin/master
            .success(function (data) {
                $scope.news=data;
            });

        var vm = this;

        vm.logout = logout;
        vm.refresh = refresh;
        vm.getUsername = getUsername;
        vm.getEmail = getEmail;
        vm.checkAdmin = checkAdmin;
        vm.getType = getType;
        vm.addUser = addUser;

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
           return getType() == "admin";

        }
        function addUser(user){
            vm.stat = true;
            //console.log(user.firstname);
            //console.log(user.lastname);
            //console.log(user.username);
            //console.log(user.password);
            //console.log(user.email);
            //console.log(user.type);


            if (user.username != getUsername()&& user.email != getEmail() &&
            user.firstname != null && user.lastname !="" && user.username !="" &&
                user.password !="" && user.email !="" && user.type !="") {

                var post = {
                    method: 'POST',
                    url: 'http://'+ window.location.host +'/CMPS1/API/index.php/update_controller/addUser',
                    data: {
                        'firstname': user.firstname,
                        'lastname': user.lastname,
                        'username': user.username,
                        'password': user.password,
                        'email': user.email,
                        'type': user.type
                    },
                    headers: {'Content-Type': 'application/json'}
                };
                $http(post);

                    vm.message = "Username " + user.username + "  created";



            }
            else if (user.username == getUsername()) {
                    vm.message = "User " + user.username + "  already exists";
                }
            else if (user.email == getEmail()) {
                    vm.message = "Email adress " + user.email + "  already used";


            }
        }


    }

})();