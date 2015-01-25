<?php 
function jb_contact_form($atts, $content = null) {
	
	global $options;

	//extracts our attrs . if not set set default
	extract(shortcode_atts(array(
	
		'email' => $options['jb_contact_form_emails']
	
	), $atts));
	
	$output = '
	<form id="contactform" action="'.get_bloginfo('template_url').'/inc/contact-form.php" method="post" enctype="multipart/form-data"> 
		<fieldset>
			<div class="errorbox"></div>
			<div>
				<label for="name">Full Name</label>
				<input type="text" id="name" name="name" maxlength="75" value="" tabindex="1" />
     		</div>
     		<div>
     			<label for="email">Email</label>
       				<input type="text" id="email" name="email" maxlength="75" value="" tabindex="2" />
			</div>
     		<div>
     			<label for="subject">Subject</label>
       				<input type="text" id="subject" name="subject" maxlength="75" value="" tabindex="3" />
			</div>
		  	<div>
				<label for="message">Message</label>
					<textarea id="message" name="message" tabindex="4"></textarea>
				<input type="submit" class="button style1" value="Send" />
				<input type="hidden" name="c_email" id="c_email" value="'.$email.'" />
		  	</div>
		</fieldset>          
	</form>';										
	return $output;
}
add_shortcode('contact_form', 'jb_contact_form'); 
?>
