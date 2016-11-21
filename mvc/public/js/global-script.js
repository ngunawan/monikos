function toggleMenuNav() {
    if($('#menu-popup').css('visibility') == 'hidden') {
        document.getElementById("menu-popup").style.visibility = "visible";
        document.getElementById("menu-popup").style.opacity = 1;


    } else {
        document.getElementById("menu-popup").style.visibility = "hidden";
        document.getElementById("menu-popup").style.opacity = 0;


    }
}