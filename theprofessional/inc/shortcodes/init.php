<?php
	
	// ALLOW SHORTCODES IN WIDGETS
	add_filter('widget_text', 'do_shortcode');
	
	// BOXES
	include('boxes/boxes.php');
	
	// BUTTONS
	include('button/button.php');
	
	// CLEARBOTH
	include('clearboth/clearboth.php');
	
	// COLUMNS
	include('columns/columns.php');
	
	// DIVIDER
	include('divider/divider.php');
	
	// EMPHASIS
	include('emphasis/emphasis.php');
	
	// HIGHLIGHT
	include('highlight/highlight.php');
	
	// LISTS
	include('lists/lists.php');	
	
	// MAP
	include('map/map.php');	
	
	// POST LIST
	include('postlist/postlist.php');
	
	// QUOTES
	include('quotes/quotes.php');
	
	// TOGGLE
	include('toggle/toggle.php');

	// TABS
	include('tabs/tabs.php');

	// CONTACT FORM
	include('contact/contact.php');

	// CONTACT FORM
	include('slider/slider.php');
	
	// TinyMCE VERSION HACK
	function my_refresh_mce($ver) {
	  $ver += 3;
	  return $ver;
	}
	
	// Quicktags
	function jb_quicktags() {
		wp_enqueue_script(
			'jb_quicktags',
			get_template_directory_uri() .'/inc/shortcodes/quicktags.js',
			array( 'quicktags' )
		);
	}
	add_action( 'admin_print_scripts', 'jb_quicktags' );

	if ( !function_exists( 'remove_wpautop' ) ) {

		function remove_wpautop( $content ) {
		
			$content = do_shortcode( shortcode_unautop( $content ) );
			$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
			return $content;	
		
		}

	}

	function empty_tag_fix( $content ) {

		$array = array (
			'<p>[' => '[', 
			']</p>' => ']',
			']<br />' => ']'
		);

		$content = strtr( $content, $array );
		return $content;
		
	}
	add_filter( 'the_content', 'empty_tag_fix' );

	//Title
	function column_title($atts, $content = null) {
		extract(shortcode_atts(array(
			'last' => ''
		), $atts));
		return '<h3 class="title"><span>'.do_shortcode($content).'</span></h3>';	
	}
	add_shortcode('title', 'column_title');	
	
?>