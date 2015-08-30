<ul class="site-navigation">
    <li><a class="active" href="javascript:void(0)" onclick="menuPageLoad('front.php',this)">Home</a></li>
    <li><a href="javascript:void(0)" onclick="menuPageLoad('how-it-works.php',this,howItWorks)">How it Works</a></li>
    <li><a href="javascript:void(0)" onclick="menuPageLoad('about-us.php',this)">About Us</a></li>
</ul>
<script>
    /*
    Because the how it works page is so long, we need to run a function to add a custom scrollbar after its loaded.
     */
    var howItWorks = function() {
        $('.about-us').attr('data-mcs-theme', 'rounded-dots').mCustomScrollbar({
            mouseWheel: {scrollAmount: 275}
        });
        $('.itemfeed-process li').click(function(){
            $(this).find('.detailed').slideToggle(500);
        });
    }
</script>