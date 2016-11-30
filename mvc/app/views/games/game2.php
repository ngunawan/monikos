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
     
       <a ng-click='home()'><img id="toplogo" src="/mvc/public/images/logo_without_words_version_1.png"></a>

        <div onclick="toggleMenuNav()" class=menu-info>
        	<span id="updated-capsules-indicator" style="display:none;float:left"></span>
        	<img src=/mvc/public/images/man-user.png>
        </div>
        <div id='menu-popup' class='menu-popup'>
            <div class=notif-info>
                <h2>Notifications</h2>
                <p>There are no notifications at this moment.</p>
            </div>
            <div class=user-info>
                <img src="/mvc/public/images/user_icon.png">
             <div class=user-info-sub>
                    <div class=username-info>{{capsules[0].username}}</div>
                    <div class=email-info>({{capsules[0].email}})</div>
                    <div class=capsule-info>{{capsules[0].capsules}} Capsules</div>
                </div>
            </div>
        </div>
		
	</div>	

	<div class = 'app_content'>
		<!--dummy object for checking if in challenge mode-->
		<p id="challengeFlag" style="display:none"><?=$data['challengeFlag']?></p>
		<!---->
		<div id="challengeInfoBar" ng-show="checkIfInChallengeMode() && !checkIfBeingChallenged()">
			<p class="col-md-4 col-sm-4 col-xs-4 challengeInfoText userText">Challenging: <?=$data['user2']?></p>
            <p class="col-md-4 col-sm-4 col-xs-4 challengeInfoText timerText"></p>
            <p class="col-md-4 col-sm-4 col-xs-4 challengeInfoText betQuantityText">Bet Quantity: <?=$data['bet']?></p>
			<p style="display:none" class="col-md-12 col-sm-12 col-xs-12 challengeInfoText outcomeMessage"></p>
		</div>
		<div id="challengeInfoBar" ng-show="checkIfBeingChallenged()">
			<p class="col-md-4 col-sm-4 col-xs-4 challengeInfoText userText">Challenged By: <?=$data['user1']?></p>
            <p class="col-md-4 col-sm-4 col-xs-4 challengeInfoText timerText"></p>
            <p class="col-md-4 col-sm-4 col-xs-4 challengeInfoText betQuantityText">Bet Quantity: <?=$data['bet']?></p>
			<p style="display:none" class="col-md-12 col-sm-12 col-xs-12 challengeInfoText outcomeMessage"></p>
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

		   <div id="challengeCompleteMessage" style="display:none">
		   		<img id="challengeCompleteLogo" src="/mvc/public/images/white_logo.png">

		   		<p class="challengeCompleteText" ng-show="checkIfInChallengeMode() && !checkIfBeingChallenged()">Your challenge has been sent to <?=$data['user2']?>. Once they answer it, you'll either lose or win <?=$data['bet']?> capsules. Click the button below to return to the game menu.</p>

		   		<p class="challengeCompleteText" ng-show="checkIfBeingChallenged()"></p>

		   		<div id='challenge_complete_btn'><button id="inner_challenge_complete_btn" class="button button5" onclick="gotoGamelist()" >Game Menu</button></div>

		   </div>

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
