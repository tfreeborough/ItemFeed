/*
Custom file which handles the fetching of pages on the site, without this neat little object none of the site would be possible.
 */
var ajax = new Object();


/*
ajax.get
@param string url
@param string div
@param function fnction
@param mixed data
@param string dt
@param int speed
 */
ajax.get = function(url,div,fnction,data,dt,speed){
    speed = typeof speed !== 'undefined' ? speed : 500;
    $(div).fadeOut(speed,function(){
        $.ajax({
            url: '/components/'+url,
            dataType: dt,
            method: 'GET',
            data: {data:data}
        }).success(function (response) {
            $(div).html(response).fadeIn(speed);
            if(fnction && typeof fnction == 'function'){
                fnction();
            }
        });
    });
};

