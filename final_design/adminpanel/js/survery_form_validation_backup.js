// CUG

$("#company_cug_using").change(function(){    // Select Yes / No
	var curr = $(this).val();
	if(curr == "1"){
		$("#cug").removeClass("hidden");
	}
	else{
		$("#cug").addClass("hidden");
	}
});

$("input[class='company_cug_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var cug_text = '';
	$('.company_cug_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		//alert(id_val[i]);
		if(val[i] != '12')
		{
			$("#company_cug_check12").attr("disabled","disabled");
			
			$("#company_cug_check1").removeAttr("disabled");
			$("#company_cug_check2").removeAttr("disabled");
			$("#company_cug_check3").removeAttr("disabled");
			$("#company_cug_check4").removeAttr("disabled");
			$("#company_cug_check5").removeAttr("disabled");
			$("#company_cug_check6").removeAttr("disabled");
			$("#company_cug_check7").removeAttr("disabled");
			$("#company_cug_check8").removeAttr("disabled");
			$("#company_cug_check9").removeAttr("disabled");
			$("#company_cug_check10").removeAttr("disabled");
			$("#company_cug_check11").removeAttr("disabled");
			
			$("."+id_val[i]).removeClass("hidden");
			
			if(i == 0)
			{
				cug_text += val[i];
			}
			else
			{
				cug_text += ","+val[i];   // Or ',' for '1','2'
			}
			cug_text = cug_text.replace(/^,|,$/g,'');
		}
		else
		{
			$("#company_cug_check12").removeAttr("disabled");
			
			$("#company_cug_check1").attr("disabled","disabled");
			$("#company_cug_check2").attr("disabled","disabled");
			$("#company_cug_check3").attr("disabled","disabled");
			$("#company_cug_check4").attr("disabled","disabled");
			$("#company_cug_check5").attr("disabled","disabled");
			$("#company_cug_check6").attr("disabled","disabled");
			$("#company_cug_check7").attr("disabled","disabled");
			$("#company_cug_check8").attr("disabled","disabled");
			$("#company_cug_check9").attr("disabled","disabled");
			$("#company_cug_check10").attr("disabled","disabled");
			$("#company_cug_check11").attr("disabled","disabled");
			
			$(".cug_additional_requirement").addClass("hidden");
			
			$("."+id_val[i]).attr("disabled");
			cug_text = val[i];
		}
		$("#company_cug_provider").val(cug_text);
	});
	
	$('.company_cug_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		$("."+id_val[i]).addClass("hidden");
		
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+cug_text+"'");
	if(cug_text == '')
	{
		$("#company_cug_check1").removeAttr("disabled");
		$("#company_cug_check2").removeAttr("disabled");
		$("#company_cug_check3").removeAttr("disabled");
		$("#company_cug_check4").removeAttr("disabled");
		$("#company_cug_check5").removeAttr("disabled");
		$("#company_cug_check6").removeAttr("disabled");
		$("#company_cug_check7").removeAttr("disabled");
		$("#company_cug_check8").removeAttr("disabled");
		$("#company_cug_check9").removeAttr("disabled");
		$("#company_cug_check10").removeAttr("disabled");
		$("#company_cug_check11").removeAttr("disabled");
		$("#company_cug_check12").removeAttr("disabled");
		$("#company_cug_provider").val('');
	}
});

// CUG Ends

// Datacard

$("#company_datacards_using").change(function(){
	var curr = $(this).val();
	if(curr == "1"){
		$("#datacards").removeClass("hidden");
	}
	else{
		$("#datacards").addClass("hidden");
	}
});

$("input[class='company_datacards_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var datacards_text = '';
	$('.company_datacards_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		
		//alert(id_val[i]);
		if(i == 0)
		{
			datacards_text += val[i];
		}
		else
		{
			datacards_text += ","+val[i];   // Or ',' for '1','2'
		}
		
		$("."+id_val[i]).removeClass("hidden");
		
		datacards_text = datacards_text.replace(/^,|,$/g,'');
		$("#company_datacards_provider").val(datacards_text);
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+emailsms_text+"'");
	
	$('.company_datacards_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		$("."+id_val[i]).addClass("hidden");
		
	});
});

// Datacard Ends

// Tracking 
$("#company_tracking_using").change(function(){
	var curr = $(this).val();
	if(curr == "1"){
		$("#tracking").removeClass("hidden");
	}
	else{
		$("#tracking").addClass("hidden");
	}
});

$("input[class='company_tracking_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var tracking_text = '';
	$('.company_tracking_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		
		if(val[i] != '3')
		{
			$("#company_tracking_check3").attr("disabled","disabled");
			$("#company_tracking_check1").removeAttr("disabled");
			$("#company_tracking_check2").removeAttr("disabled");
			
			$("."+id_val[i]).removeClass("hidden");
			
			if(i == 0)
			{
				tracking_text += val[i];
			}
			else
			{
				tracking_text += ","+val[i];   // Or ',' for '1','2'
			}
			tracking_text = tracking_text.replace(/^,|,$/g,'');
		}
		else
		{
			$("#company_tracking_check3").removeAttr("disabled");
			$("#company_tracking_check1").attr("disabled","disabled");
			$("#company_tracking_check2").attr("disabled","disabled");
			
			$(".tracking_additional_requirement").addClass("hidden");
			
			$("."+id_val[i]).attr("disabled");
			
			tracking_text = val[i];
		}
		
		$("#company_tracking_solution").val(tracking_text);
	});
	
	$('.company_tracking_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		$("."+id_val[i]).addClass("hidden");
		
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+emailsms_text+"'");
	if(tracking_text == '')
	{
		$("#company_tracking_check1").removeAttr("disabled");
		$("#company_tracking_check2").removeAttr("disabled");
		$("#company_tracking_check3").removeAttr("disabled");
		
		$("#company_tracking_solution").val('');
	}
});

