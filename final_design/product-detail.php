<?php 
	if(isset($_GET['product_id']) && $_GET['product_id'] != ''){
		require_once("includes/header.php");
		$enodedid=  addslashes($_GET['product_id']);
		$decrypted_id = base64_decode(base64_decode(base64_decode(base64_decode($enodedid))));
		$is_present = $obj->select("*","product_master","product_status='1' AND product_id='$decrypted_id'");
		if(is_array($is_present)){
		?>
		<div id="wrapper">
			<!--page heading-->
			<section>
				<div class="inner-bg">
					<div class="inner-head wow fadeInDown">
						<h3>Product Detail</h3>
					</div>
				</div>
			</section>
			<!--page heading-->
			<!--container-->
			<div class="container">
				<div class="shop-in">
					<div class="col-md-12">
						<!--breadcrumbs -->
						<?php
							$get_link = $obj->select("material_master.material_name, product_master.product_title, category_master.category_name","product_master JOIN material_master ON material_master.material_id=product_master.material_id JOIN category_master  ON category_master.category_id=product_master.category_id","product_master.product_id='$decrypted_id'");
							// echo "<pre>"; print_r($get_products);
							if(is_array($get_link))
							{
							?>
							<div class="bread2">
								<ul>
									<li><a href="index.php">HOME</a></li>
									<li>/</li>
									<li><a href="product.php">SHOP</a></li>
									<li>/</li>
									<li><?php echo $get_link[0]['product_title']?></li>
								</ul>
							</div>
							<?php 
							}
						?>
						<!--breadcrumbs -->
					</div>
					<div class="clearfix"> </div>
					<!--Left side -->
					<div class="col-md-3 col-sm-3 div-none2 wow fadeInLeft">
						<div class="cat-div">
							<div class="col-md-4 col-sm-4 col-xs-4"><img src="images/delivery-truck.svg" width="46" alt="" title=""></div>
							<div class="col-md-8 col-sm-8 col-xs-4 icon-div">
								<h4>Free Delivery</h4>
								<p>from $50 </p>
							</div>
							<div class="clearfix"></div>
							<hr>
							<div class="col-md-4 col-sm-4 col-xs-4"><img src="images/supermarket.svg" width="46"  alt="" title=""></div>
							<div class="col-md-8 col-sm-8 col-xs-8 icon-div">
								<h4>99 % Customer</h4>
								<p>from $50 </p>
							</div>
							<div class="clearfix"></div>
							<hr>
							<div class="col-md-4 col-sm-4"><img src="images/reuse.svg" width="46"  alt=""  title=""></div>
							<div class="col-md-8 col-sm-8 icon-div">
								<h4>6 Days</h4>
								<p>from $50 </p>
							</div>
							<div class="clearfix"></div>
							<hr>
							<div class="clearfix"></div>
							<div class="col-md-4 col-sm-4 col-xs-4"><img src="images/checked.svg" width="46"  alt="" title=""></div>
							<div class="col-md-8 col-sm-8 col-xs-8 icon-div">
								<h4>Payment</h4>
								<p>from $50 </p>
							</div>
							<div class="clearfix"></div>
						</div>
						<!--<div class="cat-div">
							<h2>Related Products</h2>
							<div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides ->
							<div class="carousel-inner">
							<div class="item active">
							<div class="product-scroll">
							<div class="col-md-6 col-sm-3 col-xs-6"><img src="images/scroll-2.jpg" alt="" title="" class="img-responsive"></div>
							<div class="col-md-6 col-sm-9 col-xs-6"> <h3>Product name</h3>
							<div> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
							<h4>$600.00</h4>
							</div>
							</div>
							<div class="clearfix"></div>
							<div class="product-scroll">
							<div class="col-md-6 col-sm-3 col-xs-6"><img src="images/scroll-2.jpg" class="img-responsive" alt="" title=""></div>
							<div class="col-md-6 col-sm-9 col-xs-6"> <h3>Product name</h3>
							<div> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
							<h4>$600.00</h4>
							</div>
							</div>
							</div>
							<div class="item">
							<div class="product-scroll">
							<div class="col-md-6 col-sm-3 col-xs-6"><img src="images/scroll-2.jpg" class="img-responsive" alt="" title=""></div>
							<div class="col-md-6 col-sm-9 col-xs-6"> <h3>Product name</h3>
							<div> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
							<h4>$600.00</h4>
							</div>
							</div>
							<div class="clearfix"></div>
							<div class="product-scroll">
							<div class="col-md-6 col-sm-3 col-xs-6"><img src="images/scroll-2.jpg" alt="" title="" class="img-responsive"></div>
							<div class="col-md-6 col-sm-9 col-xs-6"> <h3>Product name</h3>
							<div><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
							<h4>$600.00</h4>
							</div>
							</div>
							</div>
							</div>
							<!-- Controls ->
							<a class="left arrow-left" href="#carousel-example-generic2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right arrow-right" href="#carousel-example-generic2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
						</div>-->
					</div>
					<!--right side -->
					<div class="col-md-9 div-left wow fadeInRight">
						<?php
							$get_productinfo = $obj->select("*","product_master","product_master.product_id= $decrypted_id");
							if(is_array($get_productinfo))
							{
								
								//echo "<pre>"; print_r($get_productinfo);
							?>
							<!--<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:1015px;padding-left:0px; padding-right:175px;margin:0;">
								<div id="amazingslider-1">
								<ul class="amazingslider-slides">
								<li><img src="images/img-1.jpg"  alt="" title="" /></li>
								<li><img src="images/img-2.jpg"  alt="" title=""  /> </li>
								<li><img src="images/img-1.jpg"  alt="" title="" /> </li>
								<li><img src="images/img-2.jpg"  alt="" title="" /> </li>
								</ul>
								<ul class="amazingslider-thumbnails">
								<li><img src="images/img-1-tn.jpg"  alt="" title="" /></li>
								<li><img src="images/img-2-tn.jpg"   alt="" title="" /></li>
								<li><img src="images/img-1-tn.jpg"   alt="" title="" /></li>
								<li><img src="images/img-2-tn.jpg"  alt="" title=""  /></li>
								</ul>
								<div class="amazingslider-engine"><a href="http://amazingslider.com" title="Responsive jQuery Content Slider">Responsive jQuery Content Slider</a></div>
								</div>
								<div class="clearfix">&nbsp;</div>
							</div>-->
							<div class="">
								<img src="adminpanel/<?php echo $get_productinfo[0]['product_image_link']?>"  alt="<?php echo $get_productinfo[0]['product_title']?>" title="" />
								
							</div>
							<div class="clearfix">&nbsp;</div>
							<div class="price-2">
								<ul>
									<?php
										if(isset($_SESSION['skinbae_user'])){
										?>
										<li class="tab1">PRICE: <span>$ <?php echo $get_productinfo[0]['product_selling_price']?></span></li>
										<li><a href="add_to_cart('<?php echo base64_encode(base64_encode(base64_encode(base64_encode($decrypted_id)))); ?>','<?php echo $decrypted_id; ?>','','yes')">ADD TO CART </a>
											<?php
											}
											else{
											?>
											<a href="#" data-toggle="modal" data-target="#Login" class="btn custombutton button--isi btn-primary">ADD TO CART</a>
										</li>
										<?php
										}
									?>
								</ul>
							</div>
							<div class="share-icon"> <i class="fa fa-share-alt" aria-hidden="true"></i><br>
							SHARE </div>
							<div class="socialmedia">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
									<li><a href="#"><i class="fa fa fa-timblr" aria-hidden="true"> <strong class="tcss">t</strong> </i></a></li>
								</ul>
							</div>
							<div class="read-full">
								<ul>
									<li><a data-toggle="collapse" data-target="#demo"> <span>Read full specs</span> </a></li>
									<li><a data-toggle="collapse" data-target="#demo"><img src="images/products/arrow.jpg" alt="" title=""></a> </li>
								</ul>
							</div>
							<div class="clearfix"></div>
							<div id="demo" class="collapse">
								<div class="inner-div">
									<!--<div class="col-md-12 col-sm-6 list-div">
										<h2>Specification</h2>
										<ul>
										<li>
										<div class="col-md-2 col-sm-2 col-xs-2"> <img src="images/products/icon1.jpg" alt="" title=""> </div>
										<div class="col-md-10 col-sm-10 col-xs-10"> </div>
										</li>
										
										</ul>
									</div>-->
									<div class="col-md-12 col-sm-12 product-info">
										<h2>Product Information</h2>
										<!--<h6>SKU - 12458AF6</h6>-->
										<p><?php echo $get_productinfo[0]['product_description']?></p>
										<!--<p><img src="images/products/line.jpg"  alt="" title=""></p>
											<h2>Notes</h2>
											<p>Please Note: This item is HAND MADE TO ORDER and will be 
											dispatched in 2-3 weeks.</p>
										<p><img src="images/products/line.jpg"  alt="" title=""></p>-->
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<?php 
							}?>
					</div>
					<!--Left side -->
					<div class="row">
						<div class="col-md-3 col-sm-3 div-none">
							<div class="row">
								<div class="col-sm-6 wow fadeIn">
									<div class="cat-div">
										<div class="col-md-4 col-sm-4 col-xs-2"><img src="images/delivery-truck.svg" width="46" alt="" title=""></div>
										<div class="col-md-8 col-sm-8  col-xs-10 icon-div">
											<h4>Free Delivery</h4>
											<p>from $50 </p>
										</div>
										<div class="clearfix"></div>
										<hr>
										<div class="col-md-4 col-sm-4  col-xs-2"><img src="images/supermarket.svg" width="46"  alt="" title=""></div>
										<div class="col-md-8 col-sm-8  col-xs-10 icon-div">
											<h4>99 % Customer</h4>
											<p>from $50 </p>
										</div>
										<div class="clearfix"></div>
										<hr>
										<div class="col-md-4 col-sm-4  col-xs-2"><img src="images/checked.svg" width="46"  alt="" title=""></div>
										<div class="col-md-8 col-sm-8  col-xs-10 icon-div">
											<h4>6 Days</h4>
											<p>from $50 </p>
										</div>
										<div class="clearfix"></div>
										<hr>
										<div class="clearfix"></div>
										<div class="col-md-4 col-sm-4 col-xs-2"><img src="images/reuse.svg" width="46"  alt=""  title=""></div>
										<div class="col-md-8 col-sm-8  col-xs-10 icon-div">
											<h4>Payment</h4>
											<p>from $50 </p>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
								<!--<div class="col-sm-6 wow fadeIn">
									<div class="cat-div">
									<h2>Related Products</h2>
									<div id="carousel-example-generic3" class="carousel slide" data-ride="carousel">
									<!-- Wrapper for slides ->
									<div class="carousel-inner">
									<div class="item active">
									<div class="product-scroll">
									<div class="col-md-6 col-sm-3 col-xs-3"><img src="images/scroll-2.jpg" alt="" title="" class="img-responsive"></div>
									<div class="col-md-6 col-sm-9 col-xs-9"> <h3>Product name</h3>
									<div> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
									<h4>$600.00</h4>
									</div>
									</div>
									<div class="clearfix"></div>
									<div class="product-scroll">
									<div class="col-md-6 col-sm-3 col-xs-3"><img src="images/scroll-2.jpg" class="img-responsive" alt="" title=""></div>
									<div class="col-md-6 col-sm-9 col-xs-9"> <h3>Product name</h3>
									<div> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
									<h4>$600.00</h4>
									</div>
									</div>
									</div>
									<div class="item">
									<div class="product-scroll">
									<div class="col-md-6 col-sm-3 col-xs-3"><img src="images/scroll-2.jpg" class="img-responsive" alt="" title=""></div>
									<div class="col-md-6 col-sm-9 col-xs-9"> <h3>Product name</h3>
									<div> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""> <img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
									<h4>$600.00</h4>
									</div>
									</div>
									<div class="clearfix"></div>
									<div class="product-scroll">
									<div class="col-md-6 col-sm-3 col-xs-3"><img src="images/scroll-2.jpg" alt="" title="" class="img-responsive"></div>
									<div class="col-md-6 col-sm-9 col-xs-9"><h3> Product name</h3>
									<div><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
									<h4>$600.00</h4>
									</div>
									</div>
									</div>
									</div>
									<!-- Controls ->
									<a class="left arrow-left" href="#carousel-example-generic3" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right arrow-right" href="#carousel-example-generic3" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
									</div>
								</div>-->
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!--container-->
			<div class="clearfix"></div>
			<!--footer-->
			
		
			
			<script src="js/bootstrap-select.min.js"></script>
		
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
				window.location.href="product.php";
			</script>
			<?php
			}
		}
		else{
		?>
		<script>
			window.location.href="product.php";
		</script>
		<?php
		}
	?>	
