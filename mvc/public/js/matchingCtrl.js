var app = angular.module('myApp', []);
        app.controller('matchingCtrl', function($scope, $http) {
        $scope.numClicked = 0;
        $scope.firstCard = null;
        $scope.secondCard = null;
        $scope.correct = "N";
        $scope.brandNames = [];
        $scope.allDrugs = [];
        $scope.finalList = [];
        $scope.numCorrect = 0;
        $scope.right = 0;
        $scope.finishedGame = false;
        $scope.score = 0;
        

        $scope.selected =[]
        $scope.clear = false;
        
        $scope.select =[];
        
        document.getElementById("tryagain").style.visibility="hidden";

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
   			       $scope.right = 8;
				}
				else {
					$scope.right = $scope.names.length;
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
					numOfCards = shuffledObjects.length;
      		

        $('button.toggler').on("click",function(){  
  			//$('button').not(this).removeClass();
 			 $(this).toggleClass('active');
  
  });
  
              $scope.clicked = function(front){
              $scope.clear = false;

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
                	    document.getElementById("tryagain").style.visibility="visible";

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
                	 	    $scope.numCorrect +=2;
                	 	    $scope.right++;
                	 	    $scope.firstCard.correct = 'Y';
                	 	    $scope.secondCard.correct = 'Y';
                	 	    $scope.firstCard.active = 'Y';
                	 	    $scope.secondCard.active = 'Y';
                	 	    console.log($scope.numCorrect + " num right" );
                	 	   console.log($scope.names.length + " num length" );
                	 	   $scope.score +=2;
                	 	   $scope.$apply(function () {
                			$scope.score = $scope.score +2; 
                    		});
                	 	   

                	 	   if ($scope.numCorrect == $scope.names.length){
                	 	   		document.getElementById("tryagain").style.width = "30vh";
                	 	   		document.getElementById("tryagain").onclick = function() { window.location.reload() };
								document.getElementById("tryagain").value = "Play New Round";
								document.getElementById("donedone").innerHTML = "Game completed! Well done!";

                	 	   }
                	 	    

                	 	}
                	 	else {
                	 	  $scope.correct = "N";


                	 	}
                	}
                	
                 console.log("numClicked after " + $scope.numClicked);
                 console.log("correct " + $scope.correct);


            }
            

			 $scope.clearBoard = function(){
			 	$scope.clear = true;
			 }

            });

	$scope.home = function(){
            window.location = window.location.origin + "/mvc/public/home/";
        }

        });
        		
    