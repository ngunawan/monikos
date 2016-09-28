
    <body ng-app="loginApp" ng-controller="loginCtrl"  id="usr_mng_module">
        <div class="wrapper">
            <h1>Login</h1>
            <input id="un" type="text" placeholder="username">
            <input id="pw" type="password" placeholder="password">
            <div class="fb-login-button" data-scope="public_profile,email" onlogin="checkLoginState();"></div>
            <button ng-click="login()">login</button>
            <button ng-click="create()">Create Account</button>
        </div>
        </div>

    </body>

<script>
    var app = angular.module('loginApp', []);
    app.controller('loginCtrl', function($scope, $http, $location) {    
        $scope.login = function(){
            //console.log("whatwhat");
            var un = document.getElementById('un').value;
            var pw = document.getElementById('pw').value;

            var url = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/do_login.php";
        
            var data = $.param({
                username: un,
                password: pw,
            });
            var config = {
                    headers : {
                        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                    }
            };
            $http.post(url, data, config)
            .then(function (response) {
                console.log(response);
                $scope.response = response;
                if(response.data[0].response == 200){
                    window.location = window.location.origin + "/mvc/public/home";
                    if(document.cookie.indexOf("user_id") < 0){
                        document.cookie = "user_id="+response.data[0].user_id+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                    }

                    if(document.cookie.indexOf("username") < 0){
                        document.cookie = "username="+response.data[0].username+"; expires="+(Date.now()+(86400 * 30))+"; path=/";
                    }
                }else{
                    alert("incorrect password or username");
                }
            });    
        }
        $scope.create = function(){
            //create new database controller
            window.location = window.location.origin + "/mvc/public/account/create";
            
        }
    });

                
</script>
