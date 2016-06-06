<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="themes/default/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,shopping_flow.js')); ?>
</head>
<body>
<div id="globalWrapper">
  <div style="float:left;"><img src="themes/default/images/page_left.gif" alt="" /></div>
  <div id="wrapper"><?php echo $this->fetch('library/page_header.lbi'); ?><div id="search-bar">
      <div id="search-left"><?php echo $this->fetch('library/ur_here.lbi'); ?></div>
      <div id="search-right"><?php echo $this->fetch('library/search_form.lbi'); ?></div>
    </div>
    
    <div id="container2">
      <?php if ($this->_var['step'] == "cart"): ?>
      
      <div class="title-div"><img src="themes/default/images/cart_goods.gif" alt="goods" width="158" height="39" /></div>
      <form id="formCart" name="formCart" method="post" action="flow.php">
        <table width="100%" border="0" cellpadding="4" cellspacing="1">
          <tr>
            <th><?php echo $this->_var['lang']['goods_name']; ?></th>
            <?php if ($this->_var['show_goods_attribute'] == 1): ?>
            <th><?php echo $this->_var['lang']['goods_attr']; ?></th>
            <?php endif; ?>
            <?php if ($this->_var['show_marketprice']): ?>
            <th><?php echo $this->_var['lang']['market_prices']; ?></th>
            <?php endif; ?>
            <th><?php echo $this->_var['lang']['shop_prices']; ?></th>
            <th><?php echo $this->_var['lang']['number']; ?></th>
            <th><?php echo $this->_var['lang']['subtotal']; ?></th>
            <th><?php echo $this->_var['lang']['handle']; ?></th>
          </tr>
          <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <tr>
            <td>
              <?php if ($this->_var['goods']['goods_id'] > 0): ?>
                <?php if ($this->_var['show_goods_thumb'] == 1): ?>
                  <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><?php echo $this->_var['goods']['goods_name']; ?></a>
                <?php elseif ($this->_var['show_goods_thumb'] == 2): ?>
                  <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" class="goods_thumb" /></a>
                <?php else: ?>
                  <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" class="goods_thumb" /></a><br />
                  <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><?php echo $this->_var['goods']['goods_name']; ?></a>
                <?php endif; ?>
                <?php if ($this->_var['goods']['parent_id'] > 0): ?>
                <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
                <?php endif; ?>
                <?php if ($this->_var['goods']['is_gift'] > 0): ?>
                <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span>
                <?php endif; ?>
              <?php else: ?>
              <?php echo $this->_var['goods']['goods_name']; ?>
              <?php endif; ?>
              

            </td>
            <?php if ($this->_var['show_goods_attribute'] == 1): ?>
            <td><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
            <?php endif; ?>
            <?php if ($this->_var['show_marketprice']): ?>
            <td align="right"><?php echo $this->_var['goods']['market_price']; ?></td>
            <?php endif; ?>
            <td align="right"><?php echo $this->_var['goods']['goods_price']; ?></td>
            <td align="right">
              <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
              <input type="text" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="4" style="text-align:right " />
              <?php else: ?>
              <?php echo $this->_var['goods']['goods_number']; ?>
              <?php endif; ?>
            </td>
            <td align="right"><?php echo $this->_var['goods']['subtotal']; ?></td>
            <td align="center">
              <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; "><?php echo $this->_var['lang']['drop']; ?></a>
              <?php if ($_SESSION['user_id'] > 0): ?>
              <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_to_collect&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; "><?php echo $this->_var['lang']['drop_to_collect']; ?></a>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
        <table width="100%" border="0" style="border-top:1px dotted #DADADA;">
          <tr>
            <td>
            <?php if ($this->_var['discount'] > 0): ?><?php echo $this->_var['your_discount']; ?><br /><?php endif; ?>
            <?php echo $this->_var['shopping_money']; ?><?php if ($this->_var['show_marketprice']): ?>，<?php echo $this->_var['market_price_desc']; ?><?php endif; ?>
            </td>
            <td align="right"><span style="border-top:1px dotted #DADADA;">
              <input type="button" value="<?php echo $this->_var['lang']['clear_cart']; ?>" onclick="location.href='flow.php?step=clear'" />
              <input name="submit" type="submit" value="<?php echo $this->_var['lang']['update_cart']; ?>" />
            </span></td>
          </tr>
        </table>
        <input type="hidden" name="step" value="update_cart" />
      </form>
      <br />
      <table width="100%" border="0">
        <tr>
          <td><a href="./"><img src="themes/default/images/continue.gif" alt="continue" width="130" height="30" border="0" /></a></td>
          <td align="right"><a href="flow.php?step=checkout"><img src="themes/default/images/checkout.gif" alt="checkout" width="130" height="30" border="0" /></a></td>
        </tr>
      </table>
    <?php if ($_SESSION['user_id'] > 0): ?>
    <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js')); ?>
    <script type="text/javascript" charset="utf-8">
      function collect_to_flow(goodsId)
      {
        var goods        = new Object();
        var spec_arr     = new Array();
        var fittings_arr = new Array();
        var number       = 1;
        goods.spec     = spec_arr;
        goods.goods_id = goodsId;
        goods.number   = number;
        goods.parent   = 0;
        Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), collect_to_flow_response, 'POST', 'JSON');
      }
      function collect_to_flow_response(result)
      {
        if (result.error > 0)
        {
          // 如果需要缺货登记，跳转
          if (result.error == 2)
          {
            if (confirm(result.message))
            {
              location.href = 'user.php?act=add_booking&id=' + result.goods_id;
            }
          }
          else if (result.error == 6)
          {
            if (confirm(result.message))
            {
              location.href = 'goods.php?id=' + result.goods_id;
            }
          }
          else
          {
            alert(result.message);
          }
        }
        else
        {
          location.href = 'flow.php';
        }
      }
    </script>
    <?php if ($this->_var['collection_goods']): ?>
    <div class="title-div"><img src="themes/default/images/my_favorite.gif" alt="goods" width="158" height="39" /></div>
    <table width="95%" border="0" align="center">
    <?php $_from = $this->_var['collection_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <tr>
          <td><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a></td>
          <td align="right"><a href="javascript:collect_to_flow(<?php echo $this->_var['goods']['goods_id']; ?>)"><img src="themes/default/images/add_cart.gif" alt="Add to cart" width="87" height="20" /></a></td>
        </tr>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </table>
    <?php endif; ?>
    <?php endif; ?>

      <?php if ($this->_var['favourable_list']): ?>
      <div class="title-div"><img src="themes/default/images/gifts.gif" alt="goods" width="158" height="39" /></div>
      <?php $_from = $this->_var['favourable_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'favourable');if (count($_from)):
    foreach ($_from AS $this->_var['favourable']):
?>
      <form action="flow.php" method="post">
        <table width="100%"  border="0" align="center">
          <tr>
            <td><div align="right"><?php echo $this->_var['lang']['favourable_name']; ?></div></td>
            <td><strong><?php echo $this->_var['favourable']['act_name']; ?></strong></td>
          </tr>
          <tr>
            <td><div align="right"><?php echo $this->_var['lang']['favourable_period']; ?></div></td>
            <td><?php echo $this->_var['favourable']['start_time']; ?> --- <?php echo $this->_var['favourable']['end_time']; ?></td>
          </tr>
          <tr>
            <td><div align="right"><?php echo $this->_var['lang']['favourable_range']; ?></div></td>
            <td><?php echo $this->_var['lang']['far_ext'][$this->_var['favourable']['act_range']]; ?><br /><?php echo $this->_var['favourable']['act_range_desc']; ?></td>
          </tr>
          <tr>
            <td><div align="right"><?php echo $this->_var['lang']['favourable_amount']; ?></div></td>
            <td><?php echo $this->_var['favourable']['formated_min_amount']; ?> --- <?php echo $this->_var['favourable']['formated_max_amount']; ?></td>
          </tr>
          <tr>
            <td><div align="right"><?php echo $this->_var['lang']['favourable_type']; ?></div></td>
            <td>
              <span class="STYLE1"><?php echo $this->_var['favourable']['act_type_desc']; ?></span>
              <?php if ($this->_var['favourable']['act_type'] == 0): ?>
              <?php $_from = $this->_var['favourable']['gift']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gift');if (count($_from)):
    foreach ($_from AS $this->_var['gift']):
?><br />
                <input type="checkbox" value="<?php echo $this->_var['gift']['id']; ?>" name="gift[]" />
                <a href="goods.php?id=<?php echo $this->_var['gift']['id']; ?>" target="_blank"><?php echo $this->_var['gift']['name']; ?></a> [<?php echo $this->_var['gift']['formated_price']; ?>]
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endif; ?>          </td>
          </tr>
          <?php if ($this->_var['favourable']['available']): ?>
          <tr>
            <td>&nbsp;</td>
            <td align="center"><input type="image" src="themes/default/images/add_cart.gif" alt="Add to cart"  border="0" /></td>
          </tr>
          <?php endif; ?>
        </table><hr />
        <input type="hidden" name="act_id" value="<?php echo $this->_var['favourable']['act_id']; ?>" />
        <input type="hidden" name="step" value="add_favourable" />
      </form>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endif; ?>
      <?php endif; ?>

      <?php if ($this->_var['step'] == "consignee"): ?>
      
      <div class="title-div"><img src="themes/default/images/consignee.gif" alt="Consignee" width="158" height="39" /></div>
      <?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>
      <script type="text/javascript">
        region.isAdmin = false;
        <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        
        onload = function() {
          if (!document.all)
          {
            document.forms['theForm'].reset();
          }
        }
        
      </script>
      
      <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
      <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)"><?php echo $this->fetch('library/consignee.lbi'); ?></form>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <?php endif; ?>
      <?php if ($this->_var['step'] == "checkout"): ?>
      
      <script type="text/javascript">
      var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
      var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";
      </script>
      <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkOrderForm(this)">
        <div class="title-div"><span class="modify"><!--
        <?php if ($this->_var['allow_edit_cart']): ?> 是否允许修改购物车 --><a href="flow.php"><img src="themes/default/images/modify.gif" alt="<?php echo $this->_var['lang']['modify']; ?>" /></a><!--
        <?php endif; ?> --></span><img src="themes/default/images/cart_goods.gif" alt="goods" width="158" height="39" /></div>
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
          <tr>
            <th><?php echo $this->_var['lang']['goods_name']; ?></th>
            <th><?php echo $this->_var['lang']['goods_attr']; ?></th>
            <?php if ($this->_var['show_marketprice']): ?>
            <th><?php echo $this->_var['lang']['market_prices']; ?></th>
            <?php endif; ?>
            <th><?php if ($this->_var['gb_deposit']): ?><?php echo $this->_var['lang']['deposit']; ?><?php else: ?><?php echo $this->_var['lang']['shop_prices']; ?><?php endif; ?></th>
            <th><?php echo $this->_var['lang']['number']; ?></th>
            <th><?php echo $this->_var['lang']['subtotal']; ?></th>
          </tr>
          <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <tr>
            <td><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><?php echo $this->_var['goods']['goods_name']; ?></a>
              <?php if ($this->_var['goods']['parent_id'] > 0): ?>
              <span style="color:#FF0000">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
              <?php elseif ($this->_var['goods']['is_gift']): ?>
              <span style="color:#FF0000">（<?php echo $this->_var['lang']['largess']; ?>）</span>
              <?php endif; ?></td>
            <td><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
            <?php if ($this->_var['show_marketprice']): ?>
            <td align="right"><?php echo $this->_var['goods']['formated_market_price']; ?></td>
            <?php endif; ?>
            <td align="right"><?php echo $this->_var['goods']['formated_goods_price']; ?></td>
            <td align="right"><?php echo $this->_var['goods']['goods_number']; ?></td>
            <td align="right"><?php echo $this->_var['goods']['formated_subtotal']; ?></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php if (! $this->_var['gb_deposit']): ?>
          <tr>
            <td colspan="7" style="border-top:1px dotted #DADADA;">
            <?php if ($this->_var['discount'] > 0): ?><?php echo $this->_var['your_discount']; ?><br /><?php endif; ?>
            <?php echo $this->_var['shopping_money']; ?><?php if ($this->_var['show_marketprice']): ?>，<?php echo $this->_var['market_price_desc']; ?><?php endif; ?>
            </td>
          </tr>
          <?php endif; ?>
        </table>
        <div class="title-div"><span class="modify"><a href="flow.php?step=consignee"><img src="themes/default/images/modify.gif" alt="<?php echo $this->_var['lang']['modify']; ?>" /></a></span><img src="themes/default/images/consignee.gif" alt="goods" width="158" height="39" /></div>
        <table width="100%" border="0" align="center" cellspacing="3">
          <tr>
            <td><?php echo $this->_var['lang']['consignee_name']; ?>:</td>
            <td><?php echo htmlspecialchars($this->_var['consignee']['consignee']); ?></td>
            <td><?php echo $this->_var['lang']['email_address']; ?>:</td>
            <td><?php echo htmlspecialchars($this->_var['consignee']['email']); ?></td>
          </tr>
          <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
          <tr>
            <td><?php echo $this->_var['lang']['detailed_address']; ?>:</td>
            <td><?php echo htmlspecialchars($this->_var['consignee']['address']); ?> </td>
            <td><?php echo $this->_var['lang']['postalcode']; ?>:</td>
            <td><?php echo htmlspecialchars($this->_var['consignee']['zipcode']); ?></td>
          </tr>
          <?php endif; ?>
          <tr>
            <td><?php echo $this->_var['lang']['phone']; ?>:</td>
            <td><?php echo $this->_var['consignee']['tel']; ?> </td>
            <td><?php echo $this->_var['lang']['backup_phone']; ?>:</td>
            <td><?php echo htmlspecialchars($this->_var['consignee']['mobile']); ?></td>
          </tr>
           <?php if ($this->_var['total']['real_goods_count'] > 0): ?>
          <tr>
            <td><?php echo $this->_var['lang']['sign_building']; ?>:</td>
            <td><?php echo htmlspecialchars($this->_var['consignee']['sign_building']); ?> </td>
            <td><?php echo $this->_var['lang']['deliver_goods_time']; ?>:</td>
            <td><?php echo htmlspecialchars($this->_var['consignee']['best_time']); ?></td>
          </tr>
          <?php endif; ?>
        </table>
        <?php if ($this->_var['total']['real_goods_count'] != 0): ?>
        <div class="title-div"><img src="themes/default/images/shipping.gif" alt="shipping" width="158" height="39" /></div>
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" id="shippingTable">
          <tr>
            <th width="5%">&nbsp;</th>
            <th width="25%"><?php echo $this->_var['lang']['name']; ?></th>
            <th><?php echo $this->_var['lang']['describe']; ?></th>
            <th width="15%"><?php echo $this->_var['lang']['fee']; ?></th>
            <th width="15%"><?php echo $this->_var['lang']['free_money']; ?></th>
            <th width="15%"><?php echo $this->_var['lang']['insure_fee']; ?></th>
          </tr>
          <?php $_from = $this->_var['shipping_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?>
          <tr>
            <td valign="top"><input name="shipping" type="radio" value="<?php echo $this->_var['shipping']['shipping_id']; ?>" <?php if ($this->_var['order']['shipping_id'] == $this->_var['shipping']['shipping_id']): ?>checked="true"<?php endif; ?> supportCod="<?php echo $this->_var['shipping']['support_cod']; ?>" insure="<?php echo $this->_var['shipping']['insure']; ?>" onclick="selectShipping(this)" />
            </td>
            <td valign="top"><strong><?php echo $this->_var['shipping']['shipping_name']; ?></strong></td>
            <td valign="top"><?php echo $this->_var['shipping']['shipping_desc']; ?></td>
            <td align="right" valign="top"><?php echo $this->_var['shipping']['format_shipping_fee']; ?></td>
            <td align="right" valign="top"><?php echo $this->_var['shipping']['free_money']; ?></td>
            <td align="right" valign="top"><?php if ($this->_var['shipping']['insure'] != 0): ?><?php echo $this->_var['shipping']['insure_formated']; ?><?php else: ?><?php echo $this->_var['lang']['not_support_insure']; ?><?php endif; ?></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <tr>
            <td colspan="6" align="right"><label for="ECS_NEEDINSURE">
              <input name="need_insure" id="ECS_NEEDINSURE" type="checkbox"  onclick="selectInsure(this.checked)" value="1" <?php if ($this->_var['order']['need_insure']): ?>checked="true"<?php endif; ?> <?php if ($this->_var['insure_disabled']): ?>disabled="true"<?php endif; ?>  />
              <?php echo $this->_var['lang']['need_insure']; ?> </label></td>
          </tr>
        </table>
        <?php else: ?>
        <input name = "shipping" type="radio" value = "-1" checked="checked"  style="display:none"/>
        <?php endif; ?>
        <div class="title-div"><img src="themes/default/images/payment.gif" alt="payment" width="158" height="39" /></div>
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" id="paymentTable">
          <tr>
            <th width="5%">&nbsp;</th>
            <th width="20%"><?php echo $this->_var['lang']['name']; ?></th>
            <th><?php echo $this->_var['lang']['describe']; ?></th>
            <th width="15%"><?php echo $this->_var['lang']['pay_fee']; ?></th>
          </tr>
          <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
          
          <tr>
            <td valign="top"><input type="radio" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" <?php if ($this->_var['order']['pay_id'] == $this->_var['payment']['pay_id']): ?>checked<?php endif; ?> isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?>/></td>
            <td valign="top"><strong><?php echo $this->_var['payment']['pay_name']; ?></strong></td>
            <td valign="top"><?php echo $this->_var['payment']['pay_desc']; ?></td>
            <td align="right" valign="top"><?php echo $this->_var['payment']['format_pay_fee']; ?></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
        <?php if ($this->_var['pack_list']): ?>
        <div class="title-div"><img src="themes/default/images/package.gif" alt="package" width="158" height="39" /></div>
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" id="packTable">
          <tr>
            <th width="5%" scope="col">&nbsp;</th>
            <th width="35%" scope="col"><?php echo $this->_var['lang']['name']; ?></th>
            <th width="22%" scope="col"><?php echo $this->_var['lang']['price']; ?></th>
            <th width="22%" scope="col"><?php echo $this->_var['lang']['free_money']; ?></th>
            <th scope="col"><?php echo $this->_var['lang']['img']; ?></th>
          </tr>
          <tr>
            <td valign="top"><input type="radio" name="pack" value="0" <?php if ($this->_var['order']['pack_id'] == 0): ?>checked="true"<?php endif; ?> onclick="selectPack(this)" /></td>
            <td valign="top"><strong><?php echo $this->_var['lang']['no_pack']; ?></strong></td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <?php $_from = $this->_var['pack_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pack');if (count($_from)):
    foreach ($_from AS $this->_var['pack']):
?>
          <tr>
            <td valign="top"><input type="radio" name="pack" value="<?php echo $this->_var['pack']['pack_id']; ?>" <?php if ($this->_var['order']['pack_id'] == $this->_var['pack']['pack_id']): ?>checked="true"<?php endif; ?> onclick="selectPack(this)" />
            </td>
            <td valign="top"><strong><?php echo $this->_var['pack']['pack_name']; ?></strong></td>
            <td valign="top"><div align="right"><?php echo $this->_var['pack']['format_pack_fee']; ?></div></td>
            <td valign="top"><div align="right"><?php echo $this->_var['pack']['format_free_money']; ?></div></td>
            <td valign="top"><div align="center">
                <?php if ($this->_var['pack']['pack_img']): ?>
                <a href="<?php echo $this->_var['data_dir']; ?>/packimg/<?php echo $this->_var['pack']['pack_img']; ?>" target="_blank"><?php echo $this->_var['lang']['view']; ?></a>
                <?php else: ?>
                <?php echo $this->_var['lang']['no']; ?>
                <?php endif; ?>
              </div></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
        <?php endif; ?>
        <?php if ($this->_var['card_list']): ?>
        <div class="title-div"><img src="themes/default/images/card.gif" alt="card" width="158" height="39" /></div>
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" id="cardTable">
          <tr>
            <th width="5%" scope="col">&nbsp;</th>
            <th width="35%" scope="col"><?php echo $this->_var['lang']['name']; ?></th>
            <th width="22%" scope="col"><?php echo $this->_var['lang']['price']; ?></th>
            <th width="22%" scope="col"><?php echo $this->_var['lang']['free_money']; ?></th>
            <th scope="col"><?php echo $this->_var['lang']['img']; ?></th>
          </tr>
          <tr>
            <td valign="top"><input type="radio" name="card" value="0" <?php if ($this->_var['order']['card_id'] == 0): ?>checked="true"<?php endif; ?> onclick="selectCard(this)" /></td>
            <td valign="top"><strong><?php echo $this->_var['lang']['no_card']; ?></strong></td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
          <?php $_from = $this->_var['card_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
          <tr>
            <td valign="top"><input type="radio" name="card" value="<?php echo $this->_var['card']['card_id']; ?>" <?php if ($this->_var['order']['card_id'] == $this->_var['card']['card_id']): ?>checked="true"<?php endif; ?> onclick="selectCard(this)"  />
            </td>
            <td valign="top"><strong><?php echo $this->_var['card']['card_name']; ?></strong></td>
            <td valign="top"><div align="right"><?php echo $this->_var['card']['format_card_fee']; ?></div></td>
            <td valign="top"><div align="right"><?php echo $this->_var['card']['format_free_money']; ?></div></td>
            <td valign="top"><div align="center">
                <?php if ($this->_var['card']['card_img']): ?>
                <a href="<?php echo $this->_var['data_dir']; ?>/cardimg/<?php echo $this->_var['card']['card_img']; ?>" target="_blank"><?php echo $this->_var['lang']['view']; ?></a>
                <?php else: ?>
                <?php echo $this->_var['lang']['no']; ?>
                <?php endif; ?>
              </div></td>
          </tr>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <tr>
            <td></td>
            <td valign="top"><strong><?php echo $this->_var['lang']['bless_note']; ?>:</strong></td>
            <td colspan="3"><textarea name="card_message" cols="60" rows="3" style="width:auto"><?php echo htmlspecialchars($this->_var['order']['card_message']); ?></textarea></td>
          </tr>
        </table>
        <?php endif; ?>
        <div class="title-div"><img src="themes/default/images/order_others.gif" alt="" width="158" height="39" /></div>
        <table width="100%" border="0" align="center" cellspacing="3">
          <?php if ($this->_var['allow_use_surplus']): ?>
          <tr>
            <td width="20%"><strong><?php echo $this->_var['lang']['use_surplus']; ?>: </strong></td>
            <td><input name="surplus" type="text" id="ECS_SURPLUS" size="10" value="<?php echo empty($this->_var['order']['surplus']) ? '0' : $this->_var['order']['surplus']; ?>" onblur="changeSurplus(this.value)" <?php if ($this->_var['disable_surplus']): ?>disabled="disabled"<?php endif; ?> />
              <?php echo $this->_var['lang']['your_surplus']; ?><?php echo empty($this->_var['your_surplus']) ? '0' : $this->_var['your_surplus']; ?> <span id="ECS_SURPLUS_NOTICE" class="notice"></span></td>
          </tr>
          <?php endif; ?>
          <?php if ($this->_var['allow_use_integral']): ?>
          <tr>
            <td><strong><?php echo $this->_var['lang']['use_integral']; ?></strong></td>
            <td><input name="integral" type="text" id="ECS_INTEGRAL" onblur="changeIntegral(this.value)" value="<?php echo empty($this->_var['order']['integral']) ? '0' : $this->_var['order']['integral']; ?>" size="10" />
              <?php echo $this->_var['lang']['can_use_integral']; ?>:<?php echo empty($this->_var['your_integral']) ? '0' : $this->_var['your_integral']; ?> <?php echo $this->_var['points_name']; ?>，<?php echo $this->_var['lang']['noworder_can_integral']; ?><?php echo $this->_var['order_max_integral']; ?>  <?php echo $this->_var['points_name']; ?>. <span id="ECS_INTEGRAL_NOTICE" class="notice"></span></td>
          </tr>
          <?php endif; ?>
          <?php if ($this->_var['allow_use_bonus']): ?>
          <tr>
            <td><strong><?php echo $this->_var['lang']['use_bonus']; ?>:</strong></td>
            <td>
              <?php echo $this->_var['lang']['select_bonus']; ?>
              <select name="bonus" onchange="changeBonus(this.value)" id="ECS_BONUS">
                <option value="0" <?php if ($this->_var['order']['bonus_id'] == 0): ?>selected<?php endif; ?>><?php echo $this->_var['lang']['please_select']; ?></option>
                <?php $_from = $this->_var['bonus_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bonus');if (count($_from)):
    foreach ($_from AS $this->_var['bonus']):
?>
                <option value="<?php echo $this->_var['bonus']['bonus_id']; ?>" <?php if ($this->_var['order']['bonus_id'] == $this->_var['bonus']['bonus_id']): ?>selected<?php endif; ?>><?php echo $this->_var['bonus']['type_name']; ?>[<?php echo $this->_var['bonus']['bonus_money_formated']; ?>]</option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>

              <?php echo $this->_var['lang']['input_bonus_no']; ?>
              <input name="bonus_sn" type="text" size="15" />
              <input name="validate_bonus" type="button" value="<?php echo $this->_var['lang']['validate_bonus']; ?>" onclick="validateBonus(document.forms['theForm'].elements['bonus_sn'].value)" />
            </td>
          </tr>
          <?php endif; ?>
          <?php if ($this->_var['inv_content_list']): ?>
          <tr>
            <td><strong><?php echo $this->_var['lang']['invoice']; ?>:</strong>
              <input name="need_inv" type="checkbox" id="ECS_NEEDINV" onclick="changeNeedInv()" value="1" <?php if ($this->_var['order']['need_inv']): ?>checked="true"<?php endif; ?> />
            </td>
            <td>
              <?php if ($this->_var['inv_type_list']): ?>
              <?php echo $this->_var['lang']['invoice_type']; ?><select name="inv_type" id="ECS_INVTYPE" <?php if ($this->_var['order']['need_inv'] != 1): ?>disabled="true"<?php endif; ?> onchange="changeNeedInv()">
              <?php echo $this->html_options(array('options'=>$this->_var['inv_type_list'],'selected'=>$this->_var['order']['inv_type'])); ?></select>
              <?php endif; ?>
              <?php echo $this->_var['lang']['invoice_title']; ?>
              <input name="inv_payee" type="text" id="ECS_INVPAYEE" size="20" <?php if (! $this->_var['order']['need_inv']): ?>disabled="true"<?php endif; ?> value="<?php echo $this->_var['order']['inv_payee']; ?>" onblur="changeNeedInv()" />
              <?php echo $this->_var['lang']['invoice_content']; ?>
              <select name="inv_content" id="ECS_INVCONTENT" <?php if ($this->_var['order']['need_inv'] != 1): ?>disabled="true"<?php endif; ?>  onchange="changeNeedInv()">

              <?php echo $this->html_options(array('values'=>$this->_var['inv_content_list'],'output'=>$this->_var['inv_content_list'],'selected'=>$this->_var['order']['inv_content'])); ?>

              </select></td>
          </tr>
          <?php endif; ?>
          <tr>
            <td valign="top"><strong><?php echo $this->_var['lang']['order_postscript']; ?>:</strong></td>
            <td><textarea name="postscript" cols="80" rows="3" id="postscript"><?php echo htmlspecialchars($this->_var['order']['postscript']); ?></textarea></td>
          </tr>
          <?php if ($this->_var['how_oos_list']): ?>
          <tr>
            <td><strong><?php echo $this->_var['lang']['booking_process']; ?>:</strong></td>
            <td><?php $_from = $this->_var['how_oos_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('how_oos_id', 'how_oos_name');if (count($_from)):
    foreach ($_from AS $this->_var['how_oos_id'] => $this->_var['how_oos_name']):
?>
              <label>
              <input name="how_oos" type="radio" value="<?php echo $this->_var['how_oos_id']; ?>" <?php if ($this->_var['order']['how_oos'] == $this->_var['how_oos_id']): ?>checked<?php endif; ?> onclick="changeOOS(this)" />
              <?php echo $this->_var['how_oos_name']; ?></label>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </td>
          </tr>
          <?php endif; ?>
        </table>
        <div class="title-div"><img src="themes/default/images/order_total.gif" alt="total" width="158" height="39" /></div>
        <div id="ECS_ORDERTOTAL"><?php echo $this->fetch('library/order_total.lbi'); ?></div>
        <div style="border-top: 1px solid #DADADA; padding-top: 20px; text-align:center; margin-top: 5px;">
          <input type="image" src="themes/default/images/order_submit.gif" alt="submit" width="130" height="30" />
          <input type="hidden" name="step" value="done" />
        </div>
      </form>
      <?php endif; ?>
      <?php if ($this->_var['step'] == "done"): ?>
      
      <div style="padding: 10px; border-top: 1px solid #DADADA; text-align: center;" >
        <p style="font-size: 14px;"><?php echo $this->_var['lang']['remember_order_number']; ?>: <strong style="color:red"><?php echo $this->_var['order']['order_sn']; ?></strong>。 </p>
        <table width="80%" border="0" align="center">
          <tr>
            <td align="left"><?php if ($this->_var['order']['shipping_name']): ?><?php echo $this->_var['lang']['select_shipping']; ?>: <strong><?php echo $this->_var['order']['shipping_name']; ?></strong>，<?php endif; ?><?php echo $this->_var['lang']['select_payment']; ?>: <strong><?php echo $this->_var['order']['pay_name']; ?></strong>。<?php echo $this->_var['lang']['order_amount']; ?>: <strong><?php echo $this->_var['total']['amount_formated']; ?></strong></td>
          </tr>
          <tr>
            <td align="left"><?php echo $this->_var['order']['pay_desc']; ?></td>
          </tr>
          <?php if ($this->_var['pay_online']): ?>
          
          <tr>
            <td align="center"><?php echo $this->_var['pay_online']; ?></td>
          </tr>
          <?php endif; ?>
        </table>
        <?php if ($this->_var['virtual_card']): ?>
        <div style="text-align:left;overflow:hidden;border:1px solid #E2C822;background:#FFF9D7;margin:10px;padding:10px 50px 30px;">
        <?php $_from = $this->_var['virtual_card']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'vgoods');if (count($_from)):
    foreach ($_from AS $this->_var['vgoods']):
?>
          <h3 style="color:#2359B1"><?php echo $this->_var['vgoods']['goods_name']; ?></h3>
          <?php $_from = $this->_var['vgoods']['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'card');if (count($_from)):
    foreach ($_from AS $this->_var['card']):
?>
            <ul style="list-style:none;padding:0;margin:0;clear:both">
            <?php if ($this->_var['card']['card_sn']): ?><li style="margin-right:50px;float:left;"><strong><?php echo $this->_var['lang']['card_sn']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_sn']; ?></span></li><?php endif; ?>
            <?php if ($this->_var['card']['card_password']): ?><li style="margin-right:50px;float:left;"><strong><?php echo $this->_var['lang']['card_password']; ?>:</strong><span style="color:red;"><?php echo $this->_var['card']['card_password']; ?></span></li><?php endif; ?>
            <?php if ($this->_var['card']['end_date']): ?><li style="float:left;"><strong><?php echo $this->_var['lang']['end_date']; ?>:</strong><?php echo $this->_var['card']['end_date']; ?></li><?php endif; ?>
            </ul>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
        <?php endif; ?>
        <p><?php echo $this->_var['order_submit_back']; ?>。</p>
      </div>
      <?php endif; ?>
      <?php if ($this->_var['step'] == "login"): ?>
      <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js')); ?>
      <script type="text/javascript">
      <?php $_from = $this->_var['lang']['flow_login_register']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

      
      function checkLoginForm(frm) {
        if (Utils.isEmpty(frm.elements['username'].value)) {
          alert(username_not_null);
          return false;
        }

        if (Utils.isEmpty(frm.elements['password'].value)) {
          alert(password_not_null);
          return false;
        }

        return true;
      }

      function checkSignupForm(frm) {
        if (Utils.isEmpty(frm.elements['username'].value)) {
          alert(username_not_null);
          return false;
        }

        if (Utils.trim(frm.elements['username'].value).match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
        {
          alert(username_invalid);
          return false;
        }

        if (Utils.isEmpty(frm.elements['email'].value)) {
          alert(email_not_null);
          return false;
        }

        if (!Utils.isEmail(frm.elements['email'].value)) {
          alert(email_invalid);
          return false;
        }

        if (Utils.isEmpty(frm.elements['password'].value)) {
          alert(password_not_null);
          return false;
        }

        if (frm.elements['password'].value.length < 6) {
          alert(password_lt_six);
          return false;
        }

        if (frm.elements['password'].value != frm.elements['confirm_password'].value) {
          alert(password_not_same);
          return false;
        }
        return true;
      }
      
      </script>
      
      <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="50%" valign="top"><form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)">
              <div class="title-div"><img src="themes/default/images/sign_in.gif" alt="sign in" width="158" height="39" /></div>
              <br />
              <table width="90%"  border="0" align="center" cellpadding="1" cellspacing="3">
                <tr>
                  <td><div align="right"><strong><?php echo $this->_var['lang']['username']; ?></strong></div></td>
                  <td><input name="username" type="text" id="username" /></td>
                </tr>
                <tr>
                  <td><div align="right"><strong><?php echo $this->_var['lang']['password']; ?></strong></div></td>
                  <td><input name="password" type="password" id="password" /></td>
                </tr>
                <?php if ($this->_var['enabled_login_captcha']): ?>
                <tr>
                  <td><div align="right"><strong><?php echo $this->_var['lang']['comment_captcha']; ?>:</strong></div></td>
                  <td><input type="text" size="8" name="captcha" />
                  <img src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?is_login=1&'+Math.random()" /> </td>
                </tr>
                <?php endif; ?>
                <tr>
                  <td colspan="2"><div align="center"><a href="user.php?act=get_password"><?php echo $this->_var['lang']['forgot_password']; ?></a></div></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="center">
                      <input type="submit" name="login" value="<?php echo $this->_var['lang']['forthwith_login']; ?>" />
                      <?php if ($this->_var['anonymous_buy'] == 1): ?>
                      <input type="button" value="<?php echo $this->_var['lang']['direct_shopping']; ?>" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" />
                      <?php endif; ?>
                      <input name="act" type="hidden" value="signin" />
                    </div></td>
                </tr>
              </table>
            </form></td>
          <td valign="top" style="border-left: 1px solid #DADADA;"><form action="flow.php?step=login" method="post" name="registerForm" id="registerForm" onsubmit="return checkSignupForm(this)">
              <div class="title-div"><img src="themes/default/images/register.gif" alt="sign up" width="158" height="39" /></div>
              <br />
              <table width="90%"  border="0" align="center" cellpadding="1" cellspacing="3">
                <tr>
                  <td><div align="right"><strong><?php echo $this->_var['lang']['username']; ?></strong></div></td>
                  <td><input name="username" type="text" id="username" /></td>
                </tr>
                <tr>
                  <td><div align="right"><strong><?php echo $this->_var['lang']['email_address']; ?></strong></div></td>
                  <td><input name="email" type="text" id="email" /></td>
                </tr>
                <tr>
                  <td><div align="right"><strong><?php echo $this->_var['lang']['password']; ?></strong></div></td>
                  <td><input name="password" type="password" id="password" /></td>
                </tr>
                <tr>
                  <td><div align="right"><strong><?php echo $this->_var['lang']['confirm_password']; ?></strong></div></td>
                  <td><input name="confirm_password" type="password" id="confirm_password" /></td>
                </tr>
                <?php if ($this->_var['enabled_register_captcha']): ?>
                <tr>
                  <td><div align="right"><strong><?php echo $this->_var['lang']['comment_captcha']; ?>:</strong></div></td>
                  <td><input type="text" size="8" name="captcha" />
                  <img src="captcha.php?<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;" onClick="this.src='captcha.php?'+Math.random()" /> </td>
                </tr>
                <?php endif; ?>
                <tr>
                  <td colspan="2"><div align="center">
                      <input type="submit" name="register" value="<?php echo $this->_var['lang']['forthwith_register']; ?>" />
                      <input name="act" type="hidden" value="signup" />
                    </div></td>
                </tr>
              </table>
            </form></td>
        </tr>
        <?php if ($this->_var['need_rechoose_gift']): ?>
        <tr>
          <td colspan="2" align="center" style="border-top:1px #ccc solid; padding:5px; color:red;"><?php echo $this->_var['lang']['gift_remainder']; ?></td>
        </tr>
        <?php endif; ?>
      </table>
      
      <?php endif; ?>
    </div>
    <?php echo $this->fetch('library/help.lbi'); ?><?php echo $this->fetch('library/page_footer.lbi'); ?></div>
  <div style="float:left;"><img src="themes/default/images/page_right.gif" alt="" /></div>
</div>

</body>
</html>
