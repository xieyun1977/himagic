<div class="book-left shopping-left">
  <ul>
    <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
    <li><a href="<?php echo $this->_var['cat']['url']; ?>" <?php if ($this->_var['category'] == $this->_var['cat']['id']): ?>class="bk-active" <?php endif; ?>>
      <h3><?php echo htmlspecialchars($this->_var['cat']['name']); ?></h3><small><?php echo htmlspecialchars($this->_var['cat']['desc']); ?></small></a></li>

    <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
    <li><a href="<?php echo $this->_var['child']['url']; ?>" <?php if ($this->_var['category'] == $this->_var['child']['id']): ?>class="bk-active" <?php endif; ?>>
      <h3><?php echo htmlspecialchars($this->_var['child']['name']); ?></h3><small><?php echo htmlspecialchars($this->_var['child']['desc']); ?></small></a>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </ul>
</div>