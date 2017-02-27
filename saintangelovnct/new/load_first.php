<?php 
	header('Access-Control-Allow-Origin: *');  

	$host = $_SERVER['HTTP_HOST'];
	if($host=="localhost" || $host=="localhost:8080" || strtoupper($host)=="ARSHAD-PC"){ //  On Localhost
		$basepath = "http://".$host."/rumi/saintangelovnct/new/";
	}else{
		$basepath = "https://".$host."/";
	}

	$last_box_id 	= 	$_GET['last_box_id'];
	$project		=	$_GET['project'];

	if(!isset($last_box_id) || $last_box_id == ""){
		$last_box_id 	=	'1';
	}	
	$loadPage = $project."_".$last_box_id.".php";
	if(file_exists($loadPage)){
		$loadPage = $basepath.$project."_".$last_box_id.".php";
		$last_box_id 	=	intval($last_box_id)+1;
		$rtnText = file_get_contents($loadPage);
		echo '<div id="'.$last_box_id.'" class="message_box" style="display:none;">';
		echo  $rtnText;
		echo '</div>';
	}else{
		echo '';
	}	
	
?>