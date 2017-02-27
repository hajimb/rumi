<?php
include_once('checkcap.php');
$captchacode = setCaptcha('saintangelovnct_captcha');
?>
<aside id="text-3" class="widget widget-text" style="border:1px solid #FFF;padding:0 10px ;background-color:#fff;border:1px solid #cecece; border-radius:10px;">
    <h3 class="widget-title">
        <span>Enquire Now</span>
    </h3>
    <div class="textwidget">
        <div role="form" class="wpcf7" id="wpcf7-f529-o2" lang="en-US" dir="ltr">
            <div class="screen-reader-response"></div>
            <form method="post" class="wpcf7-form" onSubmit="return Validate();">
                <div class="k2t-row">
                <div class="vc_col-sm-12 wpb_column">
                        <span class="wpcf7-form-control-wrap">
                            <input class="wpcf7-form-control wpcf7-text" type="text" name="fname" id="fname" placeholder="Full name">
                        </span>
                        <span class="wpcf7-form-control-wrap">
                            <input class="wpcf7-form-control wpcf7-text" type="text" maxlength="20" name="mobile" id="mobile" placeholder="Mobile Number">
                        </span>
                        <span class="wpcf7-form-control-wrap">
                            <input class="wpcf7-form-control wpcf7-text" type="text" name="email" id="email" placeholder="Your Email">
                        </span>
                        <span class="wpcf7-form-control-wrap">
                            <input class="wpcf7-form-control wpcf7-text" type="text" name="country" id="country" placeholder="Country">
                        </span>
                        <span class="wpcf7-form-control-wrap">
                            <input class="wpcf7-form-control wpcf7-text" type="text" name="city" id="city" placeholder="City">
                        </span>
    <!--                    <span class="wpcf7-form-control-wrap">
                            <select class="wpcf7-form-control wpcf7-select" name="projects" id="projects">
                            <option value="0">Select Project </option>
                            <option value="VNCT Lotus Villas">VNCT Lotus Villas</option>
                            <option value="The White House">The White House</option>
                            <option value="VNCT Square">VNCT Square</option>
                            </select>
                        </span>
    -->
                        <span class="wpcf2-form-control-wrap">
                       <input type="hidden" id="captchacode" name="captchacode" value="<?php echo $captchacode; ?>">
                            <input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit"  style="margin:10px 0;">
                        </span>
                    </div>
                    <div class="vc_col-sm-12 wpb_column"">
                        <div class="notification success" id="msg_ok" onClick="$(this).hide();" style="display:none;"></div>
                        <div class="notification error" id="msg_error" onClick="$(this).hide();" style="display:none;"></div>
                        <div class="notification warning" id="msg_loading" style="display:hide;"><p><center><img src='images/ajax-loader.gif' style="display:inline-block;"/> &nbsp;&nbsp;&nbsp;<strong>Sending your request, Please wait...</strong></center></p></div>
                    </div>
                </div>
                <div class="wpcf7-response-output wpcf7-display-none"></div>
            </form>
        </div>
    </div>
</aside>