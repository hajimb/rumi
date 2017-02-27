<?php
	session_start();
	If( ! isset($_SESSION["saintangelovnct_status_user"]) ){
		header("location: index.php");
		exit();
	}
	$msg 	= '';
	$msg_s	=	"none";
	if(isset($_SESSION['msg'])){
		$msg = $_SESSION['msg'];
		unset($_SESSION['msg']);
		$msg_s = "block";
	}	
	$cur_line ='';
	$total_line ='';
	$total_count = 0;	
	$handle = fopen("../documents.csv", "r");
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
<title>Project Status of St Angelo's VNCT Venture Pvt Ltd.</title>

<!--  Bootstrap CSS and JS  -->

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!--  Date picker CSS and JS  -->

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../js/jquery.forms.js"></script> 
<style>
.input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
	z-index: 2;
	margin-left: -1px;
	padding: 6px;
}
#progress-bar {
	background-color: #12CC1A !important;
	height: 20px;
	white-space: nowrap;
    color: #234b23;
	width: 0%;
	-webkit-transition: width .3s;
	-moz-transition: width .3s;
	transition: width .3s;
}
#progress-div {
	border: #0FA015 1px solid;
	padding: 5px 0px;
	margin: 30px 0px;
	border-radius: 4px;
	text-align: center;
	display: none;
}
#progress-status{
	width:100%;
	text-align:center;
}
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
	width:33%;
}

.middlepanel{
	display: inline-flex;
	width:33%;
	text-align:center;
}
.rightpanel{
	display: inline-flex;
	width:33%;
	float:right;
}
.top{
	width:100%;
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
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Project Status</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div style="margin-top:55px;">
</div>
<div class="container-fluid">
<div class="row">
  <div class="col-sm-12">
	<h3><span class="label label-default">Add Project Status</span></h3>
		<div class="alert alert-danger alert-dismissable" style="display:none" id="error">Test</div>
        <div class="alert alert-info alert-dismissable" style="display:none" id="loading">Test</div>
        <div class="alert alert-success alert-dismissable" style="display:<?php echo $msg_s; ?>" id="success"><?php echo $msg; ?></div>
		<div id="progress-div">
	        <div id="progress-bar"></div>
        </div>
        <form class="form-inline" action="upload_status.php" enctype="multipart/form-data" method="post" id="uploadForm">   
        <div class="input-group">
            <span class="input-group-addon">Site Name</span>
            <select class="form-control" name="project" id="project">
                <option value="The White House">The White House</option>
                <option value="VNCT Lotus Villas">VNCT Lotus Villas</option>
                <option value="The White Villas">The White Villas</option>
                <option value="VNCT Square">VNCT Square</option>
            </select>
        </div>
		<div class="input-group">
          <span class="input-group-addon">Date</span>
       	 <div class="date">
            <div class="input-group input-append date" id="datePicker">
                <input type="text" class="form-control" name="date" id="date" />
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
       	 </div>
        </div>
      <div class="form-group">
        <span class='label label-danger' style="padding:10px;" id="upload-file-info"></span>
		<label class="btn btn-warning" for="my-file-selector">
            <input id="my-file-selector" name="my-file-selector" type="file" style="display:none;" onChange="$('#upload-file-info').html($(this).val());">Select PDF
        </label>
		
      </div>
      <button type="submit" id="submitbtn" name="submitbtn" class="btn btn-primary">Save</button>
    </form>
	</div>
	</div>
</div>

<div class="CSSTableGenerator" >
<table cellspacing="2" cellpadding="2" border=0>
    <tr>
        <td>Project</td>
        <td>FileName</td>
        <td>Date</td>
        <td>DateCode</td>
    </tr>
	<?php echo $total_line; ?>
</table>
</div>
</body>
</html>
<script>

//http://formvalidation.io/examples/bootstrap-datepicker/ 
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
			autoclose: true,
            format: 'yyyy-mm-dd'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
           // $('#eventForm').formValidation('revalidateField', 'date');
        });

  var options = { 
	beforeSubmit   : validateone,  // pre-submit callback 
	success		   : showResponseone,  // post-submit callback 
	uploadProgress : ShowUploadOne
	}; 
	$('#uploadForm').ajaxForm(options); 
});

//Pre submit callback for Contact Form
function validateone(formData, jqForm, options) { 
	$(".alert").html('');
	$(".alert").hide();
	var datePicker = $('#date').val();
	var status_file = $('#my-file-selector').val();
	
	if(datePicker == ''){
		$("#error").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><p>Please Select Date</p>');
		$("#error").show();
		//$('#error').fadeOut(5000);
		insFlag = false;
		return false;
	}else if(status_file == ''){
		$("#error").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><p>Please Select File</p>');
		$("#error").show();
		//$('#error').fadeOut(5000);
		insFlag = false;
		return false;
	}else{	
		$("#progress-div").show();
		$("#progress-bar").width('0%');
		$("#submitbtn").attr("disable","disable");
		$("#uploadForm-two").css("opcaity","0.8");
	}
}
function ShowUploadOne(event, position, total, percentComplete) {
	$("#progress-bar").width(percentComplete + '%');
	$("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>');
}
function showResponseone(responseText, statusText, xhr, $form)  { 
	//alert("responseText = "+responseText);
	
 	//alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + '\n\nThe output div should have already been updated with the responseText.'); 
	var obj  = $.parseJSON(responseText);
	//var obj = eval("(function(){return " + responseText + ";})()");
	//alert(obj.success);
	//alert var obj = jQuery.parseJSON(eval("(function(){return " + responseText + ";})()"));
	if(obj.success=="1"){		
	//	$("#success").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><p>'+obj.suc_msg+'</p>');
	//	$('#progress-div').hide();
//		$("#success").show();
		//$('#success').fadeOut(5000);
		location.reload();
	}
	if(obj.error == "1"){
		$("#error").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><p>'+obj.err_msg+'</p>');
		$("#error").show();
		//$('#error').fadeOut(5000);
		$('#progress-div').hide();
	}
} 

</script>