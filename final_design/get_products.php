<?php
	if(!session_id()){
		session_start();
	}
	require_once('adminpanel/lib/helper.php');
	require_once('adminpanel/lib/library_functions.php');
	
	if(isset($_POST['sub_category_val']) && isset($_POST['material_val']) && isset($_POST['category_val']) && isset($_POST['orderby_val']) && isset($_POST['page_val']) && isset($_POST['search_val']) ){
		$sub_category_val = addslashes($_POST['sub_category_val']);
		$material_val = addslashes($_POST['material_val']);
		$category_val = addslashes($_POST['category_val']);
		//$design_val = addslashes($_POST['design_val']);
		$orderby_val = addslashes($_POST['orderby_val']);
		$page_val = addslashes($_POST['page_val']);
		$search_val = addslashes($_POST['search_val']);
	?>
	<input type="hidden" id="sub_category_val" name="sub_category_val" value="<?php echo $sub_category_val; ?>">
	<input type="hidden" id="material_val" name="material_val" value="<?php echo $material_val; ?>">
	<input type="hidden" id="category_val" name="category_val" value="<?php echo $category_val; ?>">
	
	<input type="hidden" id="orderby_val" name="orderby_val" value="<?php echo $orderby_val; ?>">
	<input type="hidden" id="page_val" name="page_val" value="<?php echo $page_val; ?>">
	<input type="hidden" id="search_val" name="search_val" value="<?php echo $search_val; ?>">
	<?php
		$where_append = "";
		$where_order = "";
		if($sub_category_val != ""){
			$sub_category_name = str_replace(",","','",$sub_category_val);
			$get_sub_cat_ids = $obj->select("sub_category_id","sub_category_master","sub_category_status='1' AND sub_category_name IN ('$sub_category_name')");
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
		if($material_val != ""){
			$where_append.= " AND P.material_id IN ('$material_val')";
		}
		if($category_val != ""){
			$category_id = str_replace(",","','",$category_val);
			$where_append.= " AND P.category_id IN ('$category_id')";
		}
		// if($design_val != ""){
		// $design_id = str_replace(",","','",$design_val);
		// $where_append.= " AND P.design_id IN ('$design_id')";
		// }
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
			$where_append.= " AND (P.product_title LIKE '%$search_val%' OR C.category_name LIKE '%$search_val%' OR SC.sub_category_name LIKE '%$search_val%' OR M.material_name LIKE '%$search_val%' OR P.product_selling_price LIKE '%$search_val%' OR P.product_mrp LIKE '%$search_val%' OR P.product_keywords LIKE '%$search_val%' OR P.product_description LIKE '%$search_val%')";
		}
		//echo $where_order;
		//echo $where_append;
		
		$page_count = $obj->select("COUNT(P.product_id) AS NUM","product_master AS P INNER JOIN material_master AS M ON M.material_id = P.material_id INNER JOIN sub_category_master AS SC ON SC.sub_category_id = M.material_sub_category_id INNER JOIN category_master AS C ON SC.sub_category_category_id = M.material_id","P.product_status='1' AND M.material_status='1' AND SC.sub_category_status='1' AND C.category_status='1' $where_append $where_order ");
		$total_pages = $page_count[0]['NUM'];
		$limit = 9;
		$page = $page_val;
		if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
		else
		$start = 0;	
		
		$product_arr = $obj->select("*","product_master AS P INNER JOIN material_master AS M ON P.material_id = M.material_id INNER JOIN sub_category_master AS SC ON SC.sub_category_id = M.material_sub_category_id INNER JOIN category_master AS C ON SC.sub_category_category_id = C.category_id","P.product_status='1' AND M.material_status='1' AND SC.sub_category_status='1' AND C.category_status='1' $where_append $where_order LIMIT $start, $limit");
		
		if ($page == 0) $page = 1;					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		$adjacents = 3;
		$pagination = "";
		
		if(is_array($product_arr))
		{
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
			</div> <!-- end col -->
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




