<?php

	// GOOGLE MAP
	function googleMap ($atts, $content = null) {
		extract(shortcode_atts(array(			
			"height" => '180',
			"zoom" => "15",
			"address" => ''
		), $atts));

		if ( $address ) {
			
			$rand = rand( 0, 9999 );
			
			return '<div id="map_canvas-'. $rand .'" class="google-map" style="height: '. $height .'px;"></div>
			
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					
					var mapOptions = {
						zoom: '. $zoom .',
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						disableDefaultUI: true,
						scrollwheel: false
					}
					
					var map = new google.maps.Map(document.getElementById("map_canvas-'. $rand .'"), mapOptions);					
					
					geocoder = new google.maps.Geocoder();
					var address = "'. $address .'";
					geocoder.geocode( { "address": address }, 
						function(results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								map.setCenter(results[0].geometry.location);
								var marker = new google.maps.Marker({
									map: map, 
									position: results[0].geometry.location
								});
							}
						});
				});
			</script>';
			
		}
	
	}
	add_shortcode("map", "googleMap");

		
	// ---------- TINYMCE BUTTONS ---------- //

	function add_jb_googleMap_button() {
	   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
		 return;
	   if ( get_user_option('rich_editing') == 'true') {
		 add_filter('mce_external_plugins', 'add_jb_googleMap_tinymce_plugin');
		 add_filter('mce_buttons_3', 'register_jb_googleMap_button');
	   }
	}

	add_action('init', 'add_jb_googleMap_button');

	function register_jb_googleMap_button($buttons) {
	   array_push($buttons, "jb_googleMap" );
	   return $buttons;
	}

	function add_jb_googleMap_tinymce_plugin($plugin_array) {
		
		$plugin_array['jb_googleMap'] = get_template_directory_uri() .'/inc/shortcodes/map/map.js';	   
		return $plugin_array;
		
	}

	add_filter( 'tiny_mce_version', 'my_refresh_mce');

	// ---------- END TINYMCE BUTTONS ---------- //

?>