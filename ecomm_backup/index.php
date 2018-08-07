<?php 
	require_once("includes/header.php");
	require_once("adminpanel/lib/helper.php");
?>
<!-- BANNER -->
<!--
	<div id="Banner" class="modal fade in" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">    
	<div class="modal-body">
	<div class="col-lg-8 col-md-8 col-sm-12">
	<h4 style="color:#ffffff;">SUBSCRIBE OUR NEWSLETTER</h4>
	<p style="color:#dddddd;">Subscribe to newsletter, take advantage of the campaigns.</p>
	<form class="newsletter" method="post"> 
	<input class="form-control" type="text" name="username" placeholder="Username"> 
	<input class="form-control" type="email" name="username" placeholder="Email Address"> 
	<button type="submit" class="btn custombutton button--isi btn-primary">Subscribe</button>
	</form> 
	</div>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	</div>
	</div>
	</div>
	</div>
-->
<!-- END BANNER -->
<section class="section hiddensmall fullscreen paralbackground parallax" style="background-image:url('upload/back-banner.jpg');" data-img-width="2000" data-img-height="1508" data-diff="100">
	<div class="overlay"></div>
	<div class="container">
		<div class="slider-section">
			<div class="tp-banner-container">
				<div class="tp-banner">
					<ul>
						<?php
							$get_slider = $obj->select("*","slider_master","slider_status='1' ORDER BY slider_order");
							if(is_array($get_slider)){
								foreach($get_slider as $slider_val){
								?>
								<li data-transition="fade" data-slotamount="1" data-masterspeed="500" data-thumb="<?php echo "adminpanel/".$slider_val['slider_image_link']; ?>"  data-saveperformance="off">
									<img src="<?php echo "adminpanel/".$slider_val['slider_image_link']; ?>"  alt="fullslide1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
								</li>
								<?php
								}
							} 
						?>
						<!-- <li data-transition="fade" data-slotamount="1" data-masterspeed="500" data-thumb="upload/slide-2.jpg"  data-saveperformance="off"  data-title="Prev">
							<img src="upload/slide-2.jpg"  alt="fullslide1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
						</li> -->
					</ul>
				</div>
			</div>
		</div>
	</div><!-- end container -->
</section>

<section class="section">
	<div class="container">
		<div class="general-title text-center">
			<h2>What's Hot</h2>
			<p>Listed below our new campaings promotions and offers</p>
		</div><!-- end title -->
		<div class="banner-masonry row">
			<div class="banner-item item-w1 item-h1">
				<a href="#"><img src="https://placeholdit.imgix.net/~text?txtsize=33&w=370&h=300" alt="" class="img-responsive"></a>
			</div><!-- end banner-item -->
			<div class="banner-item item-w1 item-h1">
				<a href="#"><img src="https://placeholdit.imgix.net/~text?txtsize=33&w=370&h=300" alt="" class="img-responsive"></a>
			</div><!-- end banner-item -->
			<div class="banner-item item-w1 item-h2">
				<a href="#"><img src="https://placeholdit.imgix.net/~text?txtsize=33&w=370&h=502" alt="" class="img-responsive"></a>
			</div><!-- end banner-item -->
			<div class="banner-item item-w1 item-h1">
				<a href="#"><img src="https://placeholdit.imgix.net/~text?txtsize=33&w=370&h=170" alt="" class="img-responsive"></a>
			</div><!-- end banner-item -->
			<div class="banner-item item-w1 item-h1">
				<a href="#"><img src="https://placeholdit.imgix.net/~text?txtsize=33&w=370&h=170" alt="" class="img-responsive"></a>
			</div><!-- end banner-item -->
		</div><!-- end banner -->
	</div><!-- end container -->
</section>     

