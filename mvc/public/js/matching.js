	function gohome(){
       window.location = window.location.origin + "/mvc/public/home/";
   	}
    
    function gotoGamelist(){
       window.location = window.location.origin + "/mvc/public/games/menu/" + <?=$data['lid']?>;
   	}

    function tryAgain(){
            	//alert("test");
            	document.getElementById("tryagain").style.visibility="hidden";
            	//document.getElementById("nextButton").click();
				var x = document.getElementsByClassName("BtnBlue");
				x[0].click();		

    }