<?php
$class="subscriber";
if($pagename=="gallerypage"){ 
	$class="subscriberinside";
}
?>
<div class="<?php echo $class; ?>">
    <button type="button" class="btn btn-default btn-sm gbtn" data-toggle="modal" data-target="#myModal">Fix Meeting</button>
    <button type="button" class="btn btn-default btn-sm gbtn" data-toggle="modal" data-target="#myQuote">Request Project Details</button>
</div>
