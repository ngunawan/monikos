<link rel="stylesheet" type="text/css" href="/mvc/public/css/style.css">

<body>


    <script>

        var app = angular.module('myApp', []);
        app.controller('customersCtrl', function($scope, $http) {
        $scope.numClicked = 0;
        $scope.firstCard = null;
        $scope.secondCard = null;
        $scope.correct = "N";
        $scope.brandNames = [];
        $scope.allDrugs = [];
        $scope.finalList = [];
        
        $scope.selected =[]
        



        //dcedits
        $scope.firstLoad = true;
        $scope.getlid = function(lid){
          var config = {
          headers : {
              'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
          };   
          var data = $.param({
            lid: lid
          }); 
          
          //url = window.location.origin + "/fb_login.php";
          //var listurl = "http://monikos.xpyapvzutk.us-east-1.elasticbeanstalk.com/get_specific_list.php";
          var listurl = "/db/get_specific_list.php";

          $http.post(listurl, data, config)
          .then(function (response) {
          	  console.log("HEREEEEEEEEEEEEEE")
              console.log(response.data.drugnames);
              $scope.select = response.data.drugnames.split(",");
              console.log("SELCT " + $scope.select[0]);
              //$scope.brandNames = JSON.parse("[" + response.data.drugnames + "]");
              //$scope.brandNames.split();
              //console.log("BRAND NAMES " + $scope.brandNames);

              
          });
          $scope.firstLoad = false;
          
        }
        //end dcedits





        
            var url = "/db/get_drugs.php";
            $http.get(url)
            .then(function (response) {
                console.log(response);
                //console.log(response);
                console.log("IS SELECT STILL THE SAME " + $scope.select);
                $scope.names = response.data.records.slice(1,30);
                $scope.allDrugs = response.data.records;
                console.log($scope.names);
                console.log($scope.allDrugs);
                console.log($scope.allDrugs[0].Brand)
                
                if($scope.select[0][0].toUpperCase() == $scope.select[0][0]) {
  					var d;
                	for (d=0; d < $scope.select.length; d++){
                		console.log("before if statement " + $scope.select[d]);
                		for(var x = 0; x < $scope.allDrugs.length; x++) {
                			if ($scope.allDrugs[x].Brand == $scope.select[d]){
                				console.log("after if statement " + $scope.allDrugs[x].Generic);
                				var a = $scope.allDrugs[x];
                	 			$scope.finalList.push($scope.allDrugs[x]);
              					console.log("final list " + $scope.finalList.length);
                			}

                		}

                } 
				}
				else {
				for (d=0; d < $scope.select.length; d++){
                	console.log("before if statement " + $scope.select[d]);
                	for(var x = 0; x < $scope.allDrugs.length; x++) {
                	if ($scope.allDrugs[x].Generic == $scope.select[d]){
                	console.log("after if statement " + $scope.allDrugs[x].Generic);
                	var a = $scope.allDrugs[x];
                	 $scope.finalList.push($scope.allDrugs[x]);
              		 console.log("final list " + $scope.finalList.length);
                		}

                		}

                } 
				}
                

                
                console.log("final list " + $scope.finalList[0]);
                
                $scope.names = $scope.finalList;
                
                console.log("length of names " + $scope.names.length);

                

                //shuffles original list of just cards
                  var a, b, c;
    					for (c = $scope.names.length; c; c--) {
      					  a = Math.floor(Math.random() * c);
       					  b = $scope.names[c - 1];
       					  $scope.names[c - 1] = $scope.names[a];
        				  $scope.names[a] = b;
   					 }

				if ($scope.names.length > 8) {
   			       $scope.names = $scope.names.slice(1,9);
				}

                
            var objects = [];
        	for (var i = 0; i < $scope.names.length*2; i++){
        		if (i < $scope.names.length){
        		    objects[i] = {drug: $scope.names[i], front: $scope.names[i].Generic, clicked: 'N', correct: 'N', active: 'N'};
        		}
        		else if (i >= $scope.names.length){
        		    objects[i] = {drug: $scope.names[i - $scope.names.length], front: $scope.names[i - $scope.names.length].Brand, clicked:'N', correct: 'N', active: 'N'};
        		}
       		 }

       		 		console.log("length of names - " + $scope.names.length);
       		 		console.log("length of objects- " + objects.length);

  					console.log(objects);


					var shuffledObjects = objects.slice();
					
					    var j, x, i;
    					for (i = shuffledObjects.length; i; i--) {
      					  j = Math.floor(Math.random() * i);
       					  x = shuffledObjects[i - 1];
       					  shuffledObjects[i - 1] = shuffledObjects[j];
        				  shuffledObjects[j] = x;
   					 }
  					
  					console.log("length of shuffled objects----- " + shuffledObjects.length);
  					console.log(shuffledObjects);

					$scope.names = shuffledObjects;
      		

        $('button.toggler').on("click",function(){  
  			//$('button').not(this).removeClass();
 			 $(this).toggleClass('active');
  
  });
              $scope.gotolistManager = function(){
                window.location = window.location.origin + "/mvc/public/home/listMananger";
              }
              $scope.clicked = function(front){
                console.log("before " + front);
               // console.log("before " +drug.drug.Brand);
                console.log("numClicked before " + $scope.numClicked);


                for(var i = 0; i < shuffledObjects.length;i++){
                	if(front == shuffledObjects[i].front){
                	if (shuffledObjects[i].clicked == "Y"){
                		shuffledObjects[i].clicked = "N";
                		$scope.numClicked--;

                	} else{
                		shuffledObjects[i].clicked = "Y";
                		$scope.numClicked++;
                		console.log("afterrr " +shuffledObjects[i].clicked);
                		}
                	}
                
                }
                
                    if ($scope.numClicked > 2) {
                		$scope.numClicked = 0;	
                		
                		 for(var i = 0; i < shuffledObjects.length;i++){
                			shuffledObjects[i].clicked = "N";
                		}       		
                	}
                	
                	if ($scope.numClicked == 2){
                	    for(var i = 0; i < shuffledObjects.length;i++){
                	    	if (shuffledObjects[i].clicked == "Y" && shuffledObjects[i].front == front){
                	    		$scope.firstCard = shuffledObjects[i];
                	    		
                	    	} else if (shuffledObjects[i].clicked == "Y"){
                	    	    $scope.secondCard = shuffledObjects[i];
                	    	} else {
                	    		if (shuffledObjects[i].active == 'Y') {
                	    			shuffledObjects[i].active = 'W';
                	    		}
                	    	}
                	    }
                 		console.log("first card " + $scope.firstCard.front);
                	 	console.log("second card " + $scope.secondCard.front);
                	 	
                	 	if ($scope.firstCard.front == $scope.secondCard.drug.Brand || $scope.firstCard.front == $scope.secondCard.drug.Generic){
                	 	    $scope.correct = "Y";
                	 	    $scope.firstCard.correct = 'Y';
                	 	    $scope.secondCard.correct = 'Y';
                	 	    $scope.firstCard.active = 'Y';
                	 	    $scope.secondCard.active = 'Y';
                	 	}
                	 	else {
                	 	  $scope.correct = "N";

                	 	}
                	}
                	
                 console.log("numClicked after " + $scope.numClicked);
                 console.log("correct " + $scope.correct);


            }

            });
            

        });

    </script>


    <!-- Main jumbotron for a primary marketing message or call to action -->

<div class="container-fullwidth">
     	<div id=app_header>

		
		<a href = '' ng-click='gotolistManager()'><button class = 'back'>&#x25c1;</button></a>
        <a href ="" ng-click="home()"><button>M</button></a>
			

       	 <input type="button" class="btn pull-right" value="Play New Round!" style = "margin-right:12px" onClick="window.location.reload()">
		</div>
		
		
      </div>

       <div id=app_content>

           <div ng-app="myApp" ng-controller="customersCtrl">

         		<div id=app_body>
            <!--<button ng-click="getlid(<?=$data['lid']?>)">get list</button>-->
            <div ng-if="firstLoad">{{getlid(<?=$data['lid']?>)}}</div>
              <!--{{getlid();}}-->
            
  <!--  <div id=app_body>
     <div ng-if="numClicked < 2;">
        <div ng-repeat="(index, value) in names" class="row">
   			<div class="col-xs-6 col-sm-3" class="container-fluid"> <button class="btnBlue" ng-click="clicked(value.front);" ng-hide = "value.correct == 'Y'  "
   				ng-style="{'background-color' : (value.clicked == 'Y') && (numClicked <=2) ? '#0099ff' : '#550000'}">{{value.front}}</button> </div><br ng:show="(index+1)%4==0" />	
		 </div>
     </div> -->

<!--<div ng-if="numClicked < 2;">
        <div ng-repeat="(index, value) in names" class="row">
<div class="col-xs-3"  class="container-fluid"> <button class="btnBlue" ng-click="clicked(value.front);" ng-hide = "value.correct == 'Y'  "
   				ng-style="{'background-color' : (value.clicked == 'Y') && (numClicked <=2) ? '#0099ff' : '#550000'}">{{value.front}}</button> </div><br ng:show="(index+1)%4==0"/>	

	</div>
</div> -->


      <div ng-if="numClicked < 2;">
     <div ng-repeat="product in names" ng-if="$index % 4 == 0" class="row">
    <div class="col-xs-3"><button class="btnBlue"  ng-click="clicked(names[$index].front);" ng-hide = "names[$index].correct == 'Y' "
          ng-style="{'background-color' : (names[$index].clicked == 'Y') && (numClicked <=2) ? '#0099ff' : '#550000'}"  >{{names[$index].front}}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 1)"><button class="btnBlue"  ng-click="clicked(names[$index+1].front);" ng-hide = "names[$index+1].correct == 'Y' "
          ng-style="{'background-color' : (names[$index+1].clicked == 'Y') && (numClicked <=2)  ? '#0099ff' : '#550000'}">{{names[$index +1].front }}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 2)"><button class="btnBlue"  ng-click="clicked(names[$index+2].front);" ng-hide = "names[$index+2].correct == 'Y' "
          ng-style="{'background-color' : (names[$index+2].clicked == 'Y') && (numClicked <=2)? '#0099ff' : '#550000'}"  >{{names[$index+2].front}}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 3)"><button class="btnBlue"  ng-click="clicked(names[$index+3].front);" ng-hide = "names[$index+3].correct == 'Y' "
          ng-style="{'background-color' : (names[$index+3].clicked == 'Y') && (numClicked <=2) ? '#0099ff' : '#550000'}"  >{{names[$index+3].front}}</button></div>
  </div>
