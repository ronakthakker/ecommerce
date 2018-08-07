<?php
	require_once('includes/access.php');
	require_once('adminpanel/lib/helper.php');
	$user_id = base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_SESSION['skinbae_user'])))));
	if(isset($_SESSION['skinbae_user'])){
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