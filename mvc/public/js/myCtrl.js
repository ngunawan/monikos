var app = angular.module('myApp', ['checklist-model']);
app.controller('myCtrl', function($scope, $http) {

    var url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/sql_result.php";
    $http.get(url)
        .then(function (response) {
        console.log(response);
        //console.log(response);
        $scope.drugs = response.data.records;
        //console.log($scope.names);
        //alert($scope.names);
    });
    
    /*$scope.tempdrugs = [{Brand: "tylenol",
                        Generic: "tylenolgeneric"},
                       {Brand: "advil",
                        Generic: "advilgeneric"}];
    */
     $scope.listform = {name: "",
                               drugs: []};
    
     $scope.lists = [
                {name: "List1",
                 drugs: ["tylenol"]},
                {name: "List2",
                 drugs: ["advil", "tylenol"]}
            ]

    $scope.getCookie = function(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length,c.length);
            }
        }
        return "";
    }
     
       $scope.addList = function() {
           console.log($scope.listform);
            $scope.lists.push($scope.listform);
            

            var createListUrl = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/create_list.php";
            var config = {
                        headers : {
                            'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                        }
                    };

            
            var listData = $.param({
                    name: $scope.listform.name,
                    drugs: $scope.listform.drugs,
                    user_id: $scope.getCookie("user_id")
                });


            $scope.listform.drugs;
            $http.post(createListUrl, listData, config)
            .then(function (response) {
                console.log(response);
                //console.log(response);
                //$scope.names = response.data.records;
                //$scope.response = response;
                //if(response.data[0].response == 200){
                //    window.location = window.location.origin + "/mvc/public/account/login";
                //}else{
                //    alert("error in creating account");
                //}
                //console.log($scope.names);
                //alert($scope.names);
            });
            $scope.listform = {name: "",
                               drugs: []};    
        }
        $scope.home = function(){
            //create new database controller
            window.location = window.location.origin + "/mvc/public/home/";
        }

//    $scope.drugs = [
//        {brand: "Lipitor",
//         generic: "atorvastatin",
//         class: "Lipid/cholesterol lowering",
//         blackbox: "Some Blackbox Warning",
//         side: ["fever", "nausea"]},
//
//        {brand: "Nexium",
//         generic: "esomeprazole",
//         class: "Ulcers",
//         blackbox: "Some Blackbox Warning",
//         side: ["fever", "nausea"]}
//
//    ]
});
