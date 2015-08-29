function changeVolume(volume){
    backgroundAudio.setVolume(volume);
    jQuery('.site-volume-display').html((volume*5)+'&#37;');
}

function getCurrentVolume(){
    return $('#site-volume').val();
}

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