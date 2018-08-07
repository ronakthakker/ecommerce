<?php
	require_once('../lib/helper.php');
	require_once('../lib/library_functions.php');
	if(session_id() == '')
	{
		@session_start();
	}
	$moderator_id = $_SESSION['bml_moderator_id'];
	$type = $_POST['type'];
	
	if($type == 'new_company')
	{
	?>
	<input type="hidden" id="selected_company_id" name="selected_company_id" value="none">
	<div class="form-group">
		<label class="col-sm-4 control-label">Company Name &nbsp;<span class="required_field">*</span></label>
		<div class="col-sm-8">
			<input type="text" placeholder="Company Name" class="form-control" id="company_name" name="company_name" value="<?php if(isset($_GET['request_id'])){ echo $survey_request_arr[0]['company_name']; } ?>" />
			<span class="span_err" id="company_name_err"></span> 
		</div>
	</div><!-- form-group -->
	<div class="form-group">
		<label class="col-sm-4 control-label">Contact Person Name &nbsp;<span class="required_field">*</span></label>
		<div class="col-sm-8">
			<input type="text" placeholder="E.g Peter Shaw" class="form-control" id="company_contact_person" name="company_contact_person" value="<?php if(isset($_GET['request_id'])){ echo $survey_request_arr[0]['company_contact_person']; } ?>" />
			<span class="span_err" id="company_contact_person_err"></span> 
		</div>
	</div><!-- form-group -->
	<div class="form-group">
		<label class="col-sm-4 control-label">Company Email &nbsp;<span class="required_field">*</span></label>
		<div class="col-sm-8">
			<input type="text" placeholder="E.g xyz@xyz.com" class="form-control" id="company_email_id" name="company_email_id" value="<?php if(isset($_GET['request_id'])){ echo $survey_request_arr[0]['company_email_id']; } ?>" />
			<span class="span_err" id="company_email_id_err"></span> 
		</div>
	</div><!-- form-group -->
	<div class="form-group">
		<label class="col-sm-4 control-label">Company Phone &nbsp;<span class="required_field">*</span></label>
		<div class="col-sm-8">
			<input type="text" placeholder="E.g 9999999999 Upto 10 Digits" class="form-control" id="company_mobile_no" name="company_mobile_no" value="<?php if(isset($_GET['request_id'])){ echo $survey_request_arr[0]['company_mobile_no']; } ?>"  onkeypress="return phone_validate(event);" maxlength="10" />
			<span class="span_err" id="company_mobile_no_err"></span> 
		</div>
	</div><!-- form-group -->
	<?php
	}
	else if($type == 'existing_company')
	{
		$company_id = $_POST['company_id'];
		$survey_executive_arr = $obj->select("*","app_company_details","company_status = '1' AND company_id = '$company_id'");
		
	?>
	<input type="hidden" id="selected_company_id" name="selected_company_id" value="<?php echo $survey_executive_arr[0]['company_id']; ?>">
	<div class="form-group">
		<label class="col-sm-4 control-label">Company Name &nbsp;<span class="required_field">*</span></label>
		<div class="col-sm-8">
			<input type="text" placeholder="Company Name" class="form-control" id="company_name" name="company_name" value="<?php echo $survey_executive_arr[0]['company_name']; ?>" readonly/>
			<span class="span_err" id="company_name_err"></span> 
		</div>
	</div><!-- form-group -->
	<div class="form-group">
		<label class="col-sm-4 control-label">Contact Person Name &nbsp;<span class="required_field">*</span></label>
		<div class="col-sm-8">
			<input type="text" placeholder="E.g Peter Shaw" class="form-control" id="company_contact_person" name="company_contact_person" value="<?php echo $survey_executive_arr[0]['company_contact_person']; ?>" readonly/>
			<span class="span_err" id="company_contact_person_err"></span> 
		</div>
	</div><!-- form-group -->
	<div class="form-group">
		<label class="col-sm-4 control-label">Company Email &nbsp;<span class="required_field">*</span></label>
		<div class="col-sm-8">
			<input type="text" placeholder="E.g xyz@xyz.com" class="form-control" id="company_email_id" name="company_email_id" value="<?php echo $survey_executive_arr[0]['company_email_id']; ?>" readonly/>
			<span class="span_err" id="company_email_id_err"></span> 
		</div>
	</div><!-- form-group -->
	<div class="form-group">
		<label class="col-sm-4 control-label">Company Phone &nbsp;<span class="required_field">*</span></label>
		<div class="col-sm-8">
			<input type="text" placeholder="E.g 9999999999 Upto 10 Digits" class="form-control" id="company_mobile_no" name="company_mobile_no" value="<?php echo $survey_executive_arr[0]['company_mobile_no']; ?>"  onkeypress="return phone_validate(event);" maxlength="10" readonly />
			<span class="span_err" id="company_mobile_no_err"></span> 
		</div>
	</div><!-- form-group -->
	<?php
		
	}	
	else if($type == 'view_popup')
	{
		$request_id = $_POST['request_id'];
		$reassign = $_POST['reassign'];
	?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"><?php if($reassign == 'yes') { echo 'Reassign'; }else{ echo 'Assign'; } ?> a Survey Executive</h4>
	</div>
	<div class="modal-body">
		<div class="contentpanel"  style="padding: 0px !important;">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<?php
								if($reassign == 'yes')
								{
									$survey_request_arr = $obj->select("*","app_survey_request","request_status = '3' AND request_id = '$request_id' ");
									
									$survey_req_executive_id = $survey_request_arr[0]['request_action_by_id'];
									
									$survey_req_time = explode(" ",$survey_request_arr[0]['request_assign_time']);
									$survey_req_date = $survey_req_time[0];
									$survey_req_time = $survey_req_time[1].''.$survey_req_time[2];
								}
								
								$survey_executive_arr = $obj->select("*","app_user_login","app_user_login_status != '0' AND app_user_login_user_type = '3' AND app_user_added_by='$moderator_id' ");
								
							?>
							<input type="hidden" id="request_id" name="request_id" value="<?php echo $request_id; ?>">
							<div class="form-group">
								<label class="col-sm-2 control-label">Search :</label>
								<div class="col-sm-10">
									<select id="app_user_login_id" name="app_user_login_id" data-placeholder="Choose One" class="form-control select_component" style="width:100%">
										<option value="">Search Survey Executives</option>
										<?php
											foreach($survey_executive_arr as $survey_executive)
											{
											?>
											<option value="<?php echo $survey_executive['app_user_login_id']; ?>" <?php if($reassign == 'yes'){ if($survey_req_executive_id == $survey_executive['app_user_login_id']){ ?> selected <?php } } ?>><?php echo $survey_executive['app_user_login_full_name']; ?> ( <?php echo $survey_executive['app_user_login_email']; ?> )</option>
											<?php
											}
										?>
									</select>
									<span class="span_err" id="app_user_login_id_err"></span><br>
								</div>
							</div><!-- form-group -->								
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<label>Date</label>
							<div class="input-group">
								<input type="text" class="form-control" placeholder="dd-mm-yyyy" id="assign_date" value="<?php if($reassign == 'yes'){ echo $survey_req_date; } ?>">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							</div><!-- input-group -->
							<span class="span_err" id="assign_date_err"></span>
						</div>						
						<div class="col-md-6">
							<label>Time</label>
							<div class="input-group mb15">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
								<div class="bootstrap-timepicker"><input id="assign_time" type="text" class="form-control" value="<?php if($reassign == 'yes'){ echo $survey_req_time; } ?>" /></div>
							</div><!-- input-group -->
							<span class="span_err" id="assign_time_err"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="submit" class="btn btn-success" id="assign_btn" value="Assign">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
	<script>
		jQuery(".select_component").select2();
		// Time Picker
		jQuery('#assign_time').timepicker({defaultTIme: false});
		
		// Date Picker
		jQuery('#assign_date').datepicker({
			dateFormat: 'dd-mm-yy'
		});
		
		$("#assign_btn").click(function(){
			var request_id = $("#request_id").val();
			var app_user_login_id = $("#app_user_login_id").val();
			var assign_date = $("#assign_date").val();
			var assign_time = $("#assign_time").val();
			
			if(app_user_login_id == "")
			{
				var message = "Please Select Survey Executive";
				valid('app_user_login_id',message);
				return false;
			}
			else if(assign_date == "")
			{
				var message = "Please Select Date";
				valid('assign_date',message);
				return false;
			}
			else if(assign_time == "")
			{
				var message = "Please Select Time";
				valid('assign_time',message);
				return false;
			}
			else
			{
				var formdata = new FormData();
				formdata.append('request_id', request_id);
				formdata.append('app_user_login_id', app_user_login_id);
				formdata.append('assign_date', assign_date);
				formdata.append('assign_time', assign_time);
				formdata.append('type', 'assign_survey');
				$.ajax({
					type: "POST",
					data: formdata,
					processData: false,
					contentType: false,
					url: "ajax/ajax_survey_request.php",
					beforeSend: function () {
						
					},
					success: function (res) {
						res = res.trim();
						location.href=res;
					}
				});
				return false;
			}
		});
		
		function valid(fid,fmsg){
			var id = fid;
			var msg = fmsg;
			$(".span_err").html("");
			$("input").removeClass("input_err");
			$("textarea").removeClass("input_err");
			$("select").removeClass("input_err");
			$("#"+id+"_err").html(msg);
			$("#"+id).focus().addClass("input_err");
		}
	</script>
	<?php
	}
	else if($type == 'assign_survey')
	{		
		$request_id = $_POST['request_id'];
		$app_user_login_id = $_POST['app_user_login_id'];
		$assign_date = $_POST['assign_date'];
		$assign_time = $_POST['assign_time'];
		
		$date_time = $assign_date.' '.$assign_time;
		
		$update="update app_survey_request set request_action_by_id='$app_user_login_id',request_action_by_whom='3',request_assign_time='$date_time',request_status='3',last_edited_by='1' WHERE request_id = '$request_id'";
		
		$result = $obj->conn->query($update) or die($obj->conn->error);
		
		
		if($result){
			$msg = 5;   // 5 For Assign Success
			echo 'surveyrequest_list.php?msg='.$msg;
		}
	}
	else if($type == 'send_link')
	{
		$request_id = $_POST['request_id'];
		$company_id = $_POST['company_id'];
		
		$company_arr = $obj->select("*","app_company_details","company_status = '1' AND company_id = '$company_id'");
		
		$company_email_id = $company_arr[0]['company_email_id'];
		$company_contact_person = $company_arr[0]['company_contact_person'];
		
		$send = $_POST['send'];
		
		if($send == 'send')
		{
			$heading = '';
			
			$messagebody = "Dear $company_contact_person , We have sent your Survey Link. <br> Please <a href='#'> Click Here </a> to Start Survey.";
			
			$footer = '';
			
			$mail_type = 'defaultmail';  // defaultmail/phpmailer
			
			$use_template = 'no';
			
			$from_mail = 'vikrant.onerooftech@gmail.com';
			
			$to_mail = $company_email_id;
			
			$subject = 'Survey Form Link Received. | BML Survey';
			
		}
		else if($send == 'resend')
		{
			$heading = '';
			
			$messagebody = "Dear $company_contact_person , We have resent your Survey Link. <br> Please <a href='#'> Click Here </a> to Start Survey.";
			
			$footer = '';
			
			$mail_type = 'defaultmail';  // defaultmail/phpmailer
			
			$use_template = 'no';
			
			$from_mail = 'vikrant.onerooftech@gmail.com';
			
			$to_mail = $company_email_id;
			
			$subject = 'Survey Form Link Received. | BML Survey';
		}
		
		$is_send = sendEmail($use_template,$heading,$messagebody,$footer,$mail_type,$from_mail,$to_mail,$subject);
		
		if($is_send)
		{
			$update="update app_survey_request set request_action_by_id=0,request_action_by_whom='1',request_status='2',last_edited_by='1' WHERE request_id = '$request_id'";
			
			$result = $obj->conn->query($update) or die($obj->conn->error);
			
			if($result)
			{
				$msg = 6;   // 6 For Send Link Success
				echo 'surveyrequest_list.php?msg='.$msg;
			}
		}
		else
		{
			echo 'send_link_fail';
		}
	}
	
?>




