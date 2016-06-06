<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->_var['page_title']; ?></title>

    <link href="css/common.css" type="text/css" rel="stylesheet">

    <link href="/css/account.css" type="text/css" rel="stylesheet">

    <link href="css/inside.css" type="text/css" rel="stylesheet">
 
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script>
    <script src="js/jscarousel.js" type="text/javascript"></script>
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>

    
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/lightbox/themes/default/jquery.lightbox.css" />
    <script type="text/javascript" src="js/lightbox/jquery.lightbox.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.lightbox').lightbox();
        });
    </script>

</head>

<body>

<?php echo $this->fetch('lib/menu.lbi'); ?>
