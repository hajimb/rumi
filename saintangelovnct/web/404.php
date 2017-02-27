<?php 
$pagename="404";
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
		
			<div class="k2t-body"> <!-- k2t-body -->
				<div class="k2t-content no-sidebar" style="margin-top:100px;"> <!-- k2t-content -->
					<!-- k2t-row -->
					<div class="k2t-row wpb_row no-margin-bottom "  id="inner-container" style="position: relative;background-color:#f6f6f6;">
						<div class="container">
							<div class="col-12 wpb_column" style="margin-top:100px;">
								<div class="wpb_wrapper"> <!-- wrapper -->
									<h3>404 - Page Not Found</h3>
									<h4>Oops !, You came across a wrong link. never mind, Go Back to <a href=".">Homepage</a></h4>
								</div> <!-- wrapper End -->
							</div>
						</div>
					</div> <!-- k2t-row End -->
				</div> <!-- k2t-content End -->
			</div> <!-- k2t-body End -->
			<!--.k2t-footer -->
			<?php include('footer.php'); ?>
			 <!-- k2t-footer End -->
		</div>		
	</div>
<?php include('bottom.php'); ?>