<!DOCTYPE html>
<html lang="en">
	
	<!-- Header Starts -->
	<?php
		require_once('includes/header.php');
	?>
	<!-- Header Ends -->
	<style>
		.blog_add_form{
		display:none;
		margin-top: 15px;
		border: 1px solid #CCC;
		padding: 2%;
		}
		.control-label{
		margin-top: 10px !important;
		}
		.my_img_list{
		width: 300px;
		height: auto;
		margin: 0 auto;
		}
		.pagination>li{
		cursor: pointer;
		}
		#submit_search{
		display: none;
		}
	</style>
	<section>
		<div class="mainwrapper">
			
			<!-- Left Bar Starts -->
			<?php
				require_once('includes/leftbar.php');
			?>
			<!-- Left Bar Ends -->
			
			<div class="mainpanel">
				<div class="pageheader">
					<div class="media">
						<div class="pageicon pull-left">
							<i class="fa fa-home"></i>
						</div>
						<div class="media-body">
							<ul class="breadcrumb">
								<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
								<li>Blog Categories List</li>
							</ul>
							<h4>Blog Categories</h4>
						</div>
					</div><!-- media -->
				</div><!-- pageheader -->
				
				<div class="contentpanel">
					<div class="row">
						
						<?php
							if(isset($_GET['msg']))
							{
								if($_GET['msg'] == 2)
								{
								?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									Entry Edited Successfully.
								</div>
								<?php
								}
								else if($_GET['msg'] == 3)
								{
								?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									Entry Inserted Successfully.
								</div>
								<?php
								}
								else if($_GET['msg'] == 4)
								{
								?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									Entry Deleted Successfully.
								</div>
								<?php
								}
							}
						?>
						<div class="alert alert-success error_alert hide">
							
						</div>
						<div class="row">
							<button onclick="location.href='product_add.php'" class="btn btn-primary blog_add">Add Product</button>
						</div>
						<br/>
						<div id="my_content">
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<label class="col-sm-1 control-label">Show</label>
										<div class="col-sm-2">
											<select id="count_id" name="count_id" data-placeholder="" style="width:100%;" class="select_component">
												<option value="10">10</option>
												<option value="25">25</option>
												<option value="50">50</option>
												<option value="100">100</option>
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
												Search:<input type="text" id="search_field" class="form-control input-sm" placeholder="" >
												<input type="submit" id="submit_search" name="submit_search">
											</label>
										</form>
									</div>
								</div>
								
							</div>
							<?php
								
								$page_count = $obj->select("COUNT(P.product_id) AS NUM","product_master AS P INNER JOIN material_master AS M ON M.material_id = P.material_id INNER JOIN sub_category_master AS SC ON SC.sub_category_id = M.material_sub_category_id INNER JOIN category_master AS C ON SC.sub_category_category_id = C.category_id","P.product_status='1' AND M.material_status='1' AND SC.sub_category_status='1' AND C.category_status='1' ORDER BY product_id DESC");
								$total_pages = $page_count[0]['NUM'];
								$limit = 10;
								$page = 1;if($page) 
								$start = ($page - 1) * $limit; 			//first item to display on this page
								else
								$start = 0;	
								
								$product_arr = $obj->select("P.product_id, P.product_title, C.category_name, M.material_name","product_master AS P INNER JOIN material_master AS M ON P.material_id = M.material_id INNER JOIN sub_category_master AS SC ON SC.sub_category_id = M.material_sub_category_id INNER JOIN category_master AS C ON SC.sub_category_category_id = C.category_id","P.product_status='1' AND M.material_status='1' AND SC.sub_category_status='1' AND C.category_status='1' ORDER BY product_id DESC  LIMIT $start, $limit");
								
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
										<th>Category Name</th>
										<th>Material Name</th>
										<th>Options</th>
									</tr>
								</thead>
								<tbody>
									
									<input type="hidden" id="page_count" name="page_count" value="10">
									<input type="hidden" id="page_val" name="page_val" value="1">
									<input type="hidden" id="search_val" name="search_val" value="">
									<?php
										
										if(is_array($product_arr)){
											$i = 1;
											foreach($product_arr as $product_val){
											?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $product_val['product_title']; ?></td>
												<td><?php echo $product_val['category_name']; ?></td>
												<td><?php echo $product_val['material_name']; ?></td>
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
						</div> <!-- my_content -->
					</div><!-- row -->
					
				</div><!-- contentpanel -->
				
			</div><!-- mainpanel -->
		</div><!-- mainwrapper -->
	</section>
	
	<!-- Footer Starts -->
	<?php
		require_once('includes/footer.php');
	?>
	<!-- Footer Ends -->
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.js"></script>
	<script src="js/dataTables.responsive.js"></script>
	<script>
		function delete_record(product_id)
		{
			var result = confirm("Want to delete this information?");
			if (result) {
				location.href = "product_delete.php?product_id="+product_id;
			}
		}
		
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
		
		// Get Products function //
		function get_products(page_val,page_count,search_val){
			$.ajax({
				type:"post",
				data:"page_val="+page_val+"&page_count="+page_count+"&search_val="+search_val,
				url:"get_products.php",
				beforeSend:function(){
					$("#my_content").html("");
					$("#my_content").html("<img src='images/loaders/loader10.gif' alt='Loader Image' />");
				},
				success:function(msg){
					//alert(msg);
					$("#my_content").html("");
					$("#my_content").html(msg);
					//$('html, body').animate({scrollTop:$('#content').position().top}, 'slow');
				}
			});
			return false;
		}
		// Get Products function //
		
		// Is New Tick //
		$(".common_tick").click(function(){
			var product_id = $(this).attr("id")
			if($("#"+product_id).is(":checked")){
				var is_new = 1;
			}
			else{
				var is_new = 0;
			}
			$.ajax
			({
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
		
		// Error Message Display //
		function valid(fid,fmsg){
			var id = fid;
			var msg = fmsg;
			$(".span_err").html("");
			$("input").removeClass("input_err");
			$("textarea").removeClass("input_err");
			$("select").removeClass("input_err");
			$("#"+id+"_err").html(msg);
			$("#"+id).focus().addClass("input_err");
		}
		// Error Display //
		
	</script>
</body>
</html>
