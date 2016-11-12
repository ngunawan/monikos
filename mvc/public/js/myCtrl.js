var app = angular.module('myApp', ['checklist-model']);

app.controller('myCtrl', function($scope, $http) {
	$scope.listId = [];
	$scope.passedId = 0;
	
    $scope.lists = [];
    
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

    //var url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/sql_result.php";
    var url = "/db/get_drugs.php";
    $http.get(url)
        .then(function (response) {
        console.log(response);
        //console.log(response);
        $scope.drugs = response.data.records;
        //console.log($scope.names);
        //alert($scope.names);
    });

    //var getListsUrl = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/get_lists.php";
    var getListsUrl = "/db/get_lists.php";
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
            var createListUrl = "/db/create_list.php";
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
			window.location = window.location.origin + "/mvc/public/games/menu/" + $scope.passedId;
		}

		$scope.listManager = function(){
            window.location = window.location.origin + "/mvc/public/home/listManager/";
        }
		
/***SELECT LIST ID*********/

		$scope.list_block = "list-block";
		
		$scope.selectlist = function(index, thisElem){
            $scope.passedId = $scope.listId[index]['list_id'];
	       	console.log($scope.passedId);

		}

});

$( document ).ready(function() {
    $('.list-collection-block').on('click', '.list_block .selectList',function(){
        var parent = $(this).parent();
        if(!parent.hasClass('red')){
            parent.addClass('red');
            $(this).siblings('.list-info-block').children().addClass('whiteTextClass');     
        }else{
            parent.removeClass('red');
            $(this).siblings().removeClass('whiteTextClass');
        }
    });

    $('#addListButton').on('click', function(){
        $('.list-collection-block').addClass('list-collection-block-short');
    });
});
