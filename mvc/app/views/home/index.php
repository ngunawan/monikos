Hello <?=$data['name']?>



<body>
	<p>helo world to <?=$data['name']?></p>

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
    });
    </script>
    <div ng-app="myApp" ng-controller="customersCtrl"> 

	    <table>
	      <tr ng-repeat="x in names">
	        <td>{{ x.Generic }}</td>
	        <td>{{ x.Brand }}</td>
	        <td>{{ x.Class }}</td>
            <!--<td>{{ x.HintLikes }}</td>-->
	      </tr>
	    </table>

    </div>


</body>