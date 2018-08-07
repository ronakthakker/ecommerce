<?php
	if(!session_id()){
		session_start();
	}
	require_once('adminpanel/lib/helper.php');
	require_once('adminpanel/lib/library_functions.php');
	
	if(isset($_POST['category_val']) && isset($_POST['device_val']) && isset($_POST['brand_val']) && isset($_POST['design_val']) && isset($_POST['orderby_val']) && isset($_POST['page_val']) && isset($_POST['search_val']) ){
		$category_val = addslashes($_POST['category_val']);
		$device_val = addslashes($_POST['device_val']);
		$brand_val = addslashes($_POST['brand_val']);
		$design_val = addslashes($_POST['design_val']);
		$orderby_val = addslashes($_POST['orderby_val']);
		$page_val = addslashes($_POST['page_val']);
		$search_val = addslashes($_POST['search_val']);
	?>
	<input type="hidden" id="category_val" name="category_val" value="<?php echo $category_val; ?>">
	<input type="hidden" id="device_val" name="device_val" value="<?php echo $device_val; ?>">
	<input type="hidden" id="brand_val" name="brand_val" value="<?php echo $brand_val; ?>">
	<input type="hidden" id="design_val" name="design_val" value="<?php echo $design_val; ?>">
	<input type="hidden" id="orderby_val" name="orderby_val" value="<?php echo $orderby_val; ?>">
	<input type="hidden" id="page_val" name="page_val" value="<?php echo $page_val; ?>">
	<input type="hidden" id="search_val" name="search_val" value="<?php echo $search_val; ?>">
	<?php
		$where_append = "";
		$where_order = "";
		if($category_val != ""){
			$category_name = str_replace(",","','",$category_val);
			$get_cat_ids = $obj->select("category_id","category_master","category_status='1' AND category_name IN ('$category_name')");
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
		if($device_val != ""){
			$where_append.= " AND P.device_id IN ('$device_val')";
		}
		if($brand_val != ""){
			$brand_id = str_replace(",","','",$brand_val);
			$where_append.= " AND P.brand_id IN ('$brand_id')";
		}
		if($design_val != ""){
			$design_id = str_replace(",","','",$design_val);
			$where_append.= " AND P.design_id IN ('$design_id')";
		}
		if($orderby_val !="" && $orderby_val!="0"){
			if($orderby_val == "1"){
				$where_append.=" AND is_new='1'";
			}
			else if($orderby_val == "2"){
				$where_order.=" ORDER BY P.product_selling_price ASC";
			}
			else if($orderby_val == "3"){
				$where_order.=" ORDER BY P.product_selling_price DESC";
			}
			else{
				$where_append.="";	
				$where_order.="";	
			}
		}
		if($search_val != ""){
			$where_append.= " AND ( P.design_name LIKE '%$search_val%' OR P.product_title LIKE '%$search_val%' OR P.product_cases LIKE '%$search_val%' OR B.brand_name LIKE '%$search_val%' OR C.category_name LIKE '%$search_val%' OR D.device_name LIKE '%$search_val%' OR P.product_design LIKE '%$search_val%' OR P.product_selling_price LIKE '%$search_val%' OR P.product_mrp LIKE '%$search_val%' OR P.product_keywords LIKE '%$search_val%' OR P.product_description LIKE '%$search_val%')";
		}
		//echo $where_order;
		//echo $where_append;
		
		$page_count = $obj->select("COUNT(P.product_id) AS NUM","products AS P INNER JOIN device_master AS D ON D.device_id = P.device_id INNER JOIN category_master AS C ON C.category_id = D.device_category_id INNER JOIN brand_master AS B ON C.category_brand_id = B.brand_id","P.product_status='1' AND D.device_status='1' AND C.category_status='1' AND B.brand_status='1' $where_append $where_order ");
		$total_pages = $page_count[0]['NUM'];
		$limit = 9;
		$page = $page_val;
		if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
		else
		$start = 0;	
		
		$product_arr = $obj->select("*","products AS P INNER JOIN device_master AS D ON P.device_id = D.device_id INNER JOIN category_master AS C ON C.category_id = D.device_category_id INNER JOIN brand_master AS B ON C.category_brand_id = B.brand_id","P.product_status='1' AND D.device_status='1' AND C.category_status='1' AND B.brand_status='1' $where_append $where_order LIMIT $start, $limit");
		
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
	<script>
		
		// Page Number Click //
		$(".number_box").click(function(){
			var number_box_id = this.id;
			$("#page_val").val(number_box_id);
			get_products();
			return false;
		});
		// Page Number Click //
		
	</script>
	<?php
	}
	else{
		echo 4;
	}
?>




