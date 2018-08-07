<?php 
	if(isset($_GET['product_id']) && $_GET['product_id'] != ''){
		require_once("includes/header.php");
		$enodedid=  addslashes($_GET['product_id']);
		$decrypted_id = base64_decode(base64_decode(base64_decode(base64_decode($enodedid))));
		$is_present = $obj->select("*","products","product_status='1' AND product_id='$decrypted_id'");
		if(is_array($is_present)){
		?>
		<style type="text/css">
			#glasscase{
			display: none;
			}
			strike small{
			color: #ccc;
			}
			#single-shop .select_qty .btn-number{
			background: #f9f9f9!important;
			border: none!important;
			font-weight: 100!important;
			color: #bd8a66!important;
			}
			#quantity{
			margin-top: 2px;
			padding-top: 10px;
			}
			#single-shop .select_qty .input-group{
			width: 122px;
			}
			@charset "UTF-8";
			.star-cb-group {
			/* remove inline-block whitespace */
			font-size: 0;
			/* flip the order so we can use the + and ~ combinators */
			unicode-bidi: bidi-override;
			direction: rtl;
			/* the hidden clearer */
			}
			.star-cb-group * {
			font-size: 2rem;
			}
			.star-cb-group > input {
			display: none;
			}
			.star-cb-group > input + label {
			/* only enough room for the star */
			display: inline-block;
			overflow: hidden;
			text-indent: 9999px;
			width: 1em;
			white-space: nowrap;
			cursor: pointer;
			}
			.star-cb-group > input + label:before {
			display: inline-block;
			text-indent: -9999px;
			content: "☆";
			color: #888;
			}
			.star-cb-group > input:checked ~ label:before, .star-cb-group > input + label:hover ~ label:before, .star-cb-group > input + label:hover:before {
			content: "★";
			color: #e52;
			text-shadow: 0 0 1px #333;
			}
			.star-cb-group > .star-cb-clear + label {
			text-indent: -9999px;
			width: .5em;
			margin-left: -.5em;
			}
			.star-cb-group > .star-cb-clear + label:before {
			width: .5em;
			}
			.star-cb-group:hover > input + label:before {
			content: "☆";
			color: #888;
			text-shadow: none;
			}
			.star-cb-group:hover > input + label:hover ~ label:before, .star-cb-group:hover > input + label:hover:before {
			content: "★";
			color: #e52;
			text-shadow: 0 0 1px #333;
			}
			
			fieldset {
			border: 0;  
			border-radius: 1px;
			/* padding: 1em 1.5em 0.9em;*/
			}
			
			#log {
			margin: 1em auto;
			width: 5em;
			text-align: center;
			background: transparent;
			}
			#Reviewform h3{
			color: #d8703f;
			font-size: 16px;
			text-transform: uppercase;
			margin-right: -1px;
			border-radius: 0 !important;
			text-transform: uppercase;
			font-family: Montserrat;
			font-size: 13px;
			padding: 0 4px;
			line-height: 1;
			border: 0 solid #e6e6e6 !important;
			font-weight: 500;
			margin: 0;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/glasscase.css">
		
		<section class="section banner nopadbot" style="background-image:url('upload/parallax_02.jpg');" data-img-width="2000" data-img-height="1508" data-diff="100">
			<div class="overlay"></div>
			<div class="container">
				<div class="page-header">
					<?php
						$get_link = $obj->select(" device_master.device_name, products.product_title, brand_master.brand_name","products JOIN device_master ON device_master.device_id=products.device_id JOIN brand_master  ON brand_master.brand_id=products.brand_id","products.product_id='$decrypted_id'");
						// echo "<pre>"; print_r($get_products);
						if(is_array($get_link))
						{
						?>
						<div class="bread">
							<ol class="breadcrumb">
								<li><a href="#">Home</a></li>
								<li><?php echo $get_link[0]['brand_name']?></li>
								<li><?php echo $get_link[0]['device_name']?></li>
							</ol>
						</div>
						<h1><?php echo $get_link[0]['product_title']?></h1>
						
						<?php 
						}
					?>
				</div>
			</div>
		</section>
		
		<section class="section">
			<?php
				$get_productinfo = $obj->select("*","products","products.product_id= $decrypted_id");
				if(is_array($get_productinfo)){
					
					//echo "<pre>"; print_r($get_productinfo);
				?>
				<div class="container">
					<div class="row">
						<div id="content" class="col-md-9 col-xs-12 pull-right">
							<div id="single-shop" class="row">
								<div class="col-md-4">
									<div class="shop-images">
										<ul id="glasscase" class="gc-start" >
											<li><img class="img-responsive" alt="<?php echo $get_productinfo[0]['product_title']?>" src="<?php echo $get_productinfo[0]['product_image_link']?>" /></li>
										</ul>
									</div><!-- End Slider -->
								</div><!-- end col -->
								
								<div class="col-md-8">
									<div class="shop-item-title clearfix">
										<h4><?php echo $get_productinfo[0]['product_title']?></h4>
										<div class="shopmeta clearfix">
											<!-- <div class="rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div> -->
											<span class="price"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $get_productinfo[0]['product_selling_price']?> <strike><small><i class="fa fa-inr" aria-hidden="true"></i><?php echo $get_productinfo[0]['product_mrp']?></small></strike></span>
										</div><!-- end shop-meta -->
										
										<div class="shop-desc-style">
											
											<?php echo $get_productinfo[0]['product_description']?>
											<hr>
											
											<div class="row">
												<div class="col-md-4 select_qty">
													<div class="select-size ">
														<small>SELECT QUANTITY</small>
													</div>
													<div class="input-group">
														<span class="input-group-btn">
															<button type="button" id="mi_<?php echo $decrypted_id; ?>" class="quantity-left-minus btn btn-default btn-number"  data-type="minus" data-field="">
																<span class="glyphicon glyphicon-minus"></span>
															</button>
														</span>
														<?php
															if(isset($_SESSION['skinbae_user'])){
																$cart_user_id = base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_SESSION['skinbae_user'])))));
																$get_qty = $obj->select("cart_quantity","user_cart","cart_status='1' AND cart_user_id='$cart_user_id' AND cart_product_id='$decrypted_id'");
																if(is_array($get_qty)){
																	$input_qty = $get_qty[0]['cart_quantity'];
																}
																else{
																	$input_qty = 1;
																}
															}
															else{
																$input_qty = 1;
															}
														?>
														<input type="text" id="quantity_<?php echo $decrypted_id; ?>" name="quantity" onkeypress="return validate(event)" class="form-control input-number text-center" value="<?php echo $input_qty; ?>" min="1" max="100">
														<span class="input-group-btn">
															<button type="button" id="pl_<?php echo $decrypted_id; ?>" class="quantity-right-plus btn btn-default btn-number" data-type="plus" data-field="">
																<span class="glyphicon glyphicon-plus"></span>
															</button>
														</span>
													</div>
												</div> 
												<?php
													if(isset($_SESSION['skinbae_user'])){
													?>
													<a onclick="add_to_cart('<?php echo base64_encode(base64_encode(base64_encode(base64_encode($decrypted_id)))); ?>','<?php echo $decrypted_id; ?>','','yes')" class="btn custombutton button--isi btn-primary">ADD TO CART</a>
													<?php
													}
													else{
													?>
													<a href="#" data-toggle="modal" data-target="#Login" class="btn custombutton button--isi btn-primary">ADD TO CART</a>
													<?php
													}
												?>
											</div><!-- end row -->
										</div>
									</div>
								</div><!-- end col -->
							</div><!-- end single-shop -->
							
							<hr class="invis">
							
						</div><!-- end content -->
						
						<div id="sidebar" class="col-md-3 col-sm-12 pull-left">
							<div class="widget">
								<div class="widget-title">
									<h4>Related Products</h4>
									<hr>
								</div><!-- end widget-title -->
								
								<div class="shopwidget">
									<ul class="shop-list">
										<?php
											$related= $get_productinfo[0]['product_keywords'];
											$relatedid= $get_productinfo[0]['product_id'];
											$get_relatedprod = $obj->select("*","products","product_keywords = '$related' and product_id!=$relatedid ORDER BY RAND() LIMIT 3 ");
											
											if(is_array($get_relatedprod)){
												
												foreach($get_relatedprod as $related_val){
												?>
												<li>
													<div class="entry alignleft">
														<img src="<?php echo $related_val['product_image_link']?>" alt="<?php echo $related_val['product_title']?>">
														
													</div><!-- end entry -->
													<h3><a href="single-product.php?product_id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($related_val['product_id'])))); ?>" title=""><?php echo $related_val['product_title']?></a></h3>
													<!--  <small>Category Name</small> -->
													<span class="new-price">Price: <?php echo $related_val['product_selling_price']?> <strike><small><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $related_val['product_mrp']?></small></strike></span>
												</li>
												<?php
												}
											} 
										?>
										
									</ul><!-- end blog list -->
								</div><!-- end blogwidget -->
							</div><!-- end widget -->
						</div>
					</div>
				</div>    
				<?php               
				} 
			?>
		</section>  
		
		
		
		
		<?php require_once("includes/footer.php");?>
		
		<script src="js/jquery.glasscase.min.js"></script>
		<script type="text/javascript"> 
			(function($){
				"use strict"; 
				$(document).ready(function(){
					//If your <ul> has the id "glasscase"
					$("#glasscase").glassCase({
						'widthDisplay': 1500, 
						'isDownloadEnabled': false, 
						'heightDisplay': 2098, 
						'nrThumbsPerRow': 4, 
						'isSlowZoom': true, 
						'isZoomDiffWH': true, 
						'zoomWidth': 400, 
						'zoomHeight': 559, 
						'zoomAlignment':
					'displayArea' });
				});
			})(jQuery);
		</script>
		
		<script src="js/bootstrap-select.min.js"></script>
		<script type="text/javascript">
			$('.selectpicker').selectpicker({
				style: 'btn-default'
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				
				var quantitiy=0;
				$('.quantity-right-plus').click(function(e){
					e.preventDefault();
					var curr_id = $(this).attr("id");
					qty_append = curr_id.substring(3);
					var quantity = parseInt($('#quantity_'+qty_append).val());
					if(isNaN(quantity) || quantity == 0){
						var quantity = parseInt($('#quantity_'+qty_append).val(1));
					}
					if(quantity>0){
						$('#quantity_'+qty_append).val(parseInt(quantity + 1));
					}
					
				});
				
				$('.quantity-left-minus').click(function(e){
					e.preventDefault();
					var curr_id = $(this).attr("id");
					qty_append = curr_id.substring(3);
					var quantity = parseInt($('#quantity_'+qty_append).val());
					if(isNaN(quantity) || quantity == 0){
						var quantity = parseInt($('#quantity_'+qty_append).val(1));
					}
					if(quantity>1){
						$('#quantity_'+qty_append).val(parseInt(quantity - 1));
					}
				});
				
			});
		</script>
		<script type="text/javascript">
			var logID = 'log',
			log = $('<div id="'+logID+'"></div>');
			$('body').append(log);
			$('[type*="radio"]').change(function () {
				var me = $(this);
				// log.html(me.attr('value'));
			});
		</script>
		<?php 
			
		}
		else{
		?>
		<script>
			window.location.href="products.php";
		</script>
		<?php
		}
	}
	else{
	?>
	<script>
		window.location.href="products.php";
	</script>
	<?php
	}
?>
</body>
</html>