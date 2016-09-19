<body>
	<script>
	    var app = angular.module('myApp', []);
	    app.controller('accountCtrl', function($scope, $http) {
	        $scope.createAccount = function(){
	            //console.log("whatwhat");
	            var un = document.getElementById('un').value;
	            var email = document.getElementById('email').value;
	            var pw = document.getElementById('pw').value;

	            var url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/create_account.php";
	        
	            var data = $.param({
	                username: un,
	                password: pw,
	                email: email
	            });
	            var config = {
	                    headers : {
	                        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
	                    }
	                };
	            $http.post(url, data, config)
	            .then(function (response) {
	                console.log(response);
	                //console.log(response);
	                //$scope.names = response.data.records;
	                $scope.response = response;
	                if(response.data[0].response == 200){
	                	window.location = window.location.origin + "/mvc/public/account/login";
	                }else{
	                	alert("error in creating account");
	                }
	                //console.log($scope.names);
	                //alert($scope.names);
	            });    
	        }
	        $scope.login = function(){
            	window.location = window.location.origin + "/mvc/public/account/login";
	        }
	    });
    </script>
     <div ng-app="myApp" ng-controller="accountCtrl" id="usr_mng_module"> 
        <div class="wrapper">
            <input id="un" type="text" name="username" placeholder="username">
            <input id="email" type="text" name="email" placeholder="email">
            <input id="pw" type="text" name="password" placeholder="password">
            <button ng-click="createAccount()">Create</button>
            <p>username: {{response.data[0].username}}</p>
            <p>email: {{response.data[0].email}}</p>
        </div>
        <button ng-click="login()">Back to Login</button>
    </div>
</body>