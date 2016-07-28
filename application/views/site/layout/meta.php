<?php
$row=$this->db->get_where('backadmin', array('id'=>1))->row_array();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8">
    <meta name="author" content="<?=$row['webtitle'];?>" />
    <title><?=$row['webtitle'];?></title>
    <meta name="decription" content="<?=$row['description'];?>"/>
    <!-- meta keywords -->
    <meta name="keywords" content="<?=$row['keyword']?>" />
    <meta property="og:title" content="<?=$row['webtitle'];?>" />
    <meta property="og:description" content="<?=$row['description'];?>" />
    <meta property="og:image" content="<?=base_url(); ?>public/site/images/logos/lo10.png" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/order.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/chosen.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/flaticon-enterprise.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/streamline-icon.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/easy-responsive-tabs.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/lightbox.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/flexslider.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/YTPlayer.css" />

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Herr+Von+Muellerhoff' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/recentcolor-corporate.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/tablesaw.stackonly.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/custom.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/site/css/style.css" />

</head>
<body>
