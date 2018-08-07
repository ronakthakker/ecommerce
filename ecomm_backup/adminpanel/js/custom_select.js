	// Select2
	jQuery("#category_id, #sub_category_id,#deal_type_id,#brand_id,.select_component").select2();
	jQuery('#select-search-hide').select2({
		minimumResultsForSearch: -1
	});
	
	// This will empty first option in select to enable placeholder
	jQuery('select option:first-child').text('');
