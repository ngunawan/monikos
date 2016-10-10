var app = angular.module('myApp', ['checklist-model']);
app.controller('myCtrl', function($scope, $http) {
	$scope.listId = [];
	
	$scope.list_num_pos = 0;
	
	$scope.increment_list_num_pos = function(){
		$scope.list_num_pos = $scope.list_num_pos + 1;
	}
	
    $scope.lists = [
                /*{name: "List1",
                 drugs: ["tylenol"]},
                {name: "List2",
                 drugs: ["advil", "tylenol"]}*/
            ];
    
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

    var url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/sql_result.php";
    $http.get(url)
        .then(function (response) {
        console.log(response);
        //console.log(response);
        $scope.drugs = response.data.records;
        //console.log($scope.names);
        //alert($scope.names);
    });

    var getListsUrl = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/get_lists.php";
    var getListsConfig = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
    };

    
    var getListsData = $.param({
            user_id: $scope.getCookie("user_id")
    });

     $http.post(getListsUrl, getListsData, getListsConfig)
        .then(function (response) {
        console.log(response); 
		
		 $scope.listId = response.data.records
		 
        if(response.data.records.length < 1){
            $(".list-collection-block").append('<p id="noListsMessage">Please create a list</p>');
        }else{
            for(var i in response.data.records){
                $scope.lists.push({
                    name: response.data.records[i].list_name.toString(),
                    drugs: response.data.records[i].drugnames.toString().split(",")
                });
            }
        }
        //$scope.drugs = response.data.records;
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
                if(response.data[0].response == 200){
                //    window.location = window.location.origin + "/mvc/public/account/login";
                    $("#noListsMessage").remove();
                }
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

        $scope.launchGame = function(){
            window.location = window.location.origin + "/mvc/public/games/";
        }
		 
		$scope.listMangaer = function(){
            window.location = window.location.origin + "/mvc/public/home/listManager/";
        }
		
/***SELECT LIST ID*********/
		$scope.selectlist = function(){
			console.log($scope.listId)	
			
			window.location = window.location.origin + "/mvc/public/games/" + $scope.listId;
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
