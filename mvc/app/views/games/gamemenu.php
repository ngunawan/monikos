<link rel="stylesheet" type="text/css" href="/mvc/public/css/game.css"/>

<meta name='viewport' content="width=device-width, initial-scale=1" />

<script type = 'text/javascript'>

    function gotoGame1(challenge){
        //normal play, not challenge mode
        if(challenge == undefined){
            window.location = window.location.origin + "/mvc/public/games/game1/" + <?=$data['lid']?>;
        }else{
        //challenge mode
            window.location = window.location.origin + "/mvc/public/games/game1/" + <?=$data['lid']?> + "/" + challenge;
        }
    }
	
	function gotoGame2(challenge){
        //normal play, not challenge mode
        if(challenge == undefined){
            window.location = window.location.origin + "/mvc/public/games/game2/" + <?=$data['lid']?>;
        }else{
        //challenge mode
            window.location = window.location.origin + "/mvc/public/games/game2/" + <?=$data['lid']?> + "/" + challenge;
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

    function challenge(game){
        //alert(game);
        //$("#challenge-"+game).css({"background":"white","color":"#ff3333"});
        if(game == 'matching'){
            gotoGame1('challenge');
        }else if(game == 'pill'){
            gotoGame2('challenge');
        }
    }

    $(document).ready(function () {
        $('#challenge').on('click',function(){
            var innerChallenge = $("#innerChallenge");
            innerChallenge.slideDown("fast");

            $('#challengeText').slideUp("fast");
        });

        $('.challengeButton').on('click', function(){
            $(this).css({"background":"white","color":"#ff3333"});
        });

        
    });




</script>

<body id="main_app_module">

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

            <div class = "game-block game-red" id ='challenge'><span id='challengeText'>CHALLENGE A<br>FRIEND</span>
                <div id="innerChallenge" style="display:none">
                    <div id="#challenge-matching" class="challengeButton" onclick="challenge('matching')">MATCHING</div>
                    <div id="#challenge-pill" class="challengeButton" onclick="challenge('pill')">PILL GAME</div>
                    <div id="#challenge-quiz" class="challengeButton" onclick="challenge('quiz')">QUIZ</div>
                </div>

            </div>
        
        </div>
    </div>

</body>