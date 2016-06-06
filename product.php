<?php

/**
 * 魔幻公园
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
$article_id     = $_REQUEST['id'];

if(isset($_REQUEST['cat_id']) && $_REQUEST['cat_id'] < 0)
{
    $article_id = $db->getOne("SELECT article_id FROM " . $ecs->table('article') . " WHERE cat_id = '".intval($_REQUEST['cat_id'])."' ");
}

/*------------------------------------------------------ */
//-- PROCESSOR
/*------------------------------------------------------ */

$cache_id = sprintf('%X', crc32($_REQUEST['id'] . '-' . $_CFG['lang']));
$act=$_REQUEST['act'];
$position = assign_ur_here();
$smarty->assign('page_title',      $position['title']);    // 页面标题
//var_dump($position['title']);
if (!$smarty->is_cached('product_'.$act.'.dwt', $cache_id))
{
    assign_template();
    /* 文章详情 */
    if($act=='more')
        $article=getmore();  //下载
    elseif($act=='zt')  //主题公园
        $article = get_zt();
    elseif($act=='gbj')  //广播剧
        $article = get_gbj();
    else
        $article = get_article_info($act);

    if (empty($article))
    {
        ecs_header("Location: ./\n");
        exit;
    }

    $smarty->assign('article',      $article);
    $smarty->assign('act',    $act  );
//    die($_REQUEST['act']);
    $smarty->assign('keywords',     htmlspecialchars($article['keywords']));
    $smarty->assign('description', htmlspecialchars($article['description']));
}
   if($act)
       $smarty->display('product_'.$act.'.dwt', $cache_id);
   else
       $smarty->display('product.dwt', $cache_id);
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
function get_article_info($act)
{
    /* 获得文章的信息 */
    $sql = "SELECT a.*, IFNULL(AVG(r.comment_rank), 0) AS comment_rank ".
            "FROM " .$GLOBALS['ecs']->table('article'). " AS a ".
            "LEFT JOIN " .$GLOBALS['ecs']->table('comment'). " AS r ON r.id_value = a.article_id AND comment_type = 1 ".
            "WHERE a.is_open = 1 AND a.link = '"."product.php?act=$act"."' GROUP BY a.article_id";
   //die($sql);
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

//拼出更多下载
function getmore()
{
    $ret="";
    $p_catid=41;//更多下载分类id
//查找分类下的子分类
    $sql="SELECT cat_id FROM ".$GLOBALS['ecs']->table('article_cat')." WHERE parent_id = $p_catid order by sort_order";
//    echo($sql);
    $rows = $GLOBALS['db']->getCol($sql);
   // var_dump($rows);
//获取article
foreach($rows as $cat_id)
{
$sql="select article_id,description,content,file_url from ".$GLOBALS['ecs']->table('article')." where cat_id=$cat_id and is_open=1";
    $rows = $GLOBALS['db']->getAll($sql);
    $ret.='    <div class="dilists"><ul>';
    foreach($rows as $row)
    {
        $cont=str_replace('<p>','',$row['content']);
        $cont=str_replace('</p>','',$cont);
        $ret.='<li><a  name="'.$row['file_url'].'">'.$cont.'</a><p>'.$row['description'].'</p>';
        $ret.='</li>';
//       echo($row['article_id']);
    }
    $ret.='</ul></div>';
}
//    die($ret);
//    die(1);
    return $ret;
//    $_catid=45;
}

function get_zt()
{
    $ret='<div class="pages-title"><img src="images/titles/imgztly.png" alt="" /><img src="images/titles/ztly.png" alt="" /></div><div class="pages-boxs"><div class="products products2">'
        .'<div class="parktab"><ul><li class="parkactive">南京室外主题公园</li><li>苏州湾室外主题公园</li><li>秦皇岛室外主题公园</li></ul></div>';
    $p_catid=18;//更多下载分类id
//查找分类下的子分类
    $sql="SELECT cat_id FROM ".$GLOBALS['ecs']->table('article_cat')." WHERE parent_id = $p_catid order by sort_order";
//    echo($sql);
    $rows = $GLOBALS['db']->getCol($sql);
//     var_dump($rows);
//获取article
    foreach($rows as $cat_id)
    {
        $sql="select article_id,description,content,file_url from ".$GLOBALS['ecs']->table('article')." where cat_id=$cat_id and is_open=1";
        $rows = $GLOBALS['db']->getAll($sql);
        $ret.='<div class="parksshow">';
        foreach($rows as $row)
        {
            $ret.=$row['content'];
//       echo($row['article_id']);
        }
        $ret.='</div>';
    }
    return $ret;
//    $_catid=45;
}
//广播剧
function get_gbj()
{
    $ret='';
    $cat_id=50;//广播剧分类id
        $sql="select article_id,description,content,file_url from ".$GLOBALS['ecs']->table('article')." where cat_id=$cat_id and is_open=1";
        $rows = $GLOBALS['db']->getAll($sql);
    $n=0;
    $return="";
        foreach($rows as $row)
        {
            $ret.='<div class="zwte">';
            $ret.=$row['content'];
            if($n>0)
            {
                $arr = explode("<a",$ret);
                $ret=$arr[0]."<a  class='lightbox' rel='group1'".$arr[1];
                $arr=explode("<img",$ret);
                $tmp=explode("</a>",$arr[1]);
//                var_dump($tmp);
                $ret=$arr[0]."<span class=\"waiks\"><img src=\"images/product/bordergb.png\" alt=\"\"/></span>"
                    ."<span class='waiks2'><img ".$tmp[0]."</span>"
                .'<small><img src="images/annis.png" alt=""/></small>'
                .$tmp[1]."</a>";
//                die($ret);
            }
             $n++;
            $ret.='</div>';
//       echo($row['article_id']);
            $return.=$ret;
            $ret="";
        }

    return $return;
//    $_catid=45;
}
?>