<?php 
function tabs_shortcode( $atts, $content = null ) {
	extract(shortcode_atts(array(), $atts));
	global $tab_counter_1;
	global $tab_counter_2;

	$tab_counter_1++;
	$tab_counter_2++;
	$output = '<div class="tabs_table">';	
	$output .= '<ul class="tabs">';
	$count = 1;
	foreach ($atts as $tab) {
		if($count == 1){$first = 'selected';}else{$first = '';}
		$output .= '<li><a title="' .$tab. '" rel="tab-' . $tab_counter_1 . '" class="'.$first.'">' .$tab. '</a></li>';
		$tab_counter_1++;
		$count++;
	}
	$output .= '</ul><div class="panes">';
	$output .= do_shortcode($content) .'</div></div>';
	return $output;

}
add_shortcode('tabs', 'tabs_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	Tab Panes Shortcodes
/*-----------------------------------------------------------------------------------*/

function tab_shortcode( $atts, $content = null ) {
	global $tab_counter_2;
	$output = '<div class="tab-content" id="tab-' . $tab_counter_2 . '">' . do_shortcode($content) .'</div>';
	$tab_counter_2++;
	return $output;
}
add_shortcode('tab', 'tab_shortcode');
?>