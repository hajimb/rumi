<?php 
	ini_set('session.gc_maxlifetime', 1800); // 30 minutes (60*30)
	session_start();
	$host = $_SERVER['HTTP_HOST'];
	if($host=="localhost" || $host=="localhost:8080" || strtoupper($host)=="ARSHAD-PC"){ //  On Localhost
		$basepath = "http://".$host."/rumi/saintangelovnct/web/";
	}else{
		$basepath = "https://".$host."/";
	}
if(empty($pagename) || $pagename==''){$pagename='';}
if(empty($page_title) || $page_title==''){ $page_title='The White Villas by St. Angelos VNCT Ventures Pvt Ltd';}
if(empty($meta_keyword) || $meta_keyword==''){ $meta_keyword=$page_title;}
if(empty($meta_desc) || $meta_desc==''){ $meta_desc=$page_title;}
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<title><?php echo $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="<?php echo $meta_desc; ?>">
    <meta name="keyword" content="<?php echo $meta_keyword; ?>">
    <link rel="shortcut icon" href="<?php echo $basepath; ?>favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="<?php echo $basepath; ?>favicon.ico" type="im/x-icon"/>

	<!--animation -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/main.css">
	<!--Lead Form Notification-->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/lead.css">
	<!--Meganeu -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/megamenu.css">
	<!--Popular -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/popular.css">
	<!-- Shortcodes -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/shortcodes.css">
	<!--Responsive -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/responsive.css">
	<!--woocomerce -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/woocommerce.css">
	<!-- Slide show -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/vendor/cbpBGSlideshow.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/vendor/font-awesome.min.css">
	<!-- Icon box -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/icon-box.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/icon-font-style.css">
	<!-- Portfolio  -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/portfolio.css">
	<!-- Bootstraps -->
	<link rel="stylesheet" type="text/css" href="<?php echo $basepath; ?>css/bootstrap.css"> 
	<!-- JQuery -->
<?php if($pagename=="success"){?>
<!--  Put you success page code here-->

<?php } ?>
	<script src="<?php echo $basepath; ?>js/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="<?php echo $basepath; ?>js/jquery/jquery-migrate.min.js" type="text/javascript"></script>
	<script src="<?php echo $basepath; ?>js/main.js" type="text/javascript"></script>
	<script src="<?php echo $basepath; ?>js/lead.js" type="text/javascript"></script>
	<script src="<?php echo $basepath; ?>js/flexslider.js"></script>
    <script src="<?php echo $basepath; ?>js/jquery.smooth-scroll.min.js"></script>
    <script src="<?php echo $basepath; ?>js/custom.js"></script>

<!--
	<script src="js/jquery/modernizr.js" type="text/javascript"></script>
	<script src="js/jquery/jquery.cbpBGSlideshow.js" type="text/javascript"></script>
	<script src="js/jquery/jquery.themepunch.tools.min.js" type="text/javascript"></script>
	<script src="js/jquery/jquery.themepunch.revolution.min.js" type="text/javascript"></script>-->
<!--	<script src="js/jquery/owl.carousel.js" type="text/javascript"></script>
	<script src="js/jquery/owl.carousel.min.js" type="text/javascript"></script>-->

	<!-- Isotope-->
<!--
	<script type='text/javascript' src="js/isotope/isotope.js"></script>
	<script type='text/javascript' src="js/isotope/portfolio.js"></script>
	<script type='text/javascript' src="js/isotope/jquery.imageloaded.min.js"></script>
	<script type='text/javascript' src="js/isotope/stickyMojo.js"></script>
	<script type='text/javascript' src="js/isotope/idangerous.swiper.js"></script>
	<script type='text/javascript' src="js/isotope/expandable.js"></script>
	<script type='text/javascript' src='js/isotope/jquery.stellar.min.js'></script>
	<script type='text/javascript' src='js/isotope/instafeed.min.js'></script>-->
	
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<!--    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
-->    
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<!--    <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
-->
	<!-- Lightbox-->
    <link rel="stylesheet" href="<?php echo $basepath; ?>lightbox/css/lightbox.css">
	<script src="<?php echo $basepath; ?>lightbox/js/lightbox.min.js"></script>
<!-- Facebook Audience Code for The VNCT -->


<?php if ($pagename == 'thankyou'){ ?>
<!-- Facebook Conversion Code for The VNCt -->

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1507377936189899');
fbq('track', "PageView");
fbq('track', 'Lead');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1507377936189899&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<?php } ?>

</head>
<body class="offcanvas-type-default  offcanvas-right">
<div id="preloader">
    <div class="loading-data"></div>
</div>
