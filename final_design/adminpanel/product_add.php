<!DOCTYPE html>
<html lang="en">
	
	<!-- Header Starts -->
	<?php
		require_once('includes/header.php');
		if(isset($_GET['product_id'])){
			$product_id = $_GET['product_id'];
			$product_arr = $obj->select("*","product_master","product_status='1' AND product_id='$product_id'");
			if(!is_array($product_arr)){
			?>
			<script>
				window.location.href="product_list.php";
			</script>
			<?php
				exit();
			}
		}
	?>
	<!-- Header Ends -->
	<link href="css/jquery.tagsinput.css" rel="stylesheet" />
	<link href="css/jquery-ui.css" rel="stylesheet" />
	<!-- Styles Starts-->
	<style type="text/css">
		.add_display{
		display:none;
		}
		
		.cropit-preview {
		background-color: #f8f8f8;
		background-size: cover;
		border: 1px solid #ccc;
		border-radius: 3px;
		margin-top: 7px;
		width: 300px;
		height: 300px;
		}
		
		.cropit-preview-image-container {
		cursor: move;
		}
		
		.image-size-label {
		margin-top: 10px;
		}
		
		input, .export {
		display: block;
		}
		
		button {
		margin-top: 10px;
		}
		
		.thumb_img{
		border: 1px solid #CCC;
		border-radius: 5px;
		height:100px;
		width:100px;
		margin: 1px;
		}
		
		.my_close_btn{
		position: absolute;
		right: 0;
		top: 0px;
		}
	</style>
	<!-- Styles Ends -->
	
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
							<i class="fa fa-home" style="color:#FFF;"></i>
						</div>
						<div class="media-body">
							<ul class="breadcrumb">
								<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
								<li>ADD New Product</li>
							</ul>
							<h4>Product</h4>
						</div>
					</div><!-- media -->
				</div><!-- pageheader -->
				
				<div class="contentpanel">
					<div class="row">
						<div class="col-md-12">
							
							<?php
								if(isset($_GET['msg']))
								{
									if($_GET['msg'] == 1)
									{
									?>
									<div class="alert alert-info error_alert">
										<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
										Product Name or Product Code Already Exists.
									</div>
									<?php
									}
								}
							?>
							<h5><font color="red">*</font> Marked fields are mandatory.</h5>
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-btns">
										<a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
										<a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
									</div>
									<img height="32px" width="32px" src="images/loading.gif" class="pull-right hide" id="loader">
									<b>ADD NEW PRODUCT</b>
								</div>
								<div class="panel-body">
									<form enctype="multipart/form-data" method="POST">
										<input type="hidden" id="product_id" name="product_id" value="<?php if(isset($_GET['product_id'])){ echo $product_arr[0]['product_id']; } ?>">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-sm-4 control-label">Select category &nbsp;<span class="required_field">*</span></label>
															<div class="col-sm-8">
																<select id="category_id" name="category_id" data-placeholder="Product Category" class="width300 select_component">
																	<option value="0">Select Category</option>
																	<?php
																		$category_arr = $obj->select("*","category_master","category_status='1'");
																		if(is_array($category_arr)){
																			foreach($category_arr as $category){
																			?>
																			<option value="<?php echo $category['category_id']; ?>" <?php if(isset($_GET['product_id'])){ if($product_arr[0]['category_id'] == $category['category_id']){ ?> selected <?php } } ?> ><?php echo $category['category_name']; ?></option>
																			<?php
																			}
																		}
																	?>
																</select>
																<br>
																<span class="span_err" id="category_id_err"></span> 
															</div>
														</div><!-- form-group -->
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-sm-4 control-label">Select Sub Category &nbsp;<span class="required_field">*</span></label>
															<div class="col-sm-8">
																<select id="sub_category_id" name="sub_category_id" data-placeholder="Product Category" class="width300 select_component">
																	<option value="0">Please Select Category First</option>
																	<?php
																		if(isset($_GET['product_id'])){
																			$category_sub_cat_id = $product_arr[0]['category_id'];
																			$get_sub_categories = $obj->select("*","sub_category_master","sub_category_status='1' AND sub_category_category_id='$category_sub_cat_id'");
																			if(is_array($get_sub_categories)){
																				foreach($get_sub_categories as $sub_categories_val){
																				?>
																				<option value="<?php echo $sub_categories_val['sub_category_id']; ?>" <?php if(isset($_GET['product_id'])){ if($product_arr[0]['sub_category_id'] == $sub_categories_val['sub_category_id']){ ?> selected <?php } } ?> ><?php echo $sub_categories_val['sub_category_name']; ?></option>
																				<?php
																				}
																			}
																		}
																	?>
																</select><br>
																<span class="span_err" id="sub_category_id_err"></span> 
															</div>
														</div><!-- form-group -->
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-sm-4 control-label">Select Material &nbsp;<span class="required_field">*</span></label>
															<div class="col-sm-8">
																<select id="material_id" name="material_id" data-placeholder="Product Category" class="width300 select_component">
																	<option value="0">Please Select Category First</option>
																	<?php
																		if(isset($_GET['product_id'])){
																			$sub_cat_material_id = $product_arr[0]['sub_category_id'];
																			$get_material = $obj->select("*","material_master","material_status='1' AND material_sub_category_id='$sub_cat_material_id'");
																			if(is_array($get_material)){
																				foreach($get_material as $material_val){
																				?>
																				<option value="<?php echo $material_val['material_id']; ?>" <?php if(isset($_GET['product_id'])){ if($product_arr[0]['material_id'] == $material_val['material_id']){ ?> selected <?php } } ?> ><?php echo $material_val['material_name']; ?></option>
																				<?php
																				}
																			}
																		}
																	?>
																</select><br>
																<span class="span_err" id="material_id_err"></span> 
															</div>
														</div><!-- form-group -->
													</div>
													
												</div>
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-sm-4 control-label">Product Title &nbsp;<span class="required_field">*</span></label>
															<div class="col-sm-8">
																<input type="text" placeholder="eg: Agent of Chaos - Pro case for iPad 2/3/4" class="width300 form-control" id="product_title" name="product_title" value="<?php if(isset($_GET['product_id'])){ echo $product_arr[0]['product_title']; } ?>" />
																<span class="span_err" id="product_title_err"></span> 
															</div>
														</div><!-- form-group -->
													</div>
												</div>
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-sm-4 control-label">Product SKU &nbsp;<span class="required_field">*</span></label>
															<div class="col-sm-8">
																<input type="text" placeholder="eg: MOCG2SDK0002" class="width300 form-control" id="product_sku" name="product_sku" value="<?php if(isset($_GET['product_id'])){ echo $product_arr[0]['product_sku']; } ?>" />
																<span class="span_err" id="product_sku_err"></span> 
															</div>
														</div><!-- form-group -->
													</div>
												</div>
												<div class="row">
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-sm-4 control-label">MRP &nbsp;<span class="required_field">*</span></label>
															<div class="col-sm-8">
																<input type="text" placeholder="eg: 550" class="width300 form-control" id="product_mrp" name="product_mrp" value="<?php if(isset($_GET['product_id'])){ echo $product_arr[0]['product_mrp']; } ?>" onkeypress="return validate(event)" />
																<span class="span_err" id="product_mrp_err"></span> 
															</div>
														</div><!-- form-group -->
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-sm-4 control-label">Selling Price &nbsp;<span class="required_field">*</span></label>
															<div class="col-sm-8">
																<input type="text" placeholder="eg: 500" class="width300 form-control" id="product_selling_price" name="product_selling_price" value="<?php if(isset($_GET['product_id'])){ echo $product_arr[0]['product_selling_price']; } ?>" onkeypress="return validate(event)" />
																<span class="span_err" id="product_selling_price_err"></span> 
															</div>
														</div><!-- form-group -->
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-sm-4 control-label">Search Keywords</label>
															<div class="col-sm-8">
																<input name="product_keywords" id="product_keywords" class="form-control" value="<?php if(isset($_GET['product_id'])){ echo $product_arr[0]['product_keywords']; } ?>" />
																<span class="span_err" id="product_keywords_err"></span> 
															</div>
														</div><!-- form-group -->
													</div>
												</div>
												<div class="row">
													
													<div class="col-md-8">
														<div class="form-group">
															<label class="col-sm-12 control-label">Product Description &nbsp;<span class="required_field">*</span></label>
															<div class="col-sm-12">
																<textarea class="form-control" rows="5" id="product_description" name="product_description"><?php if(isset($_GET['product_id'])){ echo $product_arr[0]['product_description']; } ?></textarea>
																<span class="span_err" id="product_description_err"></span> 
															</div>
														</div><!-- form-group -->
														<script>
															CKEDITOR.replace( 'product_description' );
														</script>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<label class="col-sm-12 control-label">Product Image : &nbsp;<span class="required_field">*</span></label>
														<input type="hidden" id="logoURI" name="logoURI" value="">
														<div class="image-editor">
															<input type="file" class="cropit-image-input form-control width300" id="product_image_link" name="product_image_link[]" >
															<span class="span_err" id="product_image_link_err"> Please upload an image of size greater than 850px X 995px </span> 
															<div class="cropit-preview"></div>
															<div class="image-size-label">
																Resize image
															</div>
															
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row button_margin">
											<div class="col-md-12">
												<div class="btn-list text-center">
													<input type="submit" class="btn btn-success" id="submit_product" value="Save">
													<a class="btn btn-default" href="product_list.php">Back to List</a>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
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
	<script type="text/javascript" src="js/moment.min.js"></script>
	<script type="text/javascript" src="js/moment-with-locales.js"></script>
	<script type="text/javascript" src="js/transition.js"></script>
	<script type="text/javascript" src="js/collapse.js"></script>
	<script src="js/cropit/jquery.cropit.js"></script>
	<script src="js/jquery.tagsinput.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	
	<script type="text/javascript">
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
		
		$("#submit_product").click(function(){
			<?php 
				if(isset($_GET['product_id']))
				{
				?>
				var product_id = $("#product_id").val().trim();
				<?php
				}
			?>
			var category_id = $("#category_id").val().trim();
			var sub_category_id = $("#sub_category_id").val().trim();
			var material_id = $("#material_id").val().trim();
			//var design_id = $("#design_id").val().trim();
			//var design_name = $("#design_name").val().trim();
			var product_title = $("#product_title").val().trim();
			//var product_cases = $("#product_cases").val().trim();
			var product_sku = $("#product_sku").val().trim();
			//var product_design = $("#product_design").val().trim();
			var product_mrp = $("#product_mrp").val().trim();
			var product_selling_price = $("#product_selling_price").val().trim();
			var product_keywords = $("#product_keywords").val().trim();
			//var product_description = $("#product_description").val();
			var product_description = CKEDITOR.instances['product_description'].getData().trim();
			
			//Product Image			
			var product_image_link = $("#product_image_link").val();
			var product_image_link_id = document.getElementById("product_image_link");
			var product_image_link_ext = $("#product_image_link").val().split('.').pop().toLowerCase();
			// image size //
			if(product_image_link != ""){
				var fsize_image = $('#product_image_link')[0].files[0].size;
			}
			// image size //
			var imageData = $('.image-editor').cropit('export');
			$("#logoURI").val(imageData);
			var logoURI = $("#logoURI").val();
			
			
			if(category_id == "" || category_id == "0" || isNaN(category_id)){
				var message = "Please Select a category";
				valid('category_id',message);
				return false;
			}
			else if(sub_category_id == "" || sub_category_id == "0" || isNaN(sub_category_id)){
				var message = "Please Enter Product Name";
				valid('sub_category_id',message);
				return false;
			}
			else if(material_id == "" || material_id == "0" || isNaN(material_id)){
				var message = "Please Enter Product Name";
				valid('material_id',message);
				return false;
			}
			// else if(design_id == "" || design_id == "0" || isNaN(design_id)){
			// var message = "Please Select a Design";
			// valid('design_id',message);
			// return false;
			// }
			// else if(design_name == ""){
			// var message = "Please Enter Design Name";
			// valid('design_name',message);
			// return false;
			// }
			else if(product_title == ""){
				var message = "Please Enter Design Name";
				valid('product_title',message);
				return false;
			}
			// else if(product_cases == ""){
			// var message = "Please Enter a product Case";
			// valid('product_cases',message);
			// return false;
			// }
			else if(product_sku == ""){
				var message = "Please Enter a SKU code";
				valid('product_sku',message);
				return false;
			}
			else if(product_mrp == "" || isNaN(product_mrp)){
				var message = "Please Enter a Numeric MRP Price";
				valid('product_mrp',message);
				return false;
			}
			else if(product_selling_price == "" || isNaN(product_selling_price)){
				var message = "Please Enter a Numeric Selling Price";
				valid('product_selling_price',message);
				return false;
			}
			else if(parseFloat(product_mrp) < parseFloat(product_selling_price)){
				var message = "Selling Price cannot be greater than MRP.";
				valid('product_selling_price',message);
				return false;
			}
			else if(product_description == "")
			{
				var message = "Please Enter Product Description";
				valid('product_description',message);
				return false;
			}
			<?php 
				if(!isset($_GET['product_id']))
				{
				?>
				else if(product_image_link == "")
				{
					var message = "Please Enter Product Image";
					valid('product_image_link',message);
					return false;
				}
				<?php
				}
			?>
			else if($.inArray(product_image_link_ext, ['jpg','jpeg','png']) == -1 && product_image_link != ""){
				var message = "Image should be of the format: jpg,jpeg,png";
				valid('product_image_link',message);
				return false;
			}
			else if(product_image_link != "" && fsize_image > 5000000000 ){
				var message = "Image should not be grater tha 5000 KBs";
				valid('product_image_link',message);
				return false;
			}
			else
			{
				$(".span_err").html("");
				$("input").removeClass("input_err");
				$("textarea").removeClass("input_err");
				$("select").removeClass("input_err");
				var formdata= new FormData();
				<?php 
					if(isset($_GET['product_id'])){
					?>
					formdata.append('product_id',product_id);
					<?php
					}
				?>
				formdata.append('category_id',category_id);
				formdata.append('sub_category_id',sub_category_id);
				formdata.append('material_id',material_id);
				// formdata.append('design_id',design_id);
				// formdata.append('design_name',design_name);
				formdata.append('product_title',product_title);
				//formdata.append('product_cases',product_cases);
				formdata.append('product_sku',product_sku);
				//formdata.append('product_design',product_design);
				formdata.append('product_mrp',product_mrp);
				formdata.append('product_selling_price',product_selling_price);
				formdata.append('product_keywords',product_keywords);
				formdata.append('product_description',product_description);
				if(product_image_link != ""){
					formdata.append('logoURI',logoURI);
					for (var i = 0; i < product_image_link_id.files.length; ++i) {
						formdata.append('product_image_link[]',product_image_link_id.files[i]);
					}
				}
				
				
				console.log(formdata)
				$.ajax({
					type:"post",
					data: formdata,
					processData: false,
					contentType: false,
					
					url:"product_add_action.php",
					beforeSend:function(){
						$("#loader").removeClass("hide");
					},
					success:function(res){
						$("#loader").addClass("hide");
						res=res.trim();
						alert(res);
						if(res == "1"){
							var message = "A Product with the same SKU code is already present.";
							valid('product_sku',message);
							return false;
						}
						else if(res == "5"){
							var message = "A Product with the same title is already present.";
							valid('product_title',message);
							return false;
						}
						else if(res == "2"){
							window.location.href="product_list.php?msg=2";
						}
						else if(res == "3"){
							window.location.href="product_list.php?msg=3";
						}
						else{
							alert("Something went wrong. Please try again");
							window.location.href="product_list.php";
						}
					}
				});
				return false;
			}
			return false;
		});
		
		
		$(function() {
			$('.image-editor').cropit({
				imageState: {
					src: '',
				},
			});
			
			$('.rotate-cw').click(function() {
				$('.image-editor').cropit('rotateCW');
			});
			$('.rotate-ccw').click(function() {
				$('.image-editor').cropit('rotateCCW');
			});
			
			$('.export').click(function() {
				var imageData = $('.image-editor').cropit('export');
				document.getElementsByName("image_file1")[0].setAttribute("value", imageData);
			});
		});
		
		
		// Select2
		jQuery(".select_component").select2();
		jQuery('#select-search-hide').select2({
			minimumResultsForSearch: -1
		});
		
		$(document).ready(function(){
			jQuery('#product_keywords').tagsInput({width:'auto'});
			
			
			<?php 
				if(isset($_GET['product_id']))
				{
					if($product_arr[0]['product_image_link'] != '')
					{
					?>
					$(".cropit-preview-image").attr("src","<?php echo $product_arr[0]['product_image_link']; ?>");
					<?php
					}
				}
			?>
			
			
		});
		
		$("#category_id").change(function(){
			var curr_id = $(this).val();
			if(curr_id == "" || isNaN(curr_id) || curr_id == '0'){
				$("#sub_category_id").html("<option value='0'> Please Select category First </option>");
				$("#select2-chosen-2").html("Please Select category First");
				$("#material_id").html("<option value='0'> Please Select Sub Category First </option>");
				$("#select2-chosen-3").html("Please Select Sub Category First");
			}
			else{
				var formdata= new FormData();
				formdata.append('category_id',curr_id);
				$.ajax({
					type:"post",
					data: formdata,
					processData: false,
					contentType: false,
					url:"get_sub_categories.php",
					beforeSend:function(){
						$("#loader").removeClass("hide");
					},
					success:function(msg){
						msg=msg.trim();
						//alert(msg);
						$("#loader").addClass("hide");
						$("#sub_category_id").html(msg);
						$("#select2-chosen-2").html("Please Select a sub Category");
						$("#material_id").html("<option value='0'> Please Select sub Category First </option>");
						$("#select2-chosen-3").html("Please Select sub Category First");
					}
				});
				return false;
			}
		});
		
		$("#sub_category_id").change(function(){
			var curr_id = $(this).val();
			if(curr_id == "" || isNaN(curr_id) || curr_id == '0'){
				$("#material_id").html("<option value='0'> Please Select Sub Category First </option>");
				$("#select2-chosen-3").html("Please Select Sub Category First");
			}
			else{
				var formdata= new FormData();
				formdata.append('sub_category_id',curr_id);
				$.ajax({
					type:"post",
					data: formdata,
					processData: false,
					contentType: false,
					url:"get_material.php",
					beforeSend:function(){
						$("#loader").removeClass("hide");
					},
					success:function(msg){
						msg=msg.trim();
						//alert(msg);
						$("#loader").addClass("hide");
						$("#material_id").html(msg);
						$("#select2-chosen-3").html("Please Select a material");
					}
				});
				return false;
			}
		});
		
		// var material_master = {
			// material_autocomplete: function(i){
				// var availableTags3 = [<?php echo (isset($all_material_names) ? $all_material_names : ''); ?>];
				// //alert(availableTags3);
				// //alert("#vessel"+i);
				// $("#sub_category_name").autocomplete({
					// source: availableTags3,
					// minLength: 0,
					// select: function(event, ui){
						// var $service_label = $(this);
						// $service_label.val( ui.item.label);
						// return false;
					// }
				// });
			// }
		// };
		
		// var case_master = {
			// case_autocomplete: function(i){
				// var availableTags3 = [<?php echo (isset($all_case_names) ? $all_case_names : ''); ?>];
				// //alert(availableTags3);
				// //alert("#vessel"+i);
				// $("#product_cases").autocomplete({
					// source: availableTags3,
					// minLength: 0,
					// select: function(event, ui){
						// var $service_label = $(this);
						// $service_label.val( ui.item.label);
						// return false;
					// }
				// });
			// }
		// };
		
		// var product_design_master = {
			// product_design_autocomplete: function(i){
				// var availableTags3 = [<?php echo (isset($all_product_design_names) ? $all_product_design_names : ''); ?>];
				// //alert(availableTags3);
				// //alert("#vessel"+i);
				// $("#product_design").autocomplete({
					// source: availableTags3,
					// minLength: 0,
					// select: function(event, ui){
						// var $service_label = $(this);
						// $service_label.val( ui.item.label);
						// return false;
					// }
				// });
			// }
		// };
		
		//material_master.device_autocomplete();
		//case_master.case_autocomplete();
		// product_design_master.product_design_autocomplete();
		
		function validate(key)
		{
			//getting key code of pressed key
			var keycode = (key.which) ? key.which : key.keyCode;
			//comparing pressed keycodes
			if (!(keycode==8 || keycode==46)&&(keycode < 48 || keycode > 57))
			{
				return false;
			}
		}
	</script>
</body>
</html>
