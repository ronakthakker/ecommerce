<?php 
	require_once("includes/header.php");
?>
<style type="text/css">
	.checkbox-btn{
	background: transparent;
	border: none;
	color: #adadad;
	padding-left: 0px;
	font-size: 14px;
	text-transform: capitalize;
	font-weight: normal;
	font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	i.state-icon.fa.fa-check-square-o {
	font-size: 20px;
	margin-right: 6px;
	}
	.checkbox-btn:hover, .checkbox-btn:active, .checkbox-btn, .checkbox-btn.active:focus, .checkbox-btn:visited, .checkbox-btn.active, .checkbox-btn:focus{
	background: transparent!important;
	border: none!important;
	color: #adadad!important;
	box-shadow: none !important;
	outline: none;
	}
	.button-checkbox button i{
	color: #444;
	font-size: 22px;
	margin-right: 10px;
	}
	.button-checkbox{
	display: block;
	}
	#sidebar .widget-title h4, .blog-desc h3 a, .blog-desc h3 {
	padding: 0;
	margin: 0;
	color: #111111;
	font-size: 12px;
	font-weight: 100;
	text-transform: uppercase;
	}
	.loading-div{
	display: none;
	}
	/*.rating{
	display: none;
	}*/
	.pagination > li {
	display: inline-block;
	}
	.pagination > li.active {
	display: inline-block;
	border: 0 none;
	color: #fff;
	/* margin-top: -13px; */
	/* float: left; */
	font-size: 17px;
	/* font-weight: bold; */
	/* line-height: 1.42857; */
	top: -10px;
	/* margin-left: -1px; */
	padding: 2px 8px;
	background: #d8703f;
	/* position: relative; */
	}
</style>
<section class="section banner nopadbot" style="background-image:url('upload/parallax_02.jpg');" data-img-width="2000" data-img-height="1508" data-diff="100">
	<div class="overlay"></div>
	<div class="container">
		<div class="page-header">
			<div class="bread">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Products</li>
				</ol>
			</div><!-- end bread -->
			<h1>Products</h1>
		</div>
	</div>
</section>