// Tracking Ends



// Save As Draft

$("#next_btn").click(function(){
	var page = parseInt($("#page").val());
	var success = '';
	var company_id = $("#company_id").val();
	var request_id = $("#request_id").val();

	if(page == 1)
	{
		var company_contact_person = $("#company_contact_person").val();
		var company_contact_personn_2 = $("#company_contact_personn_2").val();
		var company_landline_no = $("#company_landline_no").val();
		var company_mobile_no = $("#company_mobile_no").val();
		var company_alternate_mobile_no = $("#company_alternate_mobile_no").val();
		var company_name = $("#company_name").val();
		var company_no_of_offices = $("#company_no_of_offices").val();
		var company_no_of_employees = $("#company_no_of_employees").val();
		var company_corporate_office_address = $("#company_corporate_office_address").val();
		var company_sector_of_business = $("input[name='company_sector_of_business']:checked").val();
		var company_sector_of_business_othervalue = $("#company_sector_of_business_othervalue").val();
		var company_email_id = $("#company_email_id").val();
		var company_email_id_2 = $("#company_email_id_2").val();

		var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if(company_contact_person == "")
		{

			var message = "Please Enter Contact Person";
			valid('company_contact_person',message);
			return false;
		}
		else if(company_mobile_no == "")
		{
			var message = "Please Enter Mobile No";
			valid('company_mobile_no',message);
			return false;
		}
		else if(company_mobile_no != "" && company_mobile_no.length < 10)
		{
			var message = "Entered Mobile No is too Short";
			valid('company_mobile_no',message);
			return false;
		}
		else if(company_name == "")
		{
			var message = "Please Enter Company Name";
			valid('company_name',message);
			return false;
		}
		else if(company_no_of_offices == "")
		{
			var message = "Please Select No. Of Offices";
			valid('company_no_of_offices',message);
			return false;
		}
		else if(company_corporate_office_address == "")
		{
			var message = "Please Enter Office Address";
			valid('company_corporate_office_address',message);
			return false;
		}	
		else if(company_no_of_employees == "")
		{
			var message = "Please Select Total No. Of Employees";
			valid('company_no_of_employees',message);
			return false;
		}
		else if(company_sector_of_business == "other" && company_sector_of_business_othervalue == "")
		{
			var message = "Please Enter Other Details";
			valid('company_sector_of_business_othervalue',message);
			return false;
		}
		else if(company_email_id == "")
		{
			var message = "Please Enter Company Email Address";
			valid('company_email_id',message);
			return false;
		}
		else if(company_email_id != '' && (!pattern.test(company_email_id)))
		{
			var message = "Please Company Email Address is Invalid";
			valid('company_email_id',message);
			return false;
		}
		else if(company_email_id_2 != '' && (!pattern.test(company_email_id_2)))
		{
			var message = "Please Company Email 2 Address is Invalid";
			valid('company_email_id_2',message);
			return false;
		}
		else
		{
			var formdata = new FormData();
			formdata.append('company_contact_person', company_contact_person);
			formdata.append('company_contact_personn_2', company_contact_personn_2);
			formdata.append('company_landline_no', company_landline_no);
			formdata.append('company_mobile_no', company_mobile_no);
			formdata.append('company_alternate_mobile_no', company_alternate_mobile_no);
			formdata.append('company_name', company_name);
			formdata.append('company_no_of_offices', company_no_of_offices);
			formdata.append('company_corporate_office_address', company_corporate_office_address);
			formdata.append('company_no_of_employees', company_no_of_employees);
			formdata.append('company_sector_of_business', company_sector_of_business);
			formdata.append('company_email_id', company_email_id);
			formdata.append('company_email_id_2', company_email_id_2);
			formdata.append('company_cug_using', company_cug_using);
			formdata.append('company_id', company_id);
			formdata.append('page', page);

			$.ajax({
				type:"post",
				data: formdata,
				processData: false,
				contentType: false,
				url:"survey_add_action.php",
				beforeSend:function(){
					$("#loader").removeClass("hide");
				},
				success:function(res){
					$("#loader").addClass("hide");
					res=res.trim();
					if(res == 'success')
					{
							//alert(res);
							$(".is_save").removeClass('hidden');
							setTimeout(function(){
								$(".is_save").slideUp('fast');
								$(".is_save").addClass('hidden');
							}, 5000);

						}
					}
				});
			success = '1';
		}
	}
	else if(page == 2)
	{
		// CUG Starts
		var formdata = new FormData();

		var company_cug_using = $("#company_cug_using").val();
		var wireless_id = $("#wireless_id").val();

		if(company_cug_using == '1')
		{
			var company_cug_provider = $("#company_cug_provider").val();

			if(company_cug_provider == '')
			{
				var message = "Please Select Atleast One Provider";
				valid('company_cug_provider',message);
				return false;
			}
			else
			{
				var company_cug_no_of_connections_arr = Array();
				var company_cug_tariff_arr = Array();
				var company_cug_monthly_rentals_arr = Array();
				var company_cug_charges_same_operator_arr = Array();
				var company_cug_charges_other_operator_arr = Array();
				var company_cug_charges_call_landline_arr = Array();
				var company_cug_free_data_arr = Array();

				var company_cug_provider_arr = $('#company_cug_provider').val().split(",");

				for(var i = 0; i < company_cug_provider_arr.length; i++)
				{
					var company_cug_no_of_connections = $("#company_cug_no_of_connections_"+company_cug_provider_arr[i]).val();
					var company_cug_tariff = $("#company_cug_tariff_"+company_cug_provider_arr[i]).val();
					var company_cug_monthly_rentals = $("#company_cug_monthly_rentals_"+company_cug_provider_arr[i]).val();
					var company_cug_charges_same_operator = $("#company_cug_charges_same_operator_"+company_cug_provider_arr[i]).val();
					var company_cug_charges_other_operator = $("#company_cug_charges_other_operator_"+company_cug_provider_arr[i]).val();
					var company_cug_charges_call_landline = $("#company_cug_charges_call_landline_"+company_cug_provider_arr[i]).val();
					var company_cug_free_data = $("#company_cug_free_data_"+company_cug_provider_arr[i]).val();

					company_cug_no_of_connections_arr.push(company_cug_no_of_connections);
					company_cug_tariff_arr.push(company_cug_tariff);
					company_cug_monthly_rentals_arr.push(company_cug_monthly_rentals);
					company_cug_charges_same_operator_arr.push(company_cug_charges_same_operator);
					company_cug_charges_other_operator_arr.push(company_cug_charges_other_operator);
					company_cug_charges_call_landline_arr.push(company_cug_charges_call_landline);
					company_cug_free_data_arr.push(company_cug_free_data);

					//formdata.append('a_ticket_id_arr',a_ticket_id_arr);
				}

				formdata.append('company_cug_provider_arr', company_cug_provider_arr);
				formdata.append('company_cug_no_of_connections_arr', company_cug_no_of_connections_arr);
				formdata.append('company_cug_tariff_arr', company_cug_tariff_arr);
				formdata.append('company_cug_monthly_rentals_arr', company_cug_monthly_rentals_arr);
				formdata.append('company_cug_charges_same_operator_arr', company_cug_charges_same_operator_arr);
				formdata.append('company_cug_charges_other_operator_arr', company_cug_charges_other_operator_arr);
				formdata.append('company_cug_charges_call_landline_arr', company_cug_charges_call_landline_arr);
				formdata.append('company_cug_free_data_arr', company_cug_free_data_arr);
				//alert(company_cug_no_of_connections_arr);
			}

		}

		// CUG Ends

		// Datacards Starts

		var company_datacards_using = $("#company_datacards_using").val();

		if(company_datacards_using == '1')
		{
			var company_datacards_provider = $("#company_datacards_provider").val();

			if(company_datacards_provider == '')
			{
				var message = "Please Select Atleast One Provider";
				valid('company_datacards_provider',message);
				return false;
			}
			else
			{
				var company_datacards_no_of_connections_arr = Array();
				var company_datacards_tariff_arr = Array();
				var company_datacards_speed_arr = Array();
				var company_datacards_free_data_arr = Array();
				var company_datacards_card_arr = Array();

				var company_datacards_provider_arr = $('#company_datacards_provider').val().split(",");

				//alert(company_datacards_provider_arr);

				for(var i = 0; i < company_datacards_provider_arr.length; i++)
				{
					var company_datacards_card_i = 'company_datacards_card_'+company_datacards_provider_arr[i];

					var company_datacards_no_of_connections = $("#company_datacards_no_of_connections_"+company_datacards_provider_arr[i]).val();
					var company_datacards_tariff = $("#company_datacards_tariff_"+company_datacards_provider_arr[i]).val();
					var company_datacards_speed = $("#company_datacards_speed_"+company_datacards_provider_arr[i]).val();
					var company_datacards_free_data = $("#company_datacards_free_data_"+company_datacards_provider_arr[i]).val();
					var company_datacards_card = $("input[name='"+company_datacards_card_i+"']:checked").val();

					company_datacards_no_of_connections_arr.push(company_datacards_no_of_connections);
					company_datacards_tariff_arr.push(company_datacards_tariff);
					company_datacards_speed_arr.push(company_datacards_speed);
					company_datacards_free_data_arr.push(company_datacards_free_data);
					company_datacards_card_arr.push(company_datacards_card);

					//formdata.append('a_ticket_id_arr',a_ticket_id_arr);
				}

				formdata.append('company_datacards_provider_arr', company_datacards_provider_arr);
				formdata.append('company_datacards_no_of_connections_arr', company_datacards_no_of_connections_arr);
				formdata.append('company_datacards_tariff_arr', company_datacards_tariff_arr);
				formdata.append('company_datacards_speed_arr', company_datacards_speed_arr);
				formdata.append('company_datacards_free_data_arr', company_datacards_free_data_arr);
				formdata.append('company_datacards_card_arr', company_datacards_card_arr);

				//alert(company_datacards_no_of_connections_arr);
			}

		}

		// Datacards Ends

		// Tracking Solutions Starts

		var company_tracking_using = $("#company_tracking_using").val();

		if(company_tracking_using == '1')
		{
			var company_tracking_solution = $("#company_tracking_solution").val();

			if(company_tracking_solution == '')
			{
				var message = "Please Select Atleast One Solution";
				valid('company_tracking_solution',message);
				return false;
			}
			else
			{
				var company_tracking_software_name_arr = Array();
				var company_tracking_vender_name_arr = Array();

				var company_tracking_solution_arr = $('#company_tracking_solution').val().split(",");

				//alert(company_datacards_provider_arr);

				for(var i = 0; i < company_tracking_solution_arr.length; i++)
				{

					var company_tracking_software_name = $("#company_tracking_software_name_"+company_tracking_solution_arr[i]).val();
					var company_tracking_vender_name = $("#company_tracking_vender_name_"+company_tracking_solution_arr[i]).val();

					company_tracking_software_name_arr.push(company_tracking_software_name);
					company_tracking_vender_name_arr.push(company_tracking_vender_name);

					//formdata.append('a_ticket_id_arr',a_ticket_id_arr);
				}

				formdata.append('company_tracking_solution_arr', company_tracking_solution_arr);
				formdata.append('company_tracking_software_name_arr', company_tracking_software_name_arr);
				formdata.append('company_tracking_vender_name_arr', company_tracking_vender_name_arr);
			}

		}


		formdata.append('company_cug_using', company_cug_using);
		formdata.append('company_datacards_using', company_datacards_using);
		formdata.append('company_tracking_using', company_tracking_using);


		formdata.append('company_id', company_id);
		formdata.append('request_id', request_id);
		formdata.append('wireless_id', wireless_id);
		formdata.append('page', page);

		$.ajax({
			type:"post",
			data: formdata,
			processData: false,
			contentType: false,
			url:"survey_add_action.php",
			beforeSend:function(){
				$("#loader").removeClass("hide");
			},
			success:function(res){
				$("#loader").addClass("hide");
				res=res.trim();
				//alert(res);
				if (res.toLowerCase().indexOf("success") >= 0)
				{
					var res_arr = res.split("_");

					var wireless_id_new = res_arr[1];

					$("#wireless_id").val(wireless_id_new);

					$(".is_save").removeClass('hidden');
					$(".is_save").css('display','block');
					setTimeout(function(){
						$(".is_save").slideUp('fast');
						$(".is_save").addClass('hidden');
					}, 5000);
				}
			}
		});

		// Tracking Solutions Ends
		success = '1';
	}

	if(success == '1')
	{
		page = page + 1;
		$("#page").val(page);
		//$('html,body').animate({scrollTop: $("#company_id").offset().top},'slow');
	}
	else
	{
		return false;
	}
});




