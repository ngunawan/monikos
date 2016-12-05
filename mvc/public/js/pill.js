
 
 function gohome(){
       window.location = window.location.origin + "/mvc/public/home/";
   	}
    
    function gotoGamelist(){
       window.location = window.location.origin + "/mvc/public/games/menu/" + <?=$data['lid']?>;
   	}
 
        