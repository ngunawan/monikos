Hello <?=$data['name']?>



<body>
	<p>helo world to <?=$data['name']?></p>

	<script>
    var app = angular.module('myApp', []);
    app.controller('customersCtrl', function($scope, $http) {
        $http.get("http://testmonikos.us-east-1.elasticbeanstalk.com/sql_result.php")
        .then(function (response) {
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
	        <td>{{ x.Indication }}</td>
	      </tr>
	    </table>

    </div>


</body>