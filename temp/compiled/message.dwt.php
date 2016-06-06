
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
<style>
    .small-backs {
        width: 143px;
        height: 56px;
        text-align: center;
        line-height: 56px;
        border: none;
        font-size: 18px;
        color: #d09137;
        text-shadow: 1px 1px 2px #001;
        cursor: pointer;
        margin-right: 28px;
    }
</style>
<body>
<div id="big-back">
    
    <div id="dl-zc">
        <form class="from-alls">
            <p></p>
    <h1><span>系统提示</span></h1>
            <div class="sub-btn" style="margin-top: 100px;">
                <h2><?php echo $this->_var['message']['content']; ?></h2>
            </div>
        <?php if ($this->_var['message']['url_info']): ?>
          <?php $_from = $this->_var['message']['url_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('info', 'url');if (count($_from)):
    foreach ($_from AS $this->_var['info'] => $this->_var['url']):
?>
            <div class="sub-btn2" >
          <a href="<?php echo $this->_var['url']; ?>" class="small-backs"><?php echo $this->_var['info']; ?></a>
                </div>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>
        </form>
      </div>
    </div>
   </div>
</div>
</body>

</html>