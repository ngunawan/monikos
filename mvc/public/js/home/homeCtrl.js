var app = angular.module('myApp', []);
app.controller('homeCtrl', function($scope, $http) {
    //var url = "http://testmonikos.us-east-1.elasticbeanstalk.com/sql_result.php"
    //var url = "http://danilachenchik.com/sql_result.php";
    //var url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/sql_result.php";
    var url = "/db/get_drugs.php";
    $http.get(url)
    .then(function (response) {
        console.log(response);
        //console.log(response);
        $scope.names = response.data.records;
        console.log($scope.names);
        //alert($scope.names);
    });

    $scope.drugDatabase = function(){
        //create new database controller
        window.location = window.location.origin + "/mvc/public/home/drugDatabase";
    }

    $scope.listManager = function(){
        //create list manager controller
        window.location = window.location.origin + "/mvc/public/home/listManager";
    }
//        $scope.logout = function(){
//            //create list manager controller
//            if(document.cookie.indexOf("user_id") > 0){
//
//
//                document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/";
//            }
//
//            if(document.cookie.indexOf("username") > 0){
//
//                document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/";
//            }
//            window.location = window.location.origin + "/mvc/public/account/login";
//        }
});
