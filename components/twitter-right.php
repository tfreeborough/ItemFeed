<a class="twitter-timeline" href="https://twitter.com/hashtag/leagueoflegends" width="100%" data-widget-id="637641662190252032">#leagueoflegends Tweets</a>
<script>
    !function(d,s,id){
        var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
        if(!d.getElementById(id)){
            js=d.createElement(s);
            js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js,fjs);
        }
    }(document,"script","twitter-wjs");
</script>
<script>
    /*
    Inject custom CSS into an iFrame so we can style the twitter widget
     */
    $(document).ready(function(){
        var i = 0;
        var addCssToIframe = function(n) {
            if(n < 10){
                if ($('.twitter-timeline').contents().find("head") != undefined) {
                    $('.twitter-timeline')
                        .contents()
                        .find("head")
                        .append(
                        '<link class="twitter-css" rel="stylesheet" href="/css/twitter.css" type="text/css" />');
                }
                i = n+1;
                setTimeout(function(){
                    addCssToIframe(i);
                },500);
            }else{
                clearInterval(addCssInterval);
            }

        };
        var addCssInterval = setTimeout(addCssToIframe, 1000, i, false);
    });

</script>