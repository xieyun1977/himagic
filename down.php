<?php
/**
 * 下载文件
 * header函数
 *
 */
/* 取得当前ecshop所在的根目录 */
define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)));
$n=$_GET['act'];
/*
$filepath['q_mw']=ROOT_PATH."/data/download/q_mw.ssf";
$filepath['kty']=ROOT_PATH."/data/download/kty.ssf";
$filepath['bqb']=ROOT_PATH."/data/download/bqb-100k.zip";
//var_dump(filesize($filepath[$n]));
if(strripos($n,"h")>0)
$filepath[$n]=ROOT_PATH."/data/download/".$n.".jpg";
*/
$filepath[$n]=ROOT_PATH.$n;
//打开文件
$file = fopen($filepath[$n],"r");
header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header("Accept-Ranges: bytes");
header("Accept-Length:".filesize($filepath[$n]));
header('Content-Disposition: attachment; filename='.basename($filepath[$n]));
//修改之前，一次性将数据传输给客户端
echo @fread($file, filesize($filepath[$n]));
//修改之后，一次只传输1024个字节的数据给客户端
//向客户端回送数据
$buffer=1024;//
//判断文件是否读完
while (!feof($file)) {
    //将文件读入内存
    $file_data=fread($file,$buffer);
    //每次向客户端回送1024个字节的数据
    echo $file_data;
}
fclose($file);

?>