</div>



<div ng-if="numClicked==2 && correct == 'Y' ">
     <div ng-repeat="product in names" ng-if="$index % 4 == 0" class="row">
    <div class="col-xs-3"><button class="btnBlue"  ng-click="clicked(names[$index].front);" ng-hide = "names[$index].active == 'W' "
          ng-style="{'background-color' : (names[$index].clicked == 'Y') && (numClicked <=2) ? '#00FF00' : '#550000'}"  >{{names[$index].front}}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 1)"><button class="btnBlue"  ng-click="clicked(names[$index+1].front);" ng-hide = "names[$index+1].active == 'W' "
          ng-style="{'background-color' : (names[$index+1].clicked == 'Y') && (numClicked <=2)  ? '#00FF00' : '#550000'}">{{names[$index +1].front }}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 2)"><button class="btnBlue"  ng-click="clicked(names[$index+2].front);" ng-hide = "names[$index+2].active == 'W' "
          ng-style="{'background-color' : (names[$index+2].clicked == 'Y') && (numClicked <=2)? '#00FF00' : '#550000'}"  >{{names[$index+2].front}}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 3)"><button class="btnBlue"  ng-click="clicked(names[$index+3].front);" ng-hide = "names[$index+3].active == 'W' "
          ng-style="{'background-color' : (names[$index+3].clicked == 'Y') && (numClicked <=2) ? '#00FF00' : '#550000'}"  >{{names[$index+3].front}}</button></div>
  </div>
