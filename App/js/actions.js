	$('.simple').on('change', function(e){

		var value = $(this).val() + $(this).data('unit');

		$($(this).data('target')).css($(this).data('attrib'), value);
		$("#returnData").html(value);


	});

	$('.shadowvalues').on('change', function(e){

		var classtarget = $(this).data('target'),
			bsX = $(classtarget+"-bsX").val() + $(classtarget+"-bsX").data('unit'),
			bsY = $(classtarget+"-bsY").val() + $(classtarget+"-bsY").data('unit'),
			bsBlur = $(classtarget+"-bsBlur").val() + $(classtarget+"-bsBlur").data('unit'),
			bsSpread = $(classtarget+"-bsSpread").val() + $(classtarget+"-bsSpread").data('unit'),
			bsType = $(classtarget+"-bsType").val(),
			bsColour = $(classtarget+"-bsColour").data('unit') + $(classtarget+"-bsColour").val();

		if (bsType == "inset") {
			var complete = bsColour+" "+bsX+" "+bsY+" "+bsBlur+" "+bsSpread+" "+bsType;
		} else {
			var complete = bsColour+" "+bsX+" "+bsY+" "+bsBlur+" "+bsSpread;
		}

		$(classtarget+"boxShadow").val(complete);
		$($(classtarget+"boxShadow").data('target')).css("box-shadow", $(classtarget+"boxShadow").val() )

		$("#returnData").html(complete);

	});