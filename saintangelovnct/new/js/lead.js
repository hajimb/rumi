'use strict';
$(document).on('click',"#quote",function () { 
  ValidateQuote();
});

$(document).on('click',"#appointment",function () { 
//alert();  
	ValidateAppointment();
});

function ValidateQuote(){
	var emailReg = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
	HideMsg();
	//$("#msg_loading").show();
	var flag = true;
	var ErrorMsg = "Please enter ";

	//return false;
	var name    = $("#qname").val();
	var email   = $("#qemail").val();
	var project  	= $("#qproject").val();
	var mobile  = $("#qmobile").val();
	var country  = $("#qcountry").val();
	var city  = $("#qcity").val();
	var captcha = $("#qcaptchacode").val();
	if(name=="" || name.lenght<1){ ErrorMsg = ErrorMsg + "Your Name"; flag=false;} 
	if (!emailReg.test(email)){ if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Valid Email"; flag=false;} 
	if(mobile=='' || mobile.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Valid Mobile"; flag=false;} 
	if(country=='' || country.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Country"; flag=false;} 
	if(city=='' || city.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "City"; flag=false;} 
	if(project=="0"){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Project"; flag=false;} 
	if(captcha=="" || captcha.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Captcha Code"; flag=false;} 
	if(!flag){
		ShowMsg('#qmsg_error','<button type="button" class="close" data-dismiss="alert" onclick="CloseMe()">&times;</button><p style="text-align:center;font-weight:bold;">'+ErrorMsg+'</p>');
		return false;
	}else{
		ShowMsg('#qmsg_loading','');
		var data = 'todo=quote&name=' + encodeURIComponent(name) +  '&email=' + encodeURIComponent(email) + '&mobile=' + encodeURIComponent(mobile) + '&project=' + encodeURIComponent(project) + '&country=' + encodeURIComponent(country) + '&city=' + encodeURIComponent(city) + '&captcha=' + encodeURIComponent(captcha);
		$.ajax({
			url: "sendlead.php",	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {				
				//alert("html = "+html);
				var obj =eval("(function(){return " + html + ";})()");
				//var obj = jQuery.parseJSON(eval("(function(){return " + responseText + ";})()"));
				if(obj.success=="1"){
					window.location = 'thank-you.php';
					return false;
				}
				if(obj.error=="1"){
					ShowMsg('#qmsg_error','<p style="text-align:center;font-weight:bold;">'+obj.err_msg+'</p>');
				}
			}		
		});
	}
	return false;
}	

function ValidateAppointment(){
	var emailReg = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
	HideMsg();
	//$("#msg_loading").show();
	var flag = true;
	var ErrorMsg = "Please enter ";

	//return false;
	var name    = $("#aname").val();
	var email   = $("#aemail").val();
	var project = $("#aproject").val();
	var mobile  = $("#amobile").val();
	var adate  = $("#adate").val();
	var atime  = $("#atime").val();
	var address  = $("#a_address").val();
	var captcha = $("#acaptchacode").val();
	if(name=="" || name.lenght<1){ ErrorMsg = ErrorMsg + "Your Name"; flag=false;} 
	if (!emailReg.test(email)){ if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Valid Email"; flag=false;} 
	if(mobile=='' || mobile.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Valid Mobile"; flag=false;} 
	if(project=="0"){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Project"; flag=false;} 
	if(adate=="" || adate.lenght<1){ if(!flag){ErrorMsg = ErrorMsg + ", ";}  ErrorMsg = ErrorMsg + "Date"; flag=false;} 
	if(atime=="0"){if(!flag){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Time"; flag=false;} 
	if(address=="" || address.lenght<1){ if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Address"; flag=false;} 
	if(captcha=="" || captcha.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Captcha Code"; flag=false;} 
	//alert(flag);
	if(!flag){
		ShowMsg('#amsg_error','<button type="button" class="close" data-dismiss="alert" onclick="CloseMe()">&times;</button><p style="text-align:center;font-weight:bold;">'+ErrorMsg+'</p>');
		return false;
	}else{
		ShowMsg('#amsg_loading','');
		var data = 'todo=appointment&name=' + encodeURIComponent(name) +  '&email=' + encodeURIComponent(email) + '&mobile=' + encodeURIComponent(mobile) + '&project=' + encodeURIComponent(project) + '&adate=' + encodeURIComponent(adate) + '&atime=' + encodeURIComponent(atime) + '&address=' + encodeURIComponent(address) + '&captcha=' + encodeURIComponent(captcha);
		$.ajax({
			url: "sendlead.php",	
			type: "POST",
			data: data,		
			cache: false,
			success: function (html) {				
				//alert("html = "+html);
				var obj =eval("(function(){return " + html + ";})()");
				//var obj = jQuery.parseJSON(eval("(function(){return " + responseText + ";})()"));
				if(obj.success=="1"){
					window.location = 'thank-you.php';
					return false;
				}
				if(obj.error=="1"){
					ShowMsg('#amsg_error','<p style="text-align:center;font-weight:bold;">'+obj.err_msg+'</p>');
				}
			}		
		});
	}
	return false;
}	


	function Validate(){
	var emailReg = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
	HideMsg();
	//$("#msg_loading").show();
	var flag = true;
	var ErrorMsg = "Please enter ";

	//return false;
	var name    = $("#fname").val();
	var email   = $("#email").val();
	var city  	= $("#city").val();
	var country  	= $("#country").val();
	var mobile  = $("#mobile").val();
	var projects  = $("#projects").val();
	var captcha = $("#captchacode").val();

	if(name=="" || name.lenght<1){ ErrorMsg = ErrorMsg + "Your Name"; flag=false;} 
	if (!emailReg.test(email)){ if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Valid Email"; flag=false;} 
	if(city=="" || city.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";}  ErrorMsg = ErrorMsg + "City"; flag=false;} 
	if(country=="" || country.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";}  ErrorMsg = ErrorMsg + "Country"; flag=false;} 
	if(mobile=='' || mobile.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Valid Mobile"; flag=false;} 
	if(projects=="0"){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Project"; flag=false;} 
	if(captcha=="" || captcha.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Captcha Code"; flag=false;} 
	if(!flag){
		ShowMsg('#msg_error','<button type="button" class="close" data-dismiss="alert" onclick="CloseMe()">&times;</button><p style="text-align:center;font-weight:bold;">'+ErrorMsg+'</p>');
		return false;
	}else{
		ShowMsg('#msg_loading','');
		//alert('The form is not active');
	}
	var data = 'todo=enquiry&name=' + encodeURIComponent(name) +  '&email=' + encodeURIComponent(email) + '&city=' + encodeURIComponent(city) + '&country=' + encodeURIComponent(country) + '&mobile=' + encodeURIComponent(mobile) + '&projects=' + encodeURIComponent(projects) + '&captcha=' + encodeURIComponent(captcha);
		$.ajax({
		
			// PHP file that processes the data and send mail
			url: "contact-send.php",	
			
			// GET method is used
			type: "POST",

			// Pass the data			
			data: data,		
			
			//Do not cache the page
			cache: false,
			
			// Success
			success: function (html) {				
				//alert("html = "+html);
				var obj =eval("(function(){return " + html + ";})()");
				//var obj = jQuery.parseJSON(eval("(function(){return " + responseText + ";})()"));
				if(obj.success=="1"){
					window.location = 'thank-you.php';
					return false;
					//ShowMsg('#msg_ok','<p style="text-align:center;font-weight:bold;">'+obj.suc_msg+'</p>');
					$("#fname").val('');
					$("#email").val('');
					$("#mobile").val('');
					$("#country").val('');
					$("#city").val('');
					$("#projects").val('');
					//$("#captchacode").val('');
					//BlankAll();
				}
				if(obj.error=="1"){
					ShowMsg('#msg_error','<p style="text-align:center;font-weight:bold;">'+obj.err_msg+'</p>');
				}
				////$("#captchacode").val('');
				//$('#captcha_code').attr('src','captcha/captcha.php');
			}		
		});
	return false;
}


	function ValidateOffer(){
	var emailReg = /^[a-zA-Z0-9._-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z0-9.-]{2,4}$/;
	HideMsg();
	//$("#msg_loading").show();
	var flag = true;
	var ErrorMsg = "Please enter ";

	//return false;
	var name    = $("#fname").val();
	var email   = $("#femail").val();
	var mobile  = $("#fmobile").val();
	var venue  	= $("#venue").val();
	var project = $("#project").val();
	var captcha = $("#captchacode").val();

	if(name=="" || name.lenght<1){ ErrorMsg = ErrorMsg + "Your Name"; flag=false;} 
	if(mobile=='' || mobile.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Valid Mobile"; flag=false;} 
	if (!emailReg.test(email)){ if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Valid Email"; flag=false;} 
	if(venue=="" || venue=="0"){if(!flag){ErrorMsg = ErrorMsg + ", ";}  ErrorMsg = ErrorMsg + "Venue"; flag=false;} 
	if(project=="" || project=="0"){if(!flag){ErrorMsg = ErrorMsg + ", ";}  ErrorMsg = ErrorMsg + "Project"; flag=false;} 
	if(captcha=="" || captcha.lenght<1){if(!flag){ErrorMsg = ErrorMsg + ", ";} ErrorMsg = ErrorMsg + "Captcha Code"; flag=false;} 
	if(!flag){
		ShowMsg('#msg_error','<button type="button" class="close" data-dismiss="alert" onclick="CloseMe()">&times;</button><p style="text-align:center;font-weight:bold;">'+ErrorMsg+'</p>');
		return false;
	}else{
		ShowMsg('#msg_loading','');
		//alert('The form is not active');
	}
	var data = 'todo=offer&country=USA&name=' + encodeURIComponent(name) +  '&email=' + encodeURIComponent(email) + '&venue=' + encodeURIComponent(venue) + '&project=' + encodeURIComponent(project) + '&mobile=' + encodeURIComponent(mobile) + '&captcha=' + encodeURIComponent(captcha);
//	alert("data = "+data);
		//return false;		
//$("#msg").hide();			  

		// Disable fields
		//$('.text').attr('disabled','true');
		
		// Loading icon
		//$('.loading').show();
		
		//return false;
		// Start jQuery
		$.ajax({
		
			// PHP file that processes the data and send mail
			url: "../contact-send.php",	
			
			// GET method is used
			type: "POST",

			// Pass the data			
			data: data,		
			
			//Do not cache the page
			cache: false,
			
			// Success
			success: function (html) {				
				//alert("html = "+html);
				var obj =eval("(function(){return " + html + ";})()");
				//var obj = jQuery.parseJSON(eval("(function(){return " + responseText + ";})()"));
				if(obj.success=="1"){
					window.location = 'thank-you.php';
					return false;
					//ShowMsg('#msg_ok','<p style="text-align:center;font-weight:bold;">'+obj.suc_msg+'</p>');
					$("#fname").val('');
					$("#email").val('');
					$("#mobile").val('');
					$("#country").val('');
					$("#city").val('');
					$("#projects").val('');
					//$("#captchacode").val('');
					//BlankAll();
				}
				if(obj.error=="1"){
					ShowMsg('#msg_error','<p style="text-align:center;font-weight:bold;">'+obj.err_msg+'</p>');
				}
				////$("#captchacode").val('');
				//$('#captcha_code').attr('src','captcha/captcha.php');
			}		
		});
	return false;
}


function RefreshCaptcha(){
	$("#captchacode").val('');
	$('#captcha_code').attr('src','captcha/captcha.php');
}

function OpenMe(){
	$("#msgbox").show();
	$("#formbox").hide();
}

function CloseMe(){
	$("#msgbox").hide();
	$("#formbox").show();
	$(".notification").hide();
}


function HideMsg(){
	$(".notification").hide();
	$("#msg_ok").html();
	$("#msg_ok").hide();
	$("#msg_error").html();
	$("#msg_error").hide();
	$("#msg_loading").hide();
	
}

function ShowMsg(divid,msg){
	HideMsg();
	//alert("divid = "+divid+ " msg = "+msg);
	if(msg!=""){
		$(divid).html(msg);
	}
	//$(".commonclass").hide();
	$(divid).show();
}