</div>

<div ng-if="numClicked==2 && correct == 'N' ">
     <div ng-repeat="product in names" ng-if="$index % 4 == 0" class="row">
    <div class="col-xs-3"><button class="btnBlue"  ng-click="clicked(names[$index].front);" ng-hide = "names[$index].active == 'W' "
          ng-style="{'background-color' : (names[$index].clicked == 'Y') && (numClicked <=2) ? '#ff3300' : '#550000'}"  >{{names[$index].front}}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 1)"><button class="btnBlue"  ng-click="clicked(names[$index+1].front);" ng-hide = "names[$index+1].active == 'W' "
          ng-style="{'background-color' : (names[$index+1].clicked == 'Y') && (numClicked <=2)  ? '#ff3300' : '#550000'}">{{names[$index +1].front }}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 2)"><button class="btnBlue"  ng-click="clicked(names[$index+2].front);" ng-hide = "names[$index+2].active == 'W' "
          ng-style="{'background-color' : (names[$index+2].clicked == 'Y') && (numClicked <=2)? '#ff3300' : '#550000'}"  >{{names[$index+2].front}}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 3)"><button class="btnBlue"  ng-click="clicked(names[$index+3].front);" ng-hide = "names[$index+3].active == 'W' "
          ng-style="{'background-color' : (names[$index+3].clicked == 'Y') && (numClicked <=2) ? '#ff3300' : '#550000'}"  >{{names[$index+3].front}}</button></div>
  </div>
