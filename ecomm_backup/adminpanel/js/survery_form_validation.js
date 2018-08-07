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

// Pri Starts

$("input[class='company_pri_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var pri_text = '';
	$('.company_pri_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		$("#pri_"+val[i]).removeClass("hidden");

		if(i == 0)
		{
			pri_text += val[i];
		}
		else
		{
			pri_text += ","+val[i];   // Or ',' for '1','2'
		}
		pri_text = pri_text.replace(/^,|,$/g,'');

		$("#company_pri_using").val(pri_text);
	});

	$('.company_pri_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		$("#pri_"+val[i]).addClass("hidden");
		
	});

	if(pri_text == '')
	{	
		$("#company_pri_using").val('');
	}

});

$("input[class='company_pri1_pro_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var pri1_text = '';
	$('.company_pri1_pro_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		
		//alert(val[i]);

		if(val[i] == '10')
		{
			$("#company_pri1_pro_othervalue").removeAttr("disabled");
		}

		if(i == 0)
		{
			pri1_text += val[i];
		}
		else
		{
			pri1_text += ","+val[i];   // Or ',' for '1','2'
		}
		
		$("."+id_val[i]).removeClass("hidden");
		
		pri1_text = pri1_text.replace(/^,|,$/g,'');
		$("#company_pri1_provider").val(pri1_text);
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+emailsms_text+"'");
	
	$('.company_pri1_pro_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		if(val[i] == '10')
		{
			$("#company_pri1_pro_othervalue").attr("disabled","disabled");
		}

		$("."+id_val[i]).addClass("hidden");
		
	});
});

$("input[class='company_pri2_pro_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var pri2_text = '';
	$('.company_pri2_pro_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		
		//alert(val[i]);

		if(val[i] == '10')
		{
			$("#company_pri2_pro_othervalue").removeAttr("disabled");
		}

		if(i == 0)
		{
			pri2_text += val[i];
		}
		else
		{
			pri2_text += ","+val[i];   // Or ',' for '1','2'
		}
		
		$("."+id_val[i]).removeClass("hidden");
		
		pri2_text = pri2_text.replace(/^,|,$/g,'');
		$("#company_pri2_provider").val(pri2_text);
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+emailsms_text+"'");
	
	$('.company_pri2_pro_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		if(val[i] == '10')
		{
			$("#company_pri2_pro_othervalue").attr("disabled","disabled");
		}

		$("."+id_val[i]).addClass("hidden");
		
	});
});



// Pri Ends

// Voip Starts

$("#company_voip_using").change(function(){
	var curr = $(this).val();
	if(curr == "1"){
		$("#voip").removeClass("hidden");
	}
	else{
		$("#voip").addClass("hidden");
	}
});

$("input[class='company_voip_pro_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var voip_text = '';
	$('.company_voip_pro_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		
		//alert(val[i]);

		if(val[i] == '10')
		{
			$("#company_voip_pro_othervalue").removeAttr("disabled");
		}

		if(i == 0)
		{
			voip_text += val[i];
		}
		else
		{
			voip_text += ","+val[i];   // Or ',' for '1','2'
		}
		
		$("."+id_val[i]).removeClass("hidden");
		
		voip_text = voip_text.replace(/^,|,$/g,'');
		$("#company_voip_provider").val(voip_text);
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+emailsms_text+"'");
	
	$('.company_voip_pro_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		if(val[i] == '10')
		{
			$("#company_voip_pro_othervalue").attr("disabled","disabled");
		}

		$("."+id_val[i]).addClass("hidden");
		
	});
});

// Voip Ends

// ILL Starts

$("input[class='company_ill_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var ill_text = '';
	$('.company_ill_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		$("#ill_"+val[i]).removeClass("hidden");

		if(i == 0)
		{
			ill_text += val[i];
		}
		else
		{
			ill_text += ","+val[i];   // Or ',' for '1','2'
		}
		ill_text = ill_text.replace(/^,|,$/g,'');

		$("#company_ill_using").val(ill_text);
	});

	$('.company_ill_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		$("#ill_"+val[i]).addClass("hidden");
		
	});

	if(ill_text == '')
	{	
		$("#company_ill_using").val('');
	}

});

$("input[class='company_ill1_pro_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var ill1_text = '';
	$('.company_ill1_pro_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		
		//alert(val[i]);

		if(val[i] == '10')
		{
			$("#company_ill1_pro_othervalue").removeAttr("disabled");
		}

		if(i == 0)
		{
			ill1_text += val[i];
		}
		else
		{
			ill1_text += ","+val[i];   // Or ',' for '1','2'
		}
		
		$("."+id_val[i]).removeClass("hidden");
		
		ill1_text = ill1_text.replace(/^,|,$/g,'');
		$("#company_ill1_provider").val(ill1_text);
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+emailsms_text+"'");
	
	$('.company_ill1_pro_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		if(val[i] == '10')
		{
			$("#company_ill1_pro_othervalue").attr("disabled","disabled");
		}

		$("."+id_val[i]).addClass("hidden");
		
	});
});

$("input[class='company_ill2_pro_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var ill2_text = '';
	$('.company_ill2_pro_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		
		//alert(val[i]);

		if(val[i] == '10')
		{
			$("#company_ill2_pro_othervalue").removeAttr("disabled");
		}

		if(i == 0)
		{
			ill2_text += val[i];
		}
		else
		{
			ill2_text += ","+val[i];   // Or ',' for '1','2'
		}
		
		$("."+id_val[i]).removeClass("hidden");
		
		ill2_text = ill2_text.replace(/^,|,$/g,'');
		$("#company_ill2_provider").val(ill2_text);
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+emailsms_text+"'");
	
	$('.company_ill2_pro_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		if(val[i] == '10')
		{
			$("#company_ill2_pro_othervalue").attr("disabled","disabled");
		}

		$("."+id_val[i]).addClass("hidden");
		
	});
});

