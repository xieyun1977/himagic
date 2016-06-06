/* $Id : dp_flow.js 4865 2016-06-03 14:04:10Z xieyun $ */


/* *
 * 检查提交的订单表单
 */
function checkOrderForm(frm)
{
  var paymentSelected = false;
  // 检查是否选择了支付配送方式
  for (i = 0; i < frm.elements.length; i ++ )
  {
    if (frm.elements[i].name == 'payment' && frm.elements[i].value)
    {
      paymentSelected = true;
    }
  }

  if ( ! checkConsignee(frm))
  {
   // alert('请检查取票信息');
    return false;
  }

  if ( ! paymentSelected)
  {
    alert('请选择支付方式');
    return false;
  }
return true;
}

/* *
 * 检查收货地址信息表单中填写的内容
 */
function checkConsignee(frm)
{
	//alert('aaaa'+(Utils.isTel(frm.elements['phone'].value)));
  var msg = new Array();
  var err = false;

  if (Utils.isEmpty(frm.elements['username'].value))
  {
    err = true;
    msg.push("姓名不能为空");
  }

  if (frm.elements['idno'] && Utils.isEmpty(frm.elements['idno'].value))
  {
    err = true;
    msg.push("身份证不能为空");
  }

  if (frm.elements['phone'] && (!Utils.isTel(frm.elements['phone'].value)))
  {
    err = true;
    msg.push("手机号码不能为空");
  }

  if (err)
  {
    message = msg.join("\n");
    alert(message);
  }
  return ! err;
}
