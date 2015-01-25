<?php

	// QUOTE RIGHT
	function quote_right($atts, $content){
		
		$new_content = remove_wpautop($content);
		
		return '<blockquote class="third alignright"><p>'. $new_content .'</p></blockquote>';
	}
	add_shortcode('quote_right', 'quote_right');
	
	// QUOTE LEFT
	function quote_left($atts, $content){
		
		$new_content = remove_wpautop($content);
		
		return '<blockquote class="third alignleft"><p>'. $new_content .'</p></blockquote>';
	}
	add_shortcode('quote_left', 'quote_left');
	
	
	// ---------- TINYMCE BUTTONS ---------- //

	function add_jb_quotes_button() {
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		 return;
	   if ( get_user_option('rich_editing') == 'true') {
		 add_filter('mce_external_plugins', 'add_jb_quotes_tinymce_plugin');
		 add_filter('mce_buttons_3', 'register_jb_quotes_button');
	   }
	}

	add_action('init', 'add_jb_quotes_button');

	function register_jb_quotes_button($buttons) {
	   array_push($buttons, "jb_quotes" );
	   return $buttons;
	}

	function add_jb_quotes_tinymce_plugin($plugin_array) {
		
		$plugin_array['jb_quotes'] = get_template_directory_uri() .'/inc/shortcodes/quotes/quotes.js';	   
		return $plugin_array;
		
	}

	add_filter( 'tiny_mce_version', 'my_refresh_mce');

	// ---------- END TINYMCE BUTTONS ---------- //

?>