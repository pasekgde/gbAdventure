(function($){
	"use strict";

	

	// on document ready
	$(document).ready(function(){

		var body = $('body');

		// ajax action
		body.tourmaster_ajax();
		//jquery validate
		$.validate({
		   focusInvalid: false,
    		invalidHandler: function(form, validator) {

		        if (!validator.numberOfInvalids())
		            return;

		        $('html, body').animate({
		            scrollTop: $(validator.errorList[0].element).offset().top
		        }, 2000);

		    }
		  });

		$('select#pickup-service').on('change', function() {
		  	if(this.value!="No, Thanks"){
  				$("#pickuparea").removeClass('hiddenDode');  
  				$("#phonepickuparea").removeClass('hiddenDode');  
		  	}else{
		  		$("#pickuparea").addClass('hiddenDode');
		  		$("#phonepickuparea").addClass('hiddenDode');
		  	}
		});	
	})

})(jQuery);
