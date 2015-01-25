<?php
function jb_slider_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id' => ''
	), $atts ) );
	global $slider_on;
	$caption = null;
	$slider_on = true;
	$slider = new WP_query('post_type=slides&p=' . $id );
	if( $slider) {
		$slides = get_post_meta( $slider->post->ID, 'theme_slider_item', TRUE );
	}
	$output = '<ul id="slider">';
	foreach( $slides as $slide ) {
		$output .= '<li><a href="'. $slide['theme_slider_item_url'] . '"><img src="' . $slide['theme_slider_item_image'] . '"><div class="caption-right">' . $slide['theme_slider_item_caption'] . '</div></a></li>';
	}
	$output .= '</ul>';
	return $output;
}
add_shortcode('slider', 'jb_slider_shortcode');
?>