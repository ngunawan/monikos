<body id="usr_mng_module">
    <script>
        var app = angular.module('myApp', []);
        app.controller('accountCtrl', function($scope, $http) {

            var url2 = "/db/get_schools.php";
            $http.get(url2).then(function (response) {
                console.log('ww');
                console.log(response);
                $scope.schoolnames = response.data.records;
                console.log($scope.schoolnames);
            });

            $scope.createAccount = function(){
                var un = document.getElementById('un').value;
                var email = document.getElementById('email').value;
                var pw = document.getElementById('pw').value;
                var schoolid = document.getElementById('school').value;
                var tempname = "a" + schoolid;
                var schoolname = document.getElementById(tempname).innerHTML;


                var url = "/db/create_account.php";

                var data = $.param({
                    username: un,
                    password: pw,
                    email: email,
                    schoolid: schoolid,
                    schoolname: schoolname
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
            <input id="pw" type="password" name="password" placeholder="password">
            <select id="school" ng-repeat="x in schoolnames">
                <option selected disabled>select a school</option>
                <option id="a{{x.schoolid}}" value="{{x.schoolid}}">{{x.schoolname}}</option>
            </select>
            <button ng-click="createAccount()">Create</button>
            <!--
<p>username: {{response.data[0].username}}</p>
<p>email: {{response.data[0].email}}</p>
-->
            <a class="sub-link" ng-click="login()">Back to Login</a>

        </div>
    </div>
</body>