
<?php echo $this->fetch('lib/header.lbi'); ?>


<link href="/css/common.css" type="text/css" rel="stylesheet">
<link href="/css/dppage.css" type="text/css" rel="stylesheet">
<script src="/js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="/js/custom3.js" type="text/javascript"></script>

<link rel="stylesheet" href="/css/jquery.spinner.css" />
<script type="text/javascript" src="/js/jquery.spinner.js"></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,utils.js,transport.js')); ?>
        
        <div id="bosess">

            
            <section id="inside-pages">
                <div class="pages-title"><img src="/images/mp_xx/vehicle.png"><img src="/images/mp_xx/vehicle_title.png"></div>

                <div class="pages-boxs">
                    <div class="back-all">
                        <form id="formCart" name="formCart" method="post" action="flow.php">
                        <div class="vehlist">

                            <table width="100%" border="0" cellspacing="0">
                                <thead id="theads">
                                <tr>
                                    <td width="20%">&nbsp;</td>
                                    <td width="30%">产品</td>
                                    <td width="10%">单价</td>
                                    <td width="20%">数量</td>
                                    <td width="10%">金额</td>
                                    <td width="10%">操作</td>
                                </tr>
                                </thead>
                                <tbody id="tbodys">
                                <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['goods']):
?>
                                <tr class="card_list">
                                    <td>
                                        <div class="big_back">
                                            <input type="checkbox" name="" class="vouchers_check" />
                                           <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="imgs">
                                               <p><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" class="goods_thumb" /></p>
                                           </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="big_back">
                                            <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><h5><?php echo $this->_var['goods']['goods_name']; ?></h5></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="big_back">
                                            <h1 id="price_<?php echo $this->_var['goods']['goods_id']; ?>"><?php echo $this->_var['goods']['goods_price']; ?></h1>
                                            <h2><?php echo $this->_var['goods']['market_price']; ?></h2>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="big_back">
                                            <div class="spinnerExample-box">
                                                <input type="text" class="spinner" gid="<?php echo $this->_var['goods']['goods_id']; ?>" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>"  value="<?php echo $this->_var['goods']['goods_number']; ?>"/></div>
                                            <script>
                                                //数量
                                                $('#goods_number_<?php echo $this->_var['goods']['rec_id']; ?>').spinner({value: <?php echo $this->_var['goods']['goods_number']; ?>});
                                            </script>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="big_back">
                                            <h3 id="total_<?php echo $this->_var['goods']['goods_id']; ?>">
                                                <?php echo $this->_var['goods']['subtotal']; ?>
                                            </h3>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="big_back">
                                        <a class="list_yc" href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; ">
                                            <img src="/images/mp_xx/yc.png"><?php echo $this->_var['lang']['drop']; ?></img></a>
                                        <?php if ($_SESSION['user_id'] > 0): ?>
                                        <a class="list_yc" href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_to_collect&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; "><?php echo $this->_var['lang']['drop_to_collect']; ?></a>
                                        <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </tbody>
                            </table>
                            <div class="list_czs">
                                <div class="czs_left">
                                    <a class="lis_qxs"><input id="checkAll_list" type="checkbox" name="" />全选</a>
                                    <a href="javascript:;" class="delete_card">删除</a>
                                </div>
                                <div class="czs_right">
                                    <p>已选商品 <strong>0</strong> 件 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;合计（不含运费）:
                                        <em>
                                            ￥ 0元
                                        </em></p>
                                    <a href="/flow.php?step=checkout">立即付款</a>
                                </div>

                            </div>
                        </form>
                        </div>
                    </div>
                </div>
<script>
    // <?php echo $this->_var['shopping_money']; ?>
    var gid;
    $(".increase").bind("click",function(){changePrice()});
    $(".decrease").bind("click",function(){changePrice()});
    /**
     * 点选可选属性或改变数量时修改商品价格的函数
     */
    function changePrice()
    {
        var event = window.event||arguments[0]
        //target 就是这个对象
        target = event.srcElement||event.target
        gid=($("#"+target.parentNode.children[1].id).attr("gid"))
        var qty=(target.parentNode.children[1].value);
      //  $('#total_'+gid).text('11');

//        alert(document.forms['ECS_FORMBUY']);
//        var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
//        var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
        Ajax.call('goods.php', 'act=price&id=' + gid + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
    }
    /**
     * 接收返回的信息
     */
    function changePriceResponse(res)
    {
//        alert(res.result)
        if (res.err_msg.length > 0)
        {
            alert(res.err_msg);
        }
        else
        {
                $('#total_'+gid).text(res.result);
        }
    }
    //全选全不选
    $("#checkAll_list").click(function() {
        $("input[type='checkbox']").prop("checked", this.checked);
    });
    $("input[type='checkbox']").click(function() {
        var $subs = $("input[type='checkbox']");
        $("#checkAll_list").prop("checked", $subs.length == $subs.filter(":checked").length ? true : false);
    });
    $(".delete_card").click(function() {
        $(".vouchers_check").each(function() {
            if ($(this).filter(":checked").length) {
                if (confirm('您确实要把该商品移出购物车吗？'))
                {
                    $(this).parents(".card_list").remove();
                    location.href='flow.php?step=drop_goods&id=44';
                }
            }
        })
    })
    $(".list_yc").click(function() {
        $(this).parents(".card_list").remove();
    })
</script>


        
        <?php echo $this->fetch('lib/foot.lbi'); ?>
