<body id="database_module">
    <script>
        var app = angular.module('myApp', ['ngAnimate']);
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

            $scope.home = function(){
                //create new database controller
                window.location = window.location.origin + "/mvc/public/home/";
            }
        });
    </script>

    <div ng-app="myApp" ng-controller="customersCtrl">

        <div id="app_header">
            <button class=back-btn ng-click="home()">Back</button>
            <h1>Database</h1>
            <button ng-model="showSearch" ng-click="showSearch=!showSearch" class=search-btn><img src="/mvc/public/images/searchicon_white.png"></button>
        </div>
        <div id="content_wrapper">
            <input ng-show="showSearch" class="search-bar" type=text placeholder="Search" ng-model=searchText>

            <div class="drug-block" ng-model="collapsed" ng-click="collapsed=!collapsed" ng-repeat="x in names | filter:searchText">
                <div class=drug-content>
                    <div class="visible-info">
                        {{x.Generic}}
                        <div class="hint-info"><button>Hint</button></div>
                    </div>
                    <div class="expand-info" ng-show="collapsed">
                        <div class="drug-info-wrap"><label>Brand:</label> {{x.Brand}}</div>
                        <div class="drug-info-wrap"><label>Class:</label> {{x.Class}}</div>
                        <div class="drug-info-wrap"><label>Indication:</label> {{x.Indication}}</div>
                        <div class="drug-info-wrap"><label>Hint Likes:</label> {{x.HintLikes}}</div>
                        <div class="drug-info-wrap"><label>Hint Dislikes:</label> {{x.HintDislikes}}</div>
                    </div>
                </div>
            </div>
        </div>
    <!--
    <h1>Database</h1>
    <div ng-app="myApp" ng-controller="customersCtrl">
        <button ng-click="home()">Back To Home</button>
    
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

    </div>-->
     </div>

</body>