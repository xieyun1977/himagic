<?php
/**
 * �����ļ�
 * header����
 *
 */
/* ȡ�õ�ǰecshop���ڵĸ�Ŀ¼ */
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
//���ļ�
$file = fopen($filepath[$n],"r");
header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header("Accept-Ranges: bytes");
header("Accept-Length:".filesize($filepath[$n]));
header('Content-Disposition: attachment; filename='.basename($filepath[$n]));
//�޸�֮ǰ��һ���Խ����ݴ�����ͻ���
echo @fread($file, filesize($filepath[$n]));
//�޸�֮��һ��ֻ����1024���ֽڵ����ݸ��ͻ���
//��ͻ��˻�������
$buffer=1024;//
//�ж��ļ��Ƿ����
while (!feof($file)) {
    //���ļ������ڴ�
    $file_data=fread($file,$buffer);
    //ÿ����ͻ��˻���1024���ֽڵ�����
    echo $file_data;
}
fclose($file);

?>
