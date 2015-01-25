<?php

	// LISTS
	function create_list($atts, $content){
		extract(shortcode_atts(array(
			'style' => 'check'
		), $atts));
		
		$new_content = remove_wpautop( $content );
		return '<ul class="'.$style.'">'. $new_content .'</span></ul>';
	}
	add_shortcode('list', 'create_list');
	
	
	// ---------- TINYMCE BUTTONS ---------- //

	function add_jb_lists_button() {
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		 return;
	   if ( get_user_option('rich_editing') == 'true') {
		 add_filter('mce_external_plugins', 'add_jb_lists_tinymce_plugin');
		 add_filter('mce_buttons_3', 'register_jb_lists_button');
	   }
	}

	add_action('init', 'add_jb_lists_button');

	function register_jb_lists_button($buttons) {
	   array_push($buttons, "jb_lists" );
	   return $buttons;
	}

	function add_jb_lists_tinymce_plugin($plugin_array) {
		
		$plugin_array['jb_lists'] = get_template_directory_uri() .'/inc/shortcodes/lists/lists.js';	   
		return $plugin_array;
		
	}

	add_filter( 'tiny_mce_version', 'my_refresh_mce');

	// ---------- END TINYMCE BUTTONS ---------- //

?>