// ILL Ends

// MPLS Starts

$("input[class='company_mpls_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var mpls_text = '';
	$('.company_mpls_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		$("#mpls_"+val[i]).removeClass("hidden");

		if(val[i] != '3')
		{
			$("#company_mpls_check3").attr("disabled","disabled");
			$("#company_mpls_check1").removeAttr("disabled");
			$("#company_mpls_check2").removeAttr("disabled");
			
			$("."+id_val[i]).removeClass("hidden");
			
			if(i == 0)
			{
				mpls_text += val[i];
			}
			else
			{
				mpls_text += ","+val[i]; 
			}
			mpls_text = mpls_text.replace(/^,|,$/g,'');
		}
		else
		{
			$("#company_mpls_check3").removeAttr("disabled");
			$("#company_mpls_check1").attr("disabled","disabled");
			$("#company_mpls_check2").attr("disabled","disabled");

			$("#mpls_1").addClass("hidden");
			$("#mpls_2").addClass("hidden");

			$("."+id_val[i]).attr("disabled");

			mpls_text = val[i];
		}

		$("#company_mpls_using").val(mpls_text);
	});

	$('.company_mpls_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		$("#mpls_"+val[i]).addClass("hidden");
		
	});

	if(mpls_text == '')
	{	
		$("#company_mpls_check1").removeAttr("disabled");
		$("#company_mpls_check2").removeAttr("disabled");
		$("#company_mpls_check3").removeAttr("disabled");

		$("#company_mpls_using").val('');
	}

});

$("input[class='company_mpls1_pro_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var mpls1_text = '';
	$('.company_mpls1_pro_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		
		//alert(val[i]);

		if(val[i] == '8')
		{
			$("#company_mpls1_pro_othervalue").removeAttr("disabled");
		}

		if(i == 0)
		{
			mpls1_text += val[i];
		}
		else
		{
			mpls1_text += ","+val[i];   // Or ',' for '1','2'
		}
		
		$("."+id_val[i]).removeClass("hidden");
		
		mpls1_text = mpls1_text.replace(/^,|,$/g,'');
		$("#company_mpls1_provider").val(mpls1_text);
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+emailsms_text+"'");
	
	$('.company_mpls1_pro_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		if(val[i] == '8')
		{
			$("#company_mpls2_pro_othervalue").attr("disabled","disabled");
		}

		$("."+id_val[i]).addClass("hidden");
		
	});
});

$("input[class='company_mpls2_pro_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var mpls2_text = '';
	$('.company_mpls2_pro_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		
		//alert(val[i]);

		if(val[i] == '8')
		{
			$("#company_mpls2_pro_othervalue").removeAttr("disabled");
		}

		if(i == 0)
		{
			mpls2_text += val[i];
		}
		else
		{
			mpls2_text += ","+val[i];   // Or ',' for '1','2'
		}
		
		$("."+id_val[i]).removeClass("hidden");
		
		mpls2_text = mpls2_text.replace(/^,|,$/g,'');
		$("#company_mpls2_provider").val(mpls2_text);
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+emailsms_text+"'");
	
	$('.company_mpls2_pro_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		if(val[i] == '8')
		{
			$("#company_mpls2_pro_othervalue").attr("disabled","disabled");
		}

		$("."+id_val[i]).addClass("hidden");
		
	});
});

// MPLS Ends

// Toll Starts

$("#company_toll_using").change(function(){
	var curr = $(this).val();
	//alert(curr);
	if(curr == "1"){
		$("#toll").removeClass("hidden");
	}
	else{
		$("#toll").addClass("hidden");
	}
});

$("#company_toll_cloud_wired").change(function(){
	var curr = $(this).val();
	//alert(curr);
	if(curr == "1")
	{
		$("#cloud").removeClass("hidden");
		$("#wired").addClass("hidden");
	}
	else if(curr == "2")
	{
		$("#wired").removeClass("hidden");
		$("#cloud").addClass("hidden");
	}
	else
	{
		$("#cloud").addClass("hidden");
		$("#wired").addClass("hidden");
	}
});


$("input[class='company_toll_wired_pro_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var toll_text = '';
	$('.company_toll_wired_pro_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		
		//alert(id_val[i]);
		if(i == 0)
		{
			toll_text += val[i];
		}
		else
		{
			toll_text += ","+val[i];   // Or ',' for '1','2'
		}
		
		$("."+id_val[i]).removeClass("hidden");
		
		toll_text = toll_text.replace(/^,|,$/g,'');
		$("#company_toll_wired_provider").val(toll_text);
	});
	//var company_sms_email_using = $("#company_sms_email_using").val();
	//$("#company_sms_email_using").val("'"+emailsms_text+"'");
	
	$('.company_toll_wired_pro_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');
		$("."+id_val[i]).addClass("hidden");
		
	});

	if(toll_text == '')
	{	
		$("#company_toll_wired_provider").val('');
	}
});

// Toll Ends

// SMS Email Starts