function previous()
{
	var inital_page = 1;
	var page = parseInt($("#page").val());
	
	if(page > 1)
	{
		page = page - 1;
		$("#page").val(page);
	}
	
	//return false;
}

// Save As Draft Ends



// $("#company_toll_using").change(function(){
// var curr = $(this).val();
// if(curr == "1"){
// $("#toll").removeClass("hidden");
// }
// else{
// $("#toll").addClass("hidden");
// }
// });
// $("#company_voip_using").change(function(){
// var curr = $(this).val();
// if(curr == "1"){
// $("#voip").removeClass("hidden");
// }
// else{
// $("#voip").addClass("hidden");
// }
// });
// $("#company_datacards_using").change(function(){
// var curr = $(this).val();
// if(curr == "1"){
// $("#datacards").removeClass("hidden");
// }
// else{
// $("#datacards").addClass("hidden");
// }
// });
// $("#company_corporate_email_using").change(function(){
// var curr = $(this).val();
// if(curr == "1"){
// $("#corporate_email").removeClass("hidden");
// }
// else{
// $("#corporate_email").addClass("hidden");
// }
// });
// $("#company_ponder_maintain").change(function(){
// var curr = $(this).val();
// if(curr == "1"){
// $("#ponder").removeClass("hidden");
// }
// else{
// $("#ponder").addClass("hidden");
// }
// });

