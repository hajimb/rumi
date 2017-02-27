<?php
error_reporting(0);
session_start();

//include("includes/connection.php");
//include('img_resize.php');

	$success   = 0;
	$suc_msg   = "";
	$error     = 0;
	$err_msg   = "";
	$project			= $_POST['project'];
	$date				= $_POST['date'];
	$my_file	 	   	= $_POST['my-file-selector'];
	$format_date		= date_format(date_create($date),"dS M Y");
	$text_date			= date_format(date_create($date),"Ymd");
	
	$target_dir			= "../documents/";

	if(isset($_POST['submitbtn'])){
		if(isset($_FILES["my-file-selector"])){
			if ( $_FILES["my-file-selector"]["type"] == "application/pdf"){
					if ($_FILES["my-file-selector"]["error"] > 0){
						if(($_FILES["my-file-selector"]["size"] > 10485760)){      
							$error    = 1;
							$err_msg  = "File Size Gteater than 10MB";
						}
					}else{

						$newfilename = $_FILES["my-file-selector"]["name"];
						$target_file 	= $target_dir.$newfilename;
						if (!file_exists($target_file)) {
							move_uploaded_file($_FILES["my-file-selector"]["tmp_name"],$target_file );
							$strlead = $project.",".$newfilename.",".$format_date.",".$text_date;
							writeToFile($strlead,"documents");
							$success= 1;
							$_SESSION['msg']= "Project Status Saved Successfully.";
							$err_msg  = "Project Status Saved Successfully.";
						}else{
							$error    = 1;
							$err_msg  = "File already exist.";
						}
					}
				}else{
					$error    = 1;
					$err_msg  = "Invalid File type";
				}

		}
	}else{
		$error    = 1;
		$err_msg  = "Form not submitted";
	}
	echo json_encode(array('success' => "$success",  'suc_msg' => "$suc_msg", 'error' => "$error",  'err_msg' => "$err_msg"));


function writeToFile($str, $filename){
		$dataString = $str;
		$dataString .= "\n";
		$filename= "../".$filename.".csv";
		$fWrite = fopen($filename,"a");
		$wrote = fwrite($fWrite, $dataString);
		fclose($fWrite);
	
}
?>