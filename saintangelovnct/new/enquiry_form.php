<?php
include_once('checkcap.php');
$captchacode = setCaptcha('saintangelovnct_captcha');
?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Fix Meeting</h3>
		We shall be happy to meet you at your Home or Office. <br />Please provide your Home or Office address
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="ovisit-form">
            <div class="form-group">
	            <label class="control-label col-sm-3" for="pwd">Your Name:</label>
                <div class="col-sm-9"> 
    	        <input type="text" class="form-control" id="aname" name="aname" placeholder="Your Name">
				</div>
            </div>
            <div class="form-group">
	            <label class="control-label col-sm-3" for="pwd">Email:</label>
                <div class="col-sm-9"> 
    	        <input type="text" class="form-control" id="aemail" name="aemail" placeholder="Email Address">
				</div>
            </div>
            <div class="form-group">
	            <label class="control-label col-sm-3" for="pwd">Mobile:</label>
                <div class="col-sm-9"> 
    	        <input type="text" class="form-control" id="amobile" name="amobile" placeholder="Your Mobile">
				</div>
            </div>
            <div class="form-group">
	            <label class="control-label col-sm-3" for="pwd">Project:</label>
                <div class="col-sm-9"> 
                <select name="aproject" id="aproject" class="form-control">
                    <option value="0">Select Project</option>
                    <option value="The White Villas - Shahapur">The White Villas - Shahapur</option>
                    <option value="VNCT Lotus Villas - Madurai">VNCT Lotus Villas - Madurai</option>
                    <option value="The White House - Coimbatore">The White House - Coimbatore</option>
                    <option value="VNCT Square - Madurai">VNCT Square - Madurai</option>
                    <option value="The White Villas - Oragadam">The White Villas - Oragadam</option>
                </select>
				</div>
            </div>
            <div class="form-group">
	            <label class="control-label col-sm-3" for="pwd">Date time:</label>
                <div class="col-sm-5"> 
                <input type="date" class="form-control" name="adate" id="adate" />
				</div>
                <div class="col-sm-4"> 
                <select name="atime" id="atime" class="form-control">
                    <option value="10 - 11">10 am to 11 am</option>
                    <option value="11 - 12">11 am to 12 noon</option>
                    <option value="12 - 1">12 noon to 1 pm</option>
                    <option value="1 - 2">1 pm to 2 pm</option>
                    <option value="2 - 3">2 pm to 3 pm</option>
                    <option value="3 - 4">3 pm to 4 pm</option>
                    <option value="4 - 5">4 pm to 5 pm</option>
                    <option value="5 - 6">5 pm to 6 pm</option>
                </select>
				</div>
            </div>
            <div class="form-group">
	            <label class="control-label col-sm-3" for="address">Address:</label>
                <div class="col-sm-9"> 
                <textarea name="a_address" id="a_address" class="form-control" style="resize:none;"></textarea>
                <input type="hidden" id="acaptchacode" name="acaptchacode" value="<?php echo $captchacode; ?>">
				</div>
            </div>
        </form>
      </div>
        <div class="vc_col-sm-12 wpb_column">
            <div class="notification success" id="amsg_ok" onClick="$(this).hide();" style="display:none;"></div>
            <div class="notification error" id="amsg_error" onClick="$(this).hide();" style="display:none;"></div>
            <div class="notification warning" id="amsg_loading" style="display:none;"><p><center><img src='images/ajax-loader.gif' style="display:inline-block;"/> &nbsp;&nbsp;&nbsp;<strong>Sending your request, Please wait...</strong></center></p></div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="appointment">Send</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="myQuote" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Request Project Details</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="oquote-form">
            <div class="form-group">
	            <label class="control-label col-sm-3" for="qname">Your Name:</label>
                <div class="col-sm-9"> 
    	        <input type="text" class="form-control" id="qname" name="qname" placeholder="Your Name">
				</div>
            </div>
            <div class="form-group">
	            <label class="control-label col-sm-3" for="pwd">Email:</label>
                <div class="col-sm-9"> 
    	        <input type="text" class="form-control" id="qemail" name="qemail" placeholder="Email Address">
				</div>
            </div>
            <div class="form-group">
	            <label class="control-label col-sm-3" for="qmobile">Mobile:</label>
                <div class="col-sm-9"> 
    	        <input type="text" class="form-control" id="qmobile" name="qmobile" placeholder="Your Mobile">
				</div>
            </div>
            <div class="form-group">
	            <label class="control-label col-sm-3" for="qcountry">Country:</label>
                <div class="col-sm-9"> 
    	        <input type="text" class="form-control" id="qcountry" name="qcountry" placeholder="Country">
				</div>
            </div>
            <div class="form-group">
	            <label class="control-label col-sm-3" for="qcity">City:</label>
                <div class="col-sm-9"> 
    	        <input type="text" class="form-control" id="qcity" name="qcity" placeholder="City">
				</div>
            </div>
            <div class="form-group">
	            <label class="control-label col-sm-3" for="qproject">Project:</label>
                <div class="col-sm-9"> 
                <select name="qproject" id="qproject" class="form-control">
                    <option value="0">Select Project</option>
                    <option value="The White Villas - Shahapur">The White Villas - Shahapur</option>
                    <option value="VNCT Lotus Villas - Madurai">VNCT Lotus Villas - Madurai</option>
                    <option value="The White House - Coimbatore">The White House - Coimbatore</option>
                    <option value="VNCT Square - Madurai">VNCT Square - Madurai</option>
                    <option value="The White Villas - Oragadam">The White Villas - Oragadam</option>
                </select>
                <input type="hidden" id="qcaptchacode" name="qcaptchacode" value="<?php echo $captchacode; ?>">
				</div>
            </div>
            <div class="vc_col-sm-12 wpb_column">
                <div class="notification success" id="qmsg_ok" onClick="$(this).hide();" style="display:none;"></div>
                <div class="notification error" id="qmsg_error" onClick="$(this).hide();" style="display:none;"></div>
                <div class="notification warning" id="qmsg_loading" style="display:none;"><p><center><img src='images/ajax-loader.gif' style="display:inline-block;"/> &nbsp;&nbsp;&nbsp;<strong>Sending your request, Please wait...</strong></center></p></div>
            </div>
         </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="quote">Send</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
