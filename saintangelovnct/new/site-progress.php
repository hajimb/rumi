<?php 
$page_title='';
$meta_keyword='';
$meta_desc='';

include('top.php'); 

$total_count = 0;
$project_names = array();
$file_details = array();

$listings = array();
$handle = fopen("documents.csv", "r");
if ($handle) {
	while (($line = fgets($handle)) !== false) {
		// process the line read.
		$line = str_replace("\n","",$line);
		$line = str_replace("\r","",$line);
		$line = str_replace("\n\r","",$line);
		if($line!=""){
			$listings[] = $line;
			$total_count++;
		}
	}
	sort($listings);
	fclose($handle);
}
if($total_count != 0){
	$current_project = "";
	$cnt= -1;
	foreach ($listings as $line) {
		$usr = explode(",",$line);
		$project = $usr[0];
		if($current_project!=$project){
			$project_names[] = $project;
			$cnt++;	
		}
		$current_project=$project;
		$file_details[$cnt][] = $usr;
	}
//	var_dump($file_details);
	for($i=0; $i< count($project_names); $i++){
		array_sort_by_column($file_details[$i], 3);
	}
//	var_dump($file_details);
/*	usort($file_details, function($a, $b) {
		return $a[0][5] - $b[0][5];
	});*/
	//var_dump($file_details[6]);
//	exit();
}

function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

?>
<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 	0; left: 0; width: 100%; height: 100%; }</style>
	<?php include('header.php'); ?>	
	<div class="slider">
		<div class="k2t-container">
			<div class="k2t-body k2t-wrap"> <!-- k2t-body -->
				<div class="k2t-content no-sidebar" style="margin-top:2px;"> <!-- k2t-content -->
					<div class="k2t-row wpb_row no-margin-bottom " style="position: relative;background-color:#f6f6f6;">
						<div class="container">
							<div class="col-12 wpb_column" style="position: relative;">
								<div class="wpb_wrapper"> <!-- wrapper -->
									<h1>Site Progress</h1>
								</div> <!-- wrapper End -->
							</div>
						</div>
					</div> 
					<div class="k2t-row" style="background-color:#fff;  padding-bottom:70px;">
						<div class="container">
							<div class="vc_col-sm-12">
								<div class="wpb_wrapper">
									<div class="k2t-row">
										<div class="container">
<?php
$cnt = count($project_names);
$tl = 12 ;
$rw = $tl / $cnt;

for($i=0; $i< $cnt; $i++){?>
<div class="col-sm-<?php echo $rw; ?> col-md-<?php echo $rw; ?> col-slg-<?php echo $rw; ?> col-xs-<?php echo $tl; ?>" style="position: relative;">
	<div class="wpb_wrapper">
		<div class="k2t-iconbox layout-1 has-shadow" style="background-color:#f6f6f6;">
			<div class="iconbox-text">
				<div class="title  align-center">
					<h3 style="color: #000000;text-transform: inherit;font-size: 18px;" class="h"><?php echo $project_names[$i];?></h3>
				</div>
				<div class="desc align-left">
				<ul class="open-hours">

<?php	
	for($j=0; $j< count($file_details[$i]); $j++){
		echo '<li><span><a href="'.$basepath.'documents/'.$file_details[$i][$j][1].'" target="_blank">'.$file_details[$i][$j][2].'</a></span></li>';		
	}
?>
				</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }?>
										</div>
									</div>                                    

								</div>
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
</body>
</html>