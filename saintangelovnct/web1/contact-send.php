<?php
//ini_set('session.gc_maxlifetime', 1800); // 30 minutes (60*30)
session_start();
include_once('checkcap.php');
$contactbody  = "<html><meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />".
				"<body><b>Dear Administrator,</b><br><br>\n".
				"The Details of Enquiry form are as follows :<br><br>\n".
				"<b>Name </b>		    :%name%<br>\n".
				"<b>Email</b>  	    	:%email%<br>\n".
				"<b>City</b>    		:%city%</b><br>\n".
				"<b>Country</b>    		:%country%</b><br>\n".
				"<b>Mobile</b>    		:%mobile%</b><br>\n".
				"</body></html>";

$feedbackbody  = "<html><meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />".
				"<style>p{font-family:verdana; font-size:14px;}</style>\n".
				"<body><p><b>Dear %name%,</b><br><br>\n".
				"<p>Thank you for your interest expressed in our project <strong>The White Villas, Shahapur, Maharashtra.</strong> We will get in touch with you soon!<br>\n".
				"You can also reach us on India +91 986786 1111 / Dubai +971 528683318 / Malaysia +60 126362155<br><br>\n".
				"With warm regards,<br></p>\n".
				"<strong>Team St. Angelo's VNCT Ventures Pvt Ltd.</strong><br>\n".
				"<a href='http://www.saintangelosvnct.com/'>www.saintangelosvnct.com</a></p>\n".
				"</body></html>";
				
$offerbody  = "<html><meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />".
				"<body><b>Dear Administrator,</b><br><br>\n".
				"The Details of Offer form are as follows :<br><br>\n".
				"<b>Name </b>		    :%name%<br>\n".
				"<b>Mobile</b>    		:%mobile%</b><br>\n".
				"<b>Email</b>  	    	:%email%<br>\n".
				"<b>Venue</b>    		:%venue%</b><br>\n".
				"<b>Project</b>    		:%project%</b><br>\n".
				"<b>Country</b>    		:%country%</b><br>\n".
				"</body></html>";
				

$offer_reply  = "<html><meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />".
				"<style>p{font-family:verdana; font-size:14px;}</style>\n".
				"<body><p><b>Dear %name%,</b><br><br>\n".
				"<p>Thank you for your interest expressed in our project <strong>%project%</strong> We will get in touch with you soon!<br>\n".
				"You can also reach us on India +91 986786 1111 / Dubai +971 528683318 / Malaysia +60 126362155<br><br>\n".
				"With warm regards,<br></p>\n".
				"<strong>Team St. Angelo's VNCT Ventures Pvt Ltd.</strong><br>\n".
				"<a href='http://www.saintangelosvnct.com/'>www.saintangelosvnct.com</a></p>\n".
				"</body></html>";
	$success=0;
	$error=0;
	$suc_msg="";
	$err_msg="";
	
	$todo= $_REQUEST['todo'];
	
	if($todo=="enquiry"){
		SendEnquiry();
	}else if($todo=="offer"){
		SendOffer();
	}
	


function SendEnquiry(){
	global 	$success,$error,$suc_msg,$err_msg,$contactbody,$feedbackbody;

	$code = $_REQUEST['captcha'];
	$captchacode = CheckCaptcha('saintangelovnct_captcha',$code);
	
	if($captchacode != "OK"){
		$err_msg = $captchacode;
		$error = 1;
	}
	else{
		$email    = $_REQUEST['email'];
		$name     = $_REQUEST['name'];
		$mobile   = $_REQUEST['mobile'];
		$city   = $_REQUEST['city'];
		$country   = $_REQUEST['country'];

		$sendname = "St. Angelo's VNCT Ventures Pvt Ltd.";
		$sendfrom = "do-not-reply@saintangelosvnct.com";
		$sendto   = "agnelorajesh@saintangelosvnct.com,geethanagu@saintangelosvnct.com";
 		//$sendto   = "execsecy@vnctventures.com,cmd@saintangelos.com,geethanaguvnctventures@gmail.com,mba.prabha@gmail.com";
		//$sendto	  = "haji@badricomputers.co.in";
		//$sendto  = "haji@badricomputers.co.in";
		$sendbcc  = "";
	
	
		//$sendname="Webmaster @ Darbar Tutorials";
		$subject="Website Lead - [www.saintangelosvnct.com]";
		$msgbody=$contactbody;
		$msgbody=str_replace("%name%",$name, $msgbody);
		$msgbody=str_replace("%email%",$email, $msgbody);
		$msgbody=str_replace("%mobile%",$mobile, $msgbody);
		$msgbody=str_replace("%city%",$city, $msgbody);
		$msgbody=str_replace("%country%",$country, $msgbody);
		date_default_timezone_set('Asia/Kolkata');
		$cur_date = date("d-m-Y h:i:s A");
	//	$cur_date = date("d-m-Y H:i:s");
		$strlead = $cur_date.','.$name.",".$email.",".$mobile.",".$country.",".$city.",The White Villas";
		writeToFile($strlead,"leadform");
		$str="OK";
		$str = SendEmail($sendto, $sendbcc, $sendname, $sendfrom, $subject, $msgbody,"","");
	 	if($str=="OK"){
			$msgbody=$feedbackbody;
			$msgbody=str_replace("%name%",$name, $msgbody);
			$sendname = "St. Angelo's VNCT Ventures Pvt Ltd.";
			$sendto   = $email;
			$sendbcc  = "";
			$subject="Team St. Angelo's VNCT Ventures";

			$str="OK";
			$str = SendEmail($sendto, $sendbcc, $sendname, $sendfrom, $subject, $msgbody,"","");
		 	if($str=="OK"){
				$success=1;
				$suc_msg = "Your request has been received. We Will contact you soon.<br />";
			}else{
				$error=1;
				$err_msg = "There was some problem while sending your request. Please try again.[".$str."]";
			}
		}else{
		 	$error=1;
	 		$err_msg = "There was some problem while sending your request. Please try again.[".$str."]";
		}
	}	
	echo json_encode(array('success' => "$success",  'suc_msg' => "$suc_msg", 'error' => "$error",  'err_msg' => "$err_msg"));
	exit();
}


