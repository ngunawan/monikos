<link rel="stylesheet" type="text/css" href="/mvc/public/css/game.css"/>
<script type="text/javascript">
    function gotoGame1(){
        window.location = window.location.origin + "/mvc/public/games/game1";
    }

</script>

<body id="main_app_module">
    <div id = app_header>
		<a href = '#'><button class = 'back'>&#x25c1;</button></a>
		
        <a href ="home.html"><button>M</button></a>
    </div>
    <div id = app_content>
        <div class = "game-wrapper">
            
            <a href="#"><div class = "game-block" id ='game_0'>FLASHCARD</div></a>
        
            <a href='#'><div class = "game-block" id ='game_1'>MATCHING</div></a>
            
            <a href='#'><div class = "game-block" id ='game_2'>PILL GAME</div></a>
            
            <a href='#'><div class = "game-block" id ='game_3'>MULTIPLE CHOICE<br> QUIZ</div></a>

            <a onclick="gotoGame1()"><div class = "game-block" id ='game_3'>GAME 1</div></a>
        
        </div>
    </div>

</body>