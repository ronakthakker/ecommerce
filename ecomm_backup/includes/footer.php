
<footer class="section-footer bg-inverse btop">
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-lg-4">
				<div class="media">
					<div class="media-left">
						<span class="media-object icon-logo display-1"></span>
					</div>
					<p>
						Ecomm &copy;,  <?php echo date('Y', strtotime("now"));?><br>
					Powered by <a href="http://www.onerooftech.com/" target="_blank">OneRoof Technologies LLP</a></p>
				</div>
			</div>
			<div class="col-md-7 col-lg-8">
				<ul class="list-inline text-right">
					<li><a href="#">About</a></li>
					<li><a href="#">Disclaimer</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Terms & Conditions</a></li>
					<li><a href="#">Refund/Exchange Policies</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a class="topbutton" href="#">Top <i class="fa fa-angle-up"></i></a></li>
				</ul>
				
				<ul class="list-inline text-right">
					<li><a href="#"><img src="images/icons/payment_01.png" alt=""></a></li>
					<li><a href="#"><img src="images/icons/payment_02.png" alt=""></a></li>
					<li><a href="#"><img src="images/icons/payment_03.png" alt=""></a></li>
					<li><a href="#"><img src="images/icons/payment_04.png" alt=""></a></li>
					<li><a href="#"><img src="images/icons/payment_05.png" alt=""></a></li>
					<li><a href="#"><img src="images/icons/payment_06.png" alt=""></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
</div><!-- end wrapper -->
<!-- END SITE -->

<div class="modal fade" id="Login" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-body">
				
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<div class="row promo-item">
					<div class="col-md-8 col-md-offset-2">
						<div class="shop-item-title widget-title clearfix">
							<h4 class="text-center">LOGIN</h4>
							<div class="shopmeta clearfix">
								<!--    <span>Please complete all fields * to before send email.</span> -->
							</div><!-- end shop-meta -->
							
							<div class="shop-desc-style">
                        <div class="contact_form">
									<div id="message"></div>
									<form id="Loginform" class="row" action="#" name="contactform" method="post">
										<div class="col-lg-12 text-center ">
											
											<span class="span_err" id="valid_login_err"></span> 
											<input type="text" name="user_email" id="user_email" class="form-control" placeholder="Enter Email">
											<span class="span_err" id="user_email_err"></span> 
											<input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter Password">
											<span class="span_err" id="user_password_err"></span> 
											<button type="submit" value="" id="submit_login" class="btn custombutton button--isi btn-primary text-center"> Login <img src="images/ajax_loader.gif" class="hidden" /></button>
											<div class="clearfix"></div>
											<a href="#" class="pull-right pt18" data-dismiss="modal" data-toggle="modal" data-target="#ForgotPassword">Forgot Password??</a>
											<div class="clearfix"></div>
										</div>
										<div class="col-lg-12 text-center">
											<h5>Dont have an account??</h5>
											<a href="#" class="create_acc" data-dismiss="modal" data-toggle="modal" data-target="#Register">CREATE ACCOUNT</a>
										</div>
									</form> 
								</div>
							</div>
						</div><!-- end shop-item-title -->
					</div><!-- end col -->
					
					
				</div><!-- end row promoitem -->
			</div><!-- end modalbody -->
		</div><!-- end moda-content -->
	</div>
</div>

<div class="modal fade" id="Register" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-body">
				
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<div class="row promo-item">
					<div class="col-md-8 col-md-offset-2">
						<div class="shop-item-title widget-title clearfix">
							<h4 class="text-center">REGISTER</h4>
							<div class="shopmeta clearfix">
								<!--    <span>Please complete all fields * to before send email.</span> -->
							</div><!-- end shop-meta -->
							
							<div class="shop-desc-style">
                        <div class="contact_form">
									<div id="message"></div>
									<form id="Registerform" class="row" name="contactform" method="post">
										<div class="col-lg-12 text-center ">
											<input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter First Name"> 
											<span class="span_err" id="user_username_err"></span> 
											<input type="text" name="user_lastname" id="user_lastname" class="form-control" placeholder="Enter First Name"> 
											<span class="span_err" id="user_lastname_err"></span> 
											<input type="email" name="user_reg_email" id="user_reg_email" class="form-control" placeholder="Enter Email">
											<span class="span_err" id="user_reg_email_err"></span>
											<input type="password" name="user_reg_password" id="user_reg_password" class="form-control" placeholder="Enter Password">
											<span class="span_err" id="user_reg_password_err"></span>
											<input type="password" name="user_cnfrm_password" id="user_cnfrm_password" class="form-control" placeholder="Enter Password">
											<span class="span_err" id="user_cnfrm_password_err"></span>
											<div class="clearfix"></div>
											<button type="submit" value="Create Account"  id="register" class="btn custombutton button--isi btn-primary text-center"> Create Account <img src="images/ajax_loader.gif" class="hidden" /></button> 
											<div class="clearfix"></div>
											<span class="tryagain_error error">Please Try again after some time</span>
										</div>
										
										<div class="col-lg-12 text-center">
											<h5>Already have an account??</h5>
											<a href="#" class="create_acc switchtologin" data-dismiss="modal" data-toggle="modal" data-target="#Login">LOGIN</a>
										</div>
									</form> 
								</div>
								
							</div>
						</div><!-- end shop-item-title -->
					</div><!-- end col -->
					
					
				</div><!-- end row promoitem -->
			</div><!-- end modalbody -->
		</div><!-- end moda-content -->
	</div>
