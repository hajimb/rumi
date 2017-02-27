<?php 
$page_title='';
$meta_keyword='';
$meta_desc='';
include('top.php'); 
?>
	<div class="home-page">
		<div class="k2t-container">
			<!-- Header -->
			<header class="k2t-header">
             
			<?php include('header.php'); ?>	

			<div class="k2t-body k2t-wrap"> <!-- k2t-body -->
				<div class="k2t-content no-sidebar" style="margin-top:2px;"> <!-- k2t-content -->
                	<div class="k2t-row no-margin-bottom ">
	                    <div class="k2t-container" style="padding:0 15px 0 0 ;">
    		                <div class="vc_col-sm-9"><img src="images/inner-page-1.jpg" alt="" />
                                
                    		</div>
                            <div class="vc_col-sm-3">
                                <?php include('enquiry_form.php'); ?>
                            </div>
	                 	</div>
                    </div>
					<!-- k2t-row -->
					<div class="k2t-row wpb_row " style="width:100%;height:400px;">
						<iframe src="http://www.inspiringconversations.in/" style="width:100%; height:100%;margin:15px;border:1px solid #fefefe;" seamless></iframe>
					</div> 
				</div> <!-- k2t-content End -->
			</div> <!-- k2t-body End -->

			<!--.k2t-footer -->
			<?php include('footer.php'); ?>
			 <!-- k2t-footer End -->
		</div>		
	</div>
<?php include('bottom.php'); ?>