</div>

<!--
<div ng-if="numClicked==2 && correct == 'Y' ">
     <div ng-repeat="product in names" ng-if="$index % 4 == 0" class="row">	
     	    <div class="col-xs-3"><button class="btnBlue"  ng-click="clicked(value.front);" ng-hide = "value.active == 'W' "
 		  		ng-style="{'background-color' : (value.clicked == 'Y') ? '#88ff4d' : '#550000'}"  >{{names[$index].front}}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 1)"><button class="btnBlue"  ng-click="clicked(value.front);" ng-hide = "value.active == 'W' "
 		  		ng-style="{'background-color' : (value.clicked == 'Y') ? '#88ff4d' : '#550000'}">{{names[$index +1].front }}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 2)"><button class="btnBlue"  ng-click="clicked(value.front);" ng-hide = "value.active == 'W' "
 		  		ng-style="{'background-color' : (value.clicked == 'Y') ? '#88ff4d' : '#550000'}"  >{{names[$index+2].front}}</button></div>
    <div class="col-xs-3" ng-if="names.length > ($index + 3)"><button class="btnBlue"  ng-click="clicked(value.front);" ng-hide = "value.active == 'W' "
 		  		ng-style="{'background-color' : (value.clicked == 'Y') ? '#88ff4d' : '#550000'}"  >{{names[$index+3].front}}</button></div>
     </div>
</div>
-->
 	<!--	<div ng-if="numClicked==2 && correct == 'Y' ">
 		<div ng-repeat="(index, value) in names" class="row">
 		  	<div class="col-xs-6 col-sm-3 class="container-fluid"> <button class="btnBlue"  ng-click="clicked(value.front);" ng-hide = "value.active == 'W' "
 		  		ng-style="{'background-color' : (value.clicked == 'Y') ? '#88ff4d' : '#550000'}"  >{{value.front}}</button></div><br ng:show="(index+1)%4==0" />	
 		 </div>
 		</div>


		<div ng-if="numClicked==2 && correct == 'N' ">
 		<div ng-repeat="(index, value) in names" class="row">
 		  	<div class="col-xs-6 col-sm-3" class="container-fluid"> <button class="btnBlue" ng-click="clicked(value.front);" ng-hide = "value.correct == 'Y' "
 		  		ng-style="{'background-color' : (value.clicked == 'Y') ? '#ff3300' : '#550000'}">{{value.front}}</button></div><br ng:show="(index+1)%4==0" />	
 		 </div>
 		</div>
-->


   				 </div> <!-- /container -->
			</div>
 		</div>

<!--<<<<<<< HEAD
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> 


=======
>>>>>>> a5c235513e4324ade795441496d289eb1746f8df -->
</body>

<!--</html>-->
