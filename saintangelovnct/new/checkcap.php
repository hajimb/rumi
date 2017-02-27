<?php

function setCaptcha($name){

	$_SESSION['CREATED'] = time();	
	$code=rand(10000,99999);
	$en_code = encryptIt($code);
	$_SESSION[$name]	=	$code;
	return $en_code;
	
}

function CheckCaptcha($name,$code){

	if (isset($_SESSION['CREATED']) && (time() - $_SESSION['CREATED'] > 1800)) {

		$msg = "This session is expired. Please refresh the page and refill the form again.";
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();   // destroy session data in storage
	}else{
		if (strcasecmp($_SESSION[$name], decryptIt($code)) != 0)
		{
			$msg = "This session is expired. Please refresh the page and refill the form again.";
		}
		else
		{
			$msg = "OK";
		}
	}
	return $msg;
}

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}


?>