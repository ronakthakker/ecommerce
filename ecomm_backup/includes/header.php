<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
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
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- SITE META -->
		<title>Ecomm | All Laptops, Apple & Samsung All Mobile Phones Cases Online in Dubai</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keywords" content="">
		
		<!-- FAVICONS -->
		<link rel="shortcut icon" href="images/logo.png" type="image/png">
		
		<!-- TEMPLATE STYLES -->
		<link rel="stylesheet" type="text/css" href="rs-plugin/css/settings.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/carousel.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		
		<!-- CUSTOM STYLES -->
		<link rel="stylesheet" type="text/css" href="css/custom.css">
		
		<!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<style type="text/css">
			.header-search .search_result{
			max-height: 250px;
			overflow: auto;
			position: absolute;
			width: 100%;
			/* z-index: 11; */
			background: #fff;
			left: 0;
			box-shadow: 0 5px 5px #ccc;
			/* padding: 2%; */
			/* top: 58px; */
			}
			#custom-search-input{
			width:  260px;
			}
			.header-search{
			padding:0px!important;
			}
			.header-search .search_result ul li{
			font-size:  12px;
			position: relative;
			height: 18px;
			width: 99%;
			text-decoration: none;
			overflow: hidden;
			display: inline-block;
			white-space: nowrap;
			text-overflow: ellipsis;
			}
			.search_result ul li a{
			color: #949494;
			}
			.search_result ul li a:hover{
			color: #aaa98b!important;
			}
			.header-search h4{
			font-size: 14px;
			font-weight: 700;
			padding: 2px 0;
			border-bottom: 1px dashed #ccc;
			}
			.header-search .search_result::-webkit-scrollbar {
			width: 6px;
			}
			
			.header-search .search_result::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			}
			
			.header-search .search_result::-webkit-scrollbar-thumb {
			background-color: #aaa98b;
			outline: 1px solid white;
			border-radius: 50px;
			}
			.showonclick{
			display: none;
			position: absolute;
			width: 75%;
			top: 34px;
			margin-left: 25%;
			}
			.showonclick .dropdown-mega{
			/*   background: #fbfbfb;*/
			}
			.showonclick  .widget-title h4{
			font-size: 12px;
			text-transform: uppercase;
			}
			.megadrop.active{
			color: #d97647!important;
			font-weight: 600!important;
			}
			.showonclick .dropdown-mega{
			
			-webkit-column-count: 3; /* Chrome, Safari, Opera */
			-moz-column-count: 3; /* Firefox */
			column-count: 3;
			-webkit-column-gap: 40px; /* Chrome, Safari, Opera */
			-moz-column-gap: 40px; /* Firefox */
			column-gap: 40px;
			-webkit-column-rule: 1px solid #d8703f; /* Chrome, Safari, Opera */
			-moz-column-rule: 1px solid #d8703f; /* Firefox */
			column-rule: 1px solid #d8703f;
			
			}
			.showonclick .dropdown-mega  li{
			-webkit-column-break-inside: avoid; /* Chrome, Safari */
			page-break-inside: avoid;           /* Theoretically FF 20+ */
			break-inside: avoid-column;
			}
			.backtomainmenu{
			cursor: pointer;
			}
			.showonclick .dropdown-mega > li:last-child{
			border-bottom: 1px solid #efefef;
			}
			#snackbar {
			max-height: 60px;
			display: none;
			width: 320px;
			margin-left: -160px;
			background-color: rgb(206, 109, 62);
			color: #fff;
			text-align: center;
			border-radius: 2px;
			padding: 6px;
			position: fixed;
			z-index: 1111;
			left: 50%;
			top: 30px;
			font-size: 14px;
			box-shadow: 0 0 12px #444;
			}
			.closeme{
			cursor:pointer;
			}
			.span_err{
			color:red;
			font-size: 12px;
			}
			.input_err{
			border: 1px solid red;
			}
		</style>
	</head>
	<body>
		
		
		<!-- QUICK VIEW -->
		<div class="modal fade" id="ViewModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
            <div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<div class="row promo-item">
							<div class="col-md-6 col-sm-6  hidden-xs">
								<div class="shop-item">   
									<div class="entry">
										<a class="hover-image" href="#" title="">
											<div class="img-rotate">
												<img src="upload/case3.jpg" class="img-responsive" alt="">
												<img src="upload/case3.jpg" class="img-responsive rotate-image" alt="">
											</div>  
										</a>
										<div class="visible-buttons">
											<a data-tooltip="tooltip" data-placement="top" title="Add to Wishlist" href="shop-wishlist.html"><span class="fa fa-heart"></span></a>
											<a data-tooltip="tooltip" data-placement="top" title="Add to Compare" href="shop-compare.html"><span class="fa fa-star"></span></a>
										</div><!-- end buttons -->
									</div><!-- entry -->
								</div><!-- end relative -->
							</div><!-- end col -->
							
							<div class="col-md-6 col-sm-6">
								<div class="shop-item-title clearfix">
									<h4><a href="shop-single.html">Item Name</a></h4>
									<div class="shopmeta clearfix">
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div><!-- end rating -->
										<span><i class="fa fa-rupee"></i> 554.55</span>
									</div><!-- end shop-meta -->
									
									<div class="shop-desc-style">
										<p>Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap..</p>
										
										<a href="#" class="btn custombutton button--isi btn-primary btn-lg">ADD TO CART</a> <a class="wishlist-button" href="#"><i class="fa fa-heart-o"></i> Add to Wishlist</a>
									</div>
								</div><!-- end shop-item-title -->
							</div><!-- end col -->
						</div><!-- end row promoitem -->
					</div><!-- end modalbody -->
				</div><!-- end moda-content -->
			</div>
		</div>
		<!-- END QUICKWIEV -->
		
		<!-- START SITE -->
		<div id="wrapper">
			<header class="header">
            <div class="container-full">
					<nav class="navbar navbar-default yamm">
						<div class="container-fluid">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
							</div>
							
							<div id="navbar" class="navbar-collapse collapse">
								<ul class="nav navbar-nav">                                
									<li class="dropdown yamm-fw">
										<a href="products.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Products <span class="fa fa-angle-down"></span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="yamm-content container">
													<div class="row">
														<div class="col-md-3">
															<div class="widget">
																<div class="widget-title">
																	<h4>Browse by Brands</h4>
																	<hr>
																</div><!-- end widget-title -->
																<?php
																	$get_brands = $obj->select("*","brand_master","brand_status='1' LIMIT 10");
																	if(is_array($get_brands)){
																		$desktop = "";
																		$mobile = "";
																		foreach($get_brands as $brands_val){
																			$brand_id = $brands_val['brand_id'];
																			$get_count = $obj->select("COUNT(product_id) as count","products","brand_id='$brand_id'");
																			if(is_array($get_count)){
																				$item_cnt = $get_count[0]['count'];
																			}
																			else{
																				$item_cnt = 0;
																			}
																			$enc_id = base64_encode(base64_encode(base64_encode(base64_encode($brand_id))));
																			$desktop.= "<li  class='megadrop' id='$brands_val[brand_name]'><a href='#'> $brands_val[brand_name] <span>( $item_cnt )</span></a></li>";
																			
																			$mobile.= "<li><a href='products.php?brand=$enc_id'> $brands_val[brand_name] <span>( $item_cnt )</span></a></li>";
																		}
																	}
																?>
																<ul class="dropdown-mega hidden-xs">
																	<?php
																		echo $desktop;
																	?>
																	<li  class="megadrop"><a href="products.php">View All </a></li>
																	
																</ul>
																<ul class="dropdown-mega visible-xs visibleinsmall">
																	<?php
																		echo $mobile;
																	?>
																	<li  class="megadrop"><a href="products.php">View All </a></li>
																</ul>
															</div>
														</div>
														
														<div class="col-md-3 hideonclick">
															<div class="widget">
																<div class="widget-title">
																	<h4>Brand of Design</h4>
																	<hr>
																</div><!-- end widget-title -->
																<ul class="dropdown-mega">
																	<?php
																		$get_designs = $obj->select("*","design_master","design_status='1' LIMIT 8");
																		if(is_array($get_designs)){
																			foreach($get_designs as $design_val){
																				$design_id = $design_val['design_id'];
																				$get_cat_count = $obj->select("COUNT(product_id) as count","products","design_id='$design_id'");
																				if(is_array($get_cat_count)){
																					$cat_count = $get_cat_count[0]['count'];
																				}
																				else{
																					$cat_count = 0;
																				}
																			?>
																			<li><a href="products.php?design=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($design_val['design_id'])))); ?>"><?php echo $design_val['design_name'];?> <span>(<?php echo $cat_count; ?>)</span></a></li>
																			<?php
																			}
																			} 
																	?>
																	<li  class="megadrop"><a href="products.php">View All </a></li>
																	
																</ul>
															</div>
														</div>
														<!-- <div class="col-md-3 hideonclick">
															<div class="widget">
															<div class="widget-title">
															<h4>Browse by Style Guide</h4>
															<hr>
															</div>
															<ul class="dropdown-mega">
															<?php
																$get_style = $obj->select("*","products","product_status='1' LIMIT 8");
																if(is_array($get_style)){
																	foreach($get_style as $style_val){
																	?>
																	
																	<li><a href="products.php"><?php echo $style_val['product_style_guide_cat']?> <span>(85)</span></a></li>
																	<?php
																	}
																} 
															?>
															<li  class="megadrop"><a href="products.php">View All </a></li>
															
															
															
															</ul>
															</div>
														</div> -->
														
														<div class="col-md-6 hideonclick">
															<div class="widget-title">
																<h4>Latest</h4>
																<hr>
															</div><!-- end widget-title -->
															<?php
																$get_random = $obj->select("*","products","product_status='1' AND is_new='1' ORDER BY RAND() LIMIT 2");
																if(is_array($get_random)){
																	foreach($get_random as $random_val){
																	?>
																	<div class="col-md-6">
																		<div class="widget">
																			<div class="shopwidget">
																				<ul>
																					<li>
																						<div class="entry">
																							<img src="<?php echo $random_val['product_image_link']; ?>" alt="">
																						</div><!-- end entry -->
																						<h3><a href="single-product.php?product_id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($random_val['product_id'])))); ?>" title=""><?php echo $random_val['product_title']; ?></a>
																						<span class="new-price">&#8377;<?php echo $random_val['product_selling_price']; ?></span></h3>
																					</li>
																				</ul>
																			</div>
																		</div><!-- end box -->
																	</div>
																	<?php
																	}
																}
															?>
														</div><!-- end col -->
													</div>
													<?php
														$get_brnd = $obj->select("device_name,brand_master.brand_name","device_master JOIN category_master ON device_category_id = category_master.category_id  JOIN brand_master on brand_master.brand_id=category_master.category_brand_id","1 GROUP BY brand_master.brand_name");
														// echo "<pre>"; print_r($get_products);
														if(is_array($get_brnd)){
															foreach($get_brnd as $prod_val){
															?>
															
															<div class="row <?php echo $prod_val['brand_name']?> showonclick hidden-xs">
																<?php 
																	$a= $prod_val['brand_name'];
																?>
																<div class="col-md-12 ">
																	<div class="widget">
																		<div class="widget-title">
																			<h4><span class="backtomainmenu">All Products</span> / Shop by brand/ <?php echo $prod_val['brand_name']?></h4>
																			<hr>
																		</div><!-- end widget-title -->
																		
																		<ul class="dropdown-mega">
																			<?php
																				$get_products = $obj->select("Distinct device_name,device_id,brand_master.brand_name","device_master JOIN category_master ON device_category_id = category_master.category_id  JOIN brand_master on brand_master.brand_id=category_master.category_brand_id","brand_master.brand_name='$a' AND device_status='1'");
																				if(is_array($get_products)){
																					foreach($get_products as $prod_val1){
																						$device_id = base64_encode(base64_encode(base64_encode(base64_encode($prod_val1['device_id']))));
																					?>
																					<li><a href="products.php?device=<?php echo $device_id; ?>" class="brandname<?php echo $prod_val1['brand_name']?>"><?php echo $prod_val1['device_name']?></a></li>
																					<?php
																					}
																				}
																			?>
																		</ul>
																	</div>
																</div>
															</div>
															<?php
															}
														}
													?>
												</div>
											</li>
										</ul>
									</li>
									<?php
										$get_distinct_cat = $obj->select("DISTINCT(category_name) as category_name","category_master AS C INNER JOIN brand_master AS B ON B.brand_id = C.category_brand_id","C.category_status = '1' AND B.brand_status = '1'");
										if(is_array($get_distinct_cat)){
											foreach($get_distinct_cat as $category_val){
											?>
											<li class="dropdown hasmenu">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $category_val['category_name']; ?> <span class="fa fa-angle-down"></span></a>
												<ul class="dropdown-menu">
													<?php
														$category_name = $category_val['category_name'];
														$get_brands = $obj->select("B.brand_name, B.brand_id","category_master AS C INNER JOIN brand_master AS B ON B.brand_id = C.category_brand_id","C.category_name = '$category_name' AND C.category_status = '1' AND B.brand_status = '1'");
														if(is_array($get_brands)){
															foreach($get_brands as $brand_val){
															?>
															<li><a href="products.php?brand=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($brand_val['brand_id']))));?>&category=<?php echo $category_name; ?>"> <?php echo $brand_val['brand_name']; ?></a></li>
															<?php
															}
														}
													?>
												</ul>
											</li>
											<?php
											}
										}
									?>
								</ul>
								<ul class="nav navbar-nav navbar-right searchandbag">
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
									
									<li class="dropdown hasmenu shopcartmenu" id="cart_menu">
										<?php
											if(isset($_SESSION['skinbae_user'])){
												$user_id = base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_SESSION['skinbae_user'])))));
												$get_cart = $obj->select("P.*, CA.*, M.user_id","user_cart AS CA INNER JOIN user_master AS M ON CA.cart_user_id=M.user_id INNER JOIN products AS P ON P.product_id=CA.cart_product_id","CA.cart_status='1' AND P.product_status='1' AND M.user_status='1' AND M.user_id='$user_id'");
												
											?>
											<a href="cart.php" class="dropdown-toggle cart" data-toggle="dropdown" role="button" aria-expanded="false">
												
												<span class="countbadge"><?php if(is_array($get_cart)){ echo count($get_cart); }else{?> 0 <?php } ?></span>
												<i class="fa fa-shopping-bag"></i>
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
									<!--    <li><a href="#" data-tooltip="tooltip" data-placement="bottom" title="Wishlist"><i class="fa fa-heart-o"></i></a></li> -->
									<li class="dropdown searchdropdown <?php if(isset($_GET['search'])){ echo "open"; }?>">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search"></i></a>
										<ul class="dropdown-menu show-right">
											<li class="header-search">
												<form method="GET" >
													<div id="custom-search-input">
														<div class="input-group col-md-12">
															<input type="text" id="pro_input" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; }?>" class="form-control input-lg" placeholder="Search here..." />
															<span class="input-group-btn">
																<button class="btn custombutton button--isi btn-primary btn-lg" id="prod_search" type="submit">
																	<i class="fa fa-search"></i>
																</button>
															</span>
														</div>
													</div>
												</form>
											</li>
										</ul>
									</li>
								</ul>
							</div><!--/.nav-collapse -->
						</div><!--/.container-fluid -->
					</nav>
				</div><!-- end container -->
			</header><!-- end header -->											
		<div id="snackbar"><span class="toastmessgae"></span></div>																																																																																																																																																														