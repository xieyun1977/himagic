
<!doctype html>
<html>

<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>魔法城</title>

    <link href="css/dl-zc.css" type="text/css" rel="stylesheet">
    <script src="js/jquery-1.8.2.min.js"></script>
    
    <?php echo $this->smarty_insert_scripts(array('files'=>'user.js,transport.js')); ?>
</head>

<body>
<div id="big-back">
    
    <div id="dl-zc">
        <form name="formLogin" action="user.php" method="post" onSubmit="return userLogin()" class="from-alls">
            <h1>会员登录</h1>
            <div class="form-group">
                <label for="post" class="control-label"><?php echo $this->_var['lang']['label_username']; ?></label>
                <input type="text" class="form-control" placeholder="请输入用户名" name="username"  onclick="this.value=''">
            </div>
            <div class="form-group">
                <label for="post" class="control-label"><?php echo $this->_var['lang']['label_password']; ?></label>
                <input type="password" class="form-control" name="password" placeholder="密码为4~6个字符">
            </div>
            <?php if ($this->_var['enabled_captcha']): ?>

            <div class="form-group form-group2">
                <input type="text" class="form-control form-yzm" name="captcha" value="验证码"  onclick="this.value=''">
                <div class="yam-text">
                    <a><img id="my_image" src="captcha.php?is_login=1&<?php echo $this->_var['rand']; ?>" alt="captcha" style="vertical-align: middle;cursor: pointer;"
                        /></a>
                    <i id="chgimg">换一张</i>
                </div>
            </div>
            <script>
                 $("#my_image").bind("click", function() {
                    $("#my_image").attr("src","captcha.php?is_login=1&"+Math.random());
                });
                $("#chgimg").bind("click", function() {
                    $("#my_image").attr("src","captcha.php?is_login=1&"+Math.random());
                });
            </script>
            <?php endif; ?>
            <input type="hidden" name="act" value="act_login" />
            <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />
            <div class="wj-post">
                <div class="lefts">
                    <div class="dlmm-yd"><img src="themes/default/images/dl-zc/jzmm2.png"></div>
                    <b>记住密码</b>
                </div>
                <a href="user.php?act=get_password" class="forget-mm">忘记密码</a>
            </div>
            <div class="sub-btn">
                <button type="submit" class="dl-btn" id="small-backs">登录</button>
                <button type="reset" class="reset" id="small-backs">取消</button>
                <a href="user.php?act=register" class="login" id="small-backs">注册</a>
            </div>

        </form>
    </div>
</div>
<script>
    $(".from-alls .wj-post .lefts .dlmm-yd").click(function() {
        $(".from-alls .wj-post .lefts .dlmm-yd img").toggle()
    })
</script>
<script type="text/javascript">
    var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
    <?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
</script>
</body>

</html>