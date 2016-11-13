var app = angular.module('myApp', []);
        app.controller('pillCtrl', function($scope, $http) {
        $scope.challengingFlag = false;
        $scope.test = "Y";
        $scope.index = 0;
        $scope.word = null;
        $scope.myVar= null;
        $scope.finalList = [];
        $scope.type = "Brand";
        var nextIndex = 0;
        $scope.result = "WRONG";
        console.log(" HEREEE 3")
        $scope.currentIndex = 1;
		var cuIn = 1;
		$scope.select = [];
			
		$scope.score = 0;


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
      
      var listurl = "/db/get_specific_list.php"; 
      $http.post(listurl, data, config)
      .then(function (response) {
          console.log(response.data.drugnames);
          $scope.select = response.data.drugnames.split(",");
          console.log("SELCT " + $scope.select[0]);
          console.log("select list " + $scope.select.length);
          $scope.getallTheDrugs();
      });
      $scope.firstLoad = false;
      
    }
    //end dcedits
        
        
        window.move = function() {
            if($('#test').hasClass('moved')) {
                $('#test').removeClass('moved');
                $('#test2').removeClass('moved2');
            }else{
                $('#test').addClass('moved');
                 $('#test2').addClass('moved2');
            }
        }

        window.move1 = function() {
            if($('#test2').hasClass('moved2')) {
                $('#test2').removeClass('moved2');
            }else{
                $('#test2').addClass('moved2');
            }
        }
      $scope.getallTheDrugs = function(){

        
        var url = "/db/get_drugs.php";
        $http.get(url)
        .then(function (response) {
//                 console.log(response);
//                 //console.log(response);
//                 $scope.names = response.data.records.slice(1,30);
//                // console.log("select list " + $scope.select.length);
//                 console.log("names " + $scope.names.length);

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
                  
            console.log("final list generic " + $scope.finalList[0].Generic);
            console.log("final list brand " + $scope.finalList[0].Brand);

  			    document.getElementById("cid").innerHTML = cuIn + "/" + $scope.finalList.length + " Drugs";


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


  				  var shuffledObjects = $scope.names.slice();
  				
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
        
					
		function makeIterator(array){
  		  
    
   		 return {
       		next: function(){
           		return nextIndex < array.length ?
               		{value: array[nextIndex++], done: false} :
               		{done: true};
       			}
    		}
		}
		
		var it = makeIterator($scope.names);
		var card = it.next().value;


  

		window.nextCard = function(){
// 			$scope.currentIndex++;
// 			console.log("current index " + $scope.currentIndex);
			console.log("cuIn " + cuIn);
			console.log(" names length " + $scope.names.length);
			console.log(" final list length " + $scope.finalList.length);
			//document.getElementById("plus2").innerHTML="";
			
			document.getElementById("thePill").src = '/mvc/public/images/pill.png';
			
			if (cuIn == $scope.finalList.length){
        //done with round here
				window.move();
				document.getElementById("result").remove();
				document.getElementById("wrong").remove();	
        if($scope.challengingFlag){
          $scope.handleChallengeModeCompletion();
          document.getElementById("finished").innerHTML = 'COMPLETED ROUND CHALLENGE SENT';
        }else{
          document.getElementById("finished").innerHTML = 'COMPLETED ROUND';
        }

			}
			
			else{
				
			cuIn++;
			document.getElementById("cid").innerHTML = cuIn + "/" + $scope.finalList.length + " Drugs";

			card = it.next().value;
			console.log(card.Generic + "card");
			 document.getElementById('f1').value = "";
			//document.getElementById("result").src = "";
			 document.getElementById("wrong").innerHTML = "";
				
			document.getElementById("result").innerHTML = "";


			 if ($scope.result == "RIGHT") {
			 	    console.log("result " + $scope.result);
 					window.move();
 					
 					$scope.result = "WRONG";
 				}
			
			 if ($scope.type == "Brand" ) {
			
 			
 				console.log($scope.index + " index beforeeee"); 
 				console.log($scope.names[$scope.index].Brand + " drug"); 
 				console.log(card.Brand + " card drug"); 
				document.getElementById("p1").innerHTML = card.Brand;
				//document.getElementById("p2").innerHTML = card.Generic;


 				//return card.Brand;
 			}
 			
 			if ($scope.type == "Generic" ) {
 					document.getElementById("p1").innerHTML = card.Generic;
 					document.getElementById("p2").innerHTML = card.Brand;
 				return card.Generic;
 			}
 			
 			//window.move();
 			document.getElementById('f1').value = "";
			document.getElementById("wrong").innerHTML = "";
			
			}

		}
		
		window.checkAnswer = function() {
			var val= document.jojo.Answer.value;
			console.log(val + " value of text box");
			console.log(card.Generic + " generic");
			console.log(val + " brand");
			document.getElementById("wrong").innerHTML = "";
		
			card.Generic = card.Generic.replace(/-/g, ' ');
			card.Brand = card.Brand.replace(/-/g, ' ');


			
			 if ($scope.type == "Brand" ) {
 				if (card.Generic.toLowerCase() === val.toLowerCase()) {
 					//document.getElementById("plus2").innerHTML="+2!";
					
 					console.log("RIGHT");
 					$scope.result = "RIGHT";
		
				 	$scope.$apply(function () {
					$scope.score = $scope.score +2; 
					});	
					document.getElementById("thePill").src = '/mvc/public/images/pill_done.gif';
					
					console.log("Current score: " + $scope.score);
 					
 					if (cuIn == $scope.finalList.length){
						window.move();
            if($scope.challengingFlag){
              $scope.handleChallengeModeCompletion();
              document.getElementById("finished").innerHTML = 'COMPLETED ROUND CHALLENGE SENT';
            }else{
			 			  document.getElementById("finished").innerHTML = 'COMPLETED ROUND';
					  }
          }
	
	 				else{	
 						window.move();	
						document.getElementById("result").innerHTML = "CORRECT!";
						document.getElementById("thePill").src = '/mvc/public/images/pill_done.gif';
						
 						document.getElementById("nextBtn").disabled = false;
					}
 				}
 				else {
 					console.log ("WRONG");
 					$scope.result = "WRONG";
				document.getElementById("wrong").innerHTML = "Incorrect, please type: " + card.Generic;
				document.getElementById("nextBtn").disabled = true;
				$scope.names.push(card.value);

 				}
 			}
 			
 			if ($scope.type ==  "Generic" ) {
 				if (card.Brand.toLowerCase() === val.toLowerCase()) {
 				 	//document.getElementById("plus2").innerHTML="+2!";
 					
					console.log("RIGHT");
 					$scope.result = "RIGHT";
 					 window.move();
											
				 	$scope.$apply(function () {
					$scope.score = $scope.score +2; 
					});	
					
					document.getElementById("thePill").src = '/mvc/public/images/pill_done.gif';
					
					console.log("Current score: " + $scope.score);
					
 				document.getElementById("result").innerHTML = "CORRECT!";
				document.getElementById("nextBtn").disabled = false;


 				}
 				else {
 					console.log("WRONG");
 					$scope.result = "WRONG";
				document.getElementById("wrong").innerHTML = "Incorrect, please type: " + card.Generic;
				document.getElementById("nextBtn").disabled = true;
				$scope.names.push(card.value);
 				}
 			}
		
		}
          
        var ci = 1;
//         $scope.currentIndex = function(){
//         	if (ci == 1) {
//         		return "1/" + $scope.names.length;
//         		ci++;
//         		console.log("CIIIIIIIIIIIIIII " + ci);
//         	}
//         	else {
//         	  ci++;
//         	  return "hi";
//         	}
//         }  
//         
        $scope.question = function(){
 		if ($scope.type == "Brand" ) {
 			
 			console.log($scope.index + " index beforeeee"); 
 			console.log($scope.names[$scope.index].Brand + " drug"); 
 			console.log(card.Brand + " card drug"); 

 			return card.Brand;
 			}
 			
 		if ($scope.type == "Generic" ) {
 			return card.Generic;
 			}
	 	}
	 	
  	$scope.answer = function(){
   		if ($scope.type == "Brand" ) {
   			console.log($scope.index + " index beforeeee"); 
   			console.log($scope.names[$scope.index].Generic + " drug"); 
   			console.log(card.Generic + " card drug"); 
   			return card.Generic;
   		}
   			
   		if ($scope.type == "Generic" ) {
   			return card.Brand;
   		}
  	}

    
  	 
    $scope.home = function(){
      window.location = window.location.origin + "/mvc/public/home/";
    }	

 	});
  
  }//end to the giant get request

  $scope.checkIfInChallengeMode = function(){
    $scope.challengingFlag = true;
    if($('#challengeFlag').html() == 'challenge'){
      return true
    }
    return false;
  }

  $scope.handleChallengeModeCompletion = function(){
    var curUrl = window.location.href;
    var urlArr = curUrl.split('/');
    for(var i in urlArr){
      if(urlArr[i] == "challenge"){
        urlArr[i] = "beingchallenged";
      }
    }

    var senderUrl = urlArr.join("/");
    
    
  }



			
});