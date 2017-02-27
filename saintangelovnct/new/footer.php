	<footer class="k2t-footer" id="myfooter">
        <div class="k2t-bottom">
            <div class="k2t-wrap">
                <div class="k2t-row align-center">
                </div>
            </div>
        </div>
        <div class="k2t-info"> 
            <div class="k2t-wrap"> <!-- .k2t-wrap End-->
                <div class="vc_col-sm-4">
                <p class="copyright align-left">&copy; 2016-17 St. Angelo's VNCT Ventures Pvt Ltd.<br />All rights reserved.</p>
                </div>
                <div class="vc_col-sm-4 align-center">
                <ul class="h-element social ">
                    <li class="facebook">
                        <a target="_blank" href="https://www.facebook.com/saintangelosvnct/">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="google-plus">
                        <a target="_blank" href="https://www.youtube.com/channel/UC_LHQBHjzYWfoE594EUbfgQ">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                </ul>							
                
                </div>
                 <div class="vc_col-sm-4">
                 <p class="market align-right">
                    <a href="http://www.rumitechnology.com" target="_blank">Designed and Marketing by RuMi Technology</a><br />
                    <a href="<?php echo $basepath; ?>privacy-policy.php">Privacy Policy</a>
                 </p>
                 </div>
                    <!-- Menu Bottom End-->
                    
            </div> <!-- .k2t-wrap End-->
        </div>
    </footer>
<?php 
if(isset($pagetype) && $pagetype=="slider"){ 
	include('enquiry_form.php');
}
 ?>
	<!-- Go to top -->
	<a href="#" class="k2t-btt" style="display:none;">
		<i class="fa fa-angle-up"></i>
	</a>
<!-- Google Audience Code for The VNCT -->
<?php if ($pagename == 'thankyou'){ ?>
<!-- Google  Conversion Code for The VNCt -->
<?php } ?>

<?php if ($pagename != 'offer'){ ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var $_Tawk_API={},$_Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/57e95dee0814cc34e17356a3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php }  
if($pagename == 'thankyou' || $pagename == 'offer' || $pagename == '404' || $pagename == 'launch' ||  (isset($pagetype) && $pagetype=="offer") ){?>

<script>
function resizeme(){
	_headerHeight = jQuery(".navbar").outerHeight();
	_footerHeight = jQuery("#myfooter").outerHeight();
	_screenHeight = jQuery(window).height();
	myheight = _screenHeight -_headerHeight - _footerHeight;
	//alert('_screenHeight:'+_screenHeight+'  _headerHeight :'+_headerHeight+'  _footerHeight :'+_footerHeight);
	$("#main-container").css("margin-top",(_headerHeight-100));
	$("#inner-container").css("min-height",myheight);
	if(_footerHeight!=126){
		$("#txt").css("margin-top",'0px');
	}else{
		$("#txt").css("margin-top",'100px');
	}
<?php if($pagename == 'launch' ){
	echo '	$("#cont").css("min-height",myheight);';
	}?>
}

$( window ).resize(function() {
	resizeme();
});
$(window).load(function(e) {
	resizeme();
});
  </script>
<?php }else {?>
<script>

 function resizeme(){
	_headerHeight = jQuery(".myheader").outerHeight();
	if(jQuery("#header_screen").css('display')=="block"){
		//alert('screen');
		_headerHeight = jQuery("#header_screen").outerHeight();
	$("#main-container").css("margin-top","10px");
	}else{
		//alert('mobile');
		_headerHeight = jQuery("#header_mobile").outerHeight();
		_headerHeight =	_headerHeight-90;
		$("#main-container").css("margin-top","-10px");
	}
	//alert(_headerHeight);
//	$("#main-container").css("margin-top",(_headerHeight - 110));
}

$( window ).resize(function() {
	resizeme();
});
$(window).load(function(e) {
	resizeme();
});
</script>
<?php }?>