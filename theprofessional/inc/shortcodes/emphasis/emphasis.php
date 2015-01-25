<?php

	// EMPHASIS
	function emphasis($atts, $content){
	
		extract(shortcode_atts(array(
			'align' => 'center' // Left | Right | Center
		), $atts));		
		
		$new_content = remove_wpautop( $content );
		return '<span class="emphasis '. $align .'">'. $new_content .'</span>';
		
	}
	add_shortcode('emphasis', 'emphasis');
	
	
	// ---------- TINYMCE BUTTONS ---------- //

	function add_jb_emphasis_button() {
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		 return;
	   if ( get_user_option('rich_editing') == 'true') {
		 add_filter('mce_external_plugins', 'add_jb_emphasis_tinymce_plugin');
		 add_filter('mce_buttons_3', 'register_jb_emphasis_button');
	   }
	}

	add_action('init', 'add_jb_emphasis_button');

	function register_jb_emphasis_button($buttons) {
	   array_push($buttons, "jb_emphasis" );
	   return $buttons;
	}

	function add_jb_emphasis_tinymce_plugin($plugin_array) {
		
		$plugin_array['jb_emphasis'] = get_template_directory_uri() .'/inc/shortcodes/emphasis/emphasis.js';	   
		return $plugin_array;
		
	}

	add_filter( 'tiny_mce_version', 'my_refresh_mce');

	// ---------- END TINYMCE BUTTONS ---------- //

?>