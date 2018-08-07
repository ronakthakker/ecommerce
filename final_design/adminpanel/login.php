<?php
	if(!session_id()){
		session_start();
	}
	if(isset($_SESSION['skinbae_admin_id'])){
	?>
	<script>
		window.location.href="product_list.php";
	</script>
	<?php
	}
	else{
	?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
			<meta name="description" content="">
			<meta name="author" content="">
			
			<title>david raphel</title>
			
			<link href="css/style.default.css" rel="stylesheet">
			
			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
				<script src="js/html5shiv.js"></script>
				<script src="js/respond.min.js"></script>
			<![endif]-->
			
			<style type="text/css">
				.span_err{
				color:red;
				}
				
				.input_err{
				border: 1px solid red;
				}
				
				.mb15{
				margin-bottom: 4px;
				margin-top: 5px;
				}
				
				.hide{
				display:none;
				}
				
				.logo_img{
				width: 30%;
				}
			</style>
		</head>
		
		<body class="signin">
			
			
			<section>
				
				<div class="panel panel-signin">
					<div class="panel-body">
						<div class="logo text-center">
							<img class="logo_img" src="../images/logo.png" alt="Logo" >
						</div>
						<br />
						<center><h4>ADMIN LOGIN</h4></center>
						<br>
						<div class="alert alert-danger hide">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Invalid Credentials</strong>
						</div>
						<div class="mb25"></div>
						
						<form method="post" name="login_form">
							<div class="input-group mb15">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" class="form-control" placeholder="Username" id="user_name" name="user_name">
							</div><!-- input-group -->
							<span style="margin-left: 42px;" class="span_err" id="user_name_err"></span>
							<div class="input-group mb15">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" class="form-control" placeholder="Password" id="user_password" name="user_password">
							</div><!-- input-group -->
							<span style="margin-left: 42px;" class="span_err" id="user_password_err"></span>
							<div class="clearfix">
								<div class="pull-left">
									<!-- <div class="ckbox ckbox-primary mt10">
										<input type="checkbox" id="rememberMe" value="1">
										<label for="rememberMe">Remember Me</label>
									</div> -->
								</div>
								<br>
								<div class="text-center">
									<input type="submit" class="btn btn-success" id="login_btn" value="Sign In">
									<img height="32px" width="32px" src="images/loading.gif" class="pull-right hide" id="loader">
								</div>
							</div>                      
						</form>
						
					</div><!-- panel-body -->
					<!-- <div class="panel-footer">
						<a href="signup.html" class="btn btn-primary btn-block">Not yet a Member? Create Account Now</a>
					</div> --><!-- panel-footer -->
				</div><!-- panel -->
				
			</section>
			
			
			<script src="js/jquery-1.11.1.min.js"></script>
			<script src="js/jquery-migrate-1.2.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/modernizr.min.js"></script>
			<script src="js/pace.min.js"></script>
			<script src="js/retina.min.js"></script>
			<script src="js/jquery.cookies.js"></script>
			
			<script src="js/custom.js"></script>
			
			<script type="text/javascript">
				$("#login_btn").click(function(){
					var user_name = $("#user_name").val();
					var user_password = $("#user_password").val();
					if(user_name == "")
					{
						var message = "Please Enter Username";
						valid('user_name',message);
						return false;
					}
					else if(user_password == "")
					{
						var message = "Please Enter Password";
						valid('user_password',message);
						return false;				
					}
					else
					{
						$(".alert").addClass("hide");
						$.ajax({
							type:"post",
							data:"user_name="+user_name+"&user_password="+user_password,
							url:"ajax/login_action.php",
							beforeSend:function(){
								$("#loader").removeClass("hide");
							},
							success:function(res){
								$("#loader").addClass("hide");
								res=res.trim();
								//alert(res);
								//console.log(res);
								if(res != 1)
								{
									$(".alert").removeClass("hide");
								}
								else
								{
									location.href="product_list.php";
								}                 
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
			
		</body>
	</html>
	<?php
	}	
?>