function SendOffer(){
	global 	$success,$error,$suc_msg,$err_msg,$offerbody,$offer_reply;

	$code = $_REQUEST['captcha'];
	$captchacode = CheckCaptcha('saintangelovnct_offer_captcha',$code);
	
	if($captchacode != "OK"){
		$err_msg = $captchacode;
		$error = 1;
	}
	else{
		$email    = $_REQUEST['email'];
		$name     = $_REQUEST['name'];
		$mobile   = $_REQUEST['mobile'];
		$venue   = $_REQUEST['venue'];
		$project   = $_REQUEST['project'];
		$country= $_REQUEST['country'];
		$sendname = "St. Angelo's VNCT Ventures Pvt Ltd.";
		$sendfrom = "do-not-reply@saintangelosvnct.com";
		$sendto   = "agnelorajesh@saintangelosvnct.com,geethanagu@saintangelosvnct.com";
 		//$sendto   = "execsecy@vnctventures.com,cmd@saintangelos.com,geethanaguvnctventures@gmail.com,mba.prabha@gmail.com";
		//$sendto	  = "haji@badricomputers.co.in";
		//$sendto  = "haji@badricomputers.co.in";
		$sendbcc  = "";
	
	
		//$sendname="Webmaster @ Darbar Tutorials";
		$subject="Website Offer Lead - [www.saintangelosvnct.com]";
		$msgbody=$offerbody;
		$msgbody=str_replace("%name%",$name, $msgbody);
		$msgbody=str_replace("%email%",$email, $msgbody);
		$msgbody=str_replace("%mobile%",$mobile, $msgbody);
		$msgbody=str_replace("%venue%",$venue, $msgbody);
		$msgbody=str_replace("%project%",$project, $msgbody);
		$msgbody=str_replace("%country%",$country, $msgbody);
		date_default_timezone_set('Asia/Kolkata');
		$cur_date = date("d-m-Y h:i:s A");
	//	$cur_date = date("d-m-Y H:i:s");
		$strlead = $cur_date.','.$name.",".$mobile.",".$email.",".$venue.",".$project.",".$country;
		writeToFile($strlead, "offerlead");
		$str="OK";
		$str = SendEmail($sendto, $sendbcc, $sendname, $sendfrom, $subject, $msgbody,"","");
	 	if($str=="OK"){
			$msgbody=$offer_reply;
			$msgbody=str_replace("%name%",$name, $msgbody);
			$msgbody=str_replace("%project%",$project, $msgbody);
			$sendname = "St. Angelo's VNCT Ventures Pvt Ltd.";
			$sendto   = $email;
			$sendbcc  = "";
			$subject="Team St. Angelo's VNCT Ventures";

			$str="OK";
			$str = SendEmail($sendto, $sendbcc, $sendname, $sendfrom, $subject, $msgbody,"","");
		 	if($str=="OK"){
				$success=1;
				$suc_msg = "Your request has been received. We Will contact you soon.<br />";
			}else{
				$error=1;
				$err_msg = "There was some problem while sending your request. Please try again.[".$str."]";
			}
		}else{
		 	$error=1;
	 		$err_msg = "There was some problem while sending your request. Please try again.[".$str."]";
		}
	}	
	echo json_encode(array('success' => "$success",  'suc_msg' => "$suc_msg", 'error' => "$error",  'err_msg' => "$err_msg"));
	exit();
}


