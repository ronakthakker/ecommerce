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
								<li>Design List</li>
							</ul>
							<h4>Design List</h4>
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
							<button class="btn btn-primary addn">Add Designs</button>
						</div>
						<div class="row add_form">
							<form enctype="multipart/form-data" method="POST">
								<div class="col-md-6">
									<div class="form-group">
										<label class="col-sm-4 control-label">Design Name</label>
										<div class="col-sm-8">
											<input type="hidden" id="design_id" name="design_id">
											<input type="text" placeholder="eg: Marvel Comics" class="form-control" id="design_name" name="design_name" value="" />
											<span class="span_err" id="design_name_err"></span> 
										</div>
									</div><!-- form-group -->
								</div>
								<div class="col-md-12 text-center">
									<input type="submit" class="btn btn-success" id="design_save" value="Save">
									<a class="btn btn-default" onclick="javascript:cancel_record();">Cancel</a>
								</div>
							</form>
						</div>
						<?php
							$design_arr = $obj->select("*","design_master","design_status='1'");
						?>
						<table id="basicTable" class="table table-striped table-bordered responsive">
							<thead class="">
								<tr>
									<th>Sr No.</th>
									<th>Design Name</th>
									<th>Options</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(is_array($design_arr)){
										$i = 1;
										foreach($design_arr as $design_val)
										{
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $design_val['design_name']; ?></td>
											<td><a href="#" onclick="javascript:edit_record('<?php echo $design_val['design_id']; ?>','<?php echo $design_val['design_name']; ?>');" ><i class="fa fa-pencil-square" title="Edit"></i></a> &nbsp; <a href="#" onclick="javascript :delete_record(<?php echo $design_val['design_id']; ?>);"><i class="fa fa-trash-o" title="Delete"></i></a></td>
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
		function delete_record(design_id)
		{
			var result = confirm("Want to delete this information?");
			if (result) {
				location.href = "design_delete.php?design_id="+design_id;
			}
		}
		
		$("#design_save").click(function(){
			var design_id = $("#design_id").val();
			var design_name = $("#design_name").val();
			
			if(design_name == '')
			{
				var message = "Please Enter Design Name";
				valid('design_name',message);
				return false;
			}
			else
			{
				var formdata= new FormData();
				formdata.append('design_id',design_id);
				formdata.append('design_name',design_name);
				$.ajax({
					type:"post",
					data: formdata,
					processData: false,
					contentType: false,
					url:"design_add_action.php",
					beforeSend:function(){
						$("#loader").removeClass("hide");
					},
					success:function(res){
						$("#loader").addClass("hide");
						res=res.trim();
						//alert(res);
						if(res == 1){
							var message = "A design with the same name alerady exists.";
							valid('design_name',message);
							return false;
						}
						else if(res == 2){
							location.href="design_list.php?msg=2"; 
						}
						else if(res == 3){
							location.href="design_list.php?msg=3"; 
						}
					}
				});
				return false;
			}
		});
		
		function edit_record(design_id, design_name)
		{
			$(".span_err").html("");
			$("input").removeClass("input_err");
			$("textarea").removeClass("input_err");
			$("select").removeClass("input_err");
			$("#design_name").val('');
			$("#design_id").val('');
			$(".add_form").slideDown('fast');
			$("#design_name").focus();
			$("#design_id").val(design_id);
			$("#design_name").val(design_name);
			return false;
		}
		
		$(".addn").click(function(){
			$(".span_err").html("");
			$("input").removeClass("input_err");
			$("textarea").removeClass("input_err");
			$("select").removeClass("input_err");
			$("#design_name").val('');
			$("#design_id").val('');
			$(".add_form").slideToggle('fast');
			$("#design_name").focus();
		});
		
		function cancel_record()
		{
			$(".span_err").html("");
			$("input").removeClass("input_err");
			$("textarea").removeClass("input_err");
			$("select").removeClass("input_err");
			$("#design_name").val('');
			$("#design_id").val('');
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
