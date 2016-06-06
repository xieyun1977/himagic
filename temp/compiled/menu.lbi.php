
<header>
    <?php if ($this->_var['navigator_list']['top']): ?>
    <div class="topnav">
        <ul>
        <?php $_from = $this->_var['navigator_list']['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'nav');$this->_foreach['nav_top_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_top_list']['total'] > 0):
    foreach ($_from AS $this->_var['k'] => $this->_var['nav']):
        $this->_foreach['nav_top_list']['iteration']++;
?>
            <li>
                <?php if ($_SESSION['user_id']): ?>
                <?php if ($this->_var['k'] > 1): ?>
                <?php //var_dump($_SESSION)?>
                <a href="<?php echo $this->_var['nav']['url']; ?>"  <?php if ($this->_var['nav']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a>
                <?php elseif ($_SESSION['user_id'] && $this->_var['k'] == 1): ?>
                <div class="has_lohhed" style="float:center;margin-top: 5px;">
                    <div class="names" style="font-size:12px;color:#480902;float:left;text-shadow:2px 2px 4px #583106;"><?php echo $_SESSION['user_name']; ?></div>
                    <a href="/user.php?act=logout" class="dels" style="background:none;float:left;font-size:12px;color:#480902;margin-left:8px;text-shadow:2px 2px 4px #583106;">退出</a>
                </div>
                <?php endif; ?>
                <?php else: ?>
                <a href="<?php echo $this->_var['nav']['url']; ?>"  <?php if ($this->_var['nav']['opennew'] == 1): ?> target="_blank" <?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a>
                <?php endif; ?>
				<?php if ($this->_var['k'] == 2): ?>
            <ul class="topsub">
                    <li><a href="/user.php">账号管理</a></li>
                    <li><a href="">我的订单</a></li>
                </ul>
				<?php endif; ?>
            </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>
    <?php endif; ?>
    <nav>
        <ul>
        <?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['k'] => $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
            <li <?php if ($this->_var['k'] == 2): ?> class="navrights"<?php endif; ?>><a href="<?php echo $this->_var['nav']['url']; ?>" <?php if ($this->_var['nav']['opennew'] == 1): ?>target="_blank" <?php endif; ?> <?php if ($this->_var['nav']['active'] == 1): ?> class="cur"<?php endif; ?>><?php echo $this->_var['nav']['name']; ?></a></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </nav>
    <div class="logo"><a href="/"><img src="themes/default/images/logo.png"></a></div>
    <?php if ($this->_var['navigator_list']['bottom']): ?>
    <div class="smallbac">
        <ul>
            <li>&nbsp;</li>
            <li>&nbsp;</li>
            <?php $_from = $this->_var['navigator_list']['bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'nav');$this->_foreach['nav_bottom_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_bottom_list']['total'] > 0):
    foreach ($_from AS $this->_var['k'] => $this->_var['nav']):
        $this->_foreach['nav_bottom_list']['iteration']++;
?>
            <?php if ($this->_var['nav']['name'] == "魔幻影音"): ?><li class="navrights"><a href="<?php echo $this->_var['nav']['url']; ?>">魔幻影音</a><?php endif; ?>
            <?php if ($this->_var['nav']['name'] == "魔幻游戏"): ?><a href="<?php echo $this->_var['nav']['url']; ?>">魔幻游戏</a> </li><?php endif; ?>

            <?php if ($this->_var['nav']['name'] == "文化产品"): ?><li><a href="<?php echo $this->_var['nav']['url']; ?>">文化产品</a> <?php endif; ?>
            <?php if ($this->_var['nav']['name'] == "主题公园"): ?><a href="<?php echo $this->_var['nav']['url']; ?>">主题公园</a> </li><?php endif; ?>

            <?php if ($this->_var['nav']['name'] == "魔咪商城"): ?><li><a href="<?php echo $this->_var['nav']['url']; ?>">魔咪商城</a><?php endif; ?>
            <?php if ($this->_var['nav']['name'] == "在线订票"): ?><a href="<?php echo $this->_var['nav']['url']; ?>">在线订票</a> </li><?php endif; ?>

            <?php if ($this->_var['nav']['name'] == "集团简介"): ?><li> <?php endif; ?>
            <?php if ($this->_var['nav']['name'] == "品牌文化"): ?> <a href="<?php echo $this->_var['nav']['url']; ?>">品牌文化</a><?php endif; ?>
            <?php if ($this->_var['nav']['name'] == "联系我们"): ?> <a href="<?php echo $this->_var['nav']['url']; ?>">联系我们</a></li><?php endif; ?>
             <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>
    <?php endif; ?>
</header>


<section id="topimgs"><img src="themes/default/images/logotext.png"></section>
