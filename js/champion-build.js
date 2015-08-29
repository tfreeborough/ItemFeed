function buildChampion(elem) {
    var lockIn = new buzz.sound("/audio/lockinchampion", {
        formats: ["mp3"],
        volume: getCurrentVolume()
    });
    lockIn.play();

    // Pulling in new content?
    var fadeIn = function () {
        $('.item-build-info h1').append(' - '+$.cookie('championname'));
        $('#champ-image-wrap').append('<img class="champ-image" src="/img/champs/squares/'+ $.cookie('championname')+'.png">');
        $('.item-list').fadeIn(300).mCustomScrollbar({
            mouseWheel: {scrollAmount: 275}
        });
        $('.page-left-container').attr('data-mcs-theme','rounded-dots').mCustomScrollbar({
            mouseWheel: {scrollAmount: 275},
            callbacks:{
                whileScrolling: function(){
                }
            }
        });
        registerEventFunctions();
    };
    ajax.get('item-build.php', '.page-left-container');
    ajax.get('item-list.php', '.page-right-container-main', fadeIn);

//    var isViktor = chkViktor(elem);

    var fadeIn = function () {
        $('.champ-list').fadeIn(300).mCustomScrollbar();
    };

    var chkVikor = function (elem) {

        var champion = elem.data('championid');
        if (champion == "Viktor") {
            return true;
        } else {
            return false;
        }

    };

}

function searchItemList(elem){
    var value = $(elem).val().toLowerCase();
    $('.name').each(function(i, obj) {
        var name = $(obj).text().toLowerCase();
        if(name.indexOf(value) < 0){
            if(!$(obj).parent('li').hasClass('clone')){
                $(obj).parent('li').addClass('hidden');
            }
        }else{
            if(!$(obj).parent('li').hasClass('clone')) {
                $(obj).parent('li').removeClass('hidden');
            }
        }
    });
}

function dragItem(elem) {

    var selectItem = new buzz.sound("/audio/selectItem", {
        formats: ["mp3"],
        volume: getCurrentVolume()
    });
    selectItem.play();

    if ($(elem).next('li').data('itemid') == $(elem).data('itemid')) {

    } else {
        var clone = $(elem).clone();
        $(clone).addClass('copy').attr('onclick', 'returnItem(this)');
        $(elem).after(clone).css('display', 'none');
        var image = $(elem).children('img');
        image = $(image).attr('src');
        $('#item-build-storage').append('<li onmouseup="attemptSlot(this)" class="item-build-storage-item animated pulse" data-itemid="' + $(elem).data('itemid') + '"><img data-itemid="' + $(elem).data('itemid') + '" src="' + image + '"></li>');
        $('.item-build-storage-item').draggable({
            containment: ".page-left-container",
            helper: "clone"
        });
    }

}

function returnItem(elem) {
    var removeItem = new buzz.sound("/audio/removeItem", {
        formats: ["mp3"],
        volume: getCurrentVolume()
    });
    removeItem.play();
    $(elem).prev('li').css('display', 'block');
    $(elem).remove();
    var itemid = $(elem).data('itemid');
    $('#item-build-storage li').each(function (i, e) {
        if ($(e).data('itemid') == itemid) {
            $(e).remove();
        }
    });
}

function removeSpareSlots(){
    $('.item-build-group').each(function(i,e){
        var length = $(e).find('.item-build-slot').length;
        $(e).find('.item-build-slot').each(function(j,d){
            if($(d).is(':empty')){
                if($(d).not(':last-child')){
                    $(d).remove();
                }
            }
        });
        $(e).append('<div class="item-build-slot"></div>');
    });
}

function attemptSlot(elem){
    $('.item-build-slot').each(function(i,e){
        registerEventFunctions();
        if(collisionDetection(elem,e)){
            slotItem(elem,e);
            removeSpareSlots();

        }
    });
}

