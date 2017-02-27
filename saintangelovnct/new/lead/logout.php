<?php
	session_start();
	unset($_SESSION['saintangelovnct_lead_user']);
	//delete all sessions
	session_destroy();
	//redirect to form login
	header("location: index.php");
	exit();

?>