// Sector Of Business Starts

$("#company_sector_of_business_othervalue").keyup(function(){
	$("input[name='company_sector_of_business']:checked").val($("#company_sector_of_business_othervalue").val());
});

$("input[name='company_sector_of_business']").click(function(){
	$("#company_sector_of_business_other").val('other');
	if($("input[name='company_sector_of_business']:checked").val() != "other"){
		$("#company_sector_of_business_othervalue").val('');
		$("#company_sector_of_business_othervalue").attr('disabled','disabled');
	}
	else
	{
		$("#company_sector_of_business_othervalue").removeAttr('disabled');	
		$("#company_sector_of_business_othervalue").focus();	
	}
});

// Sector Of Buisness Ends

// Bulk & Transaction SMS & Email Starts
// $("input[class='company_sms_email_checkbox']").click(function(){
// var val = [];
// var emailsms_text = '';
// $('.company_sms_email_checkbox:checked').each(function(i){   
// val[i] = $(this).val();

// if(val[i] != '7')
// {
// $("#company_sms_email_check7").attr("disabled","disabled");

// $("#company_sms_email_check1").removeAttr("disabled");
// $("#company_sms_email_check2").removeAttr("disabled");
// $("#company_sms_email_check3").removeAttr("disabled");
// $("#company_sms_email_check4").removeAttr("disabled");
// $("#company_sms_email_check5").removeAttr("disabled");
// $("#company_sms_email_check6").removeAttr("disabled");

// if(i == 0)
// {
// emailsms_text += val[i];
// }
// else
// {
// emailsms_text += ","+val[i];   // Or ',' for '1','2'
// }
// emailsms_text = emailsms_text.replace(/^,|,$/g,'');
// }
// else
// {
// $("#company_sms_email_check7").removeAttr("disabled");

// $("#company_sms_email_check1").attr("disabled","disabled");
// $("#company_sms_email_check2").attr("disabled","disabled");
// $("#company_sms_email_check3").attr("disabled","disabled");
// $("#company_sms_email_check4").attr("disabled","disabled");
// $("#company_sms_email_check5").attr("disabled","disabled");
// $("#company_sms_email_check6").attr("disabled","disabled");
// emailsms_text = val[i];
// }
// $("#company_sms_email_using").val(emailsms_text);
// });
// //var company_sms_email_using = $("#company_sms_email_using").val();
// //$("#company_sms_email_using").val("'"+emailsms_text+"'");
// if(emailsms_text == '')
// {
// $("#company_sms_email_check1").removeAttr("disabled");
// $("#company_sms_email_check2").removeAttr("disabled");
// $("#company_sms_email_check3").removeAttr("disabled");
// $("#company_sms_email_check4").removeAttr("disabled");
// $("#company_sms_email_check5").removeAttr("disabled");
// $("#company_sms_email_check6").removeAttr("disabled");
// $("#company_sms_email_check7").removeAttr("disabled");
// }
// });
// // Bulk & Transaction SMS & Email Ends

