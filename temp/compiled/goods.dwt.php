
<?php echo $this->fetch('lib/header.lbi'); ?>


<link href="/css/dppage.css" type="text/css" rel="stylesheet">

<link rel="stylesheet" href="/css/jquery.spinner.css" />
<script type="text/javascript" src="/js/jquery.spinner.js"></script>
<script type="text/javascript" src="/js/cloud-zoom.1.0.2.min.js"></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,transport.js')); ?>
<div id="bosess">

    
    <section id="inside-pages">
        <div class="pages-title"><img src="/images/mp_xx/shopping.png"><img src="/images/mp_xx/shopping_title.png"></div>

        <div class="pages-boxs">
            <div class="back-all">

                <div class="book-right">
                    <div class="shop_search pro_pagesearch">
                        <form>
                            <div class="search-box">
                                <input type="text" value="搜索从这里开始" class="search-input" onclick="this.value=''" />
                                <button class="scimg"><img src="/images/mp_xx/sc-img.png"></button>
                            </div>
                        </form>
                    </div>
                </div>

                
                <div class="pro_bigimgs">
                    <div class="b-title">
                        <a href="shopping_list.html"><?php echo $this->_var['ur_here']; ?> </a>
                    </div>
                    <div class="demo">
                        <div class="zoom-section">
                            <div class="zoom-small-image">
                                <a href='<?php echo $this->_var['pictures']['0']['img_url']; ?>' class='cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4">
                                    <img src="<?php echo $this->_var['pictures']['0']['img_url']; ?>" alt='' title="Optional title display" />
                                </a>
                            </div>
                            <div class="zoom-desc">
                                <?php $_from = $this->_var['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'picture');if (count($_from)):
    foreach ($_from AS $this->_var['picture']):
?>
                                <p>
                                    <a href='<?php echo $this->_var['picture']['img_url']; ?>' class='cloud-zoom-gallery' title='<?php echo $this->_var['goods']['goods_name']; ?>' rel="useZoom: 'zoom1', smallImage: '<?php echo $this->_var['picture']['img_url']; ?>' ">
                                        <img class="zoom-tiny-image" src="<?php if ($this->_var['picture']['thumb_url']): ?><?php echo $this->_var['picture']['thumb_url']; ?><?php else: ?><?php echo $this->_var['picture']['img_url']; ?><?php endif; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" />
                                        <?php echo htmlspecialchars($this->_var['picture']['img_desc']); ?>
                                    </a>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="imgs-righttext">
                        <h1><?php echo $this->_var['goods']['goods_style_name']; ?></h1>
                        <p>版权输出美国好莱坞魔法工场 ★中外作家联袂演绎 ★热血少年+活泼少女+可爱萌宠+魔法世界 ★锁定儿童文学经典元素，构造魔法恢弘世界 ★同步运作动漫与游戏项目，图书与实体主题乐园同步开启）</p>
                        <form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
                            <h3>价格：<em><?php echo $this->_var['goods']['shop_price_formated']; ?></em><s><?php echo $this->_var['goods']['market_price']; ?></s></h3>
                            <div class="sls">
                                <label>数量：</label>
                                <div class="spinnerExample-box sl-inspiner">
                                    <input type="text" class="spinnerExample" name="number" value=""/></div>
                                <span id="ECS_GOODS_AMOUNT" style="display: none;"></span>
                            </div>
                            <div class="sls">
                                <label>运费：</label>
                                <em>满88元包邮</em>
                            </div>
                        <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>,1)" class="ljgm">立即购买</a>
                        <a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>);" class="jrgwc">加入购物车</a>
                        </form>
                    </div>
                </div>

                
                <div class="book-left left_fixed">
                       <div style="margin-top:19px;position:absolute"> <ul>
                            <li><a href="category.php?id=16" class="bk-active"><h3>所有产品</h3><small>All products</small></a></li>
                            </ul>
                           </div>
                    <?php echo $this->fetch('lib/category_tree.lbi'); ?>
                </div>
                <div class="rights_fix">
                    <div class="fix-title">
                        <a href="#spjj" class="t-ac"><h1>商品简介</h1></a>
                        <a href="#bzjcs" class="t-ac2"><h1>包装及参数</h1></a>
                        <a href="#shbz" class="t-ac3"><h1>售后保障</h1></a>
                    </div>
                    <div class="fix-conter">
                        <div id="spjj">
                            <h1>商品简介</h1>
                            <?php echo $this->_var['goods']['goods_desc']; ?>
                        </div>
                        <div id="bzjcs">
                            <h1>包装及参数</h1>
                            <ul>
                            <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
                               <?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
                                <li>
                                    <i>  <strong><?php echo htmlspecialchars($this->_var['property']['name']); ?></strong></i>
                                    <em><?php echo htmlspecialchars($this->_var['property']['value']); ?></em>
                                </li>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </div>
                        <div id="shbz">
                            <h1>售后保障</h1>
                            <p><strong>运费说明</strong></p>
                            <p>中国大陆
                                <br>内蒙古、海南、青海、宁夏、新疆、西藏：每单收10元运费
                                <br>其余地区：单笔订单满88元免邮费，不足88元时，每单收6元运费
                                <br>中国港澳台
                                <br>按照总计商品原价的30%收取运费，最低20元
                                <br>其他国家
                                <br>按总计商品原价的50%收取运费，最低50元</p>
                            <p><strong>售后服务</strong></p>
                            <p>本商家商品保证正品行货，严格按照国家三包政策提供售后服务，因质量问题或实物与描述不符产生的退换 货服务运费由本店承担。
                            </p>
                            <p><strong>退货流程</strong></p>
                            <p><img src="/images/mp_xx/img8.png"></p>
                            <p><strong>温馨提示</strong></p>
                            <p>亲爱的顾客，为保障您的权益，请您对配送商品查验确认合格后签收，如有问题，请及时与商家联系。如需退货，请将包装一并寄回哦。
                            </p>
                            <p><strong>特别申明</strong></p>
                            <p>本站商品信息均来自于魔咪网，其真实性、准确性和合法性由信息发布者（商家）负责。</p>
                            <p>   本站不提供任何保证，并不承担任何法律责任。</p>
                            <p>   因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，</p>
                            <p>    本站不能确保客户收到的货物与网站图片、产 地、附件说明完全一致，网站商品的功能参数仅供参考，</p>
                            <p>   请以实物为准。若本站没有及时更新，请您谅解！</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <script type="text/javascript">
        //数量
        $('.spinnerExample').spinner();

        var goods_id = <?php echo $this->_var['goods_id']; ?>;
        var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
        var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
        <?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        var goodsId = <?php echo $this->_var['goods_id']; ?>;
        var now_time = <?php echo $this->_var['now_time']; ?>;

        
        onload = function(){
            changePrice();
            fixpng();
            try {onload_leftTime();}
            catch (e) {}
        }
        $(".increase").bind("click",function(){changePrice()});
        $(".decrease").bind("click",function(){changePrice()});
        /**
         * 点选可选属性或改变数量时修改商品价格的函数
         */
        function changePrice()
        {
            var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
            var qty = document.forms['ECS_FORMBUY'].elements['number'].value;

            Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
        }

        /**
         * 接收返回的信息
         */
        function changePriceResponse(res)
        {
            if (res.err_msg.length > 0)
            {
                alert(res.err_msg);
            }
            else
            {
                document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

                if (document.getElementById('ECS_GOODS_AMOUNT'))
                    document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
            }
        }
        

    </script>
    
    <?php echo $this->fetch('lib/foot.lbi'); ?>

