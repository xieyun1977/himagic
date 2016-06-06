<?php

$fp = fsockopen("www.sohu.com", 80, $errno, $errstr, 30);
if (!$fp) {
echo "aaaa";
echo "$errstr ($errno)\n";
}
else
{
echo "bbbb";

    $out = "GET / HTTP/1.1\r\n";

    $out .= "Host: www.aliyun.com\r\n";

    $out .= "Connection: Close\r\n\r\n";

    fwrite($fp, $out);

    while (!feof($fp)) {

        echo fgets($fp, 128);

    }

    fclose($fp);

}

?>