function SendFeedback(){
	global 	$success,$error,$suc_msg,$err_msg,$feedbackbody;
	if(empty($_SESSION['fcode']) || strcasecmp($_SESSION['fcode'], $_REQUEST['captcha']) != 0)
		{
			//Note: the captcha code is compared case insensitively. If you want case sensitive match, update the check above to strcmp()
			//echo 'ic';
		$err_msg = "Incorrect Security Code. Please try again.";
		$error = 1;
		}
	else{
		$year = $_REQUEST['year'];
		$name = $_REQUEST['name'];
		$course = $_REQUEST['course'];
		$feedback= $_REQUEST['feedback'];

		$sendname = "rumi";
		$sendfrom = "no-reply@rumitechnology.com";
		$sendto   = "muffadal.haji@gmail.com";
		//$sendto="haji@badricomputers.co.in";
		$sendbcc  = "haji@badricomputers.co.in";
		//$sendbcc="";

	
	
		//$sendname="Webmaster @ Darbar Tutorials";
		$subject="Feedback form at PareshDesaiTutorials.com.";
		$msgbody=$feedbackbody;
		$msgbody=str_replace("%name%",$name, $msgbody);
		$msgbody=str_replace("%course%",$course, $msgbody);
		$msgbody=str_replace("%year%",$year, $msgbody);
		$msgbody=str_replace("%feedback%",$feedback, $msgbody);
		$strlead = $name.",".$email.",".$mobile.",".$course;
		writeToFile($strlead,"leadform");
		$str = SendEmail($sendto, $sendbcc, $sendname, $sendfrom, $subject, $msgbody,"","");
		//$str="OK";
	 	if($str=="OK"){
		 	$success=1;
	 		$suc_msg = "Thanks for your feedback.";
			
		}else{
		 	$error=1;
	 		$err_msg = "There was some problem while sending your request. Please try again.";
		}
	}	
	echo json_encode(array('success' => "$success",  'suc_msg' => "$suc_msg", 'error' => "$error",  'err_msg' => "$err_msg"));
	exit();
}

function writeToFile($str, $filename){
		$dataString = $str;
		$dataString .= "\n";
		$filename= $filename.".csv";
		$fWrite = fopen($filename,"a");
		$wrote = fwrite($fWrite, $dataString);
		fclose($fWrite);
	
	}
function SendMail($to,$from,$message,$subject){
	$ok =	mail($to, $subject, $message, null,'-f'.$from);
	if ($ok) {
	  return "OK";
	} else {
	  //return "Error";
	  return error_get_last();
	}
}
function SendEmail($to, $bcc, $sender_name, $from, $subject, $message, $fileatt, $fileatt_name){
	$fileatt_type = "application/octet-stream"; // File Type 

//			$headers = "From: $from\n"; 
	$headers = "From: $sender_name <$from>\n"; 
	$headers .= "Reply-To: $from"; 
//			$headers = "From: $from";
	if($bcc!=""){
		$headers .= "\nBcc: $bcc";
	}
	
	  // Generate a boundary string

	  $semi_rand = md5(time());
	  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	  
	  // Add the headers for a file attachment
	  $headers .= "\nMIME-Version: 1.0\n" .
				  "Content-Type: multipart/mixed;\n" .
				  " boundary=\"{$mime_boundary}\"";
	
	  // Add a multipart boundary above the plain message
	  $message = "This is a multi-part message in MIME format.\n\n" .
				 "--{$mime_boundary}\n" .
				 "Content-Type: text/html; charset=\"iso-8859-1\"\n" .
				 "Content-Transfer-Encoding: 7bit\n\n" .
				 $message . "\n\n";
		if($fileatt_name!=""){
		//if (file_exists($fileatt)) {
		  $file = fopen($fileatt,'rb');
		  $data = fread($file,filesize($fileatt));
		  fclose($file);
		  // Base64 encode the file data
		  $data = chunk_split(base64_encode($data));
		
		  // Add file attachment to the message
		  $message .= "--{$mime_boundary}\n" .
					  "Content-Type: {$fileatt_type};\n" .
					  " name=\"{$fileatt_name}\"\n" .
					  "Content-Disposition: attachment;\n" .
					  " filename=\"{$fileatt_name}\"\n" .
					  "Content-Transfer-Encoding: base64\n\n" .
					  $data . "\n\n" .
					  "--{$mime_boundary}--\n";
		//}else {
		 //   echo "The file $fileatt does not exist<br>";
	}				
	// Send the message
	//echo $header;
	//ini_set("SMTP","mail.routehosting.com");
	$ok = @mail($to, $subject, $message, $headers);
	if ($ok) {
	  return "OK";
	} else {
	  //return "Error";
	  return error_get_last();
	}
} 

function sendEmailPHPMailer($sendto, $sendbcc, $sendname, $sendfrom, $subject, $msgbody, $fileatt, $fileatt_name){
	include_once 'email/class.phpmailer.php';
	include("email/class.smtp.php"); 
	static $mail = null;
	if ($mail === null) {
		$mail = new PHPMailer();
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "smtp.gmail.com"; // SMTP server
		//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
		// 1 = errors and messages
		// 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
		$mail->Username   = "thevervemumbai@gmail.com";  // GMAIL username
		$mail->Password   = "theverve2013";            // GMAIL password
		$mail->SetFrom($sendfrom, $sendname);		
		$mail->AddReplyTo($sendfrom, $sendname);		
	}
	
	$mail->Subject = $subject;
	$mail->MsgHTML($msgbody);
	$mail->AddAddress($sendto);
	$mail->AddBCC($sendbcc);
	
	if(!$mail->Send()) {
		return $mail->errorMessage();
	} else {
		return 'OK';
	}
	
}
?>
