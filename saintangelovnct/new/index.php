<?php
$page_title='';
$meta_keyword='';
$meta_desc='';
$pagetype="slider";
include('top.php');
?>
<body style="overflow:hidden;">
<!-- Fixed navbar -->
	<?php include('header.php'); ?>    
	<div style="width:100%;text-align:center;">
        <section class="slider">
            <div class="banner home">
                <ul class="slides">
                    <li> 
                        <a href="the-white-villas-shahapur-shahpur-mumbai-thane-maharastra-india.php"><img src="images/1-the-white-villas-shahapur1.jpg" alt="" /></a>
                    </li>
                    <li> 
                        <a href="vnct-lotus-villas-in-madurai.php"><img src="images/2-vnct-lotus-villas-madurai1.jpg" alt="" /></a>
                    </li>
                    <li> 
                        <a href="the-white-house-luxury-flats-in-coimbatore.php"><img src="images/3-the-white-house-coimbatore1.jpg" alt="" /></a>
                    </li>
                    <li> 
                        <a href="vnct-square-villas-in-madurai.php"><img src="images/4-vnct-square-madurai1.jpg" alt="" /></a>
                    </li>
                </ul>
            </div>
			<?php include('buttons.php'); ?>
        </section>

	</div>
<?php include('footer.php'); ?>
</body>
</html>
<script>
$( ".slider" )
  .on( "mouseenter", function() {
		$(".flex-direction-nav a").css("display","block");
  })
  .on( "mouseleave", function() {
		$(".flex-direction-nav a").css("display","none");
  });

</script>

