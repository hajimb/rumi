	<!-- Go to top -->
	<a href="#" class="k2t-btt" style="display:block;">
		<i class="fa fa-angle-up"></i>
	</a>
<!-- Google Audience Code for The VNCT -->
<?php if ($pagename == 'thankyou'){ ?>
<!-- Google  Conversion Code for The VNCt -->
<?php } ?>

<?php if ($pagename != 'offer'){ ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
/*var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/569de2bd942843aa26eb6969/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
*/</script>
<!--End of Tawk.to Script-->
<?php } 
if($pagename == 'thankyou' || $pagename == 'offer' || $pagename == '404' || $pagename == 'launch' ||  (isset($pagetype) && $pagetype=="offer") ){?>

<script>
function resizeme(){
	_headerHeight = jQuery(".k2t-header").outerHeight();
	_footerHeight = jQuery("#myfooter").outerHeight();
	_screenHeight = jQuery(window).height();
	myheight = _screenHeight -_headerHeight - _footerHeight;
//	alert('_screenHeight:'+_screenHeight+'  _headerHeight :'+_headerHeight+'  _footerHeight :'+_footerHeight);
	$("#main-container").css("margin-top",(_headerHeight-100));
	$("#inner-container").css("min-height",myheight);
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

</body>
</html>