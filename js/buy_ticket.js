/**
 * Created by Administrator on 2016/6/2.
 */

/* *
 * 添加门票到购物车
 */
function addTicket(no,goodsId)
{
    var goods        = new Object();
    var buydate = '';
    var number       = $('#number'+no).val()==''?1:$('#number'+no).val();
//alert(number)
    goods.buydate     = $('#buydate').val();
    goods.goods_id = goodsId;
    goods.number   = number;
    goods.type     = 2; //订票
    //alert(goods.toJSONString());
    Ajax.call('flow.php?step=add_to_cart', 'goods=' + goods.toJSONString(), addTicketResponse, 'POST', 'JSON');
}


/* *
 * 处理添加商品到购物车的反馈信息
 */
function addTicketResponse(result)
{
    //alert(result.toJSONString());
    if (result.error > 0)
    {
        // 如果需要缺货登记，跳转
        if (result.error == 2)
        {
            if (confirm(result.message))
            {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id + '&spec=' + result.product_spec;
            }
        }
        // 没选规格，弹出属性选择框
        else if (result.error == 6)
        {
            openSpeDiv(result.message, result.goods_id, result.parent);
        }
        else
        {
            alert(result.message);
        }
    }
    else
    {
        var cartInfo = document.getElementById('ECS_CARTINFO');
        var cart_url = 'flow.php?step=cart';
        if (cartInfo)
        {
            cartInfo.innerHTML = result.content;
        }

        if (result.one_step_buy == '1')
        {
            location.href = cart_url;
        }
        if (result.type == '1') //直接购买
        {
            location.href =  'flow.php?step=checkout';
        }
        else if (result.type == '2')  //订票
        {
            location.href = cart_url+'&type=2';
        }
        else
        {
            switch(result.confirm_type)
            {
                case '1' :
                    if (confirm(result.message)) location.href = cart_url;
                    break;
                case '2' :
                    if (!confirm(result.message)) location.href = cart_url;
                    break;
                case '3' :
                    location.href = cart_url;
                    break;
                default :
                    break;
            }
        }
    }
}