// // Services Used - Data - ILL / Broadband
// $("input[class='company_ill_checkbox']").click(function(){
// var val = [];
// var ill_text = '';
// $('.company_ill_checkbox:checked').each(function(i){   
// val[i] = $(this).val();

// if(i == 0)
// {
// ill_text += val[i];
// }
// else
// {
// ill_text += ","+val[i];   // Or ',' for '1','2'
// }
// ill_text = ill_text.replace(/^,|,$/g,'');
// $("#company_ill_provider").val(ill_text);
// });
// //var company_sms_email_using = $("#company_sms_email_using").val();
// //$("#company_sms_email_using").val("'"+emailsms_text+"'");
// });
// // Services Used - Data - ILL / Broadband Ends

// // Services Used - Data - Datacards
// $("input[class='company_datacards_checkbox']").click(function(){
// var val = [];
// var datacards_text = '';
// $('.company_datacards_checkbox:checked').each(function(i){   
// val[i] = $(this).val();

// if(i == 0)
// {
// datacards_text += val[i];
// }
// else
// {
// datacards_text += ","+val[i];   // Or ',' for '1','2'
// }
// datacards_text = datacards_text.replace(/^,|,$/g,'');
// $("#company_datacards_provider").val(datacards_text);
// });
// //var company_sms_email_using = $("#company_sms_email_using").val();
// //$("#company_sms_email_using").val("'"+emailsms_text+"'");
// });
// // Services Used - Data - Datacards Ends

// // Services Used - Data - MPLS / Managed Hosting
// $("input[class='company_mpls_checkbox']").click(function(){
// var val = [];
// var mpls_text = '';
// $('.company_mpls_checkbox:checked').each(function(i){   
// val[i] = $(this).val();

// if(val[i] != '3')
// {
// $("#company_mpls_check3").attr("disabled","disabled");
// $("#company_mpls_check1").removeAttr("disabled");
// $("#company_mpls_check2").removeAttr("disabled");

// if(i == 0)
// {
// mpls_text += val[i];
// }
// else
// {
// mpls_text += ","+val[i];   // Or ',' for '1','2'
// }
// mpls_text = mpls_text.replace(/^,|,$/g,'');
// }
// else
// {
// $("#company_mpls_check3").removeAttr("disabled");
// $("#company_mpls_check1").attr("disabled","disabled");
// $("#company_mpls_check2").attr("disabled","disabled");
// mpls_text = val[i];
// }

// $("#company_mpls_using").val(mpls_text);
// });

// if(mpls_text == '')
// {
// $("#company_mpls_check1").removeAttr("disabled");
// $("#company_mpls_check2").removeAttr("disabled");
// $("#company_mpls_check3").removeAttr("disabled");
// }
// //var company_sms_email_using = $("#company_sms_email_using").val();
// //$("#company_sms_email_using").val("'"+emailsms_text+"'");
// });

// $("input[class='company_mpls_provider_checkbox']").click(function(){
// var val = [];
// var mplsprovider_text = '';
// $('.company_mpls_provider_checkbox:checked').each(function(i){   
// val[i] = $(this).val();

// if(i == 0)
// {
// mplsprovider_text += val[i];
// }
// else
// {
// mplsprovider_text += ","+val[i];   // Or ',' for '1','2'
// }
// mplsprovider_text = mplsprovider_text.replace(/^,|,$/g,'');
// $("#company_mpls_provider").val(mplsprovider_text);
// });
// //var company_sms_email_using = $("#company_sms_email_using").val();
// //$("#company_sms_email_using").val("'"+emailsms_text+"'");
// });

// // Services Used - Data - MPLS / Managed Hosting Ends

// // Services Used - Tracking Solutions
// $("input[class='company_tracking_checkbox']").click(function(){
// var val = [];
// var tracking_text = '';
// $('.company_tracking_checkbox:checked').each(function(i){   
// val[i] = $(this).val();

// if(val[i] != '3')
// {
// $("#company_tracking_check3").attr("disabled","disabled");
// $("#company_tracking_check1").removeAttr("disabled");
// $("#company_tracking_check2").removeAttr("disabled");

// if(i == 0)
// {
// tracking_text += val[i];
// }
// else
// {
// tracking_text += ","+val[i];   // Or ',' for '1','2'
// }
// tracking_text = tracking_text.replace(/^,|,$/g,'');
// }
// else
// {
// $("#company_tracking_check3").removeAttr("disabled");
// $("#company_tracking_check1").attr("disabled","disabled");
// $("#company_tracking_check2").attr("disabled","disabled");
// tracking_text = val[i];
// }

// $("#company_tracking_using").val(tracking_text);
// });
// //var company_sms_email_using = $("#company_sms_email_using").val();
// //$("#company_sms_email_using").val("'"+emailsms_text+"'");
// if(tracking_text == '')
// {
// $("#company_tracking_check1").removeAttr("disabled");
// $("#company_tracking_check2").removeAttr("disabled");
// $("#company_tracking_check3").removeAttr("disabled");
// }
// });
// // Services Used - Tracking Solutions

// // Services Used - CRM | ERP | Accounting Software
// $("input[class='company_accounting_checkbox']").click(function(){
// var val = [];
// var accounting_text = '';
// $('.company_accounting_checkbox:checked').each(function(i){   
// val[i] = $(this).val();

// if(val[i] != '4')
// {
// $("#company_accounting_check4").attr("disabled","disabled");
// $("#company_accounting_check1").removeAttr("disabled");
// $("#company_accounting_check2").removeAttr("disabled");
// $("#company_accounting_check3").removeAttr("disabled");

