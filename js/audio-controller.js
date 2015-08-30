/*
@param int volume

Changes the volume of the background audio when the slider is changed
 */
function changeVolume(volume){
    backgroundAudio.setVolume(volume);
    jQuery('.site-volume-display').html((volume*5)+'&#37;');
}

/*
Gets the current volume from the site-volume div
 */
function getCurrentVolume(){
    return $('#site-volume').val();
}

/*
@param object elem

This function will mute the background audio but also set a good which will be read when the page is first loaded
this can then determine whether or not the audio should play on page-load.
 */
function muteUnmute(elem){
    var state = $(elem).data('state');
    if(state == 'unmuted'){
        $(elem).attr('src','/img/icons/mute.png').data('state','muted');
        $.cookie('audio', '0', { expires: 180, path: '/' });
        backgroundAudio.mute();
    }else if(state == 'muted'){
        $(elem).attr('src','/img/icons/sound.png').data('state','unmuted');
        $.cookie('audio', '1', { expires: 180, path: '/' });
        backgroundAudio.unmute();
    }
}

/*
This function is ran from the pageload.js file and determines if the background audio will run on page load
 */
function checkAudio(){
    var audio = $.cookie('audio');
    if(typeof audio == 'undefined'){
        backgroundAudio.play().loop();
    }else {
        if (audio == 1) {
            backgroundAudio.play().loop();
        } else {
            backgroundAudio.play().mute().loop();
            $('.volume-container-icon').attr('src','/img/icons/mute.png').data('state','muted');
        }
    }
}