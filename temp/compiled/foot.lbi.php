</section>

<div id="qro-box">
    <div id="qrcode">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase=" http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0">
            <param name="navigate" value="qrcode.swf" />
            <param name="quality" value="high" />
            <embed src="qrcode.swf" class="qrc" quality="high" pluginspage=" http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
        </object>
    </div>
</div>

</div>

<footer>
    <div id="fot">
        <div class="fl-le">
            Copyright 2015 © 版权所有 好莱坞（南京）魔法工场&nbsp;   丨<a href="http://nj.doopaa.com/" target="_blank">南京网站设计制作  东湃互动</a>
        </div>
        <div class="fo-nav">
            <a href="/about.php?id=36">关于我们</a>
            <a href="/about.php?id=47">联系我们</a>
            <a href="/article_cat.php?id=15">魔咪资讯</a>
            <!--<a href="">魔法地图</a>-->
        </div>
    </div>
</footer>



<div class="bodys">
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase=" http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"  width="1800" height="100%" id="navc">
        <param name="navigate" value="cloud.swf" />
        <param name="quality" value="high" />
        <embed src="cloud.swf" quality="high" pluginspage=" http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="100%" height="600"></embed>
    </object>
</div>


<div id="nav_second">
    <div class="body">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase=" http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" id="navc">
            <param name="navigate" value="navigate.swf" />
            <param name="quality" value="high" />
            <embed src="navigate.swf" class="navc" quality="high" pluginspage=" http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
        </object>
    </div>
</div>


<script>
    
   
$(function() {
        //右导航
        scrollElement = function(){
            var scrollTimeout = false;
            var scrollTop = $(window).scrollTop();
            var headerTop = scrollTop > 43 ? scrollTop : 43;

            if (headerTop>43) {
                $('header').addClass('fixed');
            } else {
                $('header').removeClass('fixed');
            }

            if (scrollTimeout) {
                clearTimeout(scrollTimeout);
            }
            scrollTimeout = setTimeout(function(){
                var offsetTop = scrollTop+$(window).height()/6;
                var nav_secondTop = offsetTop > 400 ? offsetTop : 400;
                var serviceTop = offsetTop > 850 ? offsetTop : 850;

                $('#nav_second').stop().animate({
                    top: offsetTop,
                    'margin-top': $('#nav_second').outerHeight()/-200
                });

                $('#service').stop().animate({
                    top: offsetTop,
                    'margin-top': $('#service').outerHeight()/-200
                });
            },1);
        }
        $(window).scroll(function(){
            scrollElement();
        });
    });



    
    $("#qro-box").hover(function(){
        $("#qrcode").fadeToggle();
    })
</script>

</body>
</html>