function collisionDetection(el1, el2) {
    el1.offsetBottom = el1.offsetTop + el1.offsetHeight;
    el1.offsetRight = el1.offsetLeft + el1.offsetWidth;
    el2.offsetBottom = el2.offsetTop + el2.offsetHeight;
    el2.offsetRight = el2.offsetLeft + el2.offsetWidth;
    if(!((el1.offsetBottom < el2.offsetTop) ||
        (el1.offsetTop > el2.offsetBottom) ||
        (el1.offsetRight < el2.offsetLeft) ||
        (el1.offsetLeft > el2.offsetRight))){
        return true;
    }
};

function slotItem(item,slot){
    var img = $(item).find('img').attr('src');
    var qty = 1;
    swal({
        title: "How many?",
        text: '<img class="qty-img" src="'+img+'">' +
        "How many of this do you want?",
        type: "input",
        html: true,
        inputType: "number",
        allowEscapeKey: true,
        inputValue: 1,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Enter a number"
    },
        function(inputValue){
            if (inputValue === false)
                return false;
            if (inputValue === "") {
                swal.showInputError("Please select a quantity");
                return false
            }
            qty = inputValue;
            $(slot).find('img').attr('data-qty',qty);
            $(slot).append('<div class="qty-overlay">'+qty+'</div>');
            swal.close();
        });
    var clone = $(item).html();
    $(slot).html(clone);
    $(slot).append('<div class="qty-overlay">'+qty+'</div>');
    $(item).remove();
    var selectItem = new buzz.sound("/audio/selectItem", {
        formats: ["mp3"],
        volume: getCurrentVolume()
    });
    selectItem.play();
    $(slot).find('img').attr('data-qty',qty);

}

function resetForm(){
    $('#itemset-form').find('input').each(function(i,e){
        if($(e).attr('class') == 'item-build-settings-name'){

        }else{
            $(e).remove();
        }
    });
}

function removeSlotItem(slot){
    $(slot).empty();
    var removeItem = new buzz.sound("/audio/removeItem", {
        formats: ["mp3"],
        volume: getCurrentVolume()
    });
    removeItem.play();
    resetForm();
    removeSpareSlots();
}

function registerEventFunctions(){
    $(".item-build-slot").on('click',function() {
        removeSlotItem(this);
    });
    $(document).mouseup(function (e)
    {
        var container = $(".item-build-settings-name");

        if (!container.is(e.target) // if the target of the click isn't the container...
            && container.has(e.target).length === 0) // ... nor a descendant of the container
        {
            container.attr("readonly", true);
        }
    });
    $('#itemset-form input').keypress(function(e){
        if ( e.which == 13 ) return false;
        //or...
        if ( e.which == 13 ) e.preventDefault();
    });
}

function renameGroup(elem){
    $(elem).parents('.item-build-group').find('.item-build-settings-name').attr("readonly", false).val('').focus();
}

function deleteGroup(elem){
    $(elem).parents('.item-build-group').remove();
}

function addGroup(){
    var group = '';
    var length = $('.item-build-group').length;
    $('.item-build-group').each(function(i,e){
        if(length == (i+1)){
            group = group+'<div class="item-build-group">';
            group = group+'<div class="item-build-settings">';
            group = group+'<input class="item-build-settings-name" data-groupid="'+(i+1)+'" type="text" name="group['+(i+1)+'][name]" value="Item Group '+(i+1)+'" readonly>';
            group = group+'<img onclick="toggleSettings(this)" class="item-build-settings-icon" src="/img/icons/settings.png">';
            group = group+'</div>';
            group = group+'<div class="item-build-slot"></div>';
            group = group+'</div>';
        }
    });
    if(length == 0){
        group = group+'<div class="item-build-group">';
        group = group+'<div class="item-build-settings">';
        group = group+'<input class="item-build-settings-name" type="text" name="group['+(0)+'][name]" value="Item Group '+(0)+'" readonly>';
        group = group+'<img onclick="toggleSettings(this)" class="item-build-settings-icon" src="/img/icons/settings.png">';
        group = group+'</div>';
        group = group+'<div class="item-build-slot"></div>';
        group = group+'</div>';
        $('.item-build-group-wrapper').append(group);
    }else{
        $('.item-build-group:last-child').after(group);
    }

}

