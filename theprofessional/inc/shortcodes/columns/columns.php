<?php
	
	// FOURTH
	function fourth($atts, $content){
		
		extract(shortcode_atts(array(
			'end' => ''
		), $atts));
		
		$new_content = remove_wpautop($content);
		
		if ( $end == 'true' ) {
			return '<div class="fourth end">'. $new_content .'</div>';
		} else {
			return '<div class="fourth">'. $new_content .'</div>';
		}
		
	}
	add_shortcode('fourth', 'fourth');
	
	// THIRD
	function third($atts, $content){
		
		extract(shortcode_atts(array(
			'end' => ''
		), $atts));
		
		$new_content = remove_wpautop($content);
		
		if ( $end == 'true' ) {
			return '<div class="third end">'. $new_content .'</div>';
		} else {
			return '<div class="third">'. $new_content .'</div>';
		}
		
	}
	add_shortcode('third', 'third');
	
	// HALF
	function half($atts, $content){
	
		extract(shortcode_atts(array(
			'end' => ''
		), $atts));
		
		$new_content = remove_wpautop($content);
		
		if ( $end == 'true' ) {
			return '<div class="half end">'. $new_content .'</div>';
		} else {
			return '<div class="half">'. $new_content .'</div>';
		}
		
	}
	add_shortcode('half', 'half');
	
	// TWO THIRDS
	function two_thirds($atts, $content){
	
		extract(shortcode_atts(array(
			'end' => ''
		), $atts));
		
		$new_content = remove_wpautop($content);
		
		if ( $end == 'true' ) {
			return '<div class="two-thirds end">'. $new_content .'</div>';
		} else {
			return '<div class="two-thirds">'. $new_content .'</div>';
		}
	}
	add_shortcode('two_thirds', 'two_thirds');
	
	
	// ---------- TINYMCE BUTTONS ---------- //

	function add_jb_columns_button() {
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		 return;
	   if ( get_user_option('rich_editing') == 'true') {
		 add_filter('mce_external_plugins', 'add_jb_columns_tinymce_plugin');
		 add_filter('mce_buttons_3', 'register_jb_columns_button');
	   }
	}

	add_action('init', 'add_jb_columns_button');

	function register_jb_columns_button($buttons) {
	   array_push($buttons, "jb_columns" );
	   return $buttons;
	}

	function add_jb_columns_tinymce_plugin($plugin_array) {
		
		$plugin_array['jb_columns'] = get_template_directory_uri() .'/inc/shortcodes/columns/columns.js';	   
		return $plugin_array;
		
	}

	add_filter( 'tiny_mce_version', 'my_refresh_mce');

	// ---------- END TINYMCE BUTTONS ---------- //

?>