$("input[class='company_sms_email_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var sms_email_text = '';
	$('.company_sms_email_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		if(val[i] != '7')
		{
			$("#company_sms_email_check7").attr("disabled","disabled");
			$("#company_sms_email_check1").removeAttr("disabled");
			$("#company_sms_email_check2").removeAttr("disabled");
			$("#company_sms_email_check3").removeAttr("disabled");
			$("#company_sms_email_check4").removeAttr("disabled");
			$("#company_sms_email_check5").removeAttr("disabled");
			$("#company_sms_email_check6").removeAttr("disabled");
			
			$("."+id_val[i]).removeClass("hidden");
			
			if(i == 0)
			{
				sms_email_text += val[i];
			}
			else
			{
				sms_email_text += ","+val[i]; 
			}
			sms_email_text = sms_email_text.replace(/^,|,$/g,'');
		}
		else
		{
			$("#company_sms_email_check7").removeAttr("disabled");
			$("#company_sms_email_check1").attr("disabled","disabled");
			$("#company_sms_email_check2").attr("disabled","disabled");
			$("#company_sms_email_check3").attr("disabled","disabled");
			$("#company_sms_email_check4").attr("disabled","disabled");
			$("#company_sms_email_check5").attr("disabled","disabled");
			$("#company_sms_email_check6").attr("disabled","disabled");

			$("."+id_val[i]).attr("disabled");

			sms_email_text = val[i];
		}

		$("#company_sms_email_provider").val(sms_email_text);
	});

	$('.company_sms_email_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');		
		$("."+id_val[i]).addClass("hidden");
	});

	if(sms_email_text == '')
	{	
		$("#company_sms_email_check1").removeAttr("disabled");
		$("#company_sms_email_check2").removeAttr("disabled");
		$("#company_sms_email_check3").removeAttr("disabled");
		$("#company_sms_email_check4").removeAttr("disabled");
		$("#company_sms_email_check5").removeAttr("disabled");
		$("#company_sms_email_check6").removeAttr("disabled");
		$("#company_sms_email_check7").removeAttr("disabled");

		$("#company_sms_email_provider").val('');
	}

});

$("#company_sms_email_relation").change(function(){
	var curr = $(this).val();
	//alert(curr);
	if(curr == "1"){
		$("#sms_email_relation").removeClass("hidden");
	}
	else{
		$("#sms_email_relation").addClass("hidden");
	}
});

// SMS Email Ends

// CRM Accounting Starts

$("input[class='company_accounting_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var accounting_text = '';
	$('.company_accounting_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		if(val[i] != '4')
		{
			$("#company_accounting_check4").attr("disabled","disabled");
			$("#company_accounting_check1").removeAttr("disabled");
			$("#company_accounting_check2").removeAttr("disabled");
			$("#company_accounting_check3").removeAttr("disabled");
			
			$("."+id_val[i]).removeClass("hidden");
			
			if(i == 0)
			{
				accounting_text += val[i];
			}
			else
			{
				accounting_text += ","+val[i]; 
			}
			accounting_text = accounting_text.replace(/^,|,$/g,'');
		}
		else
		{
			$("#company_accounting_check4").removeAttr("disabled");
			$("#company_accounting_check1").attr("disabled","disabled");
			$("#company_accounting_check2").attr("disabled","disabled");
			$("#company_accounting_check3").attr("disabled","disabled");

			$("."+id_val[i]).attr("disabled");

			accounting_text = val[i];
		}

		$("#company_accounting_provider").val(accounting_text);
	});

	$('.company_accounting_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');		
		$("."+id_val[i]).addClass("hidden");
	});

	if(accounting_text == '')
	{	
		$("#company_accounting_check1").removeAttr("disabled");
		$("#company_accounting_check2").removeAttr("disabled");
		$("#company_accounting_check3").removeAttr("disabled");
		$("#company_accounting_check4").removeAttr("disabled");

		$("#company_accounting_provider").val('');
	}

});

// CRM Accounting Ends

// EPABX Starts

$("input[class='company_access_control_checkbox']").click(function(){
	var val = [];
	var id_val = [];
	var epabx_text = '';
	$('.company_access_control_checkbox:checked').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');

		if(val[i] != '4')
		{
			$("#company_access_control_check4").attr("disabled","disabled");
			$("#company_access_control_check1").removeAttr("disabled");
			$("#company_access_control_check2").removeAttr("disabled");
			$("#company_access_control_check3").removeAttr("disabled");
			
			$("."+id_val[i]).removeClass("hidden");
			
			if(i == 0)
			{
				epabx_text += val[i];
			}
			else
			{
				epabx_text += ","+val[i]; 
			}
			epabx_text = epabx_text.replace(/^,|,$/g,'');
		}
		else
		{
			$("#company_access_control_check4").removeAttr("disabled");
			$("#company_access_control_check1").attr("disabled","disabled");
			$("#company_access_control_check2").attr("disabled","disabled");
			$("#company_access_control_check3").attr("disabled","disabled");

			$("."+id_val[i]).attr("disabled");

			epabx_text = val[i];
		}

		$("#company_access_control_provider").val(epabx_text);
	});

	$('.company_access_control_checkbox:not(:checked)').each(function(i){   
		val[i] = $(this).val();
		id_val[i] = $(this).attr('id');		
		$("."+id_val[i]).addClass("hidden");
	});

	if(epabx_text == '')
	{	
		$("#company_access_control_check1").removeAttr("disabled");
		$("#company_access_control_check2").removeAttr("disabled");
		$("#company_access_control_check3").removeAttr("disabled");
		$("#company_access_control_check4").removeAttr("disabled");

		$("#company_access_control_provider").val('');
	}

});

// EPABX Ends

// IT HARDWARE

$("#company_hwn_amc_hardware").change(function(){
	var curr = $(this).val();
	//alert(curr);
	if(curr == "1"){
		$("#amc_hardware").removeClass("hidden");
	}
	else{
		$("#amc_hardware").addClass("hidden");
	}
});

$("#company_hwn_amc_ac").change(function(){
	var curr = $(this).val();
	//alert(curr);
	if(curr == "1"){
		$("#amc_ac").removeClass("hidden");
	}
	else{
		$("#amc_ac").addClass("hidden");
	}
});

// IT HARDWARE Ends


// Corporate Email

$("#company_corporate_email_using").change(function(){
	var curr = $(this).val();
	//alert(curr);
	if(curr == "1"){
		$("#corporate_email").removeClass("hidden");
	}
	else{
		$("#corporate_email").addClass("hidden");
	}
});

