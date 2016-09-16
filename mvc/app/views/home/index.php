<!--Hello <?=$data['name']?>-->



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
            //create list manager controller
            window.location = window.location.origin + "/mvc/public/account/login";   
        }
    });
    </script>
    <div id=app_header>header</div>
    <div id=app_content ng-app="myApp" ng-controller="customersCtrl">
        <div class="top-block">
            <div class="database-block">
                <!--<a href=database.html>Database</a>-->
                <button ng-click="drugDatabase()">Database</button>
            </div>
        </div>
        <div class="bottom-block">
            <div class=study-block>
                <button ng-click="listManager()">List Manager</button>
            </div>
        </div>
        <div class="bottom-block">
            <div class=logout-block>
                <button ng-click="logout()">Logout</button>
            </div>
        </div>
    </div>
    <div id=app_footer>footer</div>
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
    </div>


</body>