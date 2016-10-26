<link rel="stylesheet" type="text/css" href="/mvc/public/css/game.css"/>

<script type = 'text/javascript'>

    function gotoGame1(){
        window.location = window.location.origin + "/mvc/public/games/game1/" + <?=$data['lid']?>;
    }
	
	function gotoGame2(){
        window.location = window.location.origin + "/mvc/public/games/game2/" + <?=$data['lid']?>;
    }

</script>

<body id="main_app_module">
  <div id=app_header>
		<div ng-click='listManager()'><button class = 'back'>&#x25c1;</button></div>
        <div ng-click="home()"><button>M</button></div>
    </div>
	
    <div id = app_content>
        <div class = "game-wrapper">
            
            <a href="#"><div class = "game-block game-red" id ='game_0'>FLASHCARD</div></a>
			
            <a onclick="gotoGame1()"><div class = "game-block game-white" id ='game_1'>MATCHING</div></a>
            
            <a onclick ="gotoGame2()"><div class = "game-block game-red" id ='game_2'>PILL GAME</div></a>
            
            <a href='#'><div class = "game-block game-white" id ='game_3'>MULTIPLE CHOICE<br> QUIZ</div></a>
        
        </div>
    </div>

</body>