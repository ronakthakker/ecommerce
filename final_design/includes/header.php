<!DOCTYPE html>
	
	<html lang="en">
		
		<?php 
			if(!session_id()){
				session_start();
			}
			$str= $_SERVER['REQUEST_URI'];
			$login_url = basename($str);
			$base = basename($str,".php");
			$base1 = $base;
			$base = explode("?",$base);
			$base = basename($base[0],".php");
			
			require_once("adminpanel/lib/helper.php");
		?>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
			<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
			<title>David Raphael</title>
			<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/libs/php5shiv/3.7.0/php5shiv.js"></script>
				<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
			<!--all-->
			<link rel="stylesheet" type="text/css" href="css/default.css" media="all" />
			<!--all-->
			<!--animate-->
			<link rel="stylesheet" href="css/animate.css">
			<!--animate-->
			<!--owlcarousel-Best Of Our Store and Popular Brands-->
			<link rel='stylesheet' href='css/owl.theme.default.min.css'>
			<link rel="stylesheet" href="js/carousel/owlcarousel/assets/owl.carousel.min.css">
			<link rel="stylesheet" href="js/carousel/owlcarousel/assets/owl.theme.default.min.css">
			<!--owlcarousel-Best Of Our Store and Popular Brands-->
			<!--searchbar-Top Header-->
			<script src="js/searchbar/js/modernizr.custom.js"></script>
			<!--searchbar-->
			<!--library js-->
			<script src="js/jquery.js"></script>
			<!--library js-->
			<!-- iosSlider plugin Main Slider -->
			<script type="text/javascript" src = "js/slider/jquery.easing-1.3.js"></script>
			<script src = "js/slider/jquery.iosslider.js"></script>
			<!-- iosSlider plugin -->
			<!--owlcarousel-Best Of Our Store and Popular Brands -->
			<script src="js/carousel/owlcarousel/owl.carousel.js"></script>
			<script src = "js/owl-carousel.js"></script>
			<!--owlcarousel-->
			<!--scrolltop-->
			<script type="text/javascript" src="js/scrolltopcontrol.js"></script>
			<script src="js/sliderengine/amazingslider.js"></script>
			<script src="js/sliderengine/initslider-1.js"></script>
			<!--scrolltop-->
		</head>
		<body>
			<div id="preloader"></div>
			<!--modal popup-->
			<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title">Login</h4>
						</div>
						<!-- Modal Body -->
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="email" class="form-control"  placeholder="Email"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="password" class="form-control"  placeholder="Password"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<button type="submit" class="btn btn-default button-1">Sign in</button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<div class="boder3"></div>
										<p><a href="" data-toggle="modal" data-target="#myModalHorizontal3">Create New Account</a>&nbsp; |&nbsp;<a href="#" data-toggle="modal" data-target="#myModalHorizontal4">Forgot Password</a></p>
										<div class="boder3"></div>
									</div>
								</div>
							</form>
						</div>
						<!-- Modal Footer -->
					</div>
				</div>
			</div>
			<div class="modal fade" id="myModalHorizontal2" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<button type="button" class="close" 
							data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title">Register</h4>
						</div>
						<!-- Modal Body -->
						<div class="modal-body">
							<form class="form-horizontal">  
								<div class="form-group">
									<div class="col-sm-12">
										<input type="email" class="form-control"  placeholder="Email"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="password" class="form-control"  placeholder="Password"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="password" class="form-control"  placeholder="Confirm password"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<button type="submit" class="btn btn-default button-1">Create a Account</button>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<div class="boder3"></div>
										<p><a href="" data-toggle="modal" data-target="#myModalHorizontal3">Create New Account</a>&nbsp; |&nbsp;<a href="#" data-toggle="modal" data-target="#myModalHorizontal4">Forgot Password</a></p>
										<div class="boder3"></div>
									</div>
								</div>
							</form>
						</div>
						<!-- Modal Footer -->
					</div>
				</div>
			</div>
			<div class="modal fade" id="myModalHorizontal3" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<button type="button" class="close" 
							data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title">Create New Account</h4>
						</div>
						<!-- Modal Body -->
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="email" class="form-control"  placeholder="Email"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="password" class="form-control"  placeholder="Password"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="password" class="form-control"  placeholder="Confirm password"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12 text">
										<button type="submit" class="btn btn-default button-1">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- Modal Footer -->
					</div>
				</div>
			</div>
			<div class="modal fade" id="myModalHorizontal4" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<button type="button" class="close" 
							data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title">Forgot Password</h4>
						</div>
						<!-- Modal Body -->
						<div class="modal-body">
							<form class="form-horizontal">
								<div class="form-group">
									<div class="col-sm-12">
										<input type="email" class="form-control"  placeholder="Email"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<button type="submit" class="btn btn-default button-1">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- Modal Footer -->
					</div>
				</div>
			</div>
			<!--modal popup-->
			<!--sidebar-->
			<div id="push_sidebar">
				<div class="right-logo"><a href="index.php"><img src="images/logo.png" class="img-responsive" alt="jewellery" title="jewellery"></a></div>
				<ul class="list-unstyled">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Shop</a>
						<ul class="dropdown-menu">
							<li><a href="product.php">Bracelets</a></li>
							<li><a href="product.php">Chains</a></li>
							<li><a href="product.php">Earrings</a></li>
							<li><a href="product.php">Necklaces</a></li>
							<li><a href="product.php">Pendants</a></li>
							<li><a href="product.php">Rings</a></li>
						</ul>
					</li>
					<!-- <li><a href="blog.php">Blog</a></li> -->
					<!-- <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages</a> -->
					<!-- <ul class="dropdown-menu"> -->
					<!-- <li><a href="404.php">404</a></li> -->
					<!-- <li><a href="faq.php">FAQ</a></li> -->
					<!-- <li><a href="privacy.php">Privacy</a></li> -->
					<!-- <li><a href="coming-soon.php">Coming soon</a></li> -->
					<!-- <li><a href="terms-and-conditions.php">Terms & Condition</a></li> -->
					<!-- </ul> --> 
					<!-- </li> -->
					<li><a href="#">Contact us</a></li>
					<li class="sign-in">
						<input type="button" value="sign in" data-toggle="modal" data-target="#myModalHorizontal">
						\
						<input  value="sign Up"  type="button" data-toggle="modal" data-target="#myModalHorizontal2">
					</li>
				</ul>
				<br>
				<div class="social-network social-circle text-right"><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></div>
			</div>
			<!--sidebar-->
			<!--nav-->
			<nav class="navbar navbar-custom navbar-fixed-top">
				<div class="navbar-header"> <a class="navbar-brand" href="index.php"> <img class="img-responsive" alt="" title="" src="images/logo.png"> </a> </div>
				<span class="nav_trigger"><i class="fa fa-navicon"></i></span>
				<ul class="navbar-nav2">
					<?php
						if(isset($_SESSION['skinbae_user'])){
							$user_id = base64_decode(base64_decode(base64_decode(base64_decode($_SESSION['skinbae_user']))));
							$get_user = $obj->select("*","user_master","user_id='$user_id' AND user_status='1'");
							if(is_array($get_user)){
							?>
							<li class="dropdown hasmenu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo substr($get_user[0]['user_username'],0,7); if(strlen($get_user[0]['user_username']) >= 7){ echo "..";} ?> <span class="fa fa-angle-down"></span></a>
								<ul class="dropdown-menu">
									<li><a href="profile.php">Profile</a></li>
									<li><a href="logout.php">Logout</a></li>
								</ul>
							</li>
							<?php
							}
						}
						else{	
						?>
						<li><a href="#" data-toggle="modal" data-target="#Login"><i class="fa fa-unlock-alt" aria-hidden="true"></i></a></li>
						<?php
						}
					?>
					
					<li class="search-div">
						<div id="sb-search" class="sb-search <?php if(isset($_GET['search'])){ echo "open"; }?>">
							<form method="GET">
								<input class="sb-search-input"  placeholder="Search" type="text" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>" name="search" id="pro_input">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"></span>
							</form>
						</div>
					</li>
					<li id="cart_menu">
						<?php
							if(isset($_SESSION['skinbae_user'])){
								$user_id = base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_SESSION['skinbae_user'])))));
								$get_cart = $obj->select("P.*, CA.*, M.user_id","user_cart AS CA INNER JOIN user_master AS M ON CA.cart_user_id=M.user_id INNER JOIN product_master AS P ON P.product_id=CA.cart_product_id","CA.cart_status='1' AND P.product_status='1' AND M.user_status='1' AND M.user_id='$user_id'");
								
							?>
							<a href="cart.php">
								<i class="fa fa-shopping-cart" aria-hidden="true"></i> 
								<span class="round"><?php if(is_array($get_cart)){ echo count($get_cart); }else{?> 0 <?php } ?>
								</span>
							</a>
							<?php
							}
							else{
							?>
							<a href="#" data-toggle="modal" data-target="#Login">
								<i class="fa fa-shopping-bag"></i>
							</a>
							<?php
							}
							if(isset($_SESSION['skinbae_user'])){
							?>
							<ul class="dropdown-menu start-right cart-drop" role="menu">
								<li class="shopcart">
									<?php
										if(is_array($get_cart)){
										?>
										<table class="table">
											<tbody>
												<?php
													$total = round(0.00,2);
													foreach($get_cart as $cart_val){
													?>
													<tr class="row">
														<td class="col-md-3"><img src="<?php echo $cart_val['product_image_link']; ?>" alt="<?php echo $cart_val['product_title']; ?>"></td>
														<td class="col-md-7">
															<h4><a href="#"><?php echo $cart_val['product_title']; ?></a></h4>
															<small> Price : &#8377; <?php echo $cart_val['product_selling_price']; ?></small>
															<small> Quanity : <?php echo $cart_val['cart_quantity']; ?></small>
														</td>
														<td class="col-md-2"><a onclick="remove_cart('<?php echo $cart_val['cart_id']; ?>')" class="closeme"><i class="fa fa-close"></i></a></td>
													</tr>
													<?php
														$total = round($total + (round($cart_val['product_selling_price']*$cart_val['cart_quantity'],2)),2);
													}	
												?>
											</tbody>
										</table>
										<div class="clearfix"></div>
										<div class="text-center">
											<h3>CART TOTAL: &#8377; <?php echo $total; ?></h3>
										</div>
										<?php
										}	
									?>
									<div class="clearfix"></div>
									<div class="text-center">
										<?php if(is_array($get_cart)){ ?> <a href="cart.php">View Cart</a> or <?php } ?> <a href="products.php">Continue Shopping</a>
									</div>
								</li>
							</ul>
							<?php
							}
						?>
						
					</li>
					
				</ul>
			</nav>	
		<div id="snackbar"><span class="toastmessgae"></span></div>																															