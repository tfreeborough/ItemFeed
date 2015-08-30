/*
when the document loads, run the initialLoad function
 */
$(document).ready(function(){
    initialLoad();
});

var mouseX;
var mouseY;
/*
Update the global mouse position whenever the mouse is used.
 */
$(document).mousemove( function(e) {
    mouseX = e.pageX;
    mouseY = e.pageY;
});

var backgroundAudio = new buzz.sound( "/audio/ethereal", {
    formats: ["mp3"],
    volume:10
});

var currentVolume = 0;

/*
check the audio to play and ajax.get all of the initial stuff needed for the page.
 */
function initialLoad(){
    checkAudio();
    ajax.get('front.php','.page-left-container','','','',3500);
    ajax.get('site-navigation.php','.page-right-container-top-nav',400);
    ajax.get('twitter-right.php','.page-right-container-main');
}


/*
@param string page
@param object elem
@param function func

Loads in pages from the navigation menu when clicked.
 */
function menuPageLoad(page,elem,func){
    $('.site-navigation li a').removeClass('active');
    $(elem).addClass('active');
    ajax.get(page,'.page-left-container',func);
}

