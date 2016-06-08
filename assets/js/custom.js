	
	/* AJAX call to get avg height and results dates */
	var requestProcess = false;
	$('#showresults').hide();
	$(document).on('click', '#heightCalculate', 
		function(){				
			if (requestProcess) { // don't do anything if an AJAX request is pending
				return;
			}
			$('#submit').click(function(){			
				var queryStr = $( "form" ).serialize();					
				console.log(queryStr);					
				$.ajax({
					type: "POST",
					url: "app/LoadData.php?"+queryStr, 
					datatype : "json",
					success: function(data) 
					{					
						$('#showresults').show();
						$('#showresults').empty();
						var result = $.parseJSON(data);
						$.each(result, function(key, value) {						
						 $('#showresults').append(
							  $('<div />').val(key).html(value)
						  );
						})					
						requestProcess = false;
					}
				});
				$(document).off('click');
			});
			 requestProcess = true;
		}
	);
		
	$(document).ready(function () {
		/* Form validation */
		$("#heightCalculate").validate({
			rules: {
				height: {
					required: true,
					digits: true,
					minlength: 2,
					maxlength: 20					
				},
				sex: {
					required: true
				}				
			},
			messages: {
				height: {
					required: "Please enter height",
					minlength: "Your height must consist of at least 2 characters"
				},
				sex: {
					required: "Please select gender"
				}
			},
			errorElement: "em",
			errorPlacement: function ( error, element ) {
				// Add the `help-block` class to the error element
				error.addClass( "help-block" );

				if ( element.prop( "type" ) === "checkbox" ) {
					error.insertAfter( element.parent( "label" ) );
				} else {
					error.insertAfter( element );
				}
			},
			highlight: function ( element, errorClass, validClass ) {
				$( element ).parents( ".col-sm-8" ).addClass( "has-error" ).removeClass( "has-success" );
			},
			unhighlight: function (element, errorClass, validClass) {
				$( element ).parents( ".col-sm-8" ).addClass( "has-success" ).removeClass( "has-error" );
			}
		});		
	});	
		
	$.validator.setDefaults({
		submitHandler: function () {
		$('#success').addClass("alert alert-success").html('Height submitted').delay(7000).fadeOut(300);		
		}
	});