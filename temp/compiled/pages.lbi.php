<form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <?php if ($this->_var['pager']['styleid'] == 0): ?>
    <div id="pager"> <?php echo $this->_var['lang']['pager_1']; ?><?php echo $this->_var['pager']['record_count']; ?><?php echo $this->_var['lang']['pager_2']; ?><?php echo $this->_var['lang']['pager_3']; ?><?php echo $this->_var['pager']['page_count']; ?><?php echo $this->_var['lang']['pager_4']; ?> <span> <a href="<?php echo $this->_var['pager']['page_first']; ?>"><?php echo $this->_var['lang']['page_first']; ?></a> <a href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a> <a href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a> <a href="<?php echo $this->_var['pager']['page_last']; ?>"><?php echo $this->_var['lang']['page_last']; ?></a> </span>
        <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item']; ?>" />
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <select name="page" id="page" onchange="selectPage(this)">
            <?php echo $this->html_options(array('options'=>$this->_var['pager']['array'],'selected'=>$this->_var['pager']['page'])); ?>
        </select>
    </div>
    <?php else: ?>
    <div id="pager" class="btn-sz">
    <!--<div id="pager" class="pages">  <em><?php echo $this->_var['pager']['record_count']; ?></em> -->
        <?php if ($this->_var['pager']['page_first']): ?><a class="first" href="<?php echo $this->_var['pager']['page_first']; ?>">1 ...</a><?php endif; ?><?php if ($this->_var['pager']['page_prev']): ?><a class="prev" href="<?php echo $this->_var['pager']['page_prev']; ?>"><</a><?php endif; ?>
        <?php $_from = $this->_var['pager']['page_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        <?php if ($this->_var['pager']['page'] == $this->_var['key']): ?>
        <a href="" class="btn-actives"> <?php echo $this->_var['key']; ?></a>
        <?php else: ?>
        <a href="<?php echo $this->_var['item']; ?>"><?php echo $this->_var['key']; ?></a>
        <?php endif; ?>

        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php if ($this->_var['pager']['page_next']): ?><a class="next" href="<?php echo $this->_var['pager']['page_next']; ?>">></a><?php endif; ?><?php if ($this->_var['pager']['page_last']): ?><a class="last" href="<?php echo $this->_var['pager']['page_last']; ?>">...<?php echo $this->_var['pager']['page_count']; ?></a><?php endif; ?>
        <?php if ($this->_var['pager']['page_kbd']): ?>
        <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
        <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item']; ?>" />
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <kbd><input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" /></kbd>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</form>
<script type="Text/Javascript" language="JavaScript">
    <!--
    
    function selectPage(sel)
    {
        sel.form.submit();
    }
    
    //-->
</script>
