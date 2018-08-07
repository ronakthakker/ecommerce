<?php
	require_once('includes/access.php');
	require_once('lib/helper.php');
	require_once('lib/library_functions.php');
	
	if(isset($_POST['page_val']) && isset($_POST['page_count']) && isset($_POST['search_val']) ){
		$page_val = $_POST['page_val'];
		$page_count = $_POST['page_count'];
		$search_val = $_POST['search_val'];
	?>
	<div class="row">
		<div class="col-xs-6">
			<div class="form-group">
				<label class="col-sm-1 control-label">Show</label>
				<div class="col-sm-2">
					<select id="count_id" name="count_id" data-placeholder="" style="width:100%;" class="select_component">
						<option <?php if ($page_count == "10"){ echo "selected";} ?> value="10">10</option>
						<option <?php if ($page_count == "25"){ echo "selected";} ?> value="25">25</option>
						<option <?php if ($page_count == "50"){ echo "selected";} ?> value="50">50</option>
						<option <?php if ($page_count == "100"){ echo "selected";} ?> value="100">100</option>
					</select>
					<br>
					<span class="span_err" id="brand_id_err"></span> 
				</div>
				<label class="col-sm-1 control-label">entries</label>
			</div><!-- form-group -->
		</div>
		<div class="col-xs-6">
			<div class="dataTables_filter form-inline ">
				<form enctype="multipart/form-data" method="POST">
					<label>
						Search:<input type="text" id="search_field" value="<?php if($search_val !=""){echo $search_val;} ?>" class="form-control input-sm" placeholder="" >
						<input type="submit" id="submit_search" name="submit_search">
					</label>
				</form>
			</div>
		</div>
		
	</div>
	<?php
		$where_append = "";
		if($search_val != ""){
			$where_append = " AND (P.design_name LIKE '%$search_val%' OR P.product_title LIKE '%$search_val%' OR P.product_sku LIKE '%$search_val%' OR D.device_name LIKE '%$search_val%' OR B.brand_name LIKE '%$search_val%' OR C.category_name LIKE '%$search_val%')";
		}
		$page_cnt = $obj->select("COUNT(P.product_id) AS NUM","products AS P INNER JOIN device_master AS D ON D.device_id = P.device_id INNER JOIN category_master AS C ON C.category_id = D.device_category_id INNER JOIN brand_master AS B ON C.category_brand_id = B.brand_id","P.product_status='1' AND D.device_status='1' AND C.category_status='1' AND B.brand_status='1' $where_append ORDER BY product_id DESC");
		$total_pages = $page_cnt[0]['NUM'];
		$limit = $page_count;
		$page = $page_val;
		if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
		else
		$start = 0;	
		
		$product_arr = $obj->select("P.product_id, P.product_title, B.brand_name, D.device_name, P.is_new","products AS P INNER JOIN device_master AS D ON P.device_id = D.device_id INNER JOIN category_master AS C ON C.category_id = D.device_category_id INNER JOIN brand_master AS B ON C.category_brand_id = B.brand_id","P.product_status='1' AND D.device_status='1' AND C.category_status='1' AND B.brand_status='1' $where_append ORDER BY product_id DESC  LIMIT $start, $limit");
		
		if ($page == 0) $page = 1;					//if no page var is given, default to 1.
		$prev = $page - 1;							//previous page is page - 1
		$next = $page + 1;							//next page is page + 1
		$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
		$lpm1 = $lastpage - 1;						//last page minus 1
		$adjacents = 3;
		$pagination = "";
	?>
	<table class="table table-striped table-bordered responsive">
		<thead class="">
			<tr>
				<th>Sr No.</th>
				<th>Product Title</th>
				<th>Brand Name</th>
				<th>Device Name</th>
				<th>New</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			
			<input type="hidden" id="page_count" name="page_count" value="<?php echo $page_count; ?>">
			<input type="hidden" id="page_val" name="page_val" value="<?php echo $page_val; ?>">
			<input type="hidden" id="search_val" name="search_val" value="<?php echo $search_val; ?>">
			<?php
				if(is_array($product_arr)){
					$i = $start+1;
					foreach($product_arr as $product_val){
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $product_val['product_title']; ?></td>
						<td><?php echo $product_val['brand_name']; ?></td>
						<td><?php echo $product_val['device_name']; ?></td>
						<td><input type="checkbox" id="<?php echo $product_val['product_id']; ?>" <?php if($product_val['is_new'] == "1"){ echo "checked"; } ?> class="common_tick" ></td>
						<td><a href="product_add.php?product_id=<?php echo $product_val['product_id']; ?>" ><i class="fa fa-pencil-square" title="Edit"></i></a> &nbsp; <a href="#" onclick="javascript :delete_record(<?php echo $product_val['product_id']; ?>);"><i class="fa fa-trash-o" title="Delete"></i></a></td>
					</tr>
					<?php
						$i++;
					}
				}
				else
				{
				?>
				<tr>
					<td>No Records</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<?php
				}
			?>
		</tbody>
	</table>
	
	<?php
		if(is_array($product_arr)){
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
		}
	?>
	<script>
		
		// Select2
		jQuery(".select_component").select2();
		jQuery('#select-search-hide').select2({
			minimumResultsForSearch: -1
		});
		
		// Page Number Click //
		$(".number_box").click(function(){
			var number_box_id = this.id;
			$("#page_val").val(number_box_id);
			var page_val = $("#page_val").val();
			var page_count = $("#page_count").val();
			var search_val = $("#search_val").val();
			get_products(page_val,page_count,search_val);
			return false;
		});
		// Page Number Click //
		
		// Page Count Click //
		$("#count_id").change(function(){
			$("#page_count").val($(this).val());
			$("#page_val").val("1");
			var page_val = $("#page_val").val();
			var page_count = $("#page_count").val();
			var search_val = $("#search_val").val();
			get_products(page_val,page_count,search_val);
			return false;
		});
		// Page Number Click //
		
		// Search //
		
		$("#submit_search").click(function(){
			$("#search_val").val($("#search_field").val());
			$("#page_val").val("1");
			var page_val = $("#page_val").val();
			var page_count = $("#page_count").val();
			var search_val = $("#search_val").val();
			get_products(page_val,page_count,search_val);
			return false;
		});
		
		// Search //
		
		
		// Is New Tick //
		$(".common_tick").click(function(){
			var product_id = $(this).attr("id")
			if($("#"+product_id).is(":checked")){
				var is_new = 1;
			}
			else{
				var is_new = 0;
			}
			$.ajax({
				type:"post",
				data:"product_id="+product_id+"&is_new="+is_new,
				url:"product_new_action.php",
				beforeSend:function(){
				},
				success:function(msg){
				}
			});
		});
		// Is New Tick //	
	</script>
	<?php
	}
	else{
		echo 4;
	}
?>