<section class="section border-top">
	<div class="container">
		<div class="row">
			<div id="content" class="col-md-9 col-xs-12 pull-right">
				<div class="row shop-top">
					<div class="col-md-6">
						<!-- <p class="woocommerce-result-count">Showing 1&ndash;12 of 221 results</p> -->
					</div>
					<div class="col-md-6 text-right">
						<div class="catalog-order">
							<select name="orderby" id="orderby" class="selectpicker">
								<option value="0"> Sort By </option>
								<option value="1">Sort by newness</option>
								<option value="2" >Sort by price: low to high</option>
								<option value="3" >Sort by price: high to low</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-12 text-center">
					<div class="loading-div"><img src="images/loader.gif" >
					</div>
				</div>
				
				<div class="row shop-catalog" id="results">
					<?php
						$where_append = "";
						if(isset($_GET['category'])){
							$category_name = addslashes($_GET['category']);
							$get_cat_ids = $obj->select("category_id","category_master","category_status='1' AND category_name = '$category_name'");
							if(is_array($get_cat_ids)){
								$append_cat_ids = "";
								$cnt = 0;
								$has_comma = "";
								foreach($get_cat_ids as $cat_val){
									$cnt+=1;
									if($cnt != count($get_cat_ids)){
										$has_comma = "','";
									}
									else{
										$has_comma = "";
									}
									$append_cat_ids.= $cat_val['category_id'].$has_comma;
								}
								$where_append.= " AND P.category_id IN('$append_cat_ids')";
							}
						}
						if(isset($_GET['brand'])){
							$brand =  base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['brand'])))));
							$where_append.= " AND P.brand_id = '$brand_id'";
						}
						if(isset($_GET['design'])){
							$design =  base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['design'])))));
							$where_append.= " AND P.design_id = '$design_id'";
						}
						if(isset($_GET['search'])){
							$search = addslashes($_GET['search']);
						}
						if(isset($_GET['device'])){
							$device_id = base64_decode(base64_decode(base64_decode(base64_decode($_GET['device']))));
							$where_append.= " AND P.device_id = '$device_id'";
						}
						
						if(isset($_GET['search'])){
							$search_val = $_GET['search'];
							$where_append.= " AND ( P.design_name LIKE '%$search_val%' OR P.product_title LIKE '%$search_val%' OR P.product_cases LIKE '%$search_val%' OR B.brand_name LIKE '%$search_val%' OR C.category_name LIKE '%$search_val%' OR D.device_name LIKE '%$search_val%' OR P.product_design LIKE '%$search_val%' OR P.product_selling_price LIKE '%$search_val%' OR P.product_mrp LIKE '%$search_val%' OR P.product_keywords LIKE '%$search_val%' OR P.product_description LIKE '%$search_val%')";
						}
					?>
					<input type="hidden" id="category_val" name="category_val" value="<?php if(isset($_GET['category'])){ echo addslashes($_GET['category']);}?>">
					<input type="hidden" id="device_val" name="device_val" value="<?php if(isset($_GET['device'])){ echo base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['device'])))));}?>">
					<input type="hidden" id="brand_val" name="brand_val" value="<?php if(isset($_GET['brand'])){ echo base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['brand'])))));}?>">
					<input type="hidden" id="design_val" name="design_val" value="<?php if(isset($_GET['design'])){ echo base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['design'])))));}?>">
					<input type="hidden" id="orderby_val" name="orderby_val" value="0">
					<input type="hidden" id="page_val" name="page_val" value="1">
					<input type="hidden" id="search_val" name="search_val" value="<?php if(isset($_GET['search'])){ echo addslashes($_GET['search']);}?>">
					
					<?php
						$page_count = $obj->select("COUNT(P.product_id) AS NUM","products AS P INNER JOIN device_master AS D ON D.device_id = P.device_id INNER JOIN category_master AS C ON C.category_id = D.device_category_id INNER JOIN brand_master AS B ON C.category_brand_id = B.brand_id","P.product_status='1' AND D.device_status='1' AND C.category_status='1' AND B.brand_status='1' $where_append ");
						$total_pages = $page_count[0]['NUM'];
						$limit = 9;
						$page = 1;if($page) 
						$start = ($page - 1) * $limit; 			//first item to display on this page
						else
						$start = 0;	
						
						$product_arr = $obj->select("*","products AS P INNER JOIN device_master AS D ON P.device_id = D.device_id INNER JOIN category_master AS C ON C.category_id = D.device_category_id INNER JOIN brand_master AS B ON C.category_brand_id = B.brand_id","P.product_status='1' AND D.device_status='1' AND C.category_status='1' AND B.brand_status='1' $where_append LIMIT $start, $limit");
						
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
							<div class="col-md-4 col-sm-6">
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
						?>
						<div class="row">
							<div class="col-md-12 col-sm-12">
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
							</div>
						</div>
						<?php
						}
						else{
						?>
						<div class="col-md-12 col-sm-12">
							<div class="shop-item">   
								<div class="entry">
									<div class="shop-item-title text-center clearfix">
										<h4>No Products to Display</h4>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
					?>
				</div><!-- end row -->
				
				
				
			</div><!-- end content -->
			
			<div id="sidebar" class="col-md-3 col-sm-12 pull-left">
				<div class="widget">
					<div class="widget-title">
						<h4>Filter by Category</h4>
						<hr>
					</div><!-- end widget-title -->
					<?php
						$get_category = $obj->select("DISTINCT(category_name) as category_name","category_master AS C INNER JOIN brand_master AS B ON B.brand_id = C.category_brand_id","C.category_status = '1' AND B.brand_status = '1'");
						if(is_array($get_category)){
							foreach($get_category as $cat_val){
							?>
							<span class="button-checkbox">
								<?php
									$category_btn = "";
									$category_italic = "";
									$category_checked = "";
									if(isset($_GET['category']) && $_GET['category']!=''){
										if(addslashes($_GET['category']) == $cat_val['category_name']){
											$category_btn = "btn-primary active";
											$category_italic = "fa-check-square-o";
											$category_checked = "checked='checked'";
										}
										else{
											$category_btn = "btn-default";
											$category_italic = "fa-square-o";
											$category_checked = "";
										} 
									}
									else{
										$category_btn = "btn-default";
										$category_italic = "fa-square-o";
										$category_checked = "";
									}
								?>
								<button type="button" class="btn checkbox-btn producttype cat_filter <?php echo $category_btn ?>" id="cat_<?php echo $cat_val['category_name']?>" data-color="primary"> <i class="state-icon fa <?php echo $category_italic ?>"></i> <?php echo $cat_val['category_name']?></button>
								<input type="checkbox" <?php echo $category_checked ?> id="cat_<?php echo $cat_val['category_name']; ?>" class="hidden cat_check" />
							</span>
							<?php
							}
						} 
					?>
					
				</div>
				<div class="widget">
					<div class="widget-title">
						<h4>Filter by Brand</h4>
						<hr>
					</div><!-- end widget-title -->
					<?php
						$get_brands = $obj->select("*","brand_master","brand_status='1'");
						if(is_array($get_brands)){
							foreach($get_brands as $brands_val){
							?>
							<span class="button-checkbox">
								<?php
									$brand_btn = "";
									$brand_italic = "";
									$brand_checked = "";
									if(isset($_GET['brand']) && $_GET['brand']!=''){
										if(base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['brand']))))) == $brands_val['brand_id']){ 
											$brand_btn = "btn-primary active";
											$brand_italic = "fa-check-square-o";
											$brand_checked = "checked='checked'";
										}
										else{
											$brand_btn = "btn-default";
											$brand_italic = "fa-square-o";
											$brand_checked = "";
										} 
									}
									else{
										$brand_btn = "btn-default";
										$brand_italic = "fa-square-o";
										$brand_checked = "";
									}
								?>
								<button type="button" class="btn checkbox-btn producttype brand_filter <?php echo $brand_btn; ?>" id="brr_<?php echo $brands_val['brand_id']?>" data-color="primary"> <i class="state-icon fa <?php echo $brand_italic; ?>"></i> <?php echo $brands_val['brand_name']?></button>
								<input type="checkbox" <?php echo $brand_checked; ?> id="brand_<?php echo $brands_val['brand_id'];?>" class="hidden brand_check" />
							</span>
							<?php
							}
						} 
					?>
				</div>
				<div class="widget">
					<div class="widget-title">
						<h4>Filter by Design/ Category</h4>
						<hr>
					</div><!-- end widget-title -->
					<?php
						$get_designs = $obj->select("*","design_master","design_status='1'");
						if(is_array($get_designs)){
							foreach($get_designs as $design_val){
							?>						
							<span class="button-checkbox">
								<?php
									$design_btn = "";
									$design_italic = "";
									$design_checked = "";
									if(isset($_GET['design']) && $_GET['design']!=''){
										if(base64_decode(base64_decode(base64_decode(base64_decode(addslashes($_GET['design']))))) == $design_val['design_id']){ 
											$design_btn = "btn-primary active";
											$design_italic = "fa-check-square-o";
											$design_checked = "checked='checked'";
										}
										else{
											$design_btn = "btn-default";
											$design_italic = "fa-square-o";
											$design_checked = "";
										} 
									}
									else{
										$design_btn = "btn-default";
										$design_italic = "fa-square-o";
										$design_checked = "";
									}
								?>
								<button type="button" class="btn checkbox-btn producttype design_filter <?php echo $design_btn; ?>" id="des_<?php echo $design_val['design_id']?>" data-color="primary"> <i class="state-icon fa <?php echo $design_italic; ?>"></i> <?php echo $design_val['design_name']?></button>
								<input type="checkbox" <?php echo $design_checked; ?> id="design_<?php echo $design_val['design_id']?>" class="hidden design_check" />
							</span>
							<?php
							}
						} 
					?>
				</div>
			</div><!-- end sidebar -->
		</div><!-- end row -->
	</div><!-- end container -->
