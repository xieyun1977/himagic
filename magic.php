<?php

/**
 * 魔法影音、魔法世界
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}

/*------------------------------------------------------ */
//-- INPUT
/*------------------------------------------------------ */

$_REQUEST['id'] = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
$id     = $_REQUEST['id'];
$aname = get_article_cat_name($id);
//die($aname);
$smarty->assign('page_title',trim($aname));
//if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] < 0)
//{
//    $article_id = $db->getOne("SELECT article_id FROM " . $ecs->table('article') . " WHERE cat_id = '".intval($_REQUEST['cat_id'])."' ");
//}

/*------------------------------------------------------ */
//-- PROCESSOR
/*------------------------------------------------------ */

$cache_id = sprintf('%X', crc32($_REQUEST['id'] . '-' . $_CFG['lang']));

if (!$smarty->is_cached('magic.dwt', $cache_id))
{

    assign_template();
    /* 文章详情 */

    $aname = get_article_cat_name($id);
    if (empty($aname))
    {
        ecs_header("Location: ./\n");
        exit;
    }
//
//    $smarty->assign('article',      $article);
//    $smarty->assign('keywords',     htmlspecialchars($article['keywords']));
//    $smarty->assign('description', htmlspecialchars($article['description']));

    /* 广告设置 */
    $sql="SELECT CONCAT_WS('/','data/afficheimg',ad_code) src,ad_link FROM " .$ecs->table("ad") ."  a," . $ecs->table("ad_position") ." b "
        ." WHERE a.position_id =b.position_id AND b.position_name='$aname'";
//    echo $sql;
    $ad = $db->getAll($sql);
    $smarty->assign('title',trim($aname));
    $smarty->assign('ads', $ad);
    /*获取最新魔术世界文章*/
    $smarty->assign('artciles_list',    get_cat_articles($id,1,4));
    //获取美洲文章
    $smarty->assign('mzlist',    get_cat_articles($id+1));

    //获取欧洲文章
    $smarty->assign('ozlist',    get_cat_articles($id+2));
    //获取亚洲文章
    $smarty->assign('yzlist',    get_cat_articles($id+3));
    //获取大洋洲文章
    $smarty->assign('dyzlist',    get_cat_articles($id+4));
    //获取非洲文章
    $smarty->assign('fzlist',    get_cat_articles($id+5));
    assign_dynamic('magic');
}
    $smarty->display('magic.dwt', $cache_id);
/*------------------------------------------------------ */
//-- PRIVATE FUNCTION
/*------------------------------------------------------ */

/**
 * 获得指定的文章的详细信息
 *
 * @access  private
 * @param   integer     $article_id
 * @return  array
 */
function get_article_info($article_id)
{
    /* 获得文章的信息 */
    $sql = "SELECT a.*, IFNULL(AVG(r.comment_rank), 0) AS comment_rank ".
            "FROM " .$GLOBALS['ecs']->table('article'). " AS a ".
            "LEFT JOIN " .$GLOBALS['ecs']->table('comment'). " AS r ON r.id_value = a.article_id AND comment_type = 1 ".
            "WHERE a.is_open = 1 AND a.article_id = '$article_id' GROUP BY a.article_id";
    $row = $GLOBALS['db']->getRow($sql);

    if ($row !== false)
    {
        $row['comment_rank'] = ceil($row['comment_rank']);                              // 用户评论级别取整
        $row['add_time']     = local_date($GLOBALS['_CFG']['date_format'], $row['add_time']); // 修正添加时间显示

        /* 作者信息如果为空，则用网站名称替换 */
        if (empty($row['author']) || $row['author'] == '_SHOPHELP')
        {
            $row['author'] = $GLOBALS['_CFG']['shop_name'];
        }
    }

    return $row;
}



?>