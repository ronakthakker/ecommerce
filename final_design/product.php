<?php require_once ("includes/header.php")?>
<div id="wrapper">
	<!--page heading-->
	<section>
		<div class="inner-bg">
			<div class="inner-head wow fadeInDown">
				<h3>Product</h3>
			</div>
		</div>
	</section>
	<!--container-->
	<div class="container">
		<div class="shop-in">
			<!--breadcrumbs -->
			<div class="col-md-12">
				<div class="bread2">
					<ul>
						<li><a href="index.html">HOME</a></li>
						<li>/</li>
						<li>SHOP</li>
					</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
			<!--left-side-->
			<div class="col-md-3">
				<button data-toggle="collapse" data-target="#div-open" class="menu-icon"></button>
				<div class="clearfix"></div>
				<div id="div-open" class="collapse  wow fadeIn">
					<div class="row">
						<div class="col-md-12 col-sm-6">
							<div class="cat-div  wow fadeIn">
								<h2>Category</h2>
								<?php
									$get_sub_category = $obj->select("DISTINCT(sub_category_name) as sub_category_name","sub_category_master AS SC INNER JOIN category_master AS C ON C.category_id = SC.sub_category_category_id","SC.sub_category_status = '1' AND C.category_status = '1'");
									if(is_array($get_sub_category)){
										foreach($get_sub_category as $sub_cat_val)
										{
										?>
										<div class="Category">
											<?php
												$sub_category_btn = "";
												$sub_category_italic = "";
												$sub_category_checked = "";
												if(isset($_GET['sub_category']) && $_GET['sub_category']!=''){
													if(addslashes($_GET['sub_category']) == $sub_cat_val['sub_category_name']){
														$sub_category_btn = "btn-primary active";
														$sub_category_italic = "fa-check-square-o";
														$sub_category_checked = "checked='checked'";
													}
													else{
														$sub_category_btn = "btn-default";
														$sub_category_italic = "fa-square-o";
														$sub_category_checked = "";
													} 
												}
												else{
													$sub_category_btn = "btn-default";
													$sub_category_italic = "fa-square-o";
													$sub_category_checked = "";
												}
											?>
											<ul>
												<li>
													<label>
														<input  type="checkbox" class="sub_cat_check sub_cat_filter <?php echo $sub_category_btn ?> "<?php echo $sub_category_checked ?> id="cat_<?php echo $sub_cat_val['sub_category_name']; ?>" value="">
														
														<?php echo $sub_cat_val['sub_category_name']; ?>
														
													</label>
												</li>
											</ul>
										</div>
										
										<?php
										}
									}
								?>
								<div class="clearfix"> </div>
							</div>
						</div>
						
						<div class="col-md-12 col-sm-6">
							<div class="cat-div  wow fadeIn">
								<h2>Material</h2>
								<?php
									$get_material = $obj->select("*","material_master","material_status='1'");
									if(is_array($get_material)){
										foreach($get_material as $material_val){
										?>
										<div class="Category">
											<?php
												$material_btn = "";
												$material_italic = "";
												$material_checked = "";
												if(isset($_GET['material']) && $_GET['material']!=''){
													if(base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['material']))))) == $material_val['material_id']){ 
														$material_btn = "btn-primary active";
														$material_italic = "fa-check-square-o";
														$material_checked = "checked='checked'";
													}
													else{
														$material_btn = "btn-default";
														$material_italic = "fa-square-o";
														$material_checked = "";
													} 
												}
												else{
													$material_btn = "btn-default";
													$material_italic = "fa-square-o";
													$material_checked = "";
												}
											?>
											<ul>
												<li>
													<label>
														<input  type="checkbox" class="material_check material_filter <?php echo $material_btn ?> "<?php echo $material_checked ?> id="material_<?php echo $material_val['material_name']; ?>" value="">
														
														<?php echo $material_val['material_name']; ?>
														
													</label>
												</li>
											</ul>
										</div>
										
										<?php
										}
									}
								?>
								<div class="clearfix"> </div>
							</div>
						</div>
						<!--<div class="col-md-12 col-sm-6">
							<div class="cat-div  wow fadeIn">
							<h2>HOT DEALS</h2>
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides ->
							<div class="carousel-inner">
							<div class="item active text-center">
							<div class="row">
							<div class="col-md-12 col-sm-5"><img alt="" title="" src="images/left-product.jpg" class="img-responsive"></div>
							<div class="col-md-12 col-sm-7">
							<div class="no-div">
							<ul>
							<li>
							<h5>120</h5>
							<span>Days </span> </li>
							<li>
							<h5>20</h5>
							<span>HRS</span> </li>
							<li>
							<h5>36</h5>
							<span>MINS</span> </li>
							<li>
							<h5>60</h5>
							<span>Sec</span> </li>
							</ul>
							<div class="clearfix"></div>
							</div>
							<div class="product-name">
							<h3>Jewellery Name</h3>
							</div>
							<div class="rate-css"><span>$600.00</span>&nbsp;&nbsp; <samp class="text-de">$850.00</samp></div>
							<div><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
							</div>
							</div>
							</div>
							<div class="item  text-center">
							<div class="row">
							<div class="col-md-12 col-sm-5"><img alt="" title="" src="images/left-product.jpg" class="img-responsive"></div>
							<div class="col-md-12 col-sm-7">
							<div class="no-div">
							<ul>
							<li>
							<h5>120</h5>
							<span>Days </span> </li>
							<li>
							<h5>20</h5>
							<span>HRS</span> </li>
							<li>
							<h5>36</h5>
							<span>MINS</span> </li>
							<li>
							<h5>60</h5>
							<span>Sec</span> </li>
							</ul>
							<div class="clearfix"></div>
							</div>
							<div class="product-name">
							<h3>Jewellery Name</h3>
							</div>
							<div class="rate-css"><span>$600.00</span>&nbsp;&nbsp; <samp class="text-de">$850.00</samp></div>
							<div><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
							</div>
							</div>
							</div>
							</div>
							<!-- Controls ->
							<a class="left arrow-left" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right arrow-right" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
							</div>
						</div>-->
						<!--<div class="col-md-12 col-sm-6">
							<div class="cat-div  wow fadeIn">
							<h2>Special offers</h2>
							<div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides ->
							<div class="carousel-inner">
							<div class="item active">
							<div class="product-scroll">
							<div class="col-md-6 col-sm-6 col-xs-3"><img src="images/scroll-2.jpg" alt="" title="" class="img-responsive"></div>
							<div class="col-md-6 col-sm-6 col-xs-9">
							<h3>Product name</h3>
							<div><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
							<h4>$600.00</h4>
							</div>
							</div>
							<div class="clearfix"></div>
							<div class="product-scroll">
							<div class="col-md-6 col-sm-6 col-xs-3"><img src="images/scroll-2.jpg" alt="" title="" class="img-responsive"></div>
							<div class="col-md-6 col-sm-6 col-xs-9">
							<h3>Product name</h3>
							<div><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
							<h4>$600.00</h4>
							</div>
							</div>
							</div>
							<div class="item">
							<div class="product-scroll">
							<div class="col-md-6 col-sm-6 col-xs-3"><img src="images/scroll-2.jpg" alt="" title="" class="img-responsive"></div>
							<div class="col-md-6 col-sm-6 col-xs-9">
							<h3>Product name</h3>
							<div><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
							<h4>$600.00</h4>
							</div>
							</div>
							<div class="clearfix"></div>
							<div class="product-scroll">
							<div class="col-md-6 col-sm-6 col-xs-3"><img src="images/scroll-2.jpg" alt="" title="" class="img-responsive"></div>
							<div class="col-md-6 col-sm-6 col-xs-9">
							<h3>Product name</h3>
							<div><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str1.jpg" alt="" title=""><img src="images/str2.jpg" alt="" title=""></div>
							<h4>$600.00</h4>
							</div>
							</div>
							</div>
							</div>
							<!-- Controls ->
							<a class="left arrow-left" href="#carousel-example-generic2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right arrow-right" href="#carousel-example-generic2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
							</div>
						</div>-->
						<!--<div class="col-md-12 col-sm-6">
							<div class="cat-div  wow fadeIn">
							<h2>Download our app</h2>
							<div class="download-our"><a href="#"><img src="images/app.png" alt="" title="" class="img-responsive"></a>&nbsp;<a href="#"><img src="images/google-play.png" alt="" title="" class="img-responsive"></a> </div>
							</div>
						</div>-->
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!--right-side-->
			<div class="col-md-9">
				<div class="row">
					<!--<div class="col-md-6 col-sm-6 col-xs-6 select-p">
						<select class="selectpicker select-1" data-style="btn-primary">
						<option>Newest first</option>
						<option>Newest first</option>
						<option>Newest first</option>
						</select>
					</div>-->
					<!--<div class="col-md-6 col-sm-6 col-xs-6 bread">
						<div class="breadcrumbs">
						<ul>
						<li><a href="" class="active">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">></a></li>
						</ul>
						</div>
					</div>-->
				</div>
				<div class="clearfix"></div>
				<div class="row" id="results">
					<?php
						$where_append = "";
						if(isset($_GET['sub_category'])){
							$sub_category_name = addslashes($_GET['sub_category']);
							$get_sub_cat_ids = $obj->select("sub_category_id","sub_category_master","sub_category_status='1' AND sub_category_name = '$sub_category_name'");
							if(is_array($get_sub_cat_ids)){
								$append_sub_cat_ids = "";
								$cnt = 0;
								$has_comma = "";
								foreach($get_sub_cat_ids as $sub_cat_val){
									$cnt+=1;
									if($cnt != count($get_sub_cat_ids)){
										$has_comma = "','";
									}
									else{
										$has_comma = "";
									}
									$append_sub_cat_ids.= $sub_cat_val['sub_category_id'].$has_comma;
								}
								$where_append.= " AND P.sub_category_id IN('$append_sub_cat_ids')";
							}
						}
						if(isset($_GET['category'])){
							$category =  base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['category'])))));
							$where_append.= " AND P.category_id = '$category_id'";
						}
						// if(isset($_GET['design'])){
						// $design =  base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['design'])))));
						// $where_append.= " AND P.design_id = '$design_id'";
						// }
						if(isset($_GET['search'])){
							$search = addslashes($_GET['search']);
						}
						if(isset($_GET['material'])){
							$material_id = base64_decode(base64_decode(base64_decode(base64_decode($_GET['material']))));
							$where_append.= " AND P.material_id = '$material_id'";
						}
						
						if(isset($_GET['search'])){
							$search_val = $_GET['search'];
							$where_append.= " AND ( P.product_title LIKE '%$search_val%' OR C.category_name LIKE '%$search_val%' OR SC.sub_category_name LIKE '%$search_val%' OR M.material_name LIKE '%$search_val%' OR P.product_selling_price LIKE '%$search_val%' OR P.product_mrp LIKE '%$search_val%' OR P.product_keywords LIKE '%$search_val%' OR P.product_description LIKE '%$search_val%')";
						}
					?>
					<input type="hidden" id="sub_category_val" name="sub_category_val" value="<?php if(isset($_GET['sub_category'])){ echo addslashes($_GET['sub_category']);}?>">
					<input type="hidden" id="material_val" name="material_val" value="<?php if(isset($_GET['material'])){ echo base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['material'])))));}?>">
					<input type="hidden" id="category_val" name="category_val" value="<?php if(isset($_GET['category'])){ echo base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['category'])))));}?>">
					<input type="hidden" id="orderby_val" name="orderby_val" value="0">
					<input type="hidden" id="page_val" name="page_val" value="1">
					<input type="hidden" id="search_val" name="search_val" value="<?php if(isset($_GET['search'])){ echo addslashes($_GET['search']);}?>">
					
					
					
					<?php
						$page_count = $obj->select("COUNT(P.product_id) AS NUM","product_master AS P INNER JOIN material_master AS M ON M.material_id = P.material_id INNER JOIN sub_category_master AS SC ON SC.sub_category_id = M.material_sub_category_id INNER JOIN category_master AS C ON SC.sub_category_category_id = C.category_id","P.product_status='1' AND M.material_status='1' AND SC.sub_category_status='1' AND C.category_status='1' $where_append ");
						$total_pages = $page_count[0]['NUM'];
						$limit = 9;
						$page = 1;if($page) 
						$start = ($page - 1) * $limit; 			//first item to display on this page
						else
						$start = 0;	
						
						
						$product_arr = $obj->select("*","product_master AS P INNER JOIN material_master AS M ON P.material_id = M.material_id INNER JOIN sub_category_master AS SC ON SC.sub_category_id = M.material_sub_category_id INNER JOIN category_master AS C ON SC.sub_category_category_id = C.category_id","P.product_status='1' AND M.material_status='1' AND SC.sub_category_status='1' AND C.category_status='1' $where_append LIMIT $start, $limit");
						
						if ($page == 0) $page = 1;					//if no page var is given, default to 1.
						$prev = $page - 1;							//previous page is page - 1
						$next = $page + 1;							//next page is page + 1
						$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
						$lpm1 = $lastpage - 1;						//last page minus 1
						$adjacents = 3;
						$pagination = "";
						if(is_array($product_arr)){
							foreach($product_arr as $productlist){
								$pid= $productlist['product_id'];
							?>
							<div class="col-md-4 col-sm-4 col-xs-6 thum-mrg wow fadeIn">
								<div class="col-lg-12 padd0">
									<div class="product-hover">
										<div>
											<a href="product-detail.php?product_id=<?php echo base64_encode(base64_encode(base64_encode(base64_encode($pid)))); ?>"> <img src="images/magnifier.svg" width="20" height="20">
											</a> &nbsp;&nbsp;
											<?php
												if(isset($_SESSION['skinbae_user'])){
												?>
												<a href="add_to_cart('<?php echo base64_encode(base64_encode(base64_encode(base64_encode($pid)))); ?>','<?php echo $pid; ?>','1','no')"> <img src="images/add-to-cart.svg"  width="25" height="25"></a>
												<?php
												}
												else{
												?>
												<a href="#" data-toggle="modal" data-target="#Login"><img src="images/add-to-cart.svg"  width="25" height="25"></a>
												<?php
												}
											?>
										</div>
									</div>
									<div><img src="adminpanel/<?php echo  $productlist['product_image_link']?>" alt="<?php echo $productlist['product_title']; ?>" title="" class="img-responsive img-boder-css"></div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
								<div class="row">
									<div class="col-md-12 col-sm-12 name-pro"><?php echo $productlist['product_title']?></div>
									<div class="clearfix"></div>
									<div class="col-md-6 col-sm-6 name-pro"><span>$ <?php echo $productlist['product_selling_price']?></span>&nbsp;<span class="text-0">$ <?php echo $productlist['product_mrp']?></span></div>
									
									<!--<div class="col-md-6 col-sm-6 text-right"><img src="images/products/str2.jpg" alt="" title=""> <img src="images/products/str2.jpg" alt="" title=""> <img src="images/products/str2.jpg" alt="" title=""> <img src="images/products/str3.jpg" alt="" title=""></div>-->
								</div>
							</div>
							<?php
							}
						?>
						
						<div class="clearfix"></div>
						
						<div class="clearfix"></div>
						<hr>
						
						<div class="breadcrumbs">
							<?php
								if($lastpage > 1)
								{
									$pagination .= "<nav class=\"woocommerce-pagination text-center\">";
									
									$pagination .= "<ul class=\"pagination page-numbers\">";
									//previous button
									if ($page > 1) 
									$pagination.= "<li><a  id=\"$prev\" class=\"number_box\" aria-label=\"Previous\"><span aria-hidden=\"true\"><i class=\"fa fa-angle-left\"></i></span></a></li>";
									else
									$pagination.= "<li class=\"disabled\"><a onclick=\"return false;\" aria-label=\"Previous\"><span aria-hidden=\"true\"><i class=\"fa fa-angle-left\"></i></span></a></li>";
									
									//pages	
									if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
									{	
										for ($counter = 1; $counter <= $lastpage; $counter++)
										{
											if ($counter == $page)
											$pagination.= "<li class=\"active\"><a class=\"number_box\"  id=\"$counter\">$counter</a></li>";
											else
											$pagination.= "<li><a  class=\"number_box\" id=\"$counter\">$counter</a></li>";					
										}
									}
									elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
									{
										//close to beginning; only hide later pages
										if($page < 1 + ($adjacents * 2))		
										{
											for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
											{
												if ($counter == $page)
												$pagination.= "<li class=\"active\"><a class=\"number_box\"  id=\"$counter\">$counter</a></li>";
												else
												$pagination.= "<li><a  class=\"number_box\" id=\"$counter\">$counter</a></li>";					
											}
											$pagination.= "<li><a>...</a></li>";
											$pagination.= "<li><a class=\"number_box\"  id=\"$lpm1\">$lpm1</a></li>";
											$pagination.= "<li><a class=\"number_box\"  class=\"number_box\" id=\"$lastpage\">$lastpage</a></li>";	
										}
										//in middle; hide some front and some back
										elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
										{
											$pagination.= "<li><a class=\"number_box\" id=\"1\">1</a></li>";
											$pagination.= "<li><a class=\"number_box\" id=\"2\">2</a></li>";
											$pagination.= "<li><a>...</a></li>";
											for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
											{
												if ($counter == $page)
												$pagination.= "<li class=\"active\"><a class=\"number_box\"  id=\"$counter\">$counter</a></li>";
												else
												$pagination.= "<li><a  class=\"number_box\" id=\"$counter\">$counter</a></li>";						
											}
											$pagination.= "<li><a>...</a></li>";
											$pagination.= "<li><a class=\"number_box\"  id=\"$lpm1\">$lpm1</a></li>";
											$pagination.= "<li><a  class=\"number_box\" id=\"$lastpage\">$lastpage</a></li>";	
										}
										//close to end; only hide early pages
										else
										{
											$pagination.= "<li><a class=\"number_box\" id=\"1\">1</a></li>";
											$pagination.= "<li><a class=\"number_box\" id=\"2\">2</a></li>";
											$pagination.= "<li><a>...</a></li>";
											for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
											{
												if ($counter == $page)
												$pagination.= "<li class=\"active\"><a class=\"number_box\"  id=\"$counter\">$counter</a></li>";
												else
												$pagination.= "<li><a  class=\"number_box\" id=\"$counter\">$counter</a></li>";					
											}
										}
									}
									
									//next button
									if ($page < $counter - 1) 
									$pagination.= "<li><a  id=\"$next\" class=\"number_box\" aria-label=\"Next\"><span aria-hidden=\"true\"><i class=\"fa fa-angle-right\"></i></span></a></li>";
									else
									$pagination.= "<li class=\"disabled\"><a onclick=\"return false;\" aria-label=\"Next\"><span aria-hidden=\"true\"><i class=\"fa fa-angle-right\"></i></span></a></li>";
									$pagination.= "</ul>\n";	
									$pagination.= "</nav>\n";	
								}
								echo $pagination;
							?>
							<!--<ul>
								<li><a href="" class="active">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">></a></li>
							</ul>-->
						</div>
						<?php
						}
						else{
						?>
						<div class="col-md-12 col-sm-12">
							<div class="">   
								<div class="">
									<div class="">
										<h4>No Products to Display</h4>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
					?>
					
					
				</div>
				
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>
	<!--footer-->
	<?php require_once ("includes/footer.php")?>	
	<script type="text/javascript">
		$(function () {
			$('.button-checkbox').each(function () {
				
				// Settings
				var $widget = $(this),
				$button = $widget.find('button'),
				$checkbox = $widget.find('input:checkbox'),
				color = $button.data('color'),
				settings = {
					on: {
						icon: 'fa fa-check-square-o'
					},
					off: {
						icon: 'fa fa-square-o'
					}
				};
				
				// Event Handlers
				$button.on('click', function () {
					$checkbox.prop('checked', !$checkbox.is(':checked'));
					$checkbox.triggerHandler('change');
					updateDisplay();
				});
				$checkbox.on('change', function () {
					updateDisplay();
				});
				
				// Actions
				function updateDisplay() {
					var isChecked = $checkbox.is(':checked');
					
					// Set the button's state
					$button.data('state', (isChecked) ? "on" : "off");
					
					// Set the button's icon
					$button.find('.state-icon')
					.removeClass()
					.addClass('state-icon ' + settings[$button.data('state')].icon);
					
					// Update the button's color
					if (isChecked) {
						$button
						.removeClass('btn-default')
						.addClass('btn-' + color + ' active');
					}
					else {
						$button
						.removeClass('btn-' + color + ' active')
						.addClass('btn-default');
					}
				}
				
				// Initialization
				function init() {
					
					updateDisplay();
					
					// Inject the icon if applicable
					if ($button.find('.state-icon').length == 0) {
						$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
					}
				}
				init();
			});
		});
		
		$(".sub_cat_filter").click(function(){
			var curr_str = $(this).attr("id");
			var curr_id = curr_str.substring(4);
			var italic = $(this).find('i');
			if($(this).hasClass("btn-default")){
				$(this).removeClass("btn-default").addClass("btn-primary active");
				italic.removeClass("fa-square-o").addClass("fa-check-square-o");
				$("#sub_cat_"+curr_id).attr("checked","checked");
			}
			else{
				$(this).removeClass("btn-primary active").addClass("btn-default");
				italic.removeClass("fa-check-square-o").addClass("fa-square-o");
				$("#sub_cat_"+curr_id).removeAttr("checked");
			}
			
			var sub_category_val = '';
			$('.sub_cat_filter').each(function(i){
				var curr_string = $(this).attr("id");
				var curr_check_id = curr_string.substring(4);
				if($(this).hasClass("btn-primary active")){
					if(i == 0){
						sub_category_val += curr_check_id;
					}
					else{
						sub_category_val += ","+curr_check_id;   // Or ',' for '1','2'
					}
					sub_category_val = sub_category_val.replace(/^,|,$/g,'');
				}
			});
			$("#sub_category_val").val(sub_category_val);
			$("#page_val").val("1");
			get_products();
		});
		
		$(".material_filter").click(function(){
			var curr_str = $(this).attr("id");
			var curr_id = curr_str.substring(4);
			var italic = $(this).find('i');
			if($(this).hasClass("btn-default")){
				$(this).removeClass("btn-default").addClass("btn-primary active");
				italic.removeClass("fa-square-o").addClass("fa-check-square-o");
				$("#material_"+curr_id).attr("checked","checked");
			}
			else{
				$(this).removeClass("btn-primary active").addClass("btn-default");
				italic.removeClass("fa-check-square-o").addClass("fa-square-o");
				$("#material_"+curr_id).removeAttr("checked");
			}
			
			var material_val = '';
			$('.material_filter').each(function(i){
				var curr_string = $(this).attr("id");
				var curr_check_id = curr_string.substring(4);
				if($(this).hasClass("btn-primary active")){
					if(i == 0){
						material_val += curr_check_id;
					}
					else{
						material_val += ","+curr_check_id;   // Or ',' for '1','2'
					}
					material_val = material_val.replace(/^,|,$/g,'');
				}
			});
			$("#material_val").val(material_val);
			$("#page_val").val("1");
			get_products();
		});
		
		// $(".design_filter").click(function(){
		// var curr_str = $(this).attr("id");
		// var curr_id = curr_str.substring(4);
		// var italic = $(this).find('i');
		// if($(this).hasClass("btn-default")){
		// $(this).removeClass("btn-default").addClass("btn-primary active");
		// italic.removeClass("fa-square-o").addClass("fa-check-square-o");
		// $("#design_"+curr_id).attr("checked","checked");
		// }
		// else{
		// $(this).removeClass("btn-primary active").addClass("btn-default");
		// italic.removeClass("fa-check-square-o").addClass("fa-square-o");
		// $("#design_"+curr_id).removeAttr("checked");
		// }
		
		// var design_val = '';
		// $('.design_filter').each(function(i){
		// var curr_string = $(this).attr("id");
		// var curr_check_id = curr_string.substring(4);
		// if($(this).hasClass("btn-primary active")){
		// if(i == 0){
		// design_val += curr_check_id;
		// }
		// else{
		// design_val += ","+curr_check_id;   // Or ',' for '1','2'
		// }
		// design_val = design_val.replace(/^,|,$/g,'');
		// }
		// });
		// $("#design_val").val(design_val);
		// $("#page_val").val("1");
		// get_products();
		// });
		
		
		// Page Number Click //
		$(".number_box").click(function(){
			var number_box_id = this.id;
			$("#page_val").val(number_box_id);
			get_products();
			return false;
		});
		// Page Number Click //
		
		// Order Change //
		$("#orderby").change(function(){
			$("#orderby_val").val($(this).val());
			$("#page_val").val("1");
			get_products();
		});
		// Order Change //
		
		function get_products(){
			var sub_category_val = $("#sub_category_val").val();
			var material_val = $("#material_val").val();
			var category_val = $("#category_val").val();
			//var design_val = $("#design_val").val();
			var orderby_val = $("#orderby_val").val();
			var page_val = $("#page_val").val();
			var search_val = $("#search_val").val();
			
			$.ajax({
				type:"post",
				data:"sub_category_val="+sub_category_val+"&material_val="+material_val+"&category_val="+category_val+"&orderby_val="+orderby_val+"&page_val="+page_val+"&search_val="+search_val,
				url:"get_products.php",
				beforeSend:function(){
					$("#results").html("");
					$("#results").html("<img src='images/ajax_loader.gif' alt='Loader Image' />");
				},
				success:function(msg){
					//alert(msg);
					$("#results").html("");
					$("#results").html(msg);
					$('html, body').animate({scrollTop:$('#results').position().top}, 'slow');
				}
			});
			return false;
		}
	</script>																																													