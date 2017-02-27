<?php
session_start();

	If( ! isset($_SESSION["saintangelovnct_lead_user"]) ){
		header("location: index.php");
		exit();
	}	
	$cur_line ='';
	$total_line ='';
	$total_count = 0;	
	$handle = fopen("../leadform.csv", "r");
	if ($handle) {
		while (($line = fgets($handle)) !== false) {
			// process the line read.
			$line = str_replace("\n","",$line);
			$line = str_replace("\r","",$line);
			$line = str_replace("\n\r","",$line);
			$usr = explode(",",$line);
			$cur_line = "<tr>";
			foreach( $usr as $item){
				$cur_line .= "<td>".$item."</td>";
			
			} 
			$total_count = $total_count + 1;			
			$total_line = $cur_line.''.$total_line;

			//var_dump($usr);
			//echo "Username ".$userid." got<br>";
			//echo "Username ".$usr[0]." txt <br>";

		}
		fclose($handle);
	}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="" />
<meta name="author" content="Mufaddal Haji" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="pragma" content="no-cache" />
<title>Leads Report of Rumi Technology</title>

<style>
.CSSTableGenerator {
	margin:0px;padding:0px;
	overflow: auto;
	width:100%;
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
</head>

<body>
<div class="top">
	<div class="leftpanel"><a href="../leadform.csv">Download Leads</a></div>
    <div class="rightpanel"><a href="logout.php">Logout</a></div>
</div>
<div class="CSSTableGenerator" >
<table cellspacing="2" cellpadding="2" border=0>
<tr>
<td>Date</td>
<td>Name</td>
<td>Email</td>
<td>Mobile No.</td>
<td>Country</td>
<td>City</td>
<td>Project</td>
</tr>
<?php echo $total_line; ?>
</table>
</div>
</body>
</html>