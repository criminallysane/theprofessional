<?php

	// BUTTON
	function button($atts, $content){
	
		extract(shortcode_atts(array(
			'link' => '#',
			'align' => 'left', 		// left | center | right
			'style' => 'normal', 	// normal | secondary
			'textcolor' => '',
			'size' => 'normal',		// normal | large
			'margin' => '20'		// normal | large
		), $atts));
		
		$styling = 'style="margin-top:'. $margin .'px;"';
		
		if ( $size == 'large' ) {
			$size = ' large';
		} else {
			$size = '';
		}
		
		if ( $style ==  "secondary" ) {
			$style = "secondary-button ";
		} else {
			$style = "button ";
		}
		
		if ( $align == "center" ) {
			
			return '<div class="button-center"><a href="'. $link .'" class="'. $style . $align . $size .'"  '. $styling .'>'.$content.'</a></div>';
			
		} else {
			
			return '<a href="'. $link .'" class="'. $style . $align . $size .'"  '. $styling .'>'.$content.'</a>';
		
		}
		
	}
	add_shortcode('button', 'button');
	
	
	// ---------- TINYMCE BUTTONS ---------- //

	function add_jb_linkButton_button() {
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		 return;
	   if ( get_user_option('rich_editing') == 'true') {
		 add_filter('mce_external_plugins', 'add_jb_linkButton_tinymce_plugin');
		 add_filter('mce_buttons_3', 'register_jb_linkButton_button');
	   }
	}

	add_action('init', 'add_jb_linkButton_button');

	function register_jb_linkButton_button($buttons) {
	   array_push($buttons, "jb_linkButton" );
	   return $buttons;
	}

	function add_jb_linkButton_tinymce_plugin($plugin_array) {
		
		$plugin_array['jb_linkButton'] = get_template_directory_uri() .'/inc/shortcodes/button/button.js';	   
		return $plugin_array;
		
	}

	add_filter( 'tiny_mce_version', 'my_refresh_mce');

	// ---------- END TINYMCE BUTTONS ---------- //

?>