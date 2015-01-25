<?php	
	header("Content-type: text/css;");
	$current_url = dirname(__FILE__);
	$wp_content_pos = strpos($current_url, 'wp-content');
	$wp_content = substr($current_url, 0, $wp_content_pos);
	require_once($wp_content . 'wp-load.php');

	global $options;

	// Get the options from the databases
    $body_bg_color = $options['theme_body_bg_color'];
    $body_font = $options['theme_body_font'];
    $body_font_size = $options['theme_body_font_size'];
    $body_font_weight = $options['theme_body_font_weight'];
    $body_font_color = $options['theme_body_font_color'];
	$logo_font = $options['theme_logo_font'];
    $logo_font_size = $options['theme_logo_font_size']; 
	$logo_font_weight = $options['theme_logo_font_weight'];
    $logo_font_color = $options['theme_logo_font_color']; 
    $navigation_font = $options['theme_navigation_font'];
    $navigation_font_size = $options['theme_navigation_font_size'];  
    $navigation_font_weight = $options['theme_navigation_font_weight'];  
	$heading_font = $options['theme_heading_font'];
	$heading_font_weight = $options['theme_heading_font_weight'];
	$heading_font_color = $options['theme_heading_font_color'];
    $link_color = $options['theme_link_color'];
    $link_hover_color = $options['theme_link_hover_color'];
    $secondary_color = $options['theme_secondary_color'];
    $primary_color = $options['theme_primary_color'];
	$secondary_color = $options['theme_secondary_color'];
	$navigation_color = $options['theme_navigation_color'];
	$navigation_hover_color = $options['theme_navigation_hover_color'];
?>
<?php /* Font Stack */ echo '
body, p, pre, form, input, textarea, select, div.content ul li, div.content ol li { font-family: ' . $body_font . ', sans-serif; font-size: ' . $body_font_size . '; font-weight:' . $body_font_weight . '; }
h1, h2, h3, h4, h5, h6, .caption-right { font-family: ' . $heading_font . ', sans-serif; font-weight:' . $heading_font_weight . '; }
h1.logo { font-family: ' . $logo_font . ', sans-serif; font-size: ' . $logo_font_size . '; font-weight: ' . $logo_font_weight . '; color:'. $logo_font_color .'; }
h1.logo a, h1.logo a:hover { color:'. $logo_font_color .'; }
nav a, div#menu a {font-family: '. $navigation_font .', sans-serif; font-size: ' . $navigation_font_size . '; font-weight:' . $navigation_font_weight . '; }
a.more, a.more:visited  { font-weight:' . $body_font_weight . '; }

'; ?>


<?php /* Color Scheme */ echo '
.primary { background:' . $primary_color . '; }
.secondary { background:' . $secondary_color . '; }
body,
html,
p {
    color: ' . $body_font_color . ';
}
body{
    background:' . $body_bg_color . ';
}
h1, h2, h3, h4, h5, h6 { 
	color:' . $heading_font_color . '; 
}
a, a:visited { 
    color:' . $link_color . ';  
}
a:hover { 
    color:' . $link_hover_color . ';  
}
nav ul li a, nav ul li a:visited {
    color: ' . $navigation_color . ';
}
nav ul li a:hover {
    color:' . $navigation_hover_color . '; 
}
nav ul li.current-menu-item a {
    color:' . $navigation_hover_color . '; 
}
nav ul.children li a, nav ul.sub-menu li a {
    color: ' . $navigation_color . ';
}
nav ul.children li a:hover, nav ul.sub-menu li a:hover {
    color: ' . $navigation_hover_color . ';
}
div.teaser div.bottom {
    border-bottom: 5px solid ' . $primary_color . '; }

div.teaser .pos p, div.teaser .pos a  {
    color:' . $secondary_color . ';
}

'; ?>