$("#company_corporate_email_provider").change(function(){
	var curr = $(this).val();
	//alert(curr);
	if(curr == "7"){
		$("#corporate").removeClass("hidden");
	}
	else{
		$("#corporate").addClass("hidden");
	}
});

// Corporate Email Ends

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

// Save As Draft
$("#save_as_draft_btn").click(function(){
	var page = parseInt($("#page").val());
	var success = '';
	var company_id = $("#company_id").val();
	var request_id = $("#request_id").val();

	if(page == 5)
	{
		var formdata = new FormData();
		var ithr_id = $("#ithr_id").val();

		// CRM ACCOUNTING

		var crm_erp_using = 1;

		if(crm_erp_using == '1')
		{

			var company_accounting_provider = $("#company_accounting_provider").val();

			if(company_accounting_provider == '')
			{
				var message = "Please Select Atleast One Option";
				valid('company_accounting_provider',message);
				return false;
			}
			else
			{
				var company_accounting_software_name_arr = Array();
				var company_accounting_vendor_name_arr = Array();

				var company_accounting_provider_arr = $('#company_accounting_provider').val().split(",");

				for(var i = 0; i < company_accounting_provider_arr.length; i++)
				{

					var company_accounting_software_name = $("#company_accounting_software_name_"+company_accounting_provider_arr[i]).val();
					var company_accounting_vendor_name = $("#company_accounting_vendor_name_"+company_accounting_provider_arr[i]).val();

					company_accounting_software_name_arr.push(company_accounting_software_name);
					company_accounting_vendor_name_arr.push(company_accounting_vendor_name);

				}

				formdata.append('company_accounting_provider_arr', company_accounting_provider_arr);
				formdata.append('company_accounting_software_name_arr', company_accounting_software_name_arr);
				formdata.append('company_accounting_vendor_name_arr', company_accounting_vendor_name_arr);
			}

		}
		// CRM ACCOUNTING Ends

		// EPABX

		var epabx_using = 1;

		if(epabx_using == '1')
		{

			var company_access_control_provider = $("#company_access_control_provider").val();

			if(company_access_control_provider == '')
			{
				var message = "Please Select Atleast One Option";
				valid('company_access_control_provider',message);
				return false;
			}
			else
			{
				var company_access_control_software_name_arr = Array();
				var company_access_control_qty_arr = Array();

				var company_access_control_provider_arr = $('#company_access_control_provider').val().split(",");

				for(var i = 0; i < company_access_control_provider_arr.length; i++)
				{

					var company_access_control_software_name = $("#company_access_control_software_name_"+company_access_control_provider_arr[i]).val();
					var company_access_control_qty = $("#company_access_control_qty_"+company_access_control_provider_arr[i]).val();

					company_access_control_software_name_arr.push(company_access_control_software_name);
					company_access_control_qty_arr.push(company_access_control_qty);

				}

				formdata.append('company_access_control_provider_arr', company_access_control_provider_arr);
				formdata.append('company_access_control_software_name_arr', company_access_control_software_name_arr);
				formdata.append('company_access_control_qty_arr', company_access_control_qty_arr);
			}

		}
		// EPABX Ends

		// IT HARDWARE

		var it_using = 1;

		if(it_using == '1')
		{
			var company_hwn_it_inhouse_team = $("#company_hwn_it_inhouse_team").val();
			var company_hwn_no_computers = $("#company_hwn_no_computers").val();
			var company_hwn_amc_hardware = $("#company_hwn_amc_hardware").val();
			var company_hwn_amc_hardware_satisfied = $("#company_hwn_amc_hardware_satisfied").val();
			var company_hwn_amc_ac = $("#company_hwn_amc_ac").val();
			var company_hwn_amc_ac_satisfied = $("#company_hwn_amc_ac_satisfied").val();

			if(company_hwn_amc_hardware == '1' && company_hwn_amc_hardware_satisfied == '')
			{
				var message = "Please Select Atleast One Option";
				valid('company_hwn_amc_hardware_satisfied',message);
				return false;
			}
			else if(company_hwn_amc_ac == '1' && company_hwn_amc_ac_satisfied == '')
			{
				var message = "Please Select Atleast One Option";
				valid('company_hwn_amc_ac_satisfied',message);
				return false;
			}
			else
			{
				formdata.append('company_hwn_it_inhouse_team', company_hwn_it_inhouse_team);
				formdata.append('company_hwn_no_computers', company_hwn_no_computers);
				formdata.append('company_hwn_amc_hardware', company_hwn_amc_hardware);
				formdata.append('company_hwn_amc_hardware_satisfied', company_hwn_amc_hardware_satisfied);
				formdata.append('company_hwn_amc_ac', company_hwn_amc_ac);
				formdata.append('company_hwn_amc_ac_satisfied', company_hwn_amc_ac_satisfied);
			}
		}

		// IT HARDWARE Ends

		// CORPORATE EMAIL

		var corporate_email_using = 1;

		if(corporate_email_using == '1')
		{
			var company_corporate_email_using = $("#company_corporate_email_using").val();
			var company_corporate_email_provider = $("#company_corporate_email_provider").val();
			var company_corporate_email_provider_other_value = $("#company_corporate_email_provider_other_value").val();
			var company_corporate_email_no_of_license = $("#company_corporate_email_no_of_license").val();

			if(company_corporate_email_using == '1' && company_corporate_email_provider == '')
			{
				var message = "Please Select Atleast One Option";
				valid('company_corporate_email_provider',message);
				return false;
			}
			else if(company_corporate_email_using == '1' && company_corporate_email_provider == '7' && company_corporate_email_provider_other_value == '')
			{
				var message = "Please Enter Other Provider";
				valid('company_corporate_email_provider_other_value',message);
				return false;
			}
			else
			{
				formdata.append('company_corporate_email_using', company_corporate_email_using);
				formdata.append('company_corporate_email_provider', company_corporate_email_provider);
				formdata.append('company_corporate_email_provider_other_value', company_corporate_email_provider_other_value);
				formdata.append('company_corporate_email_no_of_license', company_corporate_email_no_of_license);
			}
		}

		// CORPORATE EMAIL Ends

		// CONFERENCE AUDIO

		var conference_audio_using = 1;

		if(conference_audio_using == '1')
		{
			var company_av_conference_using = $("#company_av_conference_using").val();
			var company_av_conference_maintain = $("#company_av_conference_maintain").val();
			var company_av_conference_hr_policies = $("#company_av_conference_hr_policies").val();

			formdata.append('company_av_conference_using', company_av_conference_using);
			formdata.append('company_av_conference_maintain', company_av_conference_maintain);
			formdata.append('company_av_conference_hr_policies', company_av_conference_hr_policies);

		}

		// CONFERENCE AUDIO Ends

		formdata.append('crm_erp_using', crm_erp_using);
		formdata.append('epabx_using', epabx_using);
		formdata.append('it_using', it_using);
		formdata.append('corporate_email_using', corporate_email_using);
		formdata.append('conference_audio_using', conference_audio_using);

		formdata.append('company_id', company_id);
		formdata.append('request_id', request_id);
		formdata.append('ithr_id', ithr_id);
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
				alert(res);
				if (res.toLowerCase().indexOf("success") >= 0)
				{
					var res_arr = res.split("_");

					var ithr_id_new = res_arr[1];

					$("#ithr_id").val(ithr_id_new);

					$(".is_save").removeClass('hidden');
					$(".is_save").css('display','block');
					setTimeout(function(){
						$(".is_save").slideUp('fast');
						$(".is_save").addClass('hidden');
					}, 5000);
				}
			}
		});

		success = '1';
	}

	if(success == '1')
	{
		//page = page + 1;
		//$("#page").val(page);
		//$('html,body').animate({scrollTop: $("#company_id").offset().top},'slow');

		// Redirected to survey list page
	}
	else
	{
		return false;
	}
});

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
			formdata.append('request_id', request_id);
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
							// $(".is_save").removeClass('hidden');
							// setTimeout(function(){
							// 	$(".is_save").slideUp('fast');
							// 	$(".is_save").addClass('hidden');
							// }, 5000);
							jQuery.gritter.add({
								title: 'General',
								text: 'Data Saved',
								class_name: 'growl-primary',
								image: 'images/checkmark.png',
								sticky: false,
								time: '30000'
							});

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
	else if(page == 3)
	{
		var formdata = new FormData();
		var wired_id = $("#wired_id").val();

		// Pri
		var pri_using = $("#company_pri_using").val();

		if (pri_using.toLowerCase().indexOf("1") >= 0)
		{
			var company_pri1_provider = $("#company_pri1_provider").val();

			if(company_pri1_provider == '')
			{
				var message = "Please Select Atleast One Provider";
				valid('company_pri1_provider',message);
				return false;
			}
			else
			{
				var company_pri_no_of_connections_arr = Array();
				var company_pri_tariff_arr = Array();
				var company_pri_monthly_rentals_arr = Array();
				var company_pri_charges_same_operator_arr = Array();
				var company_pri_charges_other_operator_arr = Array();

				var company_pri1_provider_arr = $('#company_pri1_provider').val().split(",");
				var company_pri1_pro_othervalue = $('#company_pri1_pro_othervalue').val();

				//alert(company_datacards_provider_arr);

				for(var i = 0; i < company_pri1_provider_arr.length; i++)
				{
					//var company_datacards_card_i = 'company_datacards_card_'+company_datacards_provider_arr[i];

					var company_pri_no_of_connections = $("#company_pri1_no_of_connections_"+company_pri1_provider_arr[i]).val();
					var company_pri_tariff = $("#company_pri1_tariff_"+company_pri1_provider_arr[i]).val();
					var company_pri_monthly_rentals = $("#company_pri1_monthly_rentals_"+company_pri1_provider_arr[i]).val();
					var company_pri_charges_same_operator = $("#company_pri1_charges_same_operator_"+company_pri1_provider_arr[i]).val();
					var company_pri_charges_other_operator = $("#company_pri1_charges_other_operator_"+company_pri1_provider_arr[i]).val();

					company_pri_no_of_connections_arr.push(company_pri_no_of_connections);
					company_pri_tariff_arr.push(company_pri_tariff);
					company_pri_monthly_rentals_arr.push(company_pri_monthly_rentals);
					company_pri_charges_same_operator_arr.push(company_pri_charges_same_operator);
					company_pri_charges_other_operator_arr.push(company_pri_charges_other_operator);

					//formdata.append('a_ticket_id_arr',a_ticket_id_arr);
				}

				formdata.append('company_pri1_provider_arr', company_pri1_provider_arr);
				formdata.append('company_pri1_no_of_connections_arr', company_pri_no_of_connections_arr);
				formdata.append('company_pri1_tariff_arr', company_pri_tariff_arr);
				formdata.append('company_pri1_monthly_rentals_arr', company_pri_monthly_rentals_arr);
				formdata.append('company_pri1_charges_same_operator_arr', company_pri_charges_same_operator_arr);
				formdata.append('company_pri1_charges_other_operator_arr', company_pri_charges_other_operator_arr);
				formdata.append('company_pri1_pro_othervalue', company_pri1_pro_othervalue);

				//alert(company_datacards_no_of_connections_arr);
			}
		}
		
		if(pri_using.toLowerCase().indexOf("2") >= 0)
		{
			var company_pri2_provider = $("#company_pri2_provider").val();

			if(company_pri2_provider == '')
			{
				var message = "Please Select Atleast One Provider";
				valid('company_pri2_provider',message);
				return false;
			}
			else
			{
				var company_pri_no_of_connections_arr = Array();
				var company_pri_tariff_arr = Array();
				var company_pri_monthly_rentals_arr = Array();
				var company_pri_charges_same_operator_arr = Array();
				var company_pri_charges_other_operator_arr = Array();

				var company_pri2_provider_arr = $('#company_pri2_provider').val().split(",");
				var company_pri2_pro_othervalue = $('#company_pri2_pro_othervalue').val();

				//alert(company_datacards_provider_arr);

				for(var i = 0; i < company_pri2_provider_arr.length; i++)
				{
					//var company_datacards_card_i = 'company_datacards_card_'+company_datacards_provider_arr[i];

					var company_pri_no_of_connections = $("#company_pri2_no_of_connections_"+company_pri2_provider_arr[i]).val();
					var company_pri_tariff = $("#company_pri2_tariff_"+company_pri2_provider_arr[i]).val();
					var company_pri_monthly_rentals = $("#company_pri2_monthly_rentals_"+company_pri2_provider_arr[i]).val();
					var company_pri_charges_same_operator = $("#company_pri2_charges_same_operator_"+company_pri2_provider_arr[i]).val();
					var company_pri_charges_other_operator = $("#company_pri2_charges_other_operator_"+company_pri2_provider_arr[i]).val();

					company_pri_no_of_connections_arr.push(company_pri_no_of_connections);
					company_pri_tariff_arr.push(company_pri_tariff);
					company_pri_monthly_rentals_arr.push(company_pri_monthly_rentals);
					company_pri_charges_same_operator_arr.push(company_pri_charges_same_operator);
					company_pri_charges_other_operator_arr.push(company_pri_charges_other_operator);

					//formdata.append('a_ticket_id_arr',a_ticket_id_arr);
				}

				formdata.append('company_pri2_provider_arr', company_pri2_provider_arr);
				formdata.append('company_pri2_no_of_connections_arr', company_pri_no_of_connections_arr);
				formdata.append('company_pri2_tariff_arr', company_pri_tariff_arr);
				formdata.append('company_pri2_monthly_rentals_arr', company_pri_monthly_rentals_arr);
				formdata.append('company_pri2_charges_same_operator_arr', company_pri_charges_same_operator_arr);
				formdata.append('company_pri2_charges_other_operator_arr', company_pri_charges_other_operator_arr);
				formdata.append('company_pri2_pro_othervalue', company_pri2_pro_othervalue);

				//alert(company_datacards_no_of_connections_arr);
			}
		}
		// Pri Ends

		// Voip
		var voip_using = 1;

		if(voip_using == '1')
		{
			var company_voip_provider = $("#company_voip_provider").val();

			if(company_voip_provider == '')
			{
				var message = "Please Select Atleast One Provider";
				valid('company_voip_provider',message);
				return false;
			}
			else
			{
				var company_voip_free_minutes_arr = Array();
				var company_voip_cost_per_incoming_arr = Array();

				var company_voip_provider_arr = $('#company_voip_provider').val().split(",");
				var company_voip_pro_othervalue = $('#company_voip_pro_othervalue').val();

				//alert(company_datacards_provider_arr);

				for(var i = 0; i < company_voip_provider_arr.length; i++)
				{
					//var company_datacards_card_i = 'company_datacards_card_'+company_datacards_provider_arr[i];

					var company_voip_free_minutes = $("#company_voip_free_minutes_"+company_voip_provider_arr[i]).val();
					var company_voip_cost_per_incoming = $("#company_voip_cost_per_incoming_"+company_voip_provider_arr[i]).val();

					company_voip_free_minutes_arr.push(company_voip_free_minutes);
					company_voip_cost_per_incoming_arr.push(company_voip_cost_per_incoming);

					//formdata.append('a_ticket_id_arr',a_ticket_id_arr);
				}

				formdata.append('company_voip_provider_arr', company_voip_provider_arr);
				formdata.append('company_voip_free_minutes_arr', company_voip_free_minutes_arr);
				formdata.append('company_voip_cost_per_incoming_arr', company_voip_cost_per_incoming_arr);
				formdata.append('company_voip_pro_othervalue', company_voip_pro_othervalue);

				//alert(company_datacards_no_of_connections_arr);
			}

		}
		// Voip Ends

		// ILL
		var ill_using = $("#company_ill_using").val();

		if (ill_using.toLowerCase().indexOf("1") >= 0)
		{
			var company_ill1_provider = $("#company_ill1_provider").val();

			if(company_ill1_provider == '')
			{
				var message = "Please Select Atleast One Provider";
				valid('company_ill1_provider',message);
				return false;
			}
			else
			{
				var company_ill_speed_arr = Array();
				var company_ill_free_data_arr = Array();
				var company_ill_monthly_cost_arr = Array();

				var company_ill1_provider_arr = $('#company_ill1_provider').val().split(",");
				var company_ill1_pro_othervalue = $('#company_ill1_pro_othervalue').val();

				//alert(company_datacards_provider_arr);

				for(var i = 0; i < company_ill1_provider_arr.length; i++)
				{
					//var company_datacards_card_i = 'company_datacards_card_'+company_datacards_provider_arr[i];

					var company_ill_speed = $("#company_ill1_speed_"+company_ill1_provider_arr[i]).val();
					var company_ill_free_data = $("#company_ill1_free_data_"+company_ill1_provider_arr[i]).val();
					var company_ill_monthly_cost = $("#company_ill1_monthly_cost_"+company_ill1_provider_arr[i]).val();

					company_ill_speed_arr.push(company_ill_speed);
					company_ill_free_data_arr.push(company_ill_free_data);
					company_ill_monthly_cost_arr.push(company_ill_monthly_cost);

					//formdata.append('a_ticket_id_arr',a_ticket_id_arr);
				}

				formdata.append('company_ill1_provider_arr', company_ill1_provider_arr);
				formdata.append('company_ill1_speed_arr', company_ill_speed_arr);
				formdata.append('company_ill1_free_data_arr', company_ill_free_data_arr);
				formdata.append('company_ill1_monthly_cost_arr', company_ill_monthly_cost_arr);
				formdata.append('company_ill1_pro_othervalue', company_ill1_pro_othervalue);

				//alert(company_datacards_no_of_connections_arr);
			}
		}
		
		if (ill_using.toLowerCase().indexOf("2") >= 0)
		{
			var company_ill2_provider = $("#company_ill2_provider").val();

			if(company_ill2_provider == '')
			{
				var message = "Please Select Atleast One Provider";
				valid('company_ill2_provider',message);
				return false;
			}
			else
			{
				var company_ill_speed_arr = Array();
				var company_ill_free_data_arr = Array();
				var company_ill_monthly_cost_arr = Array();

				var company_ill2_provider_arr = $('#company_ill2_provider').val().split(",");
				var company_ill2_pro_othervalue = $('#company_ill2_pro_othervalue').val();

				//alert(company_datacards_provider_arr);

				for(var i = 0; i < company_ill2_provider_arr.length; i++)
				{
					//var company_datacards_card_i = 'company_datacards_card_'+company_datacards_provider_arr[i];

					var company_ill_speed = $("#company_ill2_speed_"+company_ill2_provider_arr[i]).val();
					var company_ill_free_data = $("#company_ill2_free_data_"+company_ill2_provider_arr[i]).val();
					var company_ill_monthly_cost = $("#company_ill2_monthly_cost_"+company_ill2_provider_arr[i]).val();

					company_ill_speed_arr.push(company_ill_speed);
					company_ill_free_data_arr.push(company_ill_free_data);
					company_ill_monthly_cost_arr.push(company_ill_monthly_cost);

					//formdata.append('a_ticket_id_arr',a_ticket_id_arr);
				}

				formdata.append('company_ill2_provider_arr', company_ill2_provider_arr);
				formdata.append('company_ill2_speed_arr', company_ill_speed_arr);
				formdata.append('company_ill2_free_data_arr', company_ill_free_data_arr);
				formdata.append('company_ill2_monthly_cost_arr', company_ill_monthly_cost_arr);
				formdata.append('company_ill2_pro_othervalue', company_ill2_pro_othervalue);

				//alert(company_datacards_no_of_connections_arr);
			}
		}
		// ILL Ends

		// MPLS
		var mpls_using = $("#company_mpls_using").val();

		if (mpls_using.toLowerCase().indexOf("1") >= 0)
		{
			var company_mpls1_provider = $("#company_mpls1_provider").val();

			if(company_mpls1_provider == '')
			{
				var message = "Please Select Atleast One Provider";
				valid('company_mpls1_provider',message);
				return false;
			}
			else
			{
				var company_mpls_current_tariff_arr = Array();

				var company_mpls1_provider_arr = $('#company_mpls1_provider').val().split(",");
				var company_mpls1_pro_othervalue = $('#company_mpls1_pro_othervalue').val();

				//alert(company_datacards_provider_arr);

				for(var i = 0; i < company_mpls1_provider_arr.length; i++)
				{
					//var company_datacards_card_i = 'company_datacards_card_'+company_datacards_provider_arr[i];

					var company_mpls_current_tariff = $("#company_mpls1_current_tariff_"+company_mpls1_provider_arr[i]).val();

					company_mpls_current_tariff_arr.push(company_mpls_current_tariff);

					//formdata.append('a_ticket_id_arr',a_ticket_id_arr);
				}

				formdata.append('company_mpls1_provider_arr', company_mpls1_provider_arr);
				formdata.append('company_mpls1_current_tariff_arr', company_mpls_current_tariff_arr);
				formdata.append('company_mpls1_pro_othervalue', company_mpls1_pro_othervalue);

				//alert(company_datacards_no_of_connections_arr);
			}
		}
		

		if (mpls_using.toLowerCase().indexOf("2") >= 0)
		{
			var company_mpls2_provider = $("#company_mpls2_provider").val();

			if(company_mpls2_provider == '')
			{
				var message = "Please Select Atleast One Provider";
				valid('company_mpls2_provider',message);
				return false;
			}
			else
			{
				var company_mpls_current_tariff_arr = Array();

				var company_mpls2_provider_arr = $('#company_mpls2_provider').val().split(",");
				var company_mpls2_pro_othervalue = $('#company_mpls2_pro_othervalue').val();

				//alert(company_datacards_provider_arr);

				for(var i = 0; i < company_mpls2_provider_arr.length; i++)
				{
					//var company_datacards_card_i = 'company_datacards_card_'+company_datacards_provider_arr[i];

					var company_mpls_current_tariff = $("#company_mpls2_current_tariff_"+company_mpls2_provider_arr[i]).val();

					company_mpls_current_tariff_arr.push(company_mpls_current_tariff);

					//formdata.append('a_ticket_id_arr',a_ticket_id_arr);
				}

				formdata.append('company_mpls2_provider_arr', company_mpls2_provider_arr);
				formdata.append('company_mpls2_current_tariff_arr', company_mpls_current_tariff_arr);
				formdata.append('company_mpls2_pro_othervalue', company_mpls2_pro_othervalue);

				//alert(company_datacards_no_of_connections_arr);
			}
		}
		// MPLS Ends

		formdata.append('pri_using', pri_using);
		formdata.append('voip_using', voip_using);
		formdata.append('ill_using', ill_using);
		formdata.append('mpls_using', mpls_using);

		formdata.append('company_id', company_id);
		formdata.append('request_id', request_id);
		formdata.append('wired_id', wired_id);
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

					var wired_id_new = res_arr[1];

					$("#wired_id").val(wired_id_new);

					$(".is_save").removeClass('hidden');
					$(".is_save").css('display','block');
					setTimeout(function(){
						$(".is_save").slideUp('fast');
						$(".is_save").addClass('hidden');
					}, 5000);
				}
			}
		});

		success = '1';
	}
	else if(page == 4)
	{
		var formdata = new FormData();
		var cloud_id = $("#cloud_id").val();

		// Toll
		var toll_using = $("#company_toll_using").val();

		if(toll_using == '1')
		{
			var company_toll_cloud_wired = $("#company_toll_cloud_wired").val();

			if(company_toll_cloud_wired == '1')   // Cloud
			{
				var company_toll_operator_name = $('#company_toll_operator_name').val();
				var company_toll_free_minutes = $('#company_toll_free_minutes').val();
				var company_toll_cost_per_incoming_call = $('#company_toll_cost_per_incoming_call').val();

				formdata.append('company_toll_operator_name', company_toll_operator_name);
				formdata.append('company_toll_free_minutes', company_toll_free_minutes);
				formdata.append('company_toll_cost_per_incoming_call', company_toll_cost_per_incoming_call);
				formdata.append('company_toll_cloud_wired', company_toll_cloud_wired);
			}
			else if(company_toll_cloud_wired == '2')  // Wired
			{
				var company_toll_wired_provider = $("#company_toll_wired_provider").val();

				if(company_toll_wired_provider == '')
				{
					var message = "Please Select Atleast One Provider";
					valid('company_toll_wired_provider',message);
					return false;
				}
				else
				{
					var company_toll_free_minutes_arr = Array();
					var company_toll_cost_per_incoming_call_arr = Array();

					var company_toll_wired_provider_arr = $('#company_toll_wired_provider').val().split(",");

					for(var i = 0; i < company_toll_wired_provider_arr.length; i++)
					{

						var company_toll_free_minutes = $("#company_toll_free_minutes_"+company_toll_wired_provider_arr[i]).val();
						var company_toll_cost_per_incoming_call = $("#company_toll_cost_per_incoming_call_"+company_toll_wired_provider_arr[i]).val();

						company_toll_free_minutes_arr.push(company_toll_free_minutes);
						company_toll_cost_per_incoming_call_arr.push(company_toll_cost_per_incoming_call);

					}

					formdata.append('company_toll_wired_provider_arr', company_toll_wired_provider_arr);
					formdata.append('company_toll_free_minutes_arr', company_toll_free_minutes_arr);
					formdata.append('company_toll_cost_per_incoming_call_arr', company_toll_cost_per_incoming_call_arr);
					formdata.append('company_toll_cloud_wired', company_toll_cloud_wired);
				}
			}
		}
		// Toll Ends

		// SMS EMAIL

		var sms_email_using = 1;

		if(sms_email_using == '1')
		{

			var company_sms_email_provider = $("#company_sms_email_provider").val();

			if(company_sms_email_provider == '')
			{
				var message = "Please Select Atleast One Provider";
				valid('company_sms_email_provider',message);
				return false;
			}
			else
			{
				var company_sms_email_current_tariff_arr = Array();
				var company_sms_email_qty_per_month_arr = Array();

				var company_sms_email_provider_arr = $('#company_sms_email_provider').val().split(",");

				for(var i = 0; i < company_sms_email_provider_arr.length; i++)
				{

					var company_sms_email_current_tariff = $("#company_sms_email_current_tariff_"+company_sms_email_provider_arr[i]).val();
					var company_sms_email_qty_per_month = $("#company_sms_email_qty_per_month_"+company_sms_email_provider_arr[i]).val();

					company_sms_email_current_tariff_arr.push(company_sms_email_current_tariff);
					company_sms_email_qty_per_month_arr.push(company_sms_email_qty_per_month);

				}

				var company_sms_email_relation = $('#company_sms_email_relation').val();
				var company_sms_email_system_details = $('#company_sms_email_system_details').val();
				var company_sms_email_lead = $('#company_sms_email_lead').val();
				
				
				formdata.append('company_sms_email_provider_arr', company_sms_email_provider_arr);
				formdata.append('company_sms_email_current_tariff_arr', company_sms_email_current_tariff_arr);
				formdata.append('company_sms_email_qty_per_month_arr', company_sms_email_qty_per_month_arr);
				formdata.append('company_sms_email_relation', company_sms_email_relation);
				formdata.append('company_sms_email_system_details', company_sms_email_system_details);
				formdata.append('company_sms_email_lead', company_sms_email_lead);

			}

		}
		// SMS EMAIL Ends

		formdata.append('toll_using', toll_using);
		formdata.append('sms_email_using', sms_email_using);
		// formdata.append('ill_using', ill_using);
		// formdata.append('mpls_using', mpls_using);

		formdata.append('company_id', company_id);
		formdata.append('request_id', request_id);
		formdata.append('cloud_id', cloud_id);
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

					var cloud_id_new = res_arr[1];

					$("#cloud_id").val(cloud_id_new);

					$(".is_save").removeClass('hidden');
					$(".is_save").css('display','block');
					setTimeout(function(){
						$(".is_save").slideUp('fast');
						$(".is_save").addClass('hidden');
					}, 5000);
				}
			}
		});

		success = '1';
	}

	if(success == '1')
	{
		page = page + 1;
		$("#page").val(page);

		$('html,body').animate({scrollTop: $("html body").offset().top - 100},'slow');

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
		$('html,body').animate({scrollTop: $("html body").offset().top - 100},'slow');
	}
	
	//return false;
}

// Save As Draft Ends
