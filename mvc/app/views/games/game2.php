<link rel="stylesheet" type="text/css" href="/mvc/public/css/game2stylesheet.css">

<body>

 <script src = '/mvc/public/js/pill.js'></script>
	
	<script>
	  var app = angular.module('myApp', []);
        app.controller('customersCtrl', function($scope, $http) {
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


        //dcedits
        $scope.firstLoad = true;
        $scope.getlid = function(lid){
        console.log("HEREEEEEEEEEEEEEE    4")
          var config = {
          headers : {
              'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
            }
          };   
          var data = $.param({
            lid: lid
          }); 
          
          var listurl = "/db/get_specific_list.php"; 
          	  console.log("HEREEEEEEEEEEEEEE")
          $http.post(listurl, data, config)
          .then(function (response) {
          	  console.log("HEREEEEEEEEEEEEEE")
              console.log(response.data.drugnames);
              $scope.select = response.data.drugnames.split(",");
              console.log("SELCT " + $scope.select[0]);
              console.log("select list " + $scope.select.length);
              //$scope.brandNames = JSON.parse("[" + response.data.drugnames + "]");
              //$scope.brandNames.split();
              //console.log("BRAND NAMES " + $scope.brandNames);
              
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

				document.getElementById("cid").innerHTML = cuIn + "/" + $scope.finalList.length;


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
			document.getElementById("plus2").innerHTML="";

			//document.getElementById("plus2").remove();
			//document.getElementById("finished").src = "/mvc/public/images/completed.png";


			if (cuIn == $scope.finalList.length){
				window.move();
				document.getElementById("result").remove();
				document.getElementById("wrong").remove();
			 	document.getElementById("finished").src = "/mvc/public/images/completed.png";
			}
			else{
			cuIn++;
			document.getElementById("cid").innerHTML = cuIn + "/" + $scope.finalList.length;

			card = it.next().value;
			console.log(card.Generic + "card");
			 document.getElementById('f1').value = "";
			//document.getElementById("result").src = "";
			 document.getElementById("wrong").innerHTML = "";


			 if ($scope.result == "RIGHT") {
			 	    console.log("result " + $scope.result);
 					window.move();
 					document.getElementById("result").src = "/mvc/public/images/rightanswer.jpg";
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
			document.getElementById("result").src = "/mvc/public/images/white-save-256.jpg";
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
 					document.getElementById("plus2").innerHTML="+2!";
 					console.log("RIGHT");
 					$scope.result = "RIGHT";
 					
 					if (cuIn == $scope.finalList.length){
						window.move();
			 			document.getElementById("finished").src = "/mvc/public/images/completed.png";
				 
					}
	
	 				else{	
 						window.move();	
						document.getElementById("result").src = "/mvc/public/images/correct.png";
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
 				 	document.getElementById("plus2").innerHTML="+2!";
 					console.log("RIGHT");
 					$scope.result = "RIGHT";
 					 window.move();
 				document.getElementById("result").src = "/mvc/public/images/correct.png";
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
	 	

 });
   });
	</script>
	
<!----------HTML STARTS----------->	
<div class="container-fullwidth">
	<div id=app_header>
	
	   <a onclick="gotoGamelist()" ><button class = 'back'>&#x25c1;</button></a>
     
       <a onclick="gohome()" class="btn pull-left"><button>M</button></a>

       	<input id ='new_round' type="button" class="btn pull-right" value="Play New Round!" onClick="window.location.reload()">
	</div>		
		
</div>

	<div class="container-fullwidth"> 

		<div ng-app="myApp" ng-controller="customersCtrl">

           <div id=app_body>

            <div ng-if="firstLoad">
				{{getlid(<?=$data['lid']?>)}}
			   </div>

			<p2 id="p1">{{question()}}</p2>
			   
			<p2 id = "cid"></p2>
			   
			<p2 id = "plus2"></p2>

			<form name = "jojo">
				<input type="text" id="f1" name="Answer" placeholder="Answer:" ><br>
			</form>

		
			<p id="wrong"></p>

		
		    <img id="finished" src="" >
	

			<img id="result" src="">
			
			

			<!--<img id="result" src="" style="margin-top: 25px; margin-left: 30%">-->
			
		    

         		<div class="test" id="test"><img src="/mvc/public/images/red_half.png" alt="Smiley face" width="415" ></div>


				<div class="test2" id="test2"><img src="/mvc/public/images/white_half.png" alt="Smiley face" width="385" ></div>



<!--<div class="row">

			<div class="col-xs-6 offset-md-3" style="top: 68.5%;"><button class = "button button5" onclick="checkAnswer();">Submit</button></div>
			<div class="col-xs-6 offset-md-3" ><button class = "button button5" onclick="nextCard();">Skip</button></div>


</div> -->
			<div class='submit_btn'><button class = "button button5" onclick="checkAnswer();" >Submit</button></div>
			   
			<div class='next_btn'><button id="nextBtn" class = "button button5" onclick="nextCard();">Next</button></div>

   				 </div> <!-- /container -->
   				 
			</div>
 		</div>

<!--</script> -->
</body>


<!--</html>-->