// if(i == 0)
// {
// accounting_text += val[i];
// }
// else
// {
// accounting_text += ","+val[i];   // Or ',' for '1','2'
// }
// accounting_text = accounting_text.replace(/^,|,$/g,'');
// }
// else
// {
// $("#company_accounting_check4").removeAttr("disabled");
// $("#company_accounting_check1").attr("disabled","disabled");
// $("#company_accounting_check2").attr("disabled","disabled");
// $("#company_accounting_check3").attr("disabled","disabled");
// accounting_text = val[i];
// }
// $("#company_accounting_using").val(accounting_text);
// });
// //var company_sms_email_using = $("#company_sms_email_using").val();
// //$("#company_sms_email_using").val("'"+emailsms_text+"'");
// if(accounting_text == '')
// {
// $("#company_accounting_check4").removeAttr("disabled");
// $("#company_accounting_check1").removeAttr("disabled");
// $("#company_accounting_check2").removeAttr("disabled");
// $("#company_accounting_check3").removeAttr("disabled");
// }
// });
// // Services Used - CRM | ERP | Accounting Software Ends

// // Services Used - EPABX | CCTV | Access Control
// $("input[class='company_access_control_checkbox']").click(function(){
// var val = [];
// var access_text = '';
// $('.company_access_control_checkbox:checked').each(function(i){   
// val[i] = $(this).val();


// if(val[i] != '4')
// {
// $("#company_access_control_check4").attr("disabled","disabled");
// $("#company_access_control_check1").removeAttr("disabled");
// $("#company_access_control_check2").removeAttr("disabled");
// $("#company_access_control_check3").removeAttr("disabled");


// if(i == 0)
// {
// access_text += val[i];
// }
// else
// {
// access_text += ","+val[i];   // Or ',' for '1','2'
// }
// access_text = access_text.replace(/^,|,$/g,'');
// }
// else
// {
// $("#company_access_control_check4").removeAttr("disabled");
// $("#company_access_control_check1").attr("disabled","disabled");
// $("#company_access_control_check2").attr("disabled","disabled");
// $("#company_access_control_check3").attr("disabled","disabled");
// access_text = val[i];
// }
// $("#company_access_control_using").val(access_text);
// });
// //var company_sms_email_using = $("#company_sms_email_using").val();
// //$("#company_sms_email_using").val("'"+emailsms_text+"'");
// if(access_text == '')
// {
// $("#company_access_control_check4").removeAttr("disabled");
// $("#company_access_control_check1").removeAttr("disabled");
// $("#company_access_control_check2").removeAttr("disabled");
// $("#company_access_control_check3").removeAttr("disabled");
// }
// });
// // Services Used - EPABX | CCTV | Access Control Ends


// $("#survey_submit").click(function(){

// var company_contact_person = $("#company_contact_person").val();
// var company_contact_personn_2 = $("#company_contact_personn_2").val();
// var company_landline_no = $("#company_landline_no").val();
// var company_mobile_no = $("#company_mobile_no").val();
// var company_name = $("#company_name").val();
// var company_no_of_offices = $("#company_no_of_offices").val();
// var company_no_of_employees = $("#company_no_of_employees").val();
// var company_corporate_office_address = $("#company_corporate_office_address").val();
// var company_no_of_employees = $("#company_no_of_employees").val();
// var company_sector_of_business = $("input[name='radio']:checked").val();
// var company_sector_of_business_othervalue = $("#company_sector_of_business_othervalue").val();
// var company_email_id = $("#company_email_id").val();
// var company_email_id_2 = $("#company_email_id_2").val();

// //   Services Used - Voice - CUG

// var company_cug_using = $("#company_cug_using").val();
// if(company_cug_using == '1')
// {
// if($("#company_cug_provider").val() != '')
// {
// var company_cug_provider = $("#company_cug_provider").val();
// }
// else
// {
// var company_cug_provider = 0;	
// }

// if($("#company_cug_no_of_connections").val() != '')
// {
// var company_cug_no_of_connections = $("#company_cug_no_of_connections").val();
// }
// else
// {
// var company_cug_no_of_connections = 0;	
// }

// var company_cug_tariff = $("#company_cug_tariff").val();
// }

// //   Services Used - Voice - CUG End

// //   Services Used - Voice - PRI/Landline

// if($("#company_pri_using").val() != '')
// {
// var company_pri_using = $("#company_pri_using").val();
// }
// else
// {
// var company_pri_using = 0;	
// }

// if($("#company_pri_provider").val() != '')
// {
// var company_pri_provider = $("#company_pri_provider").val();
// }
// else
// {
// var company_pri_provider = 0;	
// }	

// if($("#company_pri_no_of_dels").val() != '')
// {
// var company_pri_no_of_dels = $("#company_pri_no_of_dels").val();
// }
// else
// {
// var company_pri_no_of_dels = 0;	
// }

// var company_pri_tariff = $("#company_pri_tariff").val();

// //   Services Used - Voice - PRI/Landline End

// //   Services Used - Voice - Toll Free

// var company_toll_using = $("#company_toll_using").val();
// if(company_toll_using == '1')
// {
// if($("#company_toll_provider").val() != '')
// {
// var company_toll_provider = $("#company_toll_provider").val();
// }
// else
// {
// var company_toll_provider = 0;	
// }

// var company_toll_tariff = $("#company_toll_tariff").val();
// }

// //   Services Used - Voice - Toll Free End

// //   Services Used - Voice - VOIP

// var company_voip_using = $("#company_voip_using").val();
// if(company_voip_using == '1')
// {
// if($("#company_toll_provider").val() != '')
// {
// var company_voip_provider = $("#company_voip_provider").val();
// }
// else
// {
// var company_voip_provider = 0;	
// }

// var company_voip_tariff = $("#company_voip_tariff").val();
// }	

// //   Services Used - Voice - VOIP Ends

// //   Services Used - Data - ILL / Broadband

// if($("#company_ill_using").val() != '')
// {
// var company_ill_using = $("#company_ill_using").val();
// }
// else
// {
// var company_ill_using = 0;	
// }

