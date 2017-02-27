<?php
session_start();
$msg = "";
$userid = "";

if($_POST) {
	if($_POST["submit"]=="Login"){
		$userid= $_POST["username"];
		$pwd=$_POST["password"];

		$handle = fopen("user.txt", "r");
		if ($handle) {
			while (($line = fgets($handle)) !== false) {
				// process the line read.
				$msg = "UserName not found.";
				$line = str_replace("\n","",$line);
				$line = str_replace("\r","",$line);
				$line = str_replace("\n\r","",$line);
				$usr = explode(",",$line);
				//var_dump($usr);
				//echo "Username ".$userid." got<br>";
				//echo "Username ".$usr[0]." txt <br>";
				if($usr[0] == $userid){
					//echo "Username ".$userid." found<br>";
					$msg = "Invalid Password";
					//echo "password ".$pwd." got<br>";
					//echo "password ".$usr[1]." txt <br>";
					if($pwd == $usr[1]){
						$_SESSION["saintangelovnct_lead_user"] = $userid;
						//echo "password ".$pwd." found<br>";
						$msg="login";
						//break ;
					}			
				}
				if($msg=="login"){ break;}
			}
			fclose($handle);
		} else {
			// error opening the file.
		}
		if($msg=="login"){
				header('Location: lead.php');
				exit();
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Leads Report of St Angelo's VNCT Venture Pvt Ltd.</title>
</head>

<body>
<div style="text-align:center;margin-top:20%;margin-left:25%;">
<div class="CSSTableGenerator" >
<form name="frmlogin" action="index.php" method="post"  autocomplete="off" onsubmit="return validate();">
<table cellspacing="2" cellpadding="2" border=0>
<tr>
<td colspan=2>Login</td>
</tr>
<tr>
<td>User Name</td>
<td><input type="text" name="username" id="username" value="<?php echo $userid; ?>" /></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password" id="password" value="" /></td>
</tr>
<tr>
<td colspan="2"><center><input type="submit" name="submit" value="Login" /></center></td>
</tr>
<?php if($msg != "" ){ ?>
<tr>
<td colspan="2"><center><?php echo $msg; ?></center></td>
</tr>
<?php } ?>
</table>
</form>
</div>
</div>
</body>
</html>
<script>
function validate(){
	if($("#username".val()==""){
		alert("Please enter Username.");
		return false;
	}
	if($("#psd".val()==""){
		alert("Please enter Password.");
		return false;
	}
	
}
</script>
<style>
.CSSTableGenerator {
	margin:0px;
	padding:0px;
	width:50%;
	border:1px solid #000000;
/*	box-shadow: 10px 10px 5px #888888;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
*/
}

.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	eight:100%;
	margin:0px;padding:0px;
}
.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}
.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}
.CSSTableGenerator tr:hover td{
	
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#e5e5e5; }
.CSSTableGenerator tr:nth-child(even){ background-color:#ffffff; }
.CSSTableGenerator td{
	vertical-align:middle;
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
	font-size:13px;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
	background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);	
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
	background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");	background: -o-linear-gradient(top,#cccccc,b2b2b2);
	background-color:#cccccc;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:14px;
	font-family:Arial;
	font-weight:bold;
	color:#000000;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #cccccc 5%, #b2b2b2 100%);	
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #b2b2b2) );
	background:-moz-linear-gradient( center top, #cccccc 5%, #b2b2b2 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#b2b2b2");	background: -o-linear-gradient(top,#cccccc,b2b2b2);
	background-color:#cccccc;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
.top{
	background-color:#000;
	padding:7px;
	margin-bottom:5px;
	border:0px solid #000;
}
.leftpanel{
	display: inline-flex;
	width:50%;
}
.rightpanel{
	display: inline-flex;
	float:right;
}
a{
	text-decoration:none;
	color:#fff;
	font-family:verdana;
}
a:hover, a:active{
	text-decoration:underline;
}
</style>