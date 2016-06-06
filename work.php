<?php

/**
 * work
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}
$work=$_GET['act'];
/*
 * 正在开发中页面
 */
assign_template();

//商城
if($work=='mall')
{
    assign_dynamic('mall');
    $smarty->display('mall.dwt');
}
elseif($work=='book')
{
    assign_dynamic('book');
    $smarty->display('book.dwt');
}

?>