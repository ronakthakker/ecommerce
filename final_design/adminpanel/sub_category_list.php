<!DOCTYPE html>
<html lang="en">
	
	<!-- Header Starts -->
	<?php
		require_once('includes/header.php');
	?>
	<!-- Header Ends -->
	<style>
		.add_form{
		display:none;
		margin-top: 15px;
		border: 1px solid #CCC;
		padding: 2%;
		}
		.control-label{
		margin-top: 10px !important;
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
								<li>sub Category List</li>
							</ul>
							<h4>sub Category List</h4>
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
						<!-- <button class="btn btn-primary" onClick="location.href='blog_category_add.php'">New Category</button> -->
						<div class="row">
							<button class="btn btn-primary addn">Add Sub Category</button>
						</div>
						<div class="row add_form">
							<form enctype="multipart/form-data" method="POST">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label">Category Name</label>
										<div class="col-sm-8">
											<select id="sub_category_category_id" name="sub_category_category_id" data-placeholder="Brand Name" class="form-control width300">
												<option value="">Choose One</option>
												<?php
													$get_category = $obj->select("category_id,category_name","category_master","category_status='1'");
													if(is_array($get_category)){
														foreach($get_category as $category_val)
														{
														?>
														<option id="category_<?php echo $category_val['category_id']; ?>" value="<?php echo $category_val['category_id']; ?>" ><?php echo $category_val['category_name']; ?></option>
														<?php
														}
													}
												?>
											</select>
											<span id="sub_category_category_id_err" class="span_err"></span>
										</div>
									</div><!-- form-group -->
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label">Sub Category Name</label>
										<div class="col-sm-8">
											<input type="hidden" id="sub_category_id" name="sub_category_id">
											<input type="text" placeholder="eg: Phone" class="form-control" id="sub_category_name" name="sub_category_name" value="" />
											<span class="span_err" id="sub_category_name_err"></span> 
										</div>
									</div><!-- form-group -->
								</div>
								<div class="col-md-12 text-center">
									<input type="submit" class="btn btn-success" id="sub_category_save" value="Save">
									<a class="btn btn-default" onclick="javascript:cancel_record();">Cancel</a>
								</div>
							</form>
						</div>
						<?php
							$sub_category_arr = $obj->select("SC.*, C.category_name","sub_category_master AS SC INNER JOIN category_master AS C ON SC.sub_category_category_id = C.category_id","SC.sub_category_status='1' AND C.category_status='1'");
						?>
						<table id="basicTable" class="table table-striped table-bordered responsive">
							<thead class="">
								<tr>
									<th>Sr No.</th>
									<th>Category Name</th>
									<th>Sub Category Name</th>
									<th>Options</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(is_array($sub_category_arr)){
										$i = 1;
										foreach($sub_category_arr as $sub_category_val)
										{
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $sub_category_val['category_name']; ?></td>
											<td><?php echo $sub_category_val['sub_category_name']; ?></td>
											<td><a href="#" onclick="javascript:edit_record('<?php echo $sub_category_val['sub_category_id']; ?>','<?php echo $sub_category_val['sub_category_category_id']; ?>','<?php echo $sub_category_val['sub_category_name']; ?>');" ><i class="fa fa-pencil-square" title="Edit"></i></a> &nbsp; <a href="#" onclick="javascript :delete_record(<?php echo $sub_category_val['sub_category_id']; ?>);"><i class="fa fa-trash-o" title="Delete"></i></a></td>
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
		function delete_record(sub_category_id)
		{
			var result = confirm("Want to delete this information?");
			if (result) {
				location.href = "sub_category_delete.php?sub_category_id="+sub_category_id;
			}
		}
		
		$("#sub_category_save").click(function(){
			var sub_category_category_id = $("#sub_category_category_id").val();
			var sub_category_name = $("#sub_category_name").val();
			var sub_category_id = $("#sub_category_id").val();
			
			if(sub_category_category_id == '' || isNaN(sub_category_category_id) || sub_category_category_id == "0"){
				var message = "Please Select a category";
				valid('sub_category_category_id',message);
				return false;
			}
			else if(sub_category_name == '')
			{
				var message = "Please Enter sub Category Name";
				valid('sub_category_name',message);
				return false;
			}
			else
			{
				var formdata= new FormData();
				formdata.append('sub_category_id',sub_category_id);
				formdata.append('sub_category_name',sub_category_name);
				formdata.append('sub_category_category_id',sub_category_category_id);
				$.ajax({
					type:"post",
					data: formdata,
					processData: false,
					contentType: false,
					url:"sub_category_add_action.php",
					beforeSend:function(){
						$("#loader").removeClass("hide");
					},
					success:function(res){
						$("#loader").addClass("hide");
						res=res.trim();
						//alert(res);
						if(res == 1){
							var message = "A sub category with the same name alerady exists.";
							valid('sub_category_name',message);
							return false;
						}
						else if(res == 2){
							location.href="sub_category_list.php?msg=2"; 
						}
						else if(res == 3){
							location.href="sub_category_list.php?msg=3"; 
						}
					}
				});
				return false;
			}
		});
		
		function edit_record(sub_category_id, sub_category_category_id, sub_category_name)
		{
			$(".span_err").html("");
			$("input").removeClass("input_err");
			$("textarea").removeClass("input_err");
			$("select").removeClass("input_err");
			$("#sub_category_name").val('');
			$("#sub_category_id").val('');
			$(".add_form").slideDown('fast');
			$("#sub_category_name").focus();
			$("#sub_category_id").val(sub_category_id);
			$("#sub_category_name").val(sub_category_name);
			$("#category_"+sub_category_category_id).attr("selected","selected");
			return false;
		}
		
		$(".addn").click(function(){
			$(".span_err").html("");
			$("input").removeClass("input_err");
			$("textarea").removeClass("input_err");
			$("select").removeClass("input_err");
			$("#sub_category_name").val('');
			$("#sub_category_category_id").val('');
			$("#sub_category_id").val('');
			$(".add_form").slideToggle('fast');
			$("#sub_category_name").focus();
		});
		
		function cancel_record()
		{
			$(".span_err").html("");
			$("input").removeClass("input_err");
			$("textarea").removeClass("input_err");
			$("select").removeClass("input_err");
			$("#sub_category_name").val('');
			$("#sub_category_id").val('');
			$("#sub_category_category_id").val('');
			$(".add_form").slideToggle('fast');
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
