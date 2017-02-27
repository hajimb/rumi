<?php 
	ini_set('session.gc_maxlifetime', 1800); // 30 minutes (60*30)
	session_start();
	$basepath = '';
	$host = $_SERVER['HTTP_HOST'];
	if($host=="localhost" || $host=="localhost:8080" || strtoupper($host)=="ARSHAD-PC"){ //  On Localhost
		$basepath = "http://".$host."/rumi/saintangelovnct/new/";
	}else{
		$basepath = "https://".$host."/";
	}
if(empty($pagename) || $pagename==''){$pagename='';}
if(empty($page_title) || $page_title==''){ $page_title='St. Angelos VNCT Ventures';}
if(empty($meta_keyword) || $meta_keyword==''){ $meta_keyword=$page_title;}
if(empty($meta_desc) || $meta_desc==''){ $meta_desc=$page_title;}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $page_title; ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta name="description" content="<?php echo $meta_desc; ?>">
<meta name="keyword" content="<?php echo $meta_keyword; ?>">

<link rel="shortcut icon" href="<?php echo $basepath; ?>favicon.ico" type="image/x-icon"/>
<link rel="icon" href="<?php echo $basepath; ?>favicon.ico" type="im/x-icon"/>

<!--link rel="stylesheet" href="css/slider.css"-->
<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/main.css">
<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/lead.css">
<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/icon-box.css">
<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/shortcodes.css">
<link rel="stylesheet" href="<?php echo $basepath; ?>css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/vendor/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo $basepath; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $basepath; ?>js/flexslider.js"></script>
<script src="<?php echo $basepath; ?>js/main.js"></script>
<script src="<?php echo $basepath; ?>js/lead.js"></script>
<?php if($pagename=="gallerypage"){ ?>
<!-- Lightbox-->
<link rel="stylesheet" href="<?php echo $basepath; ?>lightbox/css/lightbox.css">
<script src="<?php echo $basepath; ?>lightbox/js/lightbox.min.js"></script>
<?php } ?>
</head>
<body class="offcanvas-type-default  offcanvas-right">
<div id="preloader">
    <div class="loading-data"></div>
</div>