// var company_ill_provider = $("#company_ill_provider").val();
// var company_ill_tariff = $("#company_ill_tariff").val();

// //   Services Used - Data - ILL / Broadband Ends 

// //   Services Used - Data - Datacards

// var company_datacards_using = $("#company_datacards_using").val();

// if(company_datacards_using == '1')
// {
// var company_datacards_provider = $("#company_datacards_provider").val();
// var company_datacards_tariff = $("#company_datacards_tariff").val();
// }

// //   Services Used - Data - Datacards Ends

// //   Services Used - Data - MPLS / Managed Hosting

// var company_mpls_using = $("#company_mpls_using").val();
// var company_mpls_provider = $("#company_mpls_provider").val();
// var company_mpls_tariff = $("#company_mpls_tariff").val();

// //   Services Used - Data - MPLS / Managed Hosting Ends

// //   Services Used - Tracking Solutions

// var company_tracking_using = $("input[name='hwn_radio']:checked").val();
// var company_tracking_tariff = $("#company_tracking_tariff").val();

// //   Services Used - Tracking Solutions Ends

// //   Services Used - Bulk / Transactional SMS | Email

// var company_sms_email_relation = $("#company_sms_email_relation").val();
// var company_sms_email_usage_pattern = $("#company_sms_email_usage_pattern").val();
// var company_sms_email_lead = $("#company_sms_email_lead").val();
// var company_sms_email_using = $("#company_sms_email_using").val();
// var company_sms_email_sys_details = $("#company_sms_email_sys_details").val();

// //   Services Used - Bulk / Transactional SMS | Email Ends

// //   Services Used - CRM | ERP | Accounting Software

// var company_accounting_using = $("#company_accounting_using").val();

// //   Services Used - CRM | ERP | Accounting Software Ends

// //   Services Used - EPABX | CCTV | Access Control

// var company_access_control_using = $("#company_access_control_using").val();

// //   Services Used - EPABX | CCTV | Access Control Ends

// //   Services Used - IT Hardware and Netwroking

// //var company_hwn_using = $("#company_hwn_using").val();
// var company_hwn_using = $("input[name='hwn_radio']:checked").val();
// var company_hwn_satisfied = $("#company_hwn_satisfied").val();

// //   Services Used - IT Hardware and Netwroking Ends

// //   Service Used - Corporate Email

// var company_corporate_email_using = $("#company_corporate_email_using").val();
// if(company_corporate_email_using == '1')
// {
// if($("#company_corporate_email_provider").val() != '')
// {
// var company_corporate_email_provider = $("#company_corporate_email_provider").val();
// }
// else
// {
// var company_corporate_email_provider = 0;	
// }

// if($("#company_corporate_email_no_of_license").val() != '')
// {
// var company_corporate_email_no_of_license = $("#company_corporate_email_no_of_license").val();
// }
// else
// {
// var company_corporate_email_no_of_license = 0;	
// }
// }	

// //   Service Used - Corporate Email Ends

// //   Services Used - Audio / Video Conferance

// var company_av_conference_using = $("#company_av_conference_using").val();

// //   Services Used - Audio / Video Conferance Ends

// //   Points to Ponder
// var company_ponder_maintain = $("#company_ponder_maintain").val();
// if(company_ponder_maintain == '1')
// {
// var company_ponder_have_team = $("#company_ponder_have_team").val();

// if($("#company_ponder_computers").val() != '')
// {
// var company_ponder_computers = $("#company_ponder_computers").val();
// }
// else
// {
// var company_ponder_computers = 0;	
// }

// var company_ponder_sel_user = $("#company_ponder_sel_user").val();
// }	

// //   Points to Ponder Ends

// var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

