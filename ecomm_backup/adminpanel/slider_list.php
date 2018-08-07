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
								<li>Slider List</li>
							</ul>
							<h4>Slider List</h4>
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
							<button class="btn btn-primary blog_add">Add Slider</button>
						</div>
						<div class="row blog_add_form">
							<?php
								$max_order = $obj->select("MAX(slider_order) as max","slider_master","slider_status = '1'");
								if(is_array($max_order)){
									if($max_order[0]['max'] != ""){
										$old_max = $max_order[0]['max'];
										$max = $old_max + 1;
									}
									else{
										$max = "1";
									}
								}
								else{
									$max = "1";
								}
							?>
							<form enctype="multipart/form-data" method="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-4 control-label">Slider Image</label>
											<div class="col-sm-8">
												<input type="hidden" id="slider_id" name="slider_id">
												<input type="file" placeholder="Choose Image" class="form-control" id="slider_image_link" name="slider_image_link[]" value="" />
												<span id="slider_image_link_err" class="span_err"> Upload an image of size 1440px X 640px. </span>
											</div>
										</div><!-- form-group -->
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-sm-4 control-label text-right">Order</label>
											<div class="col-sm-8">
												<input type="text" placeholder="Eg: 1" class="form-control" id="slider_order" name="slider_order" value="<?php echo $max; ?>" />
												<span class="span_err" id="slider_order_err"></span> 
											</div>
										</div><!-- form-group -->
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group hidden" id="img_hidden">
											<label for="exampleInputFile" class="col-md-4 control-label">Selected Image :</label>
											<div class="col-md-8">
												<img src="#" id="slider_image_link_img_display" style="width:300px"  />
												<img src="#" id="slider_image_link_img_og" class="hidden" id="img_display1" />
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 text-center">
									<input type="submit" class="btn btn-success" id="slider_save" value="Save">
									<a class="btn btn-default" onclick="javascript:cancel_category();">Cancel</a>
								</div>
							</form>
						</div>
						<?php
							$slider_arr = $obj->select("*","slider_master","slider_status = '1' ORDER BY slider_order");
						?>
						<table id="basicTable" class="table table-striped table-bordered responsive">
							<thead class="">
								<tr>
									<th>Sr No.</th>
									<th>Image</th>
									<th>Order</th>
									<th>Options</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(is_array($slider_arr)){
										$i = 1;
										foreach($slider_arr as $slider_val)
										{
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td class="text-center"><img src="<?php echo $slider_val['slider_image_link']; ?>" class="img-responsive text-center my_img_list" /></td>
											<td><?php echo $slider_val['slider_order']; ?></td>
											<td><a href="#" onclick="javascript:edit_record('<?php echo $slider_val['slider_id']; ?>','<?php echo $slider_val['slider_image_link']; ?>','<?php echo $slider_val['slider_order']; ?>');" ><i class="fa fa-pencil-square" title="Edit"></i></a> &nbsp; <a href="#" onclick="javascript :delete_record(<?php echo $slider_val['slider_id']; ?>);"><i class="fa fa-trash-o" title="Delete"></i></a></td>
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
									</tr>
									<?php
									}
								?>
							</tbody>
						</table>
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
		function delete_record(slider_id)
		{
			var result = confirm("Want to delete this information?");
			if (result) {
				location.href = "slider_delete.php?slider_id="+slider_id;
			}
		}
		
		
		$("#slider_image_link").change(function(){
			readURL(this , "img_hidden");
		});
		
		function readURL(input, img_id) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#slider_image_link_img_display').attr('src', e.target.result);
					$('#slider_image_link_img_og').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
				$("#"+img_id).removeClass("hidden");
			}
		}
		
		$("#slider_save").click(function(){
			var slider_image_link = $("#slider_image_link").val();
			var slider_order = $("#slider_order").val();
			var slider_id = $("#slider_id").val();
			if(slider_image_link != ""){
				var slider_image_link_id = document.getElementById("slider_image_link");
				var image_path_ext = $("#slider_image_link").val().split('.').pop().toLowerCase();
				var x = document.getElementById("slider_image_link_img_og").width;
				var y = document.getElementById("slider_image_link_img_og").height;
			}
			
			if(slider_image_link == "" && slider_id =="")
			{
				var message = "Please select an Image";
				valid('slider_image_link',message);
				return false;
			}
			else if($.inArray(image_path_ext, ['jpg','jpeg','png','']) == -1 && slider_id ==""){
				var message = "Image should be of the format: jpg, jpeg, png";
				valid('slider_image_link',message);
				return false;
			}
			else if($.inArray(image_path_ext, ['jpg','jpeg','png','']) == -1 && slider_id !="" && slider_image_link != ""){
				var message = "Image should be of the format: jpg, jpeg, png";
				valid('slider_image_link',message);
				return false;
			}
			else if((x != 1440 || y!=640) && slider_id ==""){
				alert(111);
				var message = "Upload an image of size 1440px X 640px.";
				valid('slider_image_link',message);
				return false;
			}
			else if((x != 1440 || y!=640) && slider_id !="" && slider_image_link != ""){
				var message = "Upload an image of size 1440px X 640px.";
				valid('slider_image_link',message);
				return false;
			}
			if(slider_order == '')
			{
				var message = "Please mention an Order number";
				valid('slider_order',message);
				return false;
			}
			else
			{
				var formdata= new FormData();
				if(slider_image_link != ""){
					formdata.append('slider_image_link[]',slider_image_link_id.files[0]);
				}
				formdata.append('slider_order',slider_order);
				formdata.append('slider_id',slider_id);
				
				$.ajax({
					type:"post",
					data: formdata,
					processData: false,
					contentType: false,
					url:"slider_action.php",
					beforeSend:function(){
						$("#loader").removeClass("hide");
					},
					success:function(res){
						$("#loader").addClass("hide");
						res=res.trim();
						//alert(res);
						if(res == 1){
							var message = "A Slider with the same order number is already present.";
							valid('slider_order',message);
							return false;
						}
						else if(res == 4){
							$(".error_alert").removeClass('hide');
							$(".error_alert").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Something went wrong. Please try again.');
							$("#category_name").focus();
							setTimeout(function(){
								$(".error_alert").slideUp('fast');
								$(".error_alert").html('');
							}, 5000);
							window.location.href="slider_list.php";
						}
						else if(res == 2){
							location.href="slider_list.php?msg=2"; 
						}
						else if(res == 3){
							location.href="slider_list.php?msg=3"; 
						}
					}
				});
				return false;
			}
		});
		
		function edit_record(slider_id, slider_image, slider_order)
		{
			$("#slider_image_link").val('');
			$("#slider_order").val('');
			$("#slider_id").val('');
			$(".blog_add_form").slideDown('fast');
			$("#slider_order").focus();
			$("#img_hidden").removeClass("hidden");
			$("#slider_image_link_img_display").attr("src",slider_image);
			$("#slider_image_link_img_og").attr("src",slider_image);
			$("#slider_id").val(slider_id);
			$("#slider_order").val(slider_order);
			return false;
		}
		
		$(".blog_add").click(function(){
			$("#slider_id").val('');
			$("#slider_image_link").val('');
			$("#img_hidden").addClass("hidden");
			$("#slider_image_link_img_display").attr("src","#");
			$("#slider_image_link_img_og").attr("src","#");
			$("#slider_order").val('<?php echo $max; ?>');
			$("#slider_order").focus();
			$(".blog_add_form").slideToggle('fast');
		});
		
		function cancel_category()
		{
			$("#category_name").val('');
			$("#category_id").val('');
			$(".blog_add_form").slideToggle('fast');
		}
		
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
		
		jQuery(document).ready(function(){
			
			jQuery('#basicTable').DataTable({
				responsive: true
			});
			
			var shTable = jQuery('#shTable').DataTable({
				"fnDrawCallback": function(oSettings) {
					jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
				},
				responsive: true
			});
			
			// Show/Hide Columns Dropdown
			jQuery('#shCol').click(function(event){
				event.stopPropagation();
			});
			
			jQuery('#shCol input').on('click', function() {
				
				// Get the column API object
				var column = shTable.column($(this).val());
				
				// Toggle the visibility
				if ($(this).is(':checked'))
				column.visible(true);
				else
				column.visible(false);
			});
			
			var exRowTable = jQuery('#exRowTable').DataTable({
				responsive: true,
				"fnDrawCallback": function(oSettings) {
					jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
				},
				"ajax": "ajax/objects.txt",
				"columns": [
				{
					"class":          'details-control',
					"orderable":      false,
					"data":           null,
					"defaultContent": ''
				},
				{ "data": "name" },
				{ "data": "position" },
				{ "data": "office" },
				{ "data": "salary" }
				],
				"order": [[1, 'asc']] 
			});
			
			// Add event listener for opening and closing details
			jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
				var tr = $(this).closest('tr');
				var row = exRowTable.row( tr );
				
				if ( row.child.isShown() ) {
					// This row is already open - close it
					row.child.hide();
					tr.removeClass('shown');
				}
				else {
					// Open this row
					row.child( format(row.data()) ).show();
					tr.addClass('shown');
				}
			});
			
			
			// DataTables Length to Select2
			jQuery('div.dataTables_length select').removeClass('form-control input-sm');
			jQuery('div.dataTables_length select').css({width: '60px'});
			jQuery('div.dataTables_length select').select2({
				minimumResultsForSearch: -1
			});
			
		});
		
		function format (d) {
			// `d` is the original data object for the row
			return '<table class="table table-bordered nomargin">'+
			'<tr>'+
			'<td>Full name:</td>'+
			'<td>'+d.name+'</td>'+
			'</tr>'+
			'<tr>'+
			'<td>Extension number:</td>'+
			'<td>'+d.extn+'</td>'+
			'</tr>'+
			'<tr>'+
			'<td>Extra info:</td>'+
			'<td>And any further details here (images etc)...</td>'+
			'</tr>'+
			'</table>';
		}
	</script>
</body>
</html>