</section>     

<?php require_once("includes/footer.php");?>
<script type="text/javascript">
	// $(function () {
	// $('.button-checkbox').each(function () {
	
	// // Settings
	// var $widget = $(this),
	// $button = $widget.find('button'),
	// $checkbox = $widget.find('input:checkbox'),
	// color = $button.data('color'),
	// settings = {
	// on: {
	// icon: 'fa fa-check-square-o'
	// },
	// off: {
	// icon: 'fa fa-square-o'
	// }
	// };
	
	// // Event Handlers
	// $button.on('click', function () {
	// $checkbox.prop('checked', !$checkbox.is(':checked'));
	// $checkbox.triggerHandler('change');
	// updateDisplay();
	// });
	// $checkbox.on('change', function () {
	// updateDisplay();
	// });
	
	// // Actions
	// function updateDisplay() {
	// var isChecked = $checkbox.is(':checked');
	
	// // Set the button's state
	// $button.data('state', (isChecked) ? "on" : "off");
	
	// // Set the button's icon
	// $button.find('.state-icon')
	// .removeClass()
	// .addClass('state-icon ' + settings[$button.data('state')].icon);
	
	// // Update the button's color
	// if (isChecked) {
	// $button
	// .removeClass('btn-default')
	// .addClass('btn-' + color + ' active');
	// }
	// else {
	// $button
	// .removeClass('btn-' + color + ' active')
	// .addClass('btn-default');
	// }
	// }
	
	// // Initialization
	// function init() {
	
	// updateDisplay();
	
	// // Inject the icon if applicable
	// if ($button.find('.state-icon').length == 0) {
	// $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
	// }
	// }
	// init();
	// });
	// });
	
	$(".cat_filter").click(function(){
		var curr_str = $(this).attr("id");
		var curr_id = curr_str.substring(4);
		var italic = $(this).find('i');
		if($(this).hasClass("btn-default")){
			$(this).removeClass("btn-default").addClass("btn-primary active");
			italic.removeClass("fa-square-o").addClass("fa-check-square-o");
			$("#cat_"+curr_id).attr("checked","checked");
		}
		else{
			$(this).removeClass("btn-primary active").addClass("btn-default");
			italic.removeClass("fa-check-square-o").addClass("fa-square-o");
			$("#cat_"+curr_id).removeAttr("checked");
		}
		
		var category_val = '';
		$('.cat_filter').each(function(i){
			var curr_string = $(this).attr("id");
			var curr_check_id = curr_string.substring(4);
			if($(this).hasClass("btn-primary active")){
				if(i == 0){
					category_val += curr_check_id;
				}
				else{
					category_val += ","+curr_check_id;   // Or ',' for '1','2'
				}
				category_val = category_val.replace(/^,|,$/g,'');
			}
		});
		$("#category_val").val(category_val);
		$("#page_val").val("1");
		get_products();
	});
	
	$(".brand_filter").click(function(){
		var curr_str = $(this).attr("id");
		var curr_id = curr_str.substring(4);
		var italic = $(this).find('i');
		if($(this).hasClass("btn-default")){
			$(this).removeClass("btn-default").addClass("btn-primary active");
			italic.removeClass("fa-square-o").addClass("fa-check-square-o");
			$("#brand_"+curr_id).attr("checked","checked");
		}
		else{
			$(this).removeClass("btn-primary active").addClass("btn-default");
			italic.removeClass("fa-check-square-o").addClass("fa-square-o");
			$("#brand_"+curr_id).removeAttr("checked");
		}
		
		var brand_val = '';
		$('.brand_filter').each(function(i){
			var curr_string = $(this).attr("id");
			var curr_check_id = curr_string.substring(4);
			if($(this).hasClass("btn-primary active")){
				if(i == 0){
					brand_val += curr_check_id;
				}
				else{
					brand_val += ","+curr_check_id;   // Or ',' for '1','2'
				}
				brand_val = brand_val.replace(/^,|,$/g,'');
			}
		});
		$("#brand_val").val(brand_val);
		$("#page_val").val("1");
		get_products();
	});
	
	$(".design_filter").click(function(){
		var curr_str = $(this).attr("id");
		var curr_id = curr_str.substring(4);
		var italic = $(this).find('i');
		if($(this).hasClass("btn-default")){
			$(this).removeClass("btn-default").addClass("btn-primary active");
			italic.removeClass("fa-square-o").addClass("fa-check-square-o");
			$("#design_"+curr_id).attr("checked","checked");
		}
		else{
			$(this).removeClass("btn-primary active").addClass("btn-default");
			italic.removeClass("fa-check-square-o").addClass("fa-square-o");
			$("#design_"+curr_id).removeAttr("checked");
		}
		
		var design_val = '';
		$('.design_filter').each(function(i){
			var curr_string = $(this).attr("id");
			var curr_check_id = curr_string.substring(4);
			if($(this).hasClass("btn-primary active")){
				if(i == 0){
					design_val += curr_check_id;
				}
				else{
					design_val += ","+curr_check_id;   // Or ',' for '1','2'
				}
				design_val = design_val.replace(/^,|,$/g,'');
			}
		});
		$("#design_val").val(design_val);
		$("#page_val").val("1");
		get_products();
	});
	
	
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
		var category_val = $("#category_val").val();
		var device_val = $("#device_val").val();
		var brand_val = $("#brand_val").val();
		var design_val = $("#design_val").val();
		var orderby_val = $("#orderby_val").val();
		var page_val = $("#page_val").val();
		var search_val = $("#search_val").val();
		
		$.ajax({
			type:"post",
			data:"category_val="+category_val+"&device_val="+device_val+"&brand_val="+brand_val+"&design_val="+design_val+"&orderby_val="+orderby_val+"&page_val="+page_val+"&search_val="+search_val,
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
<script type="text/javascript">
</script>
</body>

</html>