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
	        <td>Generic: {{ x.Generic }}</td>
	        <td>Brand: {{ x.Brand }}</td>
	        <td>Class: {{ x.Class }}</td>
            <td>Indication: {{ x.Indication }}</td>
            <td>HintLikes: {{ x.HintLikes }}</td>
            <td>HintDislikes: {{ x.HintDislikes }}</td>
            <!--<td>{{ x.HintLikes }}</td>-->
	      </tr>
	    </table>

    </div>


</body>