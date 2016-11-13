<link rel="stylesheet" type="text/css" href="/mvc/public/css/game.css"/>

<meta name='viewport' content="width=device-width, initial-scale=1" />

<script type = 'text/javascript'>

    var challengeGame;
    var challengeUser;
    var challengeBet;
    var showingSelectGame = false;
    var showingSelectUser = false;
    var showingPlaceBet = false;

    var gameMenuApp = angular.module('gameMenuApp', ['ngAnimate']);
    gameMenuApp.filter("trustUrl", ['$sce', function ($sce) {
        return function (recordingUrl) {
            return $sce.trustAsResourceUrl(recordingUrl);
        };
    }]);

    gameMenuApp.controller('gameMenuCtrl', ['$scope','$sce', '$http', '$timeout', function($scope, $sce, $http, $timeout) {
        $scope.queryBy = '$';
        $scope.trustAsHtml = $sce.trustAsHtml;
    
        $scope.createChallenge = function(){    
            /*$http.get(url)
            .then(function (response) {
                console.log(response);
            });*/

            var url = "/db/create_challenge.php";
            var usr1 = getCurrentUser();
            var usr2 = challengeUser;
            var data = $.param({
                user1: usr1,
                user2: usr2,
                game: challengeGame,
                bet: challengeBet
            });
            var config = {
                headers : {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                }
            };

            $http.post(url, data, config)
                .then(function (response) {
                console.log(response);
                $scope.response = response;
            }); 


        }


        


    }]);

    function gotoGame1(challenge){
        //normal play, not challenge mode
        if(challenge == undefined){
            window.location = window.location.origin + "/mvc/public/games/game1/" + <?=$data['lid']?>;
        }else{
        //challenge mode
            angular.element(document.getElementById('main_app_module')).scope().createChallenge();
            window.location = window.location.origin + "/mvc/public/games/game1/" + <?=$data['lid']?> + "/" + challenge + "/" + challengeGame + "/" + challengeUser + "/" + challengeBet;
        }
    }
	
	function gotoGame2(challenge){
        //normal play, not challenge mode
        if(challenge == undefined){
            window.location = window.location.origin + "/mvc/public/games/game2/" + <?=$data['lid']?>;
        }else{
        //challenge mode
            angular.element(document.getElementById('main_app_module')).scope().createChallenge();
            window.location = window.location.origin + "/mvc/public/games/game2/" + <?=$data['lid']?> + "/" + challenge + "/" + challengeGame + "/" + challengeUser + "/" + challengeBet;;
        }
    }
	
	function gohome(){
        window.location = window.location.origin + "/mvc/public/home/";
    }
	
	function golistManager(){
        window.location = window.location.origin + "/mvc/public/home/listManager";
    }

    function listManager(){
        window.location = window.location.origin + "/mvc/public/home/listManager";
    }

    function getCurrentUser(){
        return getCookie('username');
    }
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length,c.length);
            }
        }
        return "";
    }

    function challenge(game){
        //alert(game);
        //$("#challenge-"+game).css({"background":"white","color":"#ff3333"});
        if(game == 'matching'){
            gotoGame1('challenge');
        }else if(game == 'pill'){
            gotoGame2('challenge');
        }
    }

    function selectChallengeGame(game){
        challengeGame = game;
    }

    function selectChallengeUser(){
        challengeUser = $('#findUser').val();
    }

    function challengeSubmit(){
        challengeBet = $('#capsulesQuantity').val();
        console.log("game is:" + challengeGame);
        console.log("user is:" + challengeUser);
        console.log("bet is:" + challengeBet);

        if(challengeGame == 'matching'){
            gotoGame1('challenge');
        }else if(challengeGame == 'pill'){
            gotoGame2('challenge');
        }

        //if(challengeGame == 'matching'){
        //    gotoGame1('challenge');
        //}else if(challengeGame == 'pill'){
        //    gotoGame2('challenge');
        //}
    }

    //var showingSelectGame = false;
    //var showingSelectUser = false;
    //var showingPlaceBet = false;

    $(document).ready(function () {
        $('#challenge-block').on('click',function(){
            if(!showingSelectGame){
                var innerChallenge = $("#innerChallenge");
                innerChallenge.slideDown("fast");
                $('#challengeText').slideUp("fast");
                showingSelectGame = true;
            }
        });

        $('.challengeButton').on('click', function(){
                $(this).css({"background":"white","color":"#ff3333"});
                
        });

        $('.SelectChallengeGameButton').on('click', function(){
            $('#innerChallengeFindFriend').slideDown('fast');
            $('#innerChallenge').slideUp("fast");
        });

        $('#challengeUserButton').on('click', function(){
            if(!showingSelectUser){
                $(this).css({"background":"white","color":"#ff3333"});
                $('#innerChallengePlaceBet').slideDown('fast');
                $('#innerChallengeFindFriend').slideUp("fast");
                showingSelectUser = true;
            }
        });

        $('#challengeSubmit').on('click', function(){
            if(!showingPlaceBet){ 
                $('#innerChallengePlaceBet').slideUp("fast");
                $('#innerChallengeLoading').slideDown("fast");
                showingPlaceBet = true;
            }
        });

        
    });




</script>

<body id="main_app_module" ng-app="gameMenuApp" ng-controller="gameMenuCtrl">

    <div id='app_header'>
		<a onclick="golistManager()" ><button class = 'back'>&#x25c1;</button></a>
	 
        <a onclick="gohome()"><button>M</button></a>
    </div>
	
    <div id = app_content>
        <div class = "game-wrapper">
            
            <a href="#"><div class = "game-block game-red" id ='game_0'>FLASHCARD</div></a>
			
            <a onclick="gotoGame1()"><div class = "game-block game-white" id ='game_1'>MATCHING</div></a>
            
            <a onclick ="gotoGame2()"><div class = "game-block game-red" id ='game_2'>PILL GAME</div></a>
            
            <a href='#'><div class = "game-block game-white" id ='game_3'>MULTIPLE CHOICE<br>QUIZ</div></a>

            <div class = "game-block game-red" id ='challenge-block'><span id='challengeText'>CHALLENGE A<br>FRIEND</span>
                <div id="innerChallenge" style="display:none">
                    <p id="selectGameText">Select a Game</p>
                    <div id="#challenge-matching" class="challengeButton SelectChallengeGameButton" onclick="selectChallengeGame('matching')">MATCHING</div>
                    <div id="#challenge-pill" class="challengeButton SelectChallengeGameButton" onclick="selectChallengeGame('pill')">PILL GAME</div>
                    <div id="#challenge-quiz" class="challengeButton SelectChallengeGameButton" onclick="selectChallengeGame('quiz')">QUIZ</div>
                </div>
                <div id="innerChallengeFindFriend" style="display:none">
                    <p id="selectUserText">Select a User</p>
                    <input type="text" name="findUser" id="findUser" placeholder="username">
                    <div class="challengeButton" id="challengeUserButton" onclick="selectChallengeUser()">Choose</div>
                </div>
                <div id="innerChallengePlaceBet" style="display:none">
                    <p id="placeBetText">Place a Bet</p>
                    <input type="number" name="capsulesQuantity" id="capsulesQuantity" min="0" max="10000000">
                    <div class="challengeButton" id="challengeSubmit" onclick="challengeSubmit()">Challenge</div>
                </div>
                <div id="innerChallengeLoading" style="display:none">
                    <img src="/mvc/public/images/loading.gif">
                </div>

            </div>
        
        </div>
    </div>

</body>