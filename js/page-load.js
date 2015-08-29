$(document).ready(function(){
    initialLoad();
});

var mouseX;
var mouseY;
$(document).mousemove( function(e) {
    mouseX = e.pageX;
    mouseY = e.pageY;
});

var backgroundAudio = new buzz.sound( "/audio/ethereal", {
    formats: ["mp3"],
    volume:10
});

var currentVolume = 0;

function initialLoad(){
    checkAudio();
   /* $('.page-right-container-top').css('z-index','2').draggable(); */
    ajax.get('front.php','.page-left-container','','','',3500);
    ajax.get('site-navigation.php','.page-right-container-top-nav',400);
    ajax.get('twitter-right.php','.page-right-container-main');
}


/*
@param string page
@param object elem
 */
function menuPageLoad(page,elem,func){
    $('.site-navigation li a').removeClass('active');
    $(elem).addClass('active');
    ajax.get(page,'.page-left-container',func);
}

