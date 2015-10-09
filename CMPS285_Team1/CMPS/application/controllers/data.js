/**
 * Created by Jenna on 10/4/2015.
 */

function GetUsers ($scope, $http) {
    //this is where the JSON from api.php is consumed
    $http.get('api file goes here').
        success(function(data))
    {
        //hee the data from the api is assigned to a variable and named users.
        $scope.users = data;
    }

}