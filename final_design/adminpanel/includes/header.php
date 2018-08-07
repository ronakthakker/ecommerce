<?php

	require_once('includes/access.php');
	
	
	$str= $_SERVER['REQUEST_URI'];
	$base = basename($str,".php");
	$base1 = $base;
	$base = explode("?",$base);
	$base = basename($base[0],".php");
	
	require_once("lib/helper.php");
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Ecomm</title>
	<link rel="icon" href="../images/favicon.png" type="images/png" sizes="16x16">
	<link href="css/style.default.css" rel="stylesheet">
	<link href="css/morris.css" rel="stylesheet">
	<link href="css/select2.css" rel="stylesheet" />
	<link href="css/style.datatables.css" rel="stylesheet">
	<link href="css/dataTables.responsive.css" rel="stylesheet">
	<link href="css/dropzone.css" rel="stylesheet" />
	<script src="ckeditor/ckeditor.js"></script>
	<style type="text/css">
		.button_margin{
		margin-top: 15px;
		}
		
		input,textarea{
		margin-bottom: 3px;
		}
		
		.span_err{
		color:red;
		}
		
		.input_err{
		border: 1px solid red;
		}
		
		.hide{
		display:none;
		}
		
		.required_field{
		font-size: 20px;
		color:red;
		}
		
		.dashboard_logo{
    width: 30%;
		}
		
	</style>
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	
	<header>
		<div class="headerwrapper">
			<div class="header-left">
				<a href="product_list.php" class="logo" style="color: white;font-size: 17px;font-weight: inherit;margin-left: 12px;">
					<img src="../images/logo.png" alt="" class="LOGO" />
				</a>
				<div class="pull-right">
					<a href="" class="menu-collapse">
						<i class="fa fa-bars"></i>
					</a>
				</div>
			</div><!-- header-left -->
			
			<div class="header-right">
				
				<div class="pull-right">
					<div class="btn-group btn-group-option">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-caret-down"></i>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<!-- <li><a href="#"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
								<li><a href="#"><i class="glyphicon glyphicon-star"></i> Activity Log</a></li>
								<li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
								<li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
								<li class="divider"></li> -->
							<li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
						</ul>
					</div><!-- btn-group -->
					
				</div><!-- pull-right -->
				
			</div><!-- header-right -->
			
		</div><!-- headerwrapper -->
	</header>		