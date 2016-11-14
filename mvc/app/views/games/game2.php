<link rel="stylesheet" type="text/css" href="/mvc/public/css/game2stylesheet.css">

<meta name='viewport' content="width=device-width, initial-scale=1" />

<script src = '/mvc/public/js/pillCtrl.js'></script>

<script>
    function gotoGamelist(){
        window.location = window.location.origin + "/mvc/public/games/menu/" + <?=$data['lid']?>;
    }
</script>
	

<body ng-app="myApp" ng-controller="pillCtrl" id="main_app_module">	
	
	<div id=app_header>
	
	   <a onclick="gotoGamelist()" ><button class = 'back'>Back</button></a>
     
       <a ng-click='home()'><button>M</button></a>

       <div class="capsule-info"><img src="/mvc/public/images/pill_icon.png"> {{capsules[0].capsules}}</div>
		
	</div>	

	<div class = 'app_content'>
		<!--dummy object for checking if in challenge mode-->
		<p id="challengeFlag" style="display:none"><?=$data['challengeFlag']?></p>
		<!---->
		<div id="challengeInfoBar" ng-show="!checkIfBeingChallenged()">

			<p id="user2Text" class="col-md-6 col-sm-6 col-xs-6 challengeInfoText">Challenging: <?=$data['user2']?></p>
			<p id="betQuantityText" class="col-md-6 col-sm-6 col-xs-6 challengeInfoText">Bet Quantity: <?=$data['bet']?></p>
		</div>
		<div id="challengeInfoBar" ng-show="checkIfBeingChallenged()">

			<p id="user2Text" class="col-md-6 col-sm-6 col-xs-6 challengeInfoText">Challenged By: <?=$data['user2']?></p>
			<p id="betQuantityText" class="col-md-6 col-sm-6 col-xs-6 challengeInfoText">Bet Quantity: <?=$data['bet']?></p>
		</div>
       	<div id=app_body>
	        <div ng-if="firstLoad">
				{{getlid(<?=$data['lid']?>)}}
			</div>
			
			 
		   	<div class = 'question'>
				<p2 id="p1">{{question()}}</p2>
				<div id='points'>SCORE: {{score}}</div>
			   	<p2 id = "cid"></p2>
		   	</div>
			   
			<form class = 'answer' id = 'answer_input' name = "jojo">
				<input type="text" id="f1" name="Answer" placeholder="Answer:" ><br>
			</form>

			
			<p id="wrong"></p>

		   <div class ='pill_wrap'>
				<div class="pill" id="pill"><img id ='thePill' src="/mvc/public/images/pill.png"></div>
		   </div>
		   
		    <div id="result"></div>
		   <div id = 'finished'></div>

	 	</div> <!-- /app_body -->
		
		<div class = 'btn_footer'>
			<div class='btn_wrap'>
				<div class='submit_btn'><button class = "button button5" onclick="checkAnswer();" >Submit</button></div>

				<div class='next_btn'><button id="nextBtn" class = "button button5" onclick="nextCard();">Next</button></div>
			</div>
			
			<button id ='new_round' onClick="window.location.reload()">PLAY NEW ROUND</button>

		</div>
	</div>

</body>


<!--</html>-->
