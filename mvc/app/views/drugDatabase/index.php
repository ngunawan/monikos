<body id="database_module">
    <script>
        var app = angular.module('myApp', ['ngAnimate']);

        app.directive('modalDialog', function() {
            return {
                restrict: 'E',
                scope: {
                    show: '='
                },
                replace: true, // Replace with the template below
                transclude: true, // we want to insert custom content inside the directive
                link: function(scope, element, attrs) {
                    scope.dialogStyle = {};
                    if (attrs.width)
                        scope.dialogStyle.width = attrs.width;
                    if (attrs.height)
                        scope.dialogStyle.height = attrs.height;
                    scope.hideModal = function() {
                        scope.show = false;
                    };
                },
                template: "<div class='ng-modal' ng-show='show'><div class='ng-modal-overlay' ng-click='hideModal()'></div><div class='ng-modal-dialog' ng-style='dialogStyle'><div class='ng-modal-close' ng-click='hideModal()'>X</div><div class='ng-modal-dialog-content' ng-transclude></div></div></div>"
            };
        });

        app.controller('customersCtrl', function($scope, $http) {
            $scope.modalShown = false;
            $scope.toggleModal = function() {
                $scope.modalShown = !$scope.modalShown;
            };


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

            $scope.showInfo = function() {
                //show drug content in database
                $
            }


        });


    </script>

    <div ng-app="myApp" ng-controller="customersCtrl">
        <audio id="myAudio">
            <source src="audio/Abilify.wav" type="audio/wav">
        </audio>    



        <div id="app_header">
            <button class=back-btn ng-click="home()">Back</button>
            <h1>Database</h1>
            <button ng-model="showSearch" ng-click="showSearch=!showSearch" class=search-btn><img src="images/searchicon_white.png"></button>
        </div>
        <div id="content_wrapper">
            <input ng-show="showSearch" class="search-bar" type=text placeholder="Search" ng-model=searchText[queryBy]>
            <select ng-model="queryBy">
                <option value="$"></option>
                <option value="Generic">Generic</option>
                <option value="Brand">Brand</option>
            </select> 

            <div class="drug-block" ng-model="collapsed" ng-click="collapsed=!collapsed" ng-repeat="x in names | filter:searchText">
                <div class=drug-content>
                    <div class="visible-info">
                        {{x.Generic}}
                        <div class=speaker-icon-wrapper><button onclick="playAudio()" href=#><img src="images/speaker.svg"></button></div>
                        <div class="hint-info"><button ng-click='toggleModal()'>Hint</button></div>        
                        <modal-dialog show='modalShown' width='90vw'>
                            <!--                <div class=ng-modal-content-head>Moniko's Hint</div>-->
                            <div class=ng-modal-content-middle>My friend Zoe (Zocor) likes to play the SIM's (simvastatin)</div>
                            <div>Do you have a better hint? <a href=#>Earn 200 Capsules</a></div>
                            <div class=ng-modal-content-footer><button class=like-btn>Like</button><button class=dislike-btn>Dislike</button></div>
                        </modal-dialog>
                    </div>
                    <div class="expand-info" ng-show="collapsed">
                        <div class="drug-info-wrap"><label>Brand:</label> {{x.Brand}}<div class=speaker-icon-wrapper><button onclick="playAudio()" href=#><img src="images/speaker.svg"></button></div></div>
                        <div class="drug-info-wrap"><label>Class:</label> {{x.Class}}</div>
                        <div class="drug-info-wrap"><label>Indication:</label> {{x.Indication}}</div>
                        <div class="drug-info-wrap"><label>Side Effects:</label>{{ x['Side Effects'] }}</div>
                        <div class="drug-info-wrap"><label>Black Box Warning:</label>{{ x['Black Box Warning'] }}</div>

                        <div class="drug-info-wrap"><label>Hint Likes:</label> {{x.HintLikes}}</div>
                        <div class="drug-info-wrap"><label>Hint Dislikes:</label> {{x.HintDislikes}}</div>
                    </div>
                </div>
            </div>
        </div>

        <!--
<table id="searchTextResults">
<tr ng-repeat="x in names | filter:searchText">
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

    <script>
        var x = document.getElementById("myAudio");

        function playAudio() {
            x.play();
        }

        function pauseAudio() {
            x.pause();
        }
    </script>

</body>