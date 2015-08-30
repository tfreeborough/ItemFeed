
/*
First function that runs when you start champion select, start the 2nd sona track and add ajax.get the champion list and the initial text
for the left container
 */
function startChampionSelect(){
    var turn = new buzz.sound( "/audio/yourturn", {
        formats: ["mp3"],
        volume:10
    });
    turn.play();
    backgroundAudio.fadeOut(1500);
    backgroundAudio = new buzz.sound( "/audio/kinetic", {
        formats: ["mp3"],
        volume:getCurrentVolume()
    });
	checkAudio();
    var fadeIn = function(){
        $('.champ-list').fadeIn(300).mCustomScrollbar();
    };
    ajax.get('champion-select-main.php','.page-left-container');
    ajax.get('champion-select-list.php','.page-right-container-main',fadeIn);

}

/*
@param object elem

When a champion is selected we want to load in content specific to that champion, but also set some cookies which we can use later on in the process.
We also thought it would be cool to play the champions select sound when you select them, because who wouldn't love that?
 */
function selectChampion(elem){
    var champ = $(elem).data('name');
    var champKey = $(elem).data('champkey');
    $.removeCookie('champion');
    $.removeCookie('championname');
    $.cookie('champion', champKey, { expires: 180, path: '/' });
    $.cookie('championname', champ, { expires: 180, path: '/' });


    var champSelect = new buzz.sound( "/audio/champs/"+champ, {
        formats: ["mp3"],
        volume:getCurrentVolume()
    });
    champSelect.pause();
    champSelect.play();
    $('.champ-select-title').text(champ);
    $('.champ-list-element img').removeClass('active').removeClass('darkened');
    $(elem).children('img').addClass('active');
    $('.champ-list-element img').not('.active').addClass('darkened');
    getChampion(elem,champ);
}

/*
@param object elem
@param string champ

This loads in the champion details page via our special ajax.get method
 */
function getChampion(elem,champ){
    var champDetailsLoad = function(){
        $('.active-champ-details-bio').mCustomScrollbar();
    };
    ajax.get('champion-details.php','.champ-stats',champDetailsLoad,champ,'',300); // we pass the champions name long as data to the champion-details.php file
}

/*
This function is run when the champion-details.php file is loaded in, it is called from a <script> inside the php file itself. And basically takes all of the stats the champion has
and animates them into a sliding bar. Pretty snazzy!
 */
function statBarSlide(){
    var stats = $('.active-champ-details').data();
    stats = stats.stats;
    stats = stats.toString();

    var attack = 0;
    var defense = 0;
    var magic = 0;
    var difficulty = 0;

    if (stats.length > 4) {
        var chars = [];
        for (i = 0; i < stats.length; i++) {
            chars[i] = stats.substr(i, 1);
            if (chars[i] == 0) {
                chars[i - 1] = 10;
            }
        }
        for (i = 0; i < stats.length; i++) {
            if (chars[i] == 0) {
                chars.splice(i, 1);
            }
        }
        attack = chars[0];
        defense = chars[1];
        magic = chars[2];
        difficulty = chars[3];

    } else {
        attack = stats.substr(0, 1);
        defense = stats.substr(1, 1);
        magic = stats.substr(2, 1);
        difficulty = stats.substr(3, 1);
    }
    var attackStat = attack;
    var defenseStat = defense;
    var magicStat = magic;
    var difficultyStat = difficulty;
    attack = (attack*10).toString() + "%";
    defense = (defense*10).toString() + "%";
    magic = (magic*10).toString() + "%";
    difficulty = (difficulty*10).toString() + "%";

    var attackobj = { width: attack, };
    var defenseobj = { width: defense, };
    var magicobj = { width: magic, };
    var difficultyobj = { width: difficulty, };

    $('.champ-stat-bar-attack').text(attackStat).animate(attackobj, 500);
    $('.champ-stat-bar-defense').text(defenseStat).animate(defenseobj, 500);
    $('.champ-stat-bar-magic').text(magicStat).animate(magicobj, 500);
    $('.champ-stat-bar-difficulty').text(difficultyStat).animate(difficultyobj, 500);
}