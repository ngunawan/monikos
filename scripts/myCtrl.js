var app = angular.module('myApp', ['checklist-model']);
app.controller('myCtrl', function($scope, $http) {

//    var url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/sql_result.php";
//    $http.get(url)
//        .then(function (response) {
//        console.log(response);
//        //console.log(response);
//        $scope.tempdrugs = response.data.records;
//        //console.log($scope.names);
//        //alert($scope.names);
//    });
    
    $scope.tempdrugs = [{Brand: "tylenol",
                        Generic: "tylenolgeneric"},
                       {Brand: "advil",
                        Generic: "advilgeneric"}];
    
     $scope.listform = {name: "",
                               drugs: []};
    
     $scope.lists = [
                {name: "List1",
                 drugs: ["tylenol"]},
                {name: "List2",
                 drugs: ["advil", "tylenol"]}
            ]
     
       $scope.addList = function() {
           console.log($scope.listform);
                $scope.lists.push($scope.listform);
                $scope.listform = {name: "",
                                   drugs: []};
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
