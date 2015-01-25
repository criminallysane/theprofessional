<?php
	
	// DOWNLOAD BOX
	function jb_box($atts, $content){
		
		extract(shortcode_atts(array(
			'style' => ''
		), $atts));
		
		$new_content = remove_wpautop($content);
		
		if ( $style == 'red' ) {
			return '<div class="content_box red_box">'. $new_content .'</div>';
		} elseif ( $style == 'green' ) {
			return '<div class="content_box green_box">'. $new_content .'</div>';
		} elseif ( $style == 'blue' ) {
			return '<div class="content_box blue_box">'. $new_content .'</div>';
		} else {
			return '<div class="content_box">'. $new_content .'</div>';
		}
		
	}
	add_shortcode('box', 'jb_box');
	
	
	// ---------- TINYMCE BUTTONS ---------- //

	function add_jb_boxes_button() {
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
		if ( get_user_option('rich_editing') == 'true') {
			add_filter('mce_external_plugins', 'add_jb_boxes_tinymce_plugin');
			add_filter('mce_buttons_3', 'register_jb_boxes_button');
		}
	}

	add_action('init', 'add_jb_boxes_button');

	function register_jb_boxes_button($buttons) {
	   array_push($buttons, "jb_boxes" );
	   return $buttons;
	}

	function add_jb_boxes_tinymce_plugin($plugin_array) {
		
		$plugin_array['jb_boxes'] = get_template_directory_uri() .'/inc/shortcodes/boxes/boxes.js';	   
		return $plugin_array;
		
	}

	add_filter( 'tiny_mce_version', 'my_refresh_mce');

	// ---------- END TINYMCE BUTTONS ---------- //

?>