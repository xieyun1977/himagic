
<?php echo $this->fetch('lib/header.lbi'); ?>


  <link href="/css/common.css" type="text/css" rel="stylesheet">
  <link href="/css/dppage.css" type="text/css" rel="stylesheet">
  <script src="/js/jquery-1.8.2.min.js" type="text/javascript"></script>
  <script src="/js/custom3.js" type="text/javascript"></script>
  <script type="text/javascript" src="layer/layer.js"></script>

<div id="bosess">

  
  <section id="inside-pages">
    <div class="pages-title"><img src="/images/mp_xx/shopping.png"><img src="/images/mp_xx/shopping_title.png"></div>

    <div class="pages-boxs">
      <div class="back-all">
        
        <?php echo $this->fetch('lib/category_tree.lbi'); ?>

        <div class="book-right">
          <div class="shop_search">
          <div class="search-box">
            <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()">
              <input name="keywords" placeholder="搜索从这里开始" class="search-input" type="text" id="keyword" value="<?php echo htmlspecialchars($this->_var['search_keywords']); ?>" />
              <button class="scimg"><img src="/images/mp_xx/sc-img.png"></button>
            </form>
          </div>
          </div>
          <div class="shop_list">
            <h6>魔咪商城 > <?php echo $this->_var['name']; ?></h6>
            <ul>
              <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
              <?php if ($this->_var['goods']['goods_id']): ?>
              <li>
                <div class="shop-imgs">
                  <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods']['goods_name']; ?>" /></a>
                </div>
                <a href="<?php echo $this->_var['goods']['url']; ?>"><h3>
                  <?php if ($this->_var['goods']['goods_style_name']): ?>
                  <?php echo $this->_var['goods']['goods_style_name']; ?>
                  <?php else: ?>
                  <?php echo $this->_var['goods']['goods_name']; ?>
                  <?php endif; ?>
                </h3></a>
                <h5>
                <?php if ($this->_var['show_marketprice']): ?>
                <em><?php echo $this->_var['goods']['market_price']; ?></em>
                <?php endif; ?>
                <?php if ($this->_var['goods']['promote_price'] != ""): ?>
                <em><?php echo $this->_var['goods']['promote_price']; ?></em>
                <?php else: ?>
                <?php echo $this->_var['goods']['shop_price']; ?></h5>
                <?php endif; ?>
              </li>
              <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
          </div>
          <?php echo $this->fetch('lib/pages.lbi'); ?>
        </div>

      </div>

    </div>

  
  <?php echo $this->fetch('lib/foot.lbi'); ?>



