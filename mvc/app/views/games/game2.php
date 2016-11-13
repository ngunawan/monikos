<link rel="stylesheet" type="text/css" href="/mvc/public/css/game2stylesheet.css">

<meta name='viewport' content="width=device-width, initial-scale=1" />

<script src = '/mvc/public/js/pillCtrl.js'></script>

<script>
    function gotoGamelist(){
        window.location = window.location.origin + "/mvc/public/games/menu/" + <?=$data['lid']?>;
    }
</script>

<!----------HTML STARTS----------->	
<body ng-app="myApp" ng-controller="pillCtrl" id="main_app_module">	

    <div id=app_header>

        <a onclick="gotoGamelist()" ><button class = 'back'>&#x25c1;</button></a>

        <a ng-click='home()'><button>M</button></a>
        <div class="capsule-info"><img src="/mvc/public/images/pill_icon.png"> {{capsules[0].capsules}}</div>

    </div><!---Header END---->			

    <div class = 'app_content'>

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
