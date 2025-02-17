$( document ).ready(function() {
	$('#home_delivery_radio').change(function() {
		if($(this).is(':checked')) {
			$('#self_pickup_radio').prop('checked', false);
		}
	});

	$('#self_pickup_radio').change(function() {
		if($(this).is(':checked')) {
			$('#home_delivery_radio').prop('checked', false);
		}
	});
});
