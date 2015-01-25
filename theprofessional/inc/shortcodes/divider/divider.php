<?php

	// DIVIDER
	function divider($atts,  $content = null){
		
		extract(shortcode_atts(array(
			'style' => ''
		), $atts));
		
		if ( $style == 'top' ) { // Thin divider With Top Link
			return '<div class="hr top"><a href="#top">'. _x( 'top', 'Divider "top" link label.', 'jb_theme' ) .'</a></div>';
		} elseif ( $style == 'thick' ) { // Thick divider
			return '<div class="hr thick"></div>';
		} else { // Thin divider
			return '<div class="hr"></div>';
		}
		
	}
	add_shortcode('divider', 'divider');
	
	
	// ---------- TINYMCE BUTTONS ---------- //

	function add_jb_divider_button() {
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	   if ( get_user_option('rich_editing') == 'true') {
			add_filter('mce_external_plugins', 'add_jb_divider_tinymce_plugin');
			add_filter('mce_buttons_3', 'register_jb_divider_button');
	   }
	}

	add_action('init', 'add_jb_divider_button');

	function register_jb_divider_button($buttons) {
		array_push($buttons, "jb_divider" );
		return $buttons;
	}

	function add_jb_divider_tinymce_plugin($plugin_array) {		
		$plugin_array['jb_divider'] = get_template_directory_uri() .'/inc/shortcodes/divider/divider.js';	   
		return $plugin_array;		
	}

	add_filter( 'tiny_mce_version', 'my_refresh_mce');

	// ---------- END TINYMCE BUTTONS ---------- //

?>