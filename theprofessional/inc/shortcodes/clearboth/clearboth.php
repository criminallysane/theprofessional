<?php

	// clearboth
	function clearboth($atts,  $content = null){
		
		return '<div class="clearboth"></div>';
	}
	add_shortcode('clearboth', 'clearboth');
	
	
	// ---------- TINYMCE BUTTONS ---------- //

	function add_jb_clearboth_button() {
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		 return;
	   if ( get_user_option('rich_editing') == 'true') {
		 add_filter('mce_external_plugins', 'add_jb_clearboth_tinymce_plugin');
		 add_filter('mce_buttons_3', 'register_jb_clearboth_button');
	   }
	}

	add_action('init', 'add_jb_clearboth_button');

	function register_jb_clearboth_button($buttons) {
	   array_push($buttons, "jb_clearboth" );
	   return $buttons;
	}

	function add_jb_clearboth_tinymce_plugin($plugin_array) {
		
		$plugin_array['jb_clearboth'] = get_template_directory_uri() .'/inc/shortcodes/clearboth/clearboth.js';	   
		return $plugin_array;
		
	}

	add_filter( 'tiny_mce_version', 'my_refresh_mce');

	// ---------- END TINYMCE BUTTONS ---------- //

?>