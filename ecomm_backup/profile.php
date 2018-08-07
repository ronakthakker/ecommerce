<?php
	if(!session_id()){
		session_start();
	}
	if(isset($_SESSION['skinbae_user'])){
		$user_id = base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_SESSION['skinbae_user'])))));
		require_once("includes/header.php");
		$get_user = $obj->select("*","user_master","user_status='1' AND user_id='$user_id'");
		if(is_array($get_user)){
		?>
		<style type="text/css">
			.shop-list{
			border: 2px solid #f9f9f9;
			}
			.shop-list li {
			margin-bottom: 0px; 
			padding: 10px 14px;
			display: table;
			width: 100%;
			border-bottom: 1px solid rgba(204, 204, 204, 0.32);
			}
			.shop-list li  a{
			text-transform:   uppercase;
			cursor: pointer;
			}
			#sidebar .widget {
			padding: 0 20px;
			background-color: #fff;
			position: relative;
			display: block;
			margin-bottom: 20px;
			}
			.sidelink{
			cursor: pointer;
			}
			.shop-item-title h4{
			font-size: 21px;
			padding-top: 0;
			}
			.shop-item-title h4 {
			font-size: 21px;
			padding-top: 0;
			color: #111111;
			margin-bottom: 20px;
			font-weight: 200;
			text-transform: capitalize;
			}
			.nopadding{
			padding:0px;
			padding-right:  12px;
			}
			
			
			.panel:last-child {
			border-bottom: none;
			}
			.panel {
			background-color: #fff;
			padding: 0px;
			}
			.panel-group > .panel:first-child .panel-heading {
			border-radius: 4px 4px 0 0;
			}
			
			.panel-group .panel {
			border-radius: 0;
			}
			
			.panel-group .panel + .panel {
			margin-top: 0;
			}
			
			.panel-heading {
			/* background-color: #0072AE;*/
			border-radius: 0;
			border: none;
			color: #423a3a;
			padding: 0;
			}
			
			.panel-title a {
			display: block;
			border-bottom: 1px solid #aaa98b;
			color: #423a3a;
			padding: 15px;
			position: relative;
			font-size: 14px;
			font-weight: 400;
			}
			
			.panel:last-child .panel-body {
			border-radius: 0 0 4px 4px;
			}
			
			.panel:last-child .panel-heading {
			border-radius: 0 0 4px 4px;
			transition: border-radius 0.3s linear 0.2s;
			}
			
			.panel:last-child .panel-heading.active {
			border-radius: 0;
			transition: border-radius linear 0s;
			}
			/* #bs-collapse icon scale option */
			
			.panel-heading a:before {
			content:"\f107";
			position: absolute;
			font-family: 'Fontawesome';
			right: 5px;
			top: 10px;
			font-size: 24px;
			transition: all 0.5s;
			transform: scale(1);
			}
			
			.panel-heading.active a:before {
			content: ' ';
			transition: all 0.5s;
			transform: scale(0);
			}
			
			#bs-collapse .panel-heading a:after {
			content: "\f106";
			font-size: 24px;
			position: absolute;
			font-family: 'Fontawesome';
			right: 5px;
			top: 10px;
			transform: scale(0);
			transition: all 0.5s;
			}
			
			#bs-collapse .panel-heading.active a:after {
			content: "\f106";
			transform: scale(1);
			transition: all 0.5s;
			}
			/* #accordion rotate icon option */
			
			#accordion .panel-heading a:before {
			content: "\f107";
			font-size: 24px;
			position: absolute;
			font-family: 'Fontawesome';
			right: 5px;
			top: 10px;
			transform: rotate(180deg);
			transition: all 0.5s;
			}
			
			#accordion .panel-heading.active a:before {
			transform: rotate(0deg);
			transition: all 0.5s;
			}
			.datedisp{
			font-size: 12px;
			margin-right: 20px;
			color: #d8703f;
			}
			.panel-body .form-group img{
			padding:  2px;
			}
			.panel-body .form-group h4, .panel-body .form-group h6{
			padding-top: 15px;
			font-size: 15px;
			margin-bottom: 0px;
			}
			.panel-body .form-group h6{
			padding-top: 30px;
			font-size: 12px;
			font-weight: 200;
			margin-bottom: 0px;
			}
			.shopwidget li.active{
			background: #f9f9f9;
			border-bottom: 2px solid #575456;
			}
			.change_pass,.add_details, .ord_history {
			display: none;
			}
			.panel-info .form-control, .contact_form .form-control{
			margin-bottom: 5px;
			margin-top: 10px;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/glasscase.css">
		
		<section class="section banner nopadbot" style="background-image:url('upload/parallax_02.jpg');" data-img-width="2000" data-img-height="1508" data-diff="100">
			<div class="overlay"></div>
			<div class="container">
				<div class="page-header">
					<div class="bread">
						<ol class="breadcrumb">
							<li><a href="index.php">Home</a></li>
							<li class="active">Profile</li>
						</ol>
					</div><!-- end bread -->
					<h1>Profile</h1>
				</div>
			</div>
		</section>
		
		<section class="section">
			<div class="container">
				<div class="row">
					<div id="content" class="col-md-8 col-xs-12 pull-right">
						<div class="col-md-12 col-sm-12 account_info divisions" id="personal_details">
							<div class="shop-item-title clearfix">
								<h4>Change Personal Details</h4>
								<div class="shop-desc-style">
									<div class="contact_form">
										<div id="message"></div>
										<form class="row" method="post">
											<div class="col-lg-12">
												<input type="text" name="user_username" id="user_username" value="<?php echo $get_user[0]['user_username']; ?>" class="form-control" placeholder="First Name">
												<span class="span_err" id="user_username_err"></span> 
												<input type="text" name="user_lastname" id="user_lastname" value="<?php echo $get_user[0]['user_lastname']; ?>" class="form-control" placeholder="Last Name">
												<span class="span_err" id="user_lastname_err"></span> 
												<input type="text" name="user_email" id="user_email" disabled readonly value="<?php echo $get_user[0]['user_email']; ?>" class="form-control" class="form-control" placeholder="Email">
												<input type="text"  onkeypress="return validate_ph(event)" name="user_phone" id="user_phone" value="<?php echo $get_user[0]['user_phone']; ?>" class="form-control" placeholder="10 Digit number"> 
												<span class="span_err" id="user_phone_err"></span> 
											</div>
											<div class="col-lg-12">
												<button type="submit" id="personal_submit" value="Save" class="btn custombutton button--isi btn-primary"> Save</button>
											</div>
										</form> 
									</div>
								</div>
							</div><!-- end shop-item-title -->
						</div>
						<div class="col-md-12 col-sm-12  change_pass divisions" id="change_password">
							<div class="shop-item-title clearfix">
								<h4>Change Password</h4>
								<div class="shop-desc-style">
									<div class="contact_form">
										<div id="message"></div>
										<form class="row" method="post">
											<div class="col-lg-12">
												<input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter old Password">
												<span class="span_err" id="user_password_err"></span> 
												<input type="password" name="new_password" id="new_password"  class="form-control" placeholder="Enter New Password"> 
												<span class="span_err" id="new_password_err"></span> 
												<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm New Password">
												<span class="span_err" id="confirm_password_err"></span> 
											</div>
											<div class="col-lg-12">
												<button type="submit" id="change_pwd" value="Save" class="btn custombutton button--isi btn-primary"> Save</button> <br><br> <br><br> <br><br>
											</div>
											
										</form> 
									</div>
								</div>
							</div><!-- end shop-item-title -->
						</div>
						<div class="col-md-12 col-sm-12 add_details divisions" id="address_details">
							<div class="shop-item-title clearfix">
								<h4>Address Details</h4>
							</div>
							<div class="contact_form">
								<form class="row" method="post">
									<div class="col-lg-12">
										<div class="col-md-12 nopadding">
											<div class="col-md-6 nopadding"> 
												<input type="text" name="user_address1" id="user_address1" value="<?php echo $get_user[0]['user_address1']; ?>" class="form-control" placeholder="Enter Address Line 1">
												<span class="span_err" id="user_address1_err"></span> 
											</div>
											<div class="col-md-6 nopadding"> 
												<input type="text" name="user_address2" id="user_address2" value="<?php echo $get_user[0]['user_address2']; ?>" class="form-control" placeholder="Enter Address Line 2">
												<span class="span_err" id="user_address2_err"></span> 
											</div>
										</div>
										<div class="col-md-12 nopadding">
											<div class="col-md-6 nopadding"> 
												<input type="text" name="user_country" id="user_country" value="<?php echo $get_user[0]['user_country']; ?>" class="form-control" placeholder="Enter Country">
												<span class="span_err" id="user_country_err"></span> 
											</div>
											<div class="col-md-6 nopadding"> 
												<input type="text" name="user_state" id="user_state" value="<?php echo $get_user[0]['user_state']; ?>" class="form-control" placeholder="Enter State">
												<span class="span_err" id="user_state_err"></span> 
											</div>
										</div>
										<div class="col-md-12 nopadding">
											<div class="col-md-6 nopadding"> 
												<input type="text" name="user_city" id="user_city" value="<?php echo $get_user[0]['user_city']; ?>" class="form-control" placeholder="Enter City">
												<span class="span_err" id="user_city_err"></span> 
											</div>
											<div class="col-md-6 nopadding"> 
												<input type="text" name="user_pincode" onkeypress="return validate_ph(event)" id="user_pincode" value="<?php echo $get_user[0]['user_pincode']; ?>" class="form-control" placeholder="Pincode">
												<span class="span_err" id="user_pincode_err"></span> 
											</div>
										</div>
										<div class="col-md-12 nopadding">
											<textarea class="form-control" name="user_additional_info" id="user_additional_info" rows="6" placeholder="Additional Information"><?php echo $get_user[0]['user_additional_info']; ?></textarea>
										</div>
										
										<div class="col-md-12 nopadding">
											<button type="submit" value="Save" id="address_save" class="btn custombutton button--isi btn-primary"> Save</button>
										</div>
									</div>
									<br><br>
								</form> 
							</div>
							
						</div><!-- end shop-item-title -->
						<div class="col-md-12 col-sm-12 ord_history divisions" id="Orders">
							<div class="shop-item-title clearfix">
								<h4>Order History</h4>
							</div>
							<div class="contact_form">
								<form class="row" method="post">
									<div class="col-lg-12">
										<div class="panel-group wrap" id="bs-collapse">
											
											<div class="panel">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#bs-collapse" href="#one">
															
															Order Id:xxxxxx <span class="pull-right datedisp"><i class="fa fa-calendar"></i> 12/12/2016</span>
														</a>
													</h4>
												</div>
												<div id="one" class="panel-collapse collapse">
													<div class="panel-body">
														
														<div class="row cart-body">
															<form class="form-horizontal" method="post">
																<div class="col-lg-12 col-md-12">
																	<!--REVIEW ORDER-->
																	<div class="panel panel-info">
																		<div class="panel-heading">
																			Order Details
																		</div>
																		<div class="panel-body">
																			<div class="form-group">
																				<div class="col-sm-2 col-xs-2">
																					<img alt="" class="img-responsive" src="upload/case3.jpg">
																				</div>
																				<div class="col-sm-4 col-xs-6">
																					<div class="col-xs-12"><h4>Product name</h4></div>
																					<div class="col-xs-12"> <small>Category Name</small></div>
																				</div>
																				
																				<div class="col-sm-3 col-xs-3 text-right">
																					<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																				</div>
																			</div>
																			<div class="clearfix"></div>
																			<div class="form-group">
																				<div class="col-sm-2 col-xs-2">
																					<img alt="" class="img-responsive" src="upload/case2.jpg">
																				</div>
																				<div class="col-sm-4 col-xs-6">
																					<div class="col-xs-12"><h4>Product name</h4></div>
																					<div class="col-xs-12"> <small>Category Name</small></div>
																				</div>
																				
																				<div class="col-sm-3 col-xs-3 text-right">
																					<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																				</div>
																			</div>
																			<div class="clearfix"></div>
																			<div class="form-group">
																				<div class="col-sm-2 col-xs-2">
																					<img alt="" class="img-responsive" src="upload/case1.jpg">
																				</div>
																				<div class="col-sm-4 col-xs-6">
																					<div class="col-xs-12"><h4>Product name</h4></div>
																					<div class="col-xs-12"> <small>Category Name</small></div>
																				</div>
																				
																				<div class="col-sm-3 col-xs-3 text-right">
																					<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																				</div>
																			</div>
																			<div class="clearfix"></div><hr>
																			<div class="form-group">
																				<div class="col-xs-12">
																					<strong>Subtotal</strong>
																					<div class="pull-right"><span><i class="fa fa-rupee"></i> </span><span>2000.00</span></div>
																				</div>
																				<div class="col-xs-12">
																					<small>Discount</small>
																					<div class="pull-right"><small><i class="fa fa-rupee"></i> </small><small>122.00</small></div>
																				</div>
																			</div>
																			<div class="clearfix"><hr></div>
																			<div class="form-group">
																				<div class="col-xs-12">
																					<strong>Order Total</strong>
																					<div class="pull-right"><span><i class="fa fa-rupee"></i> </span><span>1878</span></div>
																				</div>
																			</div>
																			
																		</div>
																	</div>
																	<!--REVIEW ORDER END-->
																</div>
															</form>
														</div>
													</div>
												</div>
												
											</div>
											<!-- end of panel -->
											
											<div class="panel">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#bs-collapse" href="#two">
															Order Id:xxxxxx <span class="pull-right datedisp"><i class="fa fa-calendar"></i> 12/12/2016</span>
														</a>
													</h4>
												</div>
												<div id="two" class="panel-collapse collapse">
													<div class="panel-body">
														<div class="panel-body">
															
															<div class="row cart-body">
																<form class="form-horizontal" method="post">
																	<div class="col-lg-12 col-md-12">
																		<!--REVIEW ORDER-->
																		<div class="panel panel-info">
																			<div class="panel-heading">
																				Order Details
																			</div>
																			<div class="panel-body">
																				<div class="form-group">
																					<div class="col-sm-2 col-xs-2">
																						<img alt="" class="img-responsive" src="upload/case3.jpg">
																					</div>
																					<div class="col-sm-4 col-xs-6">
																						<div class="col-xs-12"><h4>Product name</h4></div>
																						<div class="col-xs-12"> <small>Category Name</small></div>
																					</div>
																					
																					<div class="col-sm-3 col-xs-3 text-right">
																						<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																					</div>
																				</div>
																				<div class="clearfix"></div>
																				<div class="form-group">
																					<div class="col-sm-2 col-xs-2">
																						<img alt="" class="img-responsive" src="upload/case2.jpg">
																					</div>
																					<div class="col-sm-4 col-xs-6">
																						<div class="col-xs-12"><h4>Product name</h4></div>
																						<div class="col-xs-12"> <small>Category Name</small></div>
																					</div>
																					
																					<div class="col-sm-3 col-xs-3 text-right">
																						<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																					</div>
																				</div>
																				<div class="clearfix"></div>
																				<div class="form-group">
																					<div class="col-sm-2 col-xs-2">
																						<img alt="" class="img-responsive" src="upload/case1.jpg">
																					</div>
																					<div class="col-sm-4 col-xs-6">
																						<div class="col-xs-12"><h4>Product name</h4></div>
																						<div class="col-xs-12"> <small>Category Name</small></div>
																					</div>
																					
																					<div class="col-sm-3 col-xs-3 text-right">
																						<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																					</div>
																				</div>
																				<div class="clearfix"></div><hr>
																				<div class="form-group">
																					<div class="col-xs-12">
																						<strong>Subtotal</strong>
																						<div class="pull-right"><span><i class="fa fa-rupee"></i> </span><span>2000.00</span></div>
																					</div>
																					<div class="col-xs-12">
																						<small>Discount</small>
																						<div class="pull-right"><small><i class="fa fa-rupee"></i> </small><small>122.00</small></div>
																					</div>
																				</div>
																				<div class="clearfix"><hr></div>
																				<div class="form-group">
																					<div class="col-xs-12">
																						<strong>Order Total</strong>
																						<div class="pull-right"><span><i class="fa fa-rupee"></i> </span><span>1878</span></div>
																					</div>
																				</div>
																				
																			</div>
																		</div>
																		<!--REVIEW ORDER END-->
																	</div>
																</form>
															</div>
														</div>
													</div>
													
												</div>
											</div>
											<!-- end of panel -->
											
											<div class="panel">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#bs-collapse" href="#three">
															Order Id:xxxxxx <span class="pull-right datedisp"><i class="fa fa-calendar"></i> 12/12/2016</span>
														</a>
													</h4>
												</div>
												<div id="three" class="panel-collapse collapse">
													<div class="panel-body">
														<div class="panel-body">
															
															<div class="row cart-body">
																<form class="form-horizontal" method="post">
																	<div class="col-lg-12 col-md-12">
																		<!--REVIEW ORDER-->
																		<div class="panel panel-info">
																			<div class="panel-heading">
																				Order Details
																			</div>
																			<div class="panel-body">
																				<div class="form-group">
																					<div class="col-sm-2 col-xs-2">
																						<img alt="" class="img-responsive" src="upload/case3.jpg">
																					</div>
																					<div class="col-sm-4 col-xs-6">
																						<div class="col-xs-12"><h4>Product name</h4></div>
																						<div class="col-xs-12"> <small>Category Name</small></div>
																					</div>
																					
																					<div class="col-sm-3 col-xs-3 text-right">
																						<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																					</div>
																				</div>
																				<div class="clearfix"></div>
																				<div class="form-group">
																					<div class="col-sm-2 col-xs-2">
																						<img alt="" class="img-responsive" src="upload/case2.jpg">
																					</div>
																					<div class="col-sm-4 col-xs-6">
																						<div class="col-xs-12"><h4>Product name</h4></div>
																						<div class="col-xs-12"> <small>Category Name</small></div>
																					</div>
																					
																					<div class="col-sm-3 col-xs-3 text-right">
																						<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																					</div>
																				</div>
																				<div class="clearfix"></div>
																				<div class="form-group">
																					<div class="col-sm-2 col-xs-2">
																						<img alt="" class="img-responsive" src="upload/case1.jpg">
																					</div>
																					<div class="col-sm-4 col-xs-6">
																						<div class="col-xs-12"><h4>Product name</h4></div>
																						<div class="col-xs-12"> <small>Category Name</small></div>
																					</div>
																					
																					<div class="col-sm-3 col-xs-3 text-right">
																						<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																					</div>
																				</div>
																				<div class="clearfix"></div><hr>
																				<div class="form-group">
																					<div class="col-xs-12">
																						<strong>Subtotal</strong>
																						<div class="pull-right"><span><i class="fa fa-rupee"></i> </span><span>2000.00</span></div>
																					</div>
																					<div class="col-xs-12">
																						<small>Discount</small>
																						<div class="pull-right"><small><i class="fa fa-rupee"></i> </small><small>122.00</small></div>
																					</div>
																				</div>
																				<div class="clearfix"><hr></div>
																				<div class="form-group">
																					<div class="col-xs-12">
																						<strong>Order Total</strong>
																						<div class="pull-right"><span><i class="fa fa-rupee"></i> </span><span>1878</span></div>
																					</div>
																				</div>
																				
																			</div>
																		</div>
																		<!--REVIEW ORDER END-->
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- end of panel -->
											
											<div class="panel">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#bs-collapse" href="#four">
															Order Id:xxxxxx <span class="pull-right datedisp"><i class="fa fa-calendar"></i> 12/12/2016</span>
														</a>
													</h4>
												</div>
												<div id="four" class="panel-collapse collapse ">
													<div class="panel-body">    <div class="panel-body">
														
														<div class="row cart-body">
															<form class="form-horizontal" method="post">
																<div class="col-lg-12 col-md-12">
																	<!--REVIEW ORDER-->
																	<div class="panel panel-info">
																		<div class="panel-heading">
																			Order Details
																		</div>
																		<div class="panel-body">
																			<div class="form-group">
																				<div class="col-sm-2 col-xs-2">
																					<img alt="" class="img-responsive" src="upload/case3.jpg">
																				</div>
																				<div class="col-sm-4 col-xs-6">
																					<div class="col-xs-12"><h4>Product name</h4></div>
																					<div class="col-xs-12"> <small>Category Name</small></div>
																				</div>
																				
																				<div class="col-sm-3 col-xs-3 text-right">
																					<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																				</div>
																			</div>
																			<div class="clearfix"></div>
																			<div class="form-group">
																				<div class="col-sm-2 col-xs-2">
																					<img alt="" class="img-responsive" src="upload/case2.jpg">
																				</div>
																				<div class="col-sm-4 col-xs-6">
																					<div class="col-xs-12"><h4>Product name</h4></div>
																					<div class="col-xs-12"> <small>Category Name</small></div>
																				</div>
																				
																				<div class="col-sm-3 col-xs-3 text-right">
																					<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																				</div>
																			</div>
																			<div class="clearfix"></div>
																			<div class="form-group">
																				<div class="col-sm-2 col-xs-2">
																					<img alt="" class="img-responsive" src="upload/case1.jpg">
																				</div>
																				<div class="col-sm-4 col-xs-6">
																					<div class="col-xs-12"><h4>Product name</h4></div>
																					<div class="col-xs-12"> <small>Category Name</small></div>
																				</div>
																				
																				<div class="col-sm-3 col-xs-3 text-right">
																					<h6><span><i class="fa fa-rupee"></i> </span>499.00</h6>
																				</div>
																			</div>
																			<div class="clearfix"></div><hr>
																			<div class="form-group">
																				<div class="col-xs-12">
																					<strong>Subtotal</strong>
																					<div class="pull-right"><span><i class="fa fa-rupee"></i> </span><span>2000.00</span></div>
																				</div>
																				<div class="col-xs-12">
																					<small>Discount</small>
																					<div class="pull-right"><small><i class="fa fa-rupee"></i> </small><small>122.00</small></div>
																				</div>
																			</div>
																			<div class="clearfix"><hr></div>
																			<div class="form-group">
																				<div class="col-xs-12">
																					<strong>Order Total</strong>
																					<div class="pull-right"><span><i class="fa fa-rupee"></i> </span><span>1878</span></div>
																				</div>
																			</div>
																			
																		</div>
																	</div>
																	<!--REVIEW ORDER END-->
																</div>
															</form>
														</div>
													</div>
													</div>
												</div>
											</div>
											<!-- end of panel -->
											
										</div>
										<!-- end of #bs-collapse  -->
										
										<!-- end of container -->
										<div class="col-md-12 nopadding">
											<button type="submit" value="Save" class="btn custombutton button--isi btn-primary"> Save</button>
										</div>
									</div>
									<br><br>
								</form> 
							</div>
							
						</div><!-- end shop-item-title -->
						
					</div><!-- end content -->
					
					<div id="sidebar" class="col-md-4 col-sm-12 pull-left">
						<div class="widget">
							<!--    <div class="widget-title">
								<h4>Account</h4>
								<hr>
							</div> -->
							
							<div class="shopwidget">
								<ul class="shop-list">
									<li class="sidelink active" id="account_info"><a>Account Information</a></li>
									<li class="sidelink"  id="change_pass"><a>Change Password</a></li>
									<li class="sidelink" id="add_details"><a>Address Details</a></li>
									<li class="sidelink" id="ord_history"><a>Order History</a></li>
								</ul><!-- end blog list -->
							</div><!-- end blogwidget -->
						</div><!-- end widget -->
					</div><!-- end sidebar -->
				</div><!-- end row -->
			</div><!-- end container -->
		</section>  
		<?php require_once("includes/footer.php");?>
		
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('.collapse.in').prev('.panel-heading').addClass('active');
				$('#accordion, #bs-collapse')
				.on('show.bs.collapse', function (a) {
					$(a.target).prev('.panel-heading').addClass('active');
				})
				.on('hide.bs.collapse', function (a) {
					$(a.target).prev('.panel-heading').removeClass('active');
				});
				
				
				$(".sidelink").click(function(){
					$(".span_err").html("");
					$(".sidelink").removeClass("active");
					$(this).addClass("active");
					var id = $(this).attr("id");
					$(".divisions").slideUp("fast");
					$("."+id).slideDown("slow");
					
				});
				
				// Personal Save //
				
				$("#personal_submit").click(function(){
					var user_username = $("#user_username").val().trim();
					var user_lastname = $("#user_lastname").val().trim();
					var user_phone = $("#user_phone").val().trim(); 
					var alpha = /^([a-zA-Z])+$/;
					
					if(user_username == '' || !alpha.test(user_username)){
						var message = "Please Enter a valid First Name";
						valid('user_username',message);
						return false;
					}
					else if(user_lastname == '' || !alpha.test(user_lastname)){
						var message = "Please Enter a valid Last Name";
						valid('user_lastname',message);
						return false;
					}
					else if(user_phone == '' || isNaN(user_phone) || user_phone.length != 10){
						var message = "Please Enter a valid Phone Number";
						valid('user_phone',message);
						return false;
					}
					else{
						var formdata= new FormData();
						formdata.append('user_username',user_username);
						formdata.append('user_lastname',user_lastname);
						formdata.append('user_phone',user_phone);
						formdata.append('type','1');
						$.ajax({
							type:"post",
							data: formdata,
							processData: false,
							contentType: false,
							url:"user_save_action.php",
							beforeSend:function(){
								$("#personal_submit").html('<img src="images/ajax_loader.gif" alt="loader image" />');
							},
							success:function(res){
								res=res.trim();
								//alert(res);
								if(res == "1"){
									$("#personal_submit").html('SAVE');
									var message = "Personal Details saved Successfully !!";
									show_MessageTimout(message,2000);
									setTimeout(function(){
										location.href='profile.php';
									}, 2000);
								}
							}
						});
						return false;
					}
				});
				
				// Personal Save //
				
				// Password Save //
				$("#change_pwd").click(function(){
					var user_password = $("#user_password").val().trim();
					var new_password = $("#new_password").val().trim();
					var confirm_password = $("#confirm_password").val().trim();
					var alphanum = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/;
					if(user_password == ''){
						var message = "Please Enter a valid Old Password";
						valid('user_password',message);
						return false;
					}
					else if(new_password != "" && !alphanum.test(new_password)){
						var message = "Password should be alphanumeric only and should contain 1 character and number";
						valid('user_reg_password',message);
						return false;
					}
					else if(new_password == "" || new_password.length<=7){
						var message = "Password should be atleast 8 characters";
						valid('new_password',message);
						return false;
					}
					else if(new_password !== confirm_password){
						var message = "Confirm Password doesnot match with the New Password";
						valid('confirm_password',message);
						return false;
					}
					else{
						var formdata= new FormData();
						formdata.append('user_password',user_password);
						formdata.append('new_password',new_password);
						formdata.append('confirm_password',confirm_password);
						formdata.append('type','2');
						$.ajax({
							type:"post",
							data: formdata,
							processData: false,
							contentType: false,
							url:"user_save_action.php",
							beforeSend:function(){
								$("#change_pwd").html('<img src="images/ajax_loader.gif" alt="loader image" />');
							},
							success:function(res){
								$("#change_pwd").html('SAVE');
								res=res.trim();
								//alert(res);
								if(res == "1"){
									var message = "Password changes Successfully!!";
									show_MessageTimout(message,2000);
									setTimeout(function(){
										location.href='profile.php';
									}, 2000);
								}
								else if(res == "2"){
									var message = "Please Enter a valid Old Password";
									valid('user_password',message);
									return false;
								}
							}
						});
						return false;
					}
				});
				// Password Save //
				
				// Address Save //
				$("#address_save").click(function(){
					var user_address1 = $("#user_address1").val().trim();
					var user_address2 = $("#user_address2").val().trim();
					var user_country = $("#user_country").val().trim();
					var user_state = $("#user_state").val().trim();
					var user_city = $("#user_city").val().trim();
					var user_pincode = $("#user_pincode").val().trim();
					var user_additional_info = $("#user_additional_info").val().trim();
					var alphanum = /^[0-9a-zA-Z]+$/;  
					if(user_address1 == ''){
						var message = "Please Enter some address detail";
						valid('user_address1',message);
						return false;
					}
					else if(user_country == ''){
						var message = "Please Enter a Country Name";
						valid('user_country',message);
						return false;
					}
					else if(user_state == ''){
						var message = "Please Enter a State Name";
						valid('user_state',message);
						return false;
					}
					else if(user_city == ''){
						var message = "Please Enter a City Name";
						valid('user_city',message);
						return false;
					}
					else if(user_pincode == '' || isNaN(user_pincode) || user_pincode.length != 6){
						var message = "Please Enter a valid 6 digit pincode";
						valid('user_pincode',message);
						return false;
					}
					else{
						var formdata= new FormData();
						formdata.append('user_address1',user_address1);
						formdata.append('user_address2',user_address2);
						formdata.append('user_country',user_country);
						formdata.append('user_state',user_state);
						formdata.append('user_city',user_city);
						formdata.append('user_pincode',user_pincode);
						formdata.append('user_additional_info',user_additional_info);
						formdata.append('type','3');
						$.ajax({
							type:"post",
							data: formdata,
							processData: false,
							contentType: false,
							url:"user_save_action.php",
							beforeSend:function(){
								$("#change_pwd").html('<img src="images/ajax_loader.gif" alt="loader image" />');
							},
							success:function(res){
								$("#change_pwd").html('SAVE');
								res=res.trim();
								//alert(res);
								if(res == "1"){
									var message = "Address Details Saved Successfully!!";
									show_MessageTimout(message,2000);
									setTimeout(function(){
										location.href='profile.php';
									}, 2000);
								}
							}
						});
						return false;
					}
				});
				// Address Save //
				
				
			});
			
		</script>
		<?php
		}
		else{
		?>
		<script>
			window.location.href="logout.php";
		</script>
		<?php
		}
	}
	else{
	?>
	<script>
		window.location.href="logout.php";
	</script>
	<?php
	}
?>
</body>
</html>