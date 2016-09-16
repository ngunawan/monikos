
    <body ng-app="loginApp" ng-controller="loginCtrl"  id="usr_mng_module">
        <div class="wrapper">
            <h1>Login</h1>
            <input id="un" type="text" placeholder="username">
            <input id="pw" type="password" placeholder="password">
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
                //change to check for set cookie
                if(response.data[0].response == 200){
                    window.location = window.location.origin + "/mvc/public/home";
                }
            });    
        }
        $scope.create = function(){
            //create new database controller
            window.location = window.location.origin + "/mvc/public/account/create";
            
        }
    });

                
</script>
