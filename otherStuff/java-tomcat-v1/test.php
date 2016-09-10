<html>
	<head>
		<title>test</title>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	</head>
	<body>
		
		<?php
			/*$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_URL, 
			    'http://54.208.240.211//response.php?foo=yes we can&baz=foo bar'
			);
			$content = curl_exec($ch);
			echo $content;*/
/*
			$host = "phpmyadmin.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
			$dbuser = "phpMyAdmin";
			$pass = "phpMyAdmin";
			$dbname = "phpMyAdminDatabase";
			$conn = mysqli_connect($host, $dbuser, $pass, $dbname);
			if(mysqli_connect_errno()){
//				echo "connection failed" .mysqli_connect_error();
				die("Connection Failed" . mysqli_connect_error());
			}else{
				echo "connection sucessful";
			}

			$sql = "SELECT * FROM Drug";
			$res = mysqli_query($conn, $sql);
			if(!$res){
				die("Query failed");
			}
			while($row=mysqli_fetch_row($res)){
				//var_dump($row);
				for(i in $row){echo row[i];}
				echo "<br /><hr /><br />";
			}
			mysqli_free_result($res);
*/
		?>

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



		<p>lkjnkjk</p>
	</body>
</html>