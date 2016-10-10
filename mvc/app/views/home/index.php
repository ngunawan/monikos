<!--Hello <?=$data['name']?>-->


<link rel="stylesheet" type="text/css" href="/mvc/public/css/home_style.css"/>

<body id="main_app_module">

	<script>
    var app = angular.module('myApp', []);
    app.controller('customersCtrl', function($scope, $http) {
        //var url = "http://testmonikos.us-east-1.elasticbeanstalk.com/sql_result.php"
        //var url = "http://danilachenchik.com/sql_result.php";
        var url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/sql_result.php";
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
        $scope.logout = function(){
            if(document.cookie.indexOf("user_id") < 0){
                document.cookie = "user_id="+response.data.id+"; expires="+(Date.now()-(86400 * 30))+"; path=/";
            }
            
            if(document.cookie.indexOf("username") < 0){
                document.cookie = "username="+response.data.username+"; expires="+(Date.now()-(86400 * 30))+"; path=/";
            }
            window.location = window.location.origin + "/mvc/public/account/login";   
        }

        $scope.deleteCookie = function(name){
            document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
    });
    </script>
    <div id=app_header></div>
	
    <div id=app_content ng-app="myApp" ng-controller="customersCtrl">
        <a href="#" ng-click="drugDatabase()">
            <div class="top-block">
                <div class="database-block">
                    <!--<a href=database.html>Database</a>-->
                    <!--<button ng-click="drugDatabase()">Database</button>-->
                    DATA<br>BASE
                </div>
            </div>
        </a>
        <a href="#" ng-click="listManager()">
            <div class="bottom-block">
                <div class=study-block>
                    STUDY
                </div>
            </div>
        </a>
		
		<a href="#"  ng-click="logout()">
        <div class=logout-block>
			<div class = 'logout'>LOGOUT</div> 
        </div>
		</a>
       
    </div>
    <!--<div id=app_footer>footer</div>-->
    <!--<div ng-app="myApp" ng-controller="customersCtrl">-->
    
    <!--
	    <table>
	      <tr ng-repeat="x in names">
	        <td>Generic: {{ x.Generic }}</td>
	        <td>Brand: {{ x.Brand }}</td>
	        <td>Class: {{ x.Class }}</td>
            <td>Indication: {{ x.Indication }}</td>
            <td>HintLikes: {{ x.HintLikes }}</td>
            <td>HintDislikes: {{ x.HintDislikes }}</td>
	      </tr>
	    </table>
    -->
   


</body>