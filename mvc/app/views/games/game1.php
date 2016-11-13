<link rel="stylesheet" type="text/css" href="/mvc/public/css/style.css">

<meta name='viewport' content="width=device-width, initial-scale=1" />

    <script src="/mvc/public/js/matchingCtrl.js"></script>
   
<body ng-app="myApp" ng-controller="matchingCtrl" >
	
	<script>		
		numOfCards = 0; 
		
		       function isGameFinished(){
        	if($scope.right >= $scope.names.length){
                	 $scope.finishedGame = true;
                	 alert("done");
                	 console.log("done");
            }
        }
        
            function tryAgain(){
            	//alert("test");
            	document.getElementById("tryagain").style.visibility="hidden";
            	//document.getElementById("nextButton").click();
				var x = document.getElementsByClassName("BtnBlue");
				x[0].click();
            }
		
			function gotoGamelist(){
		       window.location = window.location.origin + "/mvc/public/games/menu/" + <?=$data['lid']?>;
		   }
	</script>
	
<!--HTML STUFF HERE-->
     	<div id=app_header>
	   		<a onclick="gotoGamelist()"><button class = 'back'>&#x25c1;</button></a>
     
       		<a ng-click = 'home()'><button class = 'home'>M</button></a>
		
		</div>
    <div id=app_content>
         	<div id=app_body>
				
				<div ng-if="firstLoad">{{getlid(<?=$data['lid']?>)}}</div>	
				
				<img id="finished" src="" style="margin-top: 25px; margin-left: 2%">
				<div ng-if="numClicked < 2" >
					<div ng-repeat="product in names" ng-if="$index % 4 == 0" class="row">
						<div class="col-xs-3 drugGridCell"><button class="btnBlue"  ng-click="clicked(names[$index].front);" ng-hide = "names[$index].correct == 'Y' "
							ng-style="{'background-color' : (names[$index].clicked == 'Y') && (numClicked <=2) ? '#0099ff' : '#6C7A89'}"  >{{names[$index].front}}</button></div>
						<div class="col-xs-3 drugGridCell" ng-if="names.length > ($index + 1)"><button class="btnBlue"  ng-click="clicked(names[$index+1].front);" ng-hide = "names[$index+1].correct == 'Y' "
							ng-style="{'background-color' : (names[$index+1].clicked == 'Y') && (numClicked <=2)  ? '#0099ff' : '#6C7A89'}">{{names[$index +1].front }}</button></div>
						<div class="col-xs-3 drugGridCell" ng-if="names.length > ($index + 2)"><button class="btnBlue"  ng-click="clicked(names[$index+2].front);" ng-hide = "names[$index+2].correct == 'Y' "
							ng-style="{'background-color' : (names[$index+2].clicked == 'Y') && (numClicked <=2)? '#0099ff' : '#6C7A89'}"  >{{names[$index+2].front}}</button></div>
						<div class="col-xs-3 drugGridCell " ng-if="names.length > ($index + 3)"><button class="btnBlue"  ng-click="clicked(names[$index+3].front);" ng-hide = "names[$index+3].correct == 'Y' "
							ng-style="{'background-color' : (names[$index+3].clicked == 'Y') && (numClicked <=2) ? '#0099ff' : '#6C7A89'}"  >{{names[$index+3].front}}</button></div>
					</div>
				</div>
				<div ng-if="numClicked==2 && correct == 'Y' ">
				  <div ng-repeat="product in names" ng-if="$index % 4 == 0" class="row">
					<div class="col-xs-3 drugGridCell"><button class="btnBlue"  ng-click="clicked(names[$index].front);" ng-hide = "names[$index].active == 'W' "
						ng-style="{'background-color' : (names[$index].clicked == 'Y') && (numClicked <=2) ? '#2ECC71' : '#6C7A89'}"  >{{names[$index].front}}</button></div>
					<div class="col-xs-3 drugGridCell" ng-if="names.length > ($index + 1)"><button class="btnBlue"  ng-click="clicked(names[$index+1].front);" ng-hide = "names[$index+1].active == 'W' "
						ng-style="{'background-color' : (names[$index+1].clicked == 'Y') && (numClicked <=2)  ? '#2ECC71' : '#6C7A89'}">{{names[$index +1].front }}</button></div>
					<div class="col-xs-3 drugGridCell" ng-if="names.length > ($index + 2)"><button class="btnBlue"  ng-click="clicked(names[$index+2].front);" ng-hide = "names[$index+2].active == 'W' "
						ng-style="{'background-color' : (names[$index+2].clicked == 'Y') && (numClicked <=2)? '#2ECC71' : '#6C7A89'}"  >{{names[$index+2].front}}</button></div>
					<div class="col-xs-3 drugGridCell" ng-if="names.length > ($index + 3)"><button class="btnBlue"  ng-click="clicked(names[$index+3].front);" ng-hide = "names[$index+3].active == 'W' "
						ng-style="{'background-color' : (names[$index+3].clicked == 'Y') && (numClicked <=2) ? '#2ECC71' : '#6C7A89'}"  >{{names[$index+3].front}}</button></div>
				  </div>
				</div>
				<div ng-if="numClicked==2 && correct == 'N' ">
				  <div ng-repeat="product in names" ng-if="$index % 4 == 0" class="row">
					<div class="col-xs-3 drugGridCell"><button class="btnBlue"  ng-click="clicked(names[$index].front);" ng-hide = "names[$index].active == 'W' "
						ng-style="{'background-color' : (names[$index].clicked == 'Y') && (numClicked <=2) ? '#ff3300' : '#6C7A89'}"  >{{names[$index].front}}</button></div>
					<div class="col-xs-3 drugGridCell" ng-if="names.length > ($index + 1)"><button class="btnBlue"  ng-click="clicked(names[$index+1].front);" ng-hide = "names[$index+1].active == 'W' "
						ng-style="{'background-color' : (names[$index+1].clicked == 'Y') && (numClicked <=2)  ? '#ff3300' : '#6C7A89'}">{{names[$index +1].front }}</button></div>
					<div class="col-xs-3 drugGridCell" ng-if="names.length > ($index + 2)"><button class="btnBlue"  ng-click="clicked(names[$index+2].front);" ng-hide = "names[$index+2].active == 'W' "
						ng-style="{'background-color' : (names[$index+2].clicked == 'Y') && (numClicked <=2)? '#ff3300' : '#6C7A89'}"  >{{names[$index+2].front}}</button></div>
					<div class="col-xs-3 drugGridCell" ng-if="names.length > ($index + 3)"><button class="btnBlue"  ng-click="clicked(names[$index+3].front);" ng-hide = "names[$index+3].active == 'W' "
						ng-style="{'background-color' : (names[$index+3].clicked == 'Y') && (numClicked <=2) ? '#ff3300' : '#6C7A89'}"  >{{names[$index+3].front}}</button></div>
				  </div>
				</div>
   				 
   				 
   		    </div> <!-- /app_body -->
	</div>
	
			<p id="donedone"></p>
 
	<div id = "foot" class = 'footer'>
		
		<input onClick="tryAgain()" id = "tryagain" type= "button" value="Next">
		
		<div ng-if="numClicked==2 && correct == 'Y' ">{{isGameFinished()}}</div>
		
		<button id ='new_round' onClick="window.location.reload()">PLAY NEW ROUND</button>
		
	</div>
	
</body>
<!--</html>-->