function toggleSettings(elem){
    if($(elem).parent('.item-build-settings').parent('.item-build-group').find('.item-build-settings-menu').is(':visible')){
        $(elem).parent('.item-build-settings').parent('.item-build-group').find('.item-build-settings-menu').remove();
    }else{
        $(elem).parent('.item-build-settings').parent('.item-build-group').prepend('<div class="item-build-settings-menu"><ul><li onclick="renameGroup(this)">Rename</li><li onclick="deleteGroup(this)">Remove</li></ul></div>');
    }
}

function downloadItemSet(){
    swal({
        title: "Almost done!",
        text: "Name your item set:",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "Item Set name"},
        function(inputValue){
            if (inputValue === false) return false;
            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false   }
            chooseMap(inputValue);
        });
    backgroundAudio.fadeOut(1500);
    backgroundAudio = new buzz.sound( "/audio/concussive", {
        formats: ["mp3"],
        volume:getCurrentVolume()
    });
    checkAudio();
}

function chooseMap(name){
    var map = "";
    swal({
        title: "Select your map",
        text: "Please select the map this item set is for" +
        '<form id="map-form">' +
        '<input type="radio" name="map" value="any"><p>All</p><br>' +
        '<input type="radio" name="map" value="SR"><p>Summoners Rift</p><br>' +
        '<input type="radio" name="map" value="HA"><p>Howling Abyss</p><br>' +
        '<input type="radio" name="map" value="TT"><p>Twisted Treeline</p><br>' +
        '<input type="radio" name="map" value="CS"><p>Crystal Scar</p><br>' +
        '</form>',
        type: "warning",
        html: true,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Lets go, Lets go!",
        cancelButtonText: "Tactical Retreat!",
        closeOnConfirm: false,
        closeOnCancel: false },
        function(isConfirm){
            if (isConfirm) {
                var val = $('input[name=map]:checked', '#map-form').val();
                if(typeof val !== 'undefined'){
                    formItemGroups();
                    $('#itemset-form').append('<input type="hidden" name="name" value="'+name+'">');
                    $('#itemset-form').append('<input type="hidden" name="map" value="'+val+'">');
                    var serialised = $('#itemset-form').serialize();
                    location.href = '/components/generate-item-set.php?'+serialised;
                    swal({
                        title:"ENJOY!",
                        html:true,
                        text: 'Now to install your new itemset!<br>' +
                        '<strong>You need to place this file in the following directory:</strong><br><br>' +
                        '<h5>C:\\Riot Games\\League of Legends\\Config\\Champions\\'+$.cookie('champion')+'\\Recommended\\<h5>' +
                        '<br><br><p>Then simply restart your lol-client for it to take effect!',
                        type:"success"
                    });
                    var applause = new buzz.sound( "/audio/applause", {
                        formats: ["mp3"],
                        volume:15
                    });
                    applause.play();
                    resetForm();
                }else{
                    chooseMap(name);
                }
            } else {
                swal("Cancelled", "Please come back if you change your mind :)", "error");
            }
        });
}


function formItemGroups(){
    $('.item-build-group').each(function(i,e){
        var group = $(e).find('.item-build-settings-name').data('groupid');
        $(e).find('.item-build-slot').each(function(j,d){
            var item = $(d).find('img').data('itemid');
            var qty = $(d).find('img').data('qty');
            if(typeof item !== 'undefined'){
                if(typeof item !== 'undefined') {
                    $('#itemset-form').append('<input type="hidden" name="group[' + group + '][items]['+item+'][id]" value="' + item + '">');
                    $('#itemset-form').append('<input type="hidden" name="group[' + group + '][items]['+item+'][qty]" value="' + qty + '">');
                }else{
                    swal("Oops!", "We appear to have encountered an error, please try again, if it persists, contact us via email", "error");
                }
            }else{
                swal("Oops!", "We appear to have encountered an error, please try again, if it persists, contact us via email", "error");
            }
        });
    });
}
