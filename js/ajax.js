var ajax = new Object();

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