<section class="section border-top">
	<div class="container">
		<div class="general-title text-center">
			<h2>New Products</h2>
			<p>You likely have anything to wear at any rate! Feel alive! So if you’re looking for best items!</p>
		</div><!-- end title -->
		<div class="row">
			<?php
				$display_products = $obj->select("*","products", "is_new='1' ORDER BY products.product_date ASC LIMIT 8");
				if(is_array($display_products)){
					foreach($display_products as $productlist){
						$pid= $productlist['product_id'];
						$encrypted_id = base64_encode(base64_encode(base64_encode(base64_encode($pid))));
					?>
					
					<div class="col-md-3 col-sm-4">
						<div class="shop-item">   
							<div class="entry">
								<?php 
									if($productlist['is_new'] == "1"){
									?>
									<div class="left-button">
										<h4>New!</h4>
									</div>
									<?php 
									}
								?>
								<a class="hover-image" href="single-product.php?product_id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($pid)))); ?>" title="">
									<div class="img-rotate">
										<img src="<?php echo $productlist['product_image_link']?>" class="img-responsive" alt="<?php echo $productlist['product_title']; ?>">
										<img src="<?php echo $productlist['product_image_link']?>" class="img-responsive rotate-image" alt="<?php echo $productlist['product_title']; ?>">
									</div>  
								</a>
								<div class="shop-item-title clearfix">
									<h4><a href="single-product.php?product_id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($pid)))); ?>"><?php echo $productlist['product_title']?></a></h4>
									<div class="shopmeta clearfix">
										<span><i class="fa fa-rupee"></i><?php echo $productlist['product_selling_price']?> <strike> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $productlist['product_mrp']?></strike></span>
										<?php
											if(isset($_SESSION['skinbae_user'])){
											?>
											<a onclick="add_to_cart('<?php echo base64_encode(base64_encode(base64_encode(base64_encode($pid)))); ?>','<?php echo $pid; ?>','1','no')" class="btn custombutton button--isi btn-primary">ADD TO CART</a>
											<?php
											}
											else{
											?>
											<a href="#" data-toggle="modal" data-target="#Login" class="btn custombutton button--isi btn-primary">ADD TO CART</a>
											<?php
											}
										?>
									</div><!-- end shop-meta -->
								</div><!-- end shop-item-title -->
							</div><!-- entry -->
						</div><!-- end relative -->
					</div><!-- end col -->
					
					<?php
					}
				}
			?>
			
		</div><!-- end row -->
	</div><!-- end container -->
</section>

<section class="section nopad">
	<div class="container-fluid" id="indexowl">
		<div class="row">
			<?php
    			$get_random = $obj->select("DISTINCT(B.brand_id) as brand_id","brand_master AS B INNER JOIN products AS P ON B.brand_id=P.brand_id","B.brand_status='1' AND P.product_status='1' ORDER BY RAND() LIMIT 3");
    			if(is_array($get_random)){
    				foreach($get_random as $rand_val){
    					$rand_brand_id= $rand_val["brand_id"];
    					// echo $randombrandname;
					?>
					<div class="col-md-4 nopad">
						<div class="owl-banners">
							<?php
    							$get_brand1 = $obj->select("*","products AS P INNER JOIN brand_master AS B ON B.brand_id=P.brand_id","P.brand_id='$rand_brand_id' AND P.product_status='1' LIMIT 3");
    							if(is_array($get_brand1)){
    								foreach($get_brand1 as $brand1){
    									$brand_name=$brand1['brand_name'];
    									$pid= $brand1['product_id'];
    									$encrypted_id = base64_encode(base64_encode(base64_encode(base64_encode($pid))));
										
									?>
									<div class="owl-item">
										<div class="col-md-12 text-center"><h4 class="brandname"><?php echo $brand1["brand_name"] ?> Cases</h4></div>
										<a href="single-product.php?product_id=<?php echo $encrypted_id;?>"><img src="<?php echo $brand1["product_image_link"]?>" alt="" class="img-responsive"></a>
										<div class="banner-button">
											<h4><a href="single-product.php?product_id=<?php echo $encrypted_id;?>"><?php echo  $brand1["product_title"]?></a></h4>
											<p><i class="fa fa-rupee"></i> <?php echo  $brand1["product_selling_price"]?> <i class="fa fa-rupee"></i> <strike><?php echo  $brand1["product_mrp"]?></strike></p>
										</div>
									</div><!-- end owl-item -->
									<?php
									}
								} 
							?>
						</div><!-- end owl -->
					</div><!-- end col -->
					<?php
					}
				}
			?>
		</div><!-- end row -->
	</div><!-- end container -->
</section>

<?php require_once("includes/footer.php");?>
</body>

</html>