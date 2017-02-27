<?php 
$page_title='';
$meta_keyword='';
$meta_desc='';
$pagetype	=	"slider";
$pagename	=	"gallerypage";
include('top.php'); 
?>
<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 	0; left: 0; width: 100%; height: 100%; }</style>
	<?php include('header1.php'); ?>	
	<div class="slider">
		<div class="k2t-container">
			<div class="k2t-body" > <!-- k2t-body -->
				<div class="k2t-content no-sidebar" style="text-align:center;"> <!-- k2t-content -->
                	<div class="k2t-row no-margin-bottom ">
	                    <div class="k2t-container" id="slider-div" style="padding:0;">
    		                <div class="vc_col-sm-12" style="padding:0;">
                                <section class="slider" style="margin-top:0px;">
                                <div class="banner home">
                                  <ul class="slides">
                                    <!--<li> 
										<a href="#"><img src="images/slider/The-White-Villas-Shahapur-1.jpg" alt="" /></a>
									</li>-->
                                    <li> 
										<img src="images/white_villas_oragadam.jpeg" alt="" />
									</li>
                                  </ul>
                                </div>
                                </section>
                    		</div>
	                 	</div>
                    </div>
				</div> <!-- k2t-content End -->
			</div> <!-- k2t-body End -->

			<!--.k2t-footer -->
			<?php include('footer.php'); ?>
			 <!-- k2t-footer End -->
		</div>		
	</div>
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

/*	var running		=	false;
	var runningShow	=	false;
	var stoped 		= 	false;
	var lastID		= 	2;
	var ShownID		= 	2;

	function last_msg_funtion(){ 
	   running=true;
	   var ID = $(".message_box:last").attr("id");
		$('div#last_msg_loader').html('<div style="height:50px;valign:middle;"><img src="<?php echo $basepath; ?>images/ajax-loader.gif"></div>');
		var url ="<?php echo $basepath; ?>load_first.php?project=twv&last_box_id="+ID;
		$.get(url, function(data) {
			//alert(data);	
			//dym = data;
			if (data != "") {
				//alert('ee');
				$(".message_box:last").append(data);
				lastID = parseInt(ID)+1;
				$("#"+lastID).show(1000);
				$('div#last_msg_loader').empty();
				//console.log("1 lastID:"+lastID);
				running = false;
				last_msg_funtion()
			}else{
				lastID = parseInt(ID);
				$('div#last_msg_loader').empty();
				//console.log("2 lastID:"+lastID);
				running=true;
			}
		 });
	};  

		
	$(window).on('load', function (e) {
		last_msg_funtion();

	});
*/
	</script>
