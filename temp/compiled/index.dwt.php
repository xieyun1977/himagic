<!doctype html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
        <meta charset="utf-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title><?php echo $this->_var['page_title']; ?></title>
        
        
        

        <link href="css/common.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="css/custom.css" />


        
        <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="js/simplefoucs.js" type="text/javascript"></script>

        
        <link rel="stylesheet" type="text/css" href="css/zzsc.css" />
        <script src="js/jquery-1.8.2.min.js" type="text/javascript" ></script>




        
        <script  src="js/jquery.min.js" type="text/javascript" ></script>
        <link rel="stylesheet" type="text/css" href="js/lightbox/themes/default/jquery.lightbox.css" />
        <script type="text/javascript" src="js/lightbox/jquery.lightbox.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('.lightbox').lightbox();
            });
        </script>


        
        <script src="js/Tony_Tab.js" type="text/javascript"></script>
    </head>

<body class="loading">


<?php echo $this->fetch('lib/menu.lbi'); ?>



<div id="bosess">

<section id="wrapper">
    <div class="topwaps">
        
        <div class="bannerbox">
            <div id="focus">
                <ul>
                    <?php $_from = $this->_var['lads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');if (count($_from)):
    foreach ($_from AS $this->_var['ad']):
?>
                    <li><div class="img"><a href="javascript:;" target="_blank"><img src="<?php echo $this->_var['ad']['src']; ?>"></a></div></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
            <div class="tbacs"></div>
        </div>
        
        <div class="main">
            <div class="pro-switch">
                <div class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php $_from = $this->_var['rads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');if (count($_from)):
    foreach ($_from AS $this->_var['ad']):