// if(company_contact_person == "")
// {
// var message = "Please Enter Contact Person";
// valid('company_contact_person',message);
// return false;
// }
// else if(company_mobile_no == "")
// {
// var message = "Please Enter Mobile No";
// valid('company_mobile_no',message);
// return false;
// }
// else if(company_mobile_no != "" && company_mobile_no.length < 10)
// {
// var message = "Entered Mobile No is too Short";
// valid('company_mobile_no',message);
// return false;
// }
// else if(company_name == "")
// {
// var message = "Please Enter Company Name";
// valid('company_name',message);
// return false;
// }
// else if(company_no_of_offices == "")
// {
// var message = "Please Select No. Of Offices";
// valid('company_no_of_offices',message);
// return false;
// }
// else if(company_corporate_office_address == "")
// {
// var message = "Please Enter Office Address";
// valid('company_corporate_office_address',message);
// return false;
// }	
// else if(company_no_of_employees == "")
// {
// var message = "Please Select Total No. Of Employees";
// valid('company_no_of_employees',message);
// return false;
// }
// else if(company_sector_of_business == "other" && company_sector_of_business_othervalue == "")
// {
// var message = "Please Enter Other Details";
// valid('company_sector_of_business_othervalue',message);
// return false;
// }
// else if(company_email_id == "")
// {
// var message = "Please Enter Company Email Address";
// valid('company_email_id',message);
// return false;
// }
// else if(company_email_id != '' && (!pattern.test(company_email_id)))
// {
// var message = "Please Company Email Address is Invalid";
// valid('company_email_id',message);
// return false;
// }
// else if(company_email_id_2 != '' && (!pattern.test(company_email_id_2)))
// {
// var message = "Please Company Email 2 Address is Invalid";
// valid('company_email_id_2',message);
// return false;
// }
// else if($('input[class="company_sms_email_checkbox"]:checked').length == 0)
// {
// var message = "Please Select Atleast One Option";
// valid('company_sms_email_using',message);
// return false;
// }
// else if(company_sms_email_relation == "")
// {
// var message = "Please Select An Option";
// valid('company_sms_email_relation',message);
// return false;
// }
// else if(company_sms_email_lead == "")
// {
// var message = "Please Select An Option";
// valid('company_sms_email_lead',message);
// return false;
// }		
// else if($("#company_ponder_maintain").val() == '1' && company_ponder_sel_user == "")
// {
// var message = "Please Select User";
// valid('company_ponder_sel_user',message);
// return false;
// }
// else
// {
// var formdata = new FormData();
// formdata.append('company_contact_person', company_contact_person);
// formdata.append('company_contact_personn_2', company_contact_personn_2);
// formdata.append('company_landline_no', company_landline_no);
// formdata.append('company_mobile_no', company_mobile_no);
// formdata.append('company_name', company_name);
// formdata.append('company_no_of_offices', company_no_of_offices);
// formdata.append('company_corporate_office_address', company_corporate_office_address);
// formdata.append('company_no_of_employees', company_no_of_employees);
// formdata.append('company_sector_of_business', company_sector_of_business);
// formdata.append('company_email_id', company_email_id);
// formdata.append('company_email_id_2', company_email_id_2);
// formdata.append('company_cug_using', company_cug_using);
// if(company_cug_using == '1')
// {
// formdata.append('company_cug_provider', company_cug_provider);
// formdata.append('company_cug_no_of_connections', company_cug_no_of_connections);
// formdata.append('company_cug_tariff', company_cug_tariff);
// }
// formdata.append('company_pri_using', company_pri_using);
// formdata.append('company_pri_provider', company_pri_provider);
// formdata.append('company_pri_no_of_dels', company_pri_no_of_dels);
// formdata.append('company_pri_tariff', company_pri_tariff);
// formdata.append('company_toll_using', company_toll_using);
// if(company_toll_using == '1')
// {
// formdata.append('company_toll_provider', company_toll_provider);
// formdata.append('company_toll_tariff', company_toll_tariff);
// }
// formdata.append('company_voip_using', company_voip_using);
// if(company_voip_using == '1')
// {
// formdata.append('company_voip_provider', company_voip_provider);
// formdata.append('company_voip_tariff', company_voip_tariff);
// }
// formdata.append('company_ill_using', company_ill_using);
// formdata.append('company_ill_provider', company_ill_provider);
// formdata.append('company_ill_tariff', company_ill_tariff);
// formdata.append('company_datacards_using', company_datacards_using);
// if(company_datacards_using == '1')
// {
// formdata.append('company_datacards_provider', company_datacards_provider);
// formdata.append('company_datacards_tariff', company_datacards_tariff);
// }
// formdata.append('company_mpls_using', company_mpls_using);
// formdata.append('company_mpls_provider', company_mpls_provider);
// formdata.append('company_mpls_tariff', company_mpls_tariff);
// formdata.append('company_tracking_using', company_tracking_using);
// formdata.append('company_tracking_tariff', company_tracking_tariff);
// formdata.append('company_sms_email_using', company_sms_email_using);
// formdata.append('company_sms_email_usage_pattern', company_sms_email_usage_pattern);
// formdata.append('company_sms_email_relation', company_sms_email_relation);
// formdata.append('company_sms_email_sys_details', company_sms_email_sys_details);
// formdata.append('company_sms_email_lead', company_sms_email_lead);
// formdata.append('company_accounting_using', company_accounting_using);
// formdata.append('company_access_control_using', company_access_control_using);
// formdata.append('company_hwn_using', company_hwn_using);
// formdata.append('company_hwn_satisfied', company_hwn_satisfied);
// formdata.append('company_corporate_email_using', company_corporate_email_using);
// if(company_corporate_email_using == '1')
// {
// formdata.append('company_corporate_email_provider', company_corporate_email_provider);
// formdata.append('company_corporate_email_no_of_license', company_corporate_email_no_of_license);
// }
// formdata.append('company_av_conference_using', company_av_conference_using);
// formdata.append('company_ponder_maintain', company_ponder_maintain);
// if(company_ponder_maintain == '1')
// {
// formdata.append('company_ponder_have_team', company_ponder_have_team);
// formdata.append('company_ponder_computers', company_ponder_computers);
// formdata.append('company_ponder_sel_user', company_ponder_sel_user);
// }

// $.ajax({
// type:"post",
// data: formdata,
// processData: false,
// contentType: false,
// url:"survey_action.php",
// beforeSend:function(){
// $("#loader").removeClass("hide");
// },
// success:function(res){

// $("#loader").addClass("hide");
// res=res.trim();
// if(res == '1')
// {
// $(".formsuccess_popup").trigger('click');
// setTimeout(function(){
// location.href='survey_form.php';
// }, 5000);
// }
// else
// {
// alert("Something Went Wrong. Please Try Again.");
// }            
// }
// });
// return false;
// }
// });	


// $("#company_email_id").focusout(function(){
// var company_email_id = $("#company_email_id").val();	
// var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
// if(company_email_id != '' && (!pattern.test(company_email_id)))
// {
// var message = "Please Company Email Address is Invalid";
// valid('company_email_id',message);
// return false;
// }
// else if(company_email_id != '' && (pattern.test(company_email_id)))
// {
// $("#company_email_id_err").html('');
// $("#company_email_id").removeClass('input_err');	
// }
// });

// $("#company_email_id_2").focusout(function(){
// var company_email_id_2 = $("#company_email_id_2").val();	
// var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
// if(company_email_id_2 != '' && (!pattern.test(company_email_id_2)))
// {
// var message = "Please Company Email Address 2 is Invalid";
// valid('company_email_id_2',message);
// return false;
// }
// else if(company_email_id_2 != '' && (pattern.test(company_email_id_2)))
// {
// $("#company_email_id_2_err").html('');
// $("#company_email_id_2").removeClass('input_err');	
// }
// });						