</div>

<div class="modal fade" id="ForgotPassword" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-body">
				
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<div class="row promo-item">
					<div class="col-md-8 col-md-offset-2">
						<div class="shop-item-title widget-title clearfix">
							<h4 class="text-center">FORGOT PASSWORD</h4>
							<div class="shopmeta clearfix">
							</div><!-- end shop-meta -->
							
							<div class="shop-desc-style">
								<div class="contact_form">
									<div id="message"></div>
									<form id="contactform" class="row" action="#" name="contactform" method="post">
										<div class="col-lg-12 text-center ">                                
											
											<input type="email" name="Email" id="Email" class="form-control" placeholder="Enter Email"> 
											
											<button type="submit" value="SEND" id="submit" class="btn custombutton button--isi btn-primary text-center"> Send</button> 
										</div>
										
										
									</form> 
								</div>
								
							</div>
						</div><!-- end shop-item-title -->
					</div><!-- end col -->
					
					
				</div><!-- end row promoitem -->
			</div><!-- end modalbody -->
		</div><!-- end moda-content -->
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="mesasgeModal" role="dialog">
	<div class="modal-dialog modal-md" >
		<!-- Modal content-->
		<div class="modal-content">
			
			<div class="modal-body">
				<div class='row'>
					<div class='col-md-12 text-center' id="message_div">
					</div>
				</div>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div> -->
		</div>
	</div>
</div>
<a id="message_trigger" data-toggle='modal' data-target='#mesasgeModal' data-dismiss="modal"></a>

<!-- Modal -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/plugins.js"></script>
<script src="js/banner-grid.js"></script>

<!-- SLIDER REV -->
<script src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script>
	jQuery(document).ready(function() {
		jQuery('.tp-banner').show().revolution(
		{
			dottedOverlay:"none",
			delay:16000,
			startwidth:1170,
			startheight:504,
			hideThumbs:200,     
			thumbWidth:100,
			thumbHeight:50,
			thumbAmount:5,  
			navigationType:"none",
			navigationArrows:"solo",
			navigationStyle:"preview3",  
			touchenabled:"on",
			onHoverStop:"on",
			swipe_velocity: 0.7,
			swipe_min_touches: 1,
			swipe_max_touches: 1,
			drag_block_vertical: false,          
			parallax:"mouse",
			parallaxBgFreeze:"on",
			parallaxLevels:[10,7,4,3,2,5,4,3,2,1],
			parallaxDisableOnMobile:"off",           
			keyboardNavigation:"off",   
			navigationHAlign:"center",
			navigationVAlign:"bottom",
			navigationHOffset:0,
			navigationVOffset:20,
			soloArrowLeftHalign:"left",
			soloArrowLeftValign:"center",
			soloArrowLeftHOffset:20,
			soloArrowLeftVOffset:0,
			soloArrowRightHalign:"right",
			soloArrowRightValign:"center",
			soloArrowRightHOffset:20,
			soloArrowRightVOffset:0,  
			shadow:0,
			fullWidth:"off",
			fullScreen:"off",
			spinner:"spinner4",  
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",  
			autoHeight:"off",           
			forceFullWidth:"off",                         
			hideThumbsOnMobile:"off",
			hideNavDelayOnMobile:1500,            
			hideBulletsOnMobile:"off",
			hideArrowsOnMobile:"off",
			hideThumbsUnderResolution:0,
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			startWithSlide:0,
			fullScreenOffsetContainer: ""  
		}); 
	});