?>
                            <li><div class="img"><a href="javascript:;" target="_blank"><img src="<?php echo $this->_var['ad']['src']; ?>"></a></div></li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="rigthbacs"></div>
        </div>
    </div>


    
    <div class="videos">
        <div class="vid-a">
            <?php $_from = $this->_var['spads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'ad');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['ad']):
?>
            <a <?php if ($this->_var['k'] == 0): ?>class="vaxt"<?php endif; ?>><?php echo $this->_var['ad']['ad_name']; ?></a>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <!--<a class="vaxt">魔术世界</a>-->
            <!--<a>官方视频</a>-->
        </div>
        <div class="vid-warp">
            <?php $_from = $this->_var['spads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');if (count($_from)):
    foreach ($_from AS $this->_var['ad']):
?>
            <?php echo $this->_var['ad']['src']; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        </div>
    </div>
</section>




<section id="container">
    
    <div class="inall">
        
        <div class="inaleft">
            <div class="i-t">
                <div class="t-title">
                    <span>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase=" http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"  width="80" height="80" id="navc">
                            <param name="navigate" value="btn_chests.swf" />
                            <param name="quality" value="high" />
                            <embed src="btn_chests.swf" quality="high" pluginspage=" http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="80" height="80"></embed>
                        </object>
                    </span>
                    <a><img src="themes/default/images/mfscimg.png"></a>
                </div>
                <div id="zdtp">
                    <ul>
                        <?php $_from = $this->_var['mfads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');if (count($_from)):
    foreach ($_from AS $this->_var['ad']):
?>
                        <li><a href="JavaScript:;"><img src="<?php echo $this->_var['ad']['src']; ?>"></a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                    </ul>
                </div>
            </div>
            <div class="i-b">
                <div class="t-title">
                    <span>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase=" http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"  width="80" height="80" id="navc">
                            <param name="navigate" value="btn_castle.swf" />
                            <param name="quality" value="high" />
                            <embed src="btn_castle.swf" quality="high" pluginspage=" http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="80" height="80"></embed>
                        </object>
                    </span>
                    <a href="/product.php?act=zt"><img src="themes/default/images/mfgyimg.png"></a>
                </div>
                <div id="zdtp2">
                    <ul>
                        <?php $_from = $this->_var['mhads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');if (count($_from)):
    foreach ($_from AS $this->_var['ad']):
?>
                        <li><a href="JavaScript:;"><img src="<?php echo $this->_var['ad']['src']; ?>"></a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="inaright">
            <div class="t-title">
                <span>
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase=" http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"  width="80" height="80" id="navc">
                        <param name="navigate" value="btn_book.swf" />
                        <param name="quality" value="high" />
                        <embed src="btn_book.swf" quality="high" pluginspage=" http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" width="80" height="80"></embed>
                    </object>
                </span>
                <a href="/article_cat.php?id=15"><img src="themes/default/images/mfzximg.png"></a>
            </div>
            <div class="right-list">
                <ul>
                    <?php $_from = $this->_var['artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
                    <li>
                        <a href="article.php?id=<?php echo $this->_var['article']['id']; ?>">
                            <div class="dates">
                                <div class="datestop">
                                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase=" http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="64" height="64">
                                        <param name="navigate" value="news_circle1.swf" />
                                        <param name="quality" value="high" />
                                        <embed src="news_circle1.swf" quality="high" pluginspage=" http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="64" height="64" wmode="transparent"></embed>
                                    </object>
                                </div>
                                <script>
                                    pdate='<?php echo $this->_var['article']['add_time']; ?>'.split('-')
                                    day=pdate[2]
                                    ym=pdate[0]+"."+pdate[1]
                                                    document.write('<h3>'+day+'</h3>');
                                                    document.write('<p>'+ym+'</p>');
                                </script>

                            </div>
                            <div class="l-text">
                                <h5><?php echo htmlspecialchars($this->_var['article']['short_title']); ?></h5>
                                <p><?php echo $this->_var['article']['description']; ?></p>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
    </div>

    
    <div class="production">
        <div class="t-title">
            <a><img src="themes/default/images/mfzpimg.png"></a>
        </div>
        <div class="btn">
            <a class="current">圣诞的魔法城</a> 
            <a>哈利·波特</a>
            <a>波西·杰克逊</a>
            <a>指环王</a>
            <a>冰与火之歌 </a>
        </div>
        <?php $_from = $this->_var['dbads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');if (count($_from)):
    foreach ($_from AS $this->_var['ad']):
?>
       <a href="<?php echo $this->_var['ad']['ad_link']; ?>"> <div class="btn-conter"><div class="estate_img"><img src="<?php echo $this->_var['ad']['src']; ?>"></div></div></a>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>

    
    <div class="b-links">
        <a href="">
            <span><img src="/images/peo1.png"></span>
            <p><img src="themes/default/images/mhscb.png"></p>
        </a>
        <a href="/magic.php?id=35">
            <span class="ts2"><img src="/images/peo2.png"></span>
            <p><img src="themes/default/images/games.png"></p>
        </a>
        <a href="/about.php?id=47">
            <span class="ts3"><img src="/images/peo3.png"></span>
            <p><img src="themes/default/images/pus.png"></p>
        </a>
        <a href="/about.php?id=36">
            <span class="ts4"><img src="/images/peo4.png"></span>
            <p><img src="themes/default/images/hzhbp.png"></p>
        </a>
    </div>


<script defer src="js/slider.js"></script>
<script type="text/javascript">
    $(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
    //超出显示省略号
    $('.inaright .right-list .l-text p').each(function(){
        var maxwidth=50;
        if($(this).text().length>maxwidth){
            $(this).text($(this).text().substring(0,maxwidth));
            $(this).html($(this).html()+'...');
        }
    });

    //魔幻作品更换按钮
    $(".btn a").click(function(){
        $(".btn a").removeClass("current")
        $(this).addClass("current")


    })

    //点击按钮更换下面内容
    $(".btn-conter").hide()
    $(".btn-conter").eq(0).show();
    $(".btn a").click(function(){
        n=$(".btn a").index(this);
        $(".btn-conter").hide();
        $(".btn-conter").eq(n).show()
    })

    //视频更换按钮
    $(".vid-a a").click(function(){
        $(".vid-a a").removeClass("vaxt")
        $(this).addClass("vaxt")


    })

    //视频点击按钮更换下面内容
    $(".vi-content").hide()
    $(".vi-content").eq(0).show();
    $(".vid-a a").click(function(){
        n=$(".vid-a a").index(this);
        $(".vi-content").hide();
        $(".vi-content").eq(n).show()
    })


    //我的魔咪下拉
    $("header .topnav > ul > li").hover(function(){
        $(this).find('.topsub').stop().slideToggle("1s");
    })

    //魔幻公园与魔法商城图片切换
    $(function() {
        $('#zdtp').slideFocus();
        $('#zdtp2').slideFocus();
    });
</script>

    <?php echo $this->fetch('lib/foot.lbi'); ?>

