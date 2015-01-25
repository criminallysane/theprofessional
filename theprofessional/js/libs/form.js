/*
 * 	Contact Form Validation v1.0
 *	By Simon Bouchard <www.simonbouchard.com>
 *	You need at least PHP v5.2.x with JSON support for the live validation to work.
 */

var j = jQuery.noConflict();

j(document).ready(function(){  

	j('#contactform').submit(function() {

		// Disable the submit button
		j('#contactform input[type=submit]')
			.attr('value', 'Sending message')
			.attr('disabled', 'disabled');

		// AJAX POST request
		j.post(
			j(this).attr('action'),
			{
				name:j('#name').val(),
				email:j('#email').val(),
				message:j('#message').val(),
				c_email:j('#c_email').val()
			},
			function(errors) {
				// No errors
				if (errors == null) {
					j('#contactform')
						.hide()
						.html('<h4>Thank you</h4><p>Your message has been successfuly sent.</p>')
						.show();
				}

				// Errors
				else {
					// Re-enable the submit button
					j('#contactform input[type=submit]')
						.removeAttr('disabled')
						.attr('value', 'Send');

					// Technical server problem, the email could not be sent
					if (errors.server != null) {
						alert(errors.server);
						return false;
					}

					// Empty the errorbox and reset the error alerts
					j('#contactform .errorbox').html('<ul></ul>').show();
					j('#contactform label').removeClass('alert');

					// Loop over the errors, mark the corresponding input fields,
					// and add the error messages to the errorbox.
					for (field in errors) {
						if (errors[field] != null) {
							j('#' + field).parent('label').addClass('alert');
							j('#contactform .errorbox ul').append('<li>' + errors[field] + '</li>');
						}
					}
				}
			},
			'json'
		);

		// Prevent non-AJAX form submission
		return false;
	});

});