</script>
<script src="js/bootstrap-select.min.js"></script>
<script type="text/javascript">
	$('.selectpicker').selectpicker({
      style: 'btn-default'
	});
	
	$(".megadrop").click(function(){
		var a= $(this).attr("id");
		$(".showonclick").fadeOut("fast");
		$(".megadrop").removeClass("active");
		$(this).addClass("active");
		$(".hideonclick").slideUp("fast");
		$(".showonclick"+"."+a).fadeIn("slow");
	});
	
	$(".backtomainmenu").click(function(){
		$(".showonclick").fadeOut("fast");
		$(".hideonclick").slideDown("fast");
		$(".megadrop").removeClass("active");
	});
	
	function showtoast() {
		$("#snackbar").fadeIn("slow").delay("3000").fadeOut("slow");
	}
	
	// Login //
	
	$("#submit_login").click(function(){
		var user_email = $("#user_email").val().trim();
		var user_password = $("#user_password").val().trim();
		
		if(user_email == ""){
			var message = "Please Enter a valid Email";
			valid('user_email',message);
			return false;
		}
		else if(user_password == ""){
			var message = "Please Enter a valid Password";
			valid('user_password',message);
			return false;
		}
		else{
			var formdata_login = new FormData();
			formdata_login.append('user_email', user_email);
			formdata_login.append('user_password', user_password);
			formdata_login.append('url', "<?php echo $login_url; ?>");
			$.ajax({
				type: "POST",
				data: formdata_login,
				processData: false,
				contentType: false,
				url: "login_action.php",
				beforeSend: function () {
					$("#submit_login img").removeClass("hide");
				},
				success: function (res) {
					res = res.trim();
					//alert(res);
					$("#submit_login img").addClass("hide");
					if(res == 'false'){
						var message = "The Email and Password you entered didn't match any account";
						valid('valid_login',message);
						return false;
					}
					else{
						$("#snackbar span").html("Logging in");
						showtoast();
						window.location.href=res;
					}
				}
			});
			return false;
		}
	});
	
	// Login //
	
	// Register //
	
	$("#register").click(function(){
		var user_username = $("#user_username").val().trim();
		var user_lastname = $("#user_lastname").val().trim();
		var user_reg_email = $("#user_reg_email").val().trim();
		var user_reg_password = $("#user_reg_password").val().trim();
		var user_cnfrm_password = $("#user_cnfrm_password").val().trim();
		var alpha = /^([a-zA-Z])+$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var alphanum = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/;
		
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
		else if(user_reg_email == "" || !filter.test(user_reg_email)){
			var message = "Please Enter a valid Email Id";
			valid('user_reg_email',message);
			return false;
		}
		else if(user_reg_password != "" && !alphanum.test(user_reg_password)){
			var message = "Password should be alphanumeric only and should contain atleast 1 character and number";
			valid('user_reg_password',message);
			return false;
		}
		else if(user_reg_password == "" || user_reg_password.length<=7){
			var message = "Password should be atleast 8 characters";
			valid('user_reg_password',message);
			return false;
		}
		else if(user_reg_password !== user_cnfrm_password){
			var message = "Confirm Password doesnot match";
			valid('user_cnfrm_password',message);
			return false;
		}
		else{
			var formdata_register = new FormData();
			formdata_register.append('user_username', user_username);
			formdata_register.append('user_lastname', user_lastname);
			formdata_register.append('user_email', user_reg_email);
			formdata_register.append('user_password', user_reg_password);
			$.ajax({
				type: "POST",
				data: formdata_register,
				processData: false,
				contentType: false,
				url: "register_action.php",
				beforeSend: function () {
					$("#register img").removeClass("hidden");
				},
				success: function (res) {
					res = res.trim();
					//alert(res);
					$("#register img").addClass("hidden");
					if(res == '1'){
						var message = "This Email is already registered with us.";
						valid('user_reg_email',message);
						return false;
					}
					else if(res == '2'){
						var message = "You have successfully registered.Please Login to continue.";
						show_MessageTimout(message,5000);
						setTimeout(function(){
							location.href='index.php';
						}, 5000);
					}
				}
			});
			return false;
		}
	});
	
	// Register //
	
	// Product Search //
	$("#prod_search").click(function(){
		var search_input = $("#pro_input").val().trim();
		
		var append = "";
		var concat = "";
		<?php 
			if(isset($_GET['category'])){
			?>
			if(append === ""){
				var concat = "?";
			}
			else{
				var concat = "&";
			}
			var append = append+concat+"category=<?php echo addslashes($_GET['category']); ?>";
			<?php
			}
			if(isset($_GET['device'])){
			?>
			append = append.trim();
			if(append === ""){
				var concat = "?";
			}
			else{
				var concat = "&";
			}
			var append = append+concat+"device=<?php echo addslashes($_GET['device']); ?>";
			<?php
			}
			if(isset($_GET['brand'])){
			?>
			append = append.trim();
			if(append === ""){
				var concat = "?";
			}
			else{
				var concat = "&";
			}
			var append = append+concat+"brand=<?php echo addslashes($_GET['brand']); ?>";
			<?php
			}
			if(isset($_GET['design'])){
			?>
			append = append.trim();
			if(append === ""){
				var concat = "?";
			}
			else{
				var concat = "&";
			}
			var append = append+concat+"design=<?php echo addslashes($_GET['design']); ?>";
			<?php
			}
		?>
		if(search_input != ""){
			append = append.trim();
			if(append === ""){
				var concat = "?";
			}
			else{
				var concat = "&";
			}
			var append = append+concat+"search="+search_input;
		}
		window.location.href="products.php"+append;
		return false;
	});
	// Product Search //
	
	// Accept Only Numbers without zero Function //
	function validate(key){
		//getting key code of pressed key
		var keycode = (key.which) ? key.which : key.keyCode;
		//comparing pressed keycodes
		if (!(keycode==8 || keycode==46)&&(keycode < 49 || keycode > 57)){
			return false;
		}
	}
	// Accept Only Numbers without zero Function //
	
	
	// Accept Only Numbers Function //
	function validate_ph(key){
		//getting key code of pressed key
		var keycode = (key.which) ? key.which : key.keyCode;
		//comparing pressed keycodes
		if (!(keycode==8 || keycode==46)&&(keycode < 48 || keycode > 57)){
			return false;
		}
	}
	// Accept Only Numbers Function //
	
	// Add/Remove Cart //
	// Cart Menu //
	function add_to_cart(peid,pid,qty,opt){
		var og_qty = qty;
		if(qty == ""){
			qty = $("#quantity_"+pid).val();
			if(qty == "" || isNaN(qty)){
				qty = 1;
			}
		}
		if(isNaN(qty)){
			qty = 1;
		}
		var formdata = new FormData();
		formdata.append('product_id', peid);
		formdata.append('quantity', qty);
		formdata.append('type', "1");
		formdata.append('opt', opt);
		$.ajax({
			type: "POST",
			data: formdata,
			processData: false,
			contentType: false,
			url: "cart_action.php",
			beforeSend: function () {
				$("#cart_menu").html('<img src="images/ajax_loader.gif" alt="loader image" />');
			},
			success: function (msg) {
				msg = msg.trim();
				alert(msg);
				if(msg == "2"){
					var message = "Something went wrong. Please try again";
					show_MessageTimout(message,2000);
				}
				else{
					var message = "Product Added to Cart Successfully";
					show_MessageTimout(message,2000);
					$("#cart_menu").html(msg);
				}
			}
		});
		return false;
	}
	
	function remove_cart(cid){
		if(!isNaN(cid)){
			var formdata = new FormData();
			formdata.append('cart_id', cid);
			formdata.append('type', "2");
			
			$.ajax({
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				url: "cart_action.php",
				beforeSend: function () {
					$("#cart_menu").html('<img src="images/ajax_loader.gif" alt="loader image" />');
				},
				success: function (msg) {
					msg = msg.trim();
					//alert(msg);
					if(msg == "2"){
						var message = "Something went wrong. Please try again";
						show_MessageTimout(message,2000);
					}
					else{
						var message = "Product Removed from cart Successfully";
						show_MessageTimout(message,2000);
						$("#cart_menu").html(msg);
					}
				}
			}),
			$.ajax({
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				url: "refresh_cart_page.php",
				beforeSend: function () {
					$("#cart_body").html('<img src="images/ajax_loader.gif" alt="loader image" />');
				},
				success: function (msg) {
					msg = msg.trim();
					$("#cart_body").html(msg);
				}
			})
		}
		else{
			var message = "Something went wrong. Please try again";
			show_MessageTimout(message,2000);
		}
		return false;
	}
	// Cart Menu //
	// Add/remove Cart //
	
	// Modal Function// 
	function show_MessageTimout(message,seconds)
	{
		$("#message_div").html(message);
		$('.modal').modal('hide');
		$("#message_trigger").trigger('click');
		setTimeout(function(){
			$('.modal').modal('hide');
			$("#message_div").html("");
		}, seconds);
	}
	// Modal Function// 
	
	// Error Message Display //
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
	// Error Message Display //
	</script>																																																									