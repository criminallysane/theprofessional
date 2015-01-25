<?php
/* ========================================================================================================================

Load OptionTree

======================================================================================================================== */

/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_true' );

/**
 * Required: set 'ot_theme_mode' filter to true.P:1
 */
add_filter( 'ot_theme_mode', '__return_true' );

global $options;
$options = get_option('option_tree');

/**
 * Required: include OptionTree.
 */
include_once( get_template_directory() . '/admin/ot-loader.php' );
include_once( get_template_directory() . '/inc/theme-options.php' );

include_once( get_template_directory() . '/inc/theme-options.php' );

/*	----------------------------------------------------------
	Content Width
= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
if ( ! isset( $content_width ) ) $content_width = 980;

/*-----------------------------------------------------------------------------------*/
/* Google Fonts */
/*-----------------------------------------------------------------------------------*/

include_once( get_template_directory() . '/inc/google-webfonts.php'); 

function google_webfonts_include(){
	global $options;
	if( is_admin() ) return;
	
	$google_fonts = get_google_webfonts(); 
	foreach( $google_fonts as $font ) {
		$google_webfonts_array[$font['family']]['label'] = $font['family'];
		$google_webfonts_array[$font['family']]['value'] = $font['family'];
	}
	
	$websafe_fonts = array('"Helvetica Neue", Helvetica, Arial',
							'Baskerville, Times, "Times New Roman"',
							'Georgia, Times, "Times New Roman"',
							'Garamond, "Hoefler Text", Palatino, "Palatino Linotype"',
							'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman"',	
							'Tahoma, Verdana, Geneva',	
							'Times, "Times New Roman", Georgia',		
							'"Trebuchet MS", Tahoma, Arial',
							'Verdana, Tahoma, Geneva'
							);	
							
	$heading_font = $options['theme_heading_font'];
	$body_font = $options['theme_body_font'];
	$logo_font = $options['theme_logo_font'];
	$load_gfont = false;
	
	if (in_array( array('label' => $heading_font, 'value' => $heading_font), $google_webfonts_array)) {
		$load_gfont = true;
	}
	if (in_array( array('label' => $body_font, 'value' => $body_font), $google_webfonts_array)) {
		$load_gfont = true;
	}
	if (in_array( array('label' => $logo_font, 'value' => $logo_font), $google_webfonts_array)) {
		$load_gfont = true;
	}	
	$gfonts_load_array = array($heading_font, $logo_font, $body_font);
	$gfonts_load_array = array_unique($gfonts_load_array); 

	if( !empty( $gfonts_load_array ) && $load_gfont == true) {
		foreach($gfonts_load_array as $gfont) {
			if( !in_array($gfont, $websafe_fonts) ) {
				$gfont = str_replace(' ', '+' , $gfont ) . ':100,300,n,i,b,bi,';
				wp_enqueue_style($gfont,'http://fonts.googleapis.com/css?family=' . $gfont);
			}
		}
	}
}
add_action('init', 'google_webfonts_include');

/*-----------------------------------------------------------------------------------*/
/* Get the Logo */
/*-----------------------------------------------------------------------------------*/

function theme_get_logo() {

	global $options;
	$logoType = $options['theme_logo_type'];
	
	if($logoType == 'text') {
		
		$logoText = $options['theme_logo_text'];		
		$html = '<h1 class="logo"><a href="'.get_bloginfo('url').'" title="'.get_bloginfo('name').'">'.$logoText.'</a></h1>';

	} else {

		$logoImage = $options['theme_logo_image'];		
		$html = '<a class="logo" href="'.get_bloginfo('url').'" title="'.get_bloginfo('name').'"><img src="'.$logoImage.'"</img></a>';
					
	} 	
	echo $html;
}



/*-----------------------------------------------------------------------------------*/
/* Register post thumbnail(s) */
/*-----------------------------------------------------------------------------------*/

add_theme_support('post-thumbnails');
add_image_size('project-large', 980, 363, true);
add_image_size('project-small', 300, 99999, false);
add_image_size('project-thumbnail', 50, 50, true);
add_image_size('post-small', 217, 140, true);
add_image_size('large', 980, 99999, true);
add_image_size('medium', 980, 99999, true);

/*-----------------------------------------------------------------------------------*/
/* Add default posts and comments RSS feed links to head */
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* Register custom menu(s) */
/*-----------------------------------------------------------------------------------*/

function register_custom_menus() {
	register_nav_menus(
		array(
			'main-menu' => 'Top Navigation'
		)
	);
}
add_action( 'init', 'register_custom_menus' );

/*-----------------------------------------------------------------------------------*/
/* Get custom menu // wp_nav_menu */
/*-----------------------------------------------------------------------------------*/

function get_custom_menu() {
	if(function_exists('wp_nav_menu')) {
		$lp_showMenu = wp_nav_menu(array('theme_location' => 'main-menu', 'menu' => 'main-menu', 'container' => '', 'depth' => '2'));
	}
	else {
		$lp_showMenu = '<ul>'.wp_list_pages('title_li&depth=2').'</ul>';
	}
	echo $lp_showMenu;
}

/*-----------------------------------------------------------------------------------*/
/* Register sidebar(s) */
/*-----------------------------------------------------------------------------------*/
	
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Home Sidebar',
		'description' => 'The dynamic sidebar used on the front page at the bottom.',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'description' => 'Your page sidebar. Displays on all pages that have a sidebar.',
		'before_widget' => '<div class="sidebar-item">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title"><span>',
		'after_title' => '</span></h3>',
	));
	register_sidebar(array(
		'name' => 'Contact Page Sidebar',
		'description' => 'Your contact page sidebar.',
		'before_widget' => '<div class="sidebar-item">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title"><span>',
		'after_title' => '</span></h3>',
	));
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'description' => 'Your blog sidebar. Displays on all blog area.',
		'before_widget' => '<div class="sidebar-item">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title"><span>',
		'after_title' => '</span></h3>',
	));
	register_sidebar(array(
		'name' => 'Blog Sidebar - Single',
		'description' => 'Your blog sidebar for single post(s).',
		'before_widget' => '<div class="sidebar-item">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title"><span>',
		'after_title' => '</span></h3>',
	));
}

/*-----------------------------------------------------------------------------------*/
/* WP_HEAD */
/*-----------------------------------------------------------------------------------*/

// JavaScript inclusion
function js_include() {
	
	// jQuery
	wp_enqueue_script('jquery');

	// Modernizr
	wp_register_script( 'modernizr', get_template_directory_uri().'/js/libs/modernizr-1.7.min.js');
	wp_enqueue_script('modernizr');

	// Easing
	wp_register_script( 'easing', get_template_directory_uri().'/js/libs/jquery.easing.1.3.js');
	wp_enqueue_script('easing');
	
	// Cycle
	wp_register_script( 'cycle', get_template_directory_uri().'/js/libs/jquery.cycle.all.min.js');
	wp_enqueue_script('cycle');	
	
	// PrettyPhoto
	wp_register_script('prettyPhoto', get_template_directory_uri().'/js/libs/jquery.prettyPhoto.js');
	wp_enqueue_script('prettyPhoto');

	// AnythingSlider
	wp_register_script('anythingslider', get_template_directory_uri().'/js/libs/jquery.anythingslider.min.js');
	wp_enqueue_script('anythingslider');
	wp_register_script('anythingslider-fx', get_template_directory_uri().'/js/libs/jquery.anythingslider.fx.min.js');
	wp_enqueue_script('anythingslider-fx');

	// QuickSand
	wp_register_script('quicksand', get_template_directory_uri().'/js/libs/jquery.quicksand.js');
	wp_enqueue_script('quicksand');

	# Google map
	wp_enqueue_script( 'google-map', 'http://maps.google.com/maps/api/js?sensor=false', false, false, 1 );

	// Contact Form
	wp_deregister_script('validation');
	wp_register_script('validation', get_template_directory_uri().'/js/libs/form.js');
	wp_enqueue_script('validation');

	// Main
	wp_register_script( 'js', get_template_directory_uri().'/js/script.js');
	wp_enqueue_script('js');
	
}
add_action('init', 'js_include');

// CSS Inclusion
function css_include(){


	wp_register_style('normalize', get_template_directory_uri().'/css/normalize.min.css', 'css', '');
	wp_enqueue_style('normalize');

	wp_register_style('prettyphoto', get_template_directory_uri().'/css/prettyPhoto.css', 'css', '');
	wp_enqueue_style('prettyphoto');

	wp_register_style('webfonts', get_template_directory_uri().'/css/webfonts.css', 'css', '');
	wp_enqueue_style('webfonts');

	wp_register_style('screen', get_template_directory_uri().'/css/screen.css', 'css', '');
	wp_enqueue_style('screen');

	wp_register_style('shortcodes', get_template_directory_uri().'/css/shortcodes.css', 'css', '');
	wp_enqueue_style('shortcodes');

	wp_register_style('custom', get_template_directory_uri().'/css/custom.php', 'css', '');
	wp_enqueue_style('custom');

	wp_register_style('slider', get_template_directory_uri().'/css/anythingslider.css', 'css', '');
	wp_enqueue_style('slider');

	if(is_404()) {
		wp_register_style('404', get_template_directory_uri().'/css/404.css', 'css', '');
		wp_enqueue_style('404');
  	}
		
}
add_action('wp_enqueue_scripts', 'css_include');

/*-----------------------------------------------------------------------------------*/
/* Display featured work */
/*-----------------------------------------------------------------------------------*/
	
function display_featured_work() {	
	global $options;
	$featuredwork = $options['jb_home_featuredwork'];
	if( $featuredwork == 'on') {
		get_template_part( 'inc', 'featuredwork' );
	}
}

/*-----------------------------------------------------------------------------------*/
/* Display home sidebar */
/*-----------------------------------------------------------------------------------*/

function display_home_sidebar() {
	global $options;
	$jb_display_home_sidebar = $options['jb_display_home_sidebar'];
	if( $jb_display_home_sidebar == 'on') {
		get_sidebar('home');
	}
}
	
/*-----------------------------------------------------------------------------------*/
/* Custom Filters */
/*-----------------------------------------------------------------------------------*/

function jpeg_quality_callback($arg) {
	return (int)100;
}
add_filter('jpeg_quality', 'jpeg_quality_callback');	

function new_excerpt_more($more) {		
	global $post;
	return ' <a href="'. get_permalink($post->ID) . '">Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

	/**
	 * New Comment form
	 *
	 * @author 	jb
	 */
	function jb_comment_form( $args = array(), $post_id = null ) {
		global $user_identity, $id;

		if ( null === $post_id ) {
			$post_id = $id;
		} else{
			$id = $post_id;
		}
			
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$fields =  array(
		'author' => '<fieldset>' . '<label for="author">' . __( 'Name', 'jb' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
				'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></fieldset>',
		'email'  => '<fieldset><label for="email">' . __( 'Email', 'jb' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
				'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></fieldset>',
		'url'    => '<fieldset><label for="url">' . __( 'URL', 'jb' ) . '</label>' .
				'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></fieldset>',
		);
		
		$required_text = sprintf( ' ' . __('Required fields are marked %s', 'jb' ), '<span class="required"><a>*</a></span>' );
		$defaults = array(
			'fields'				=> apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field'			=> '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'jb' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
			'must_log_in'			=> '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'jb' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
			'logged_in_as'			=> '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'jb' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
			'comment_notes_before' 	=> '<p class="comment-notes">' . __( 'Your email address will not be published.', 'jb' ) . ( $req ? $required_text : '' ) . '</p>',
			
			'id_form'				=> 'commentform',
			'id_submit'				=> 'submit',
			'title_reply'			=> __( 'Leave a Comment', 'jb' ),
			'title_reply_to'		=> __( 'Leave a Reply to %s', 'jb' ),
			'cancel_reply_link'		=> __( 'or Cancel reply', 'jb' ),
			'label_submit'			=> __( 'Send Comment', 'jb' ),
		);
		
		$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );
		
		if ( comments_open() ) { ?>
			
			<?php do_action( 'comment_form_before' ); ?>

			<div id="respond">
					<h3 class="reply-title"><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?> </h3>

					<?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) { ?>

						<?php echo $args['must_log_in']; ?>
						<?php do_action( 'comment_form_must_log_in_after' ); ?>

					<?php } else { ?>

						<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>">
							<?php do_action( 'comment_form_top' ); ?>
							
							<?php if ( is_user_logged_in() ) { ?>

								<?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
								<?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
							
							<?php } else { ?>

								<?php echo $args['comment_notes_before']; ?>
								<?php do_action( 'comment_form_before_fields' );
									
									foreach ( (array) $args['fields'] as $name => $field ) {
										echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
									}

								do_action( 'comment_form_after_fields' ); ?>

							<?php } ?>

							<?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
							<?php //echo $args['comment_notes_after']; ?>
							<p class="form-submit">
								<input class="button style1" name="submit" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
								<?php comment_id_fields(); ?>
							</p>

							<div class="cancel-comment-reply">
								<?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?>
							</div>


							<?php do_action( 'comment_form', $post_id ); ?>
						</form>

					<?php } ?>
			</div>

		<?php } 
	}
	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author jb
	 */
	function jb_comment_template( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			// Display trackbacks differently than normal comments.
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'jb' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'jb' ), '<span class="edit-link">', '</span>' ); ?></p>
		<?php
			break;
			default :
			// Proceed with normal comments.
			global $post;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>" class="comment">
					<header class="comment-meta comment-author vcard">
						<?php
							echo get_avatar( $comment, 44 );
							printf( '<cite class="fn">%1$s %2$s</cite>',
								get_comment_author_link(),
								// If current post author is also comment author, make it known visually.
								( $comment->user_id === $post->post_author ) ? '<span class="primary"> ' . __( 'Post author', 'jb' ) . '</span>' : ''
							);
							printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'jb' ), get_comment_date(), get_comment_time() )
							);
						?>
					</header><!-- .comment-meta -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'jb' ); ?></p>
					<?php endif; ?>

					<section class="comment-content comment">
						<?php comment_text(); ?>
						<?php edit_comment_link( __( 'Edit', 'jb' ), '', ' / ' ); ?> <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'jb' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</section><!-- .comment-content -->

				</article><!-- #comment-## -->
			<?php
			break;
			endswitch; // end comment_type check
		}

/*-----------------------------------------------------------------------------------
	IMAGE RESIZING
-----------------------------------------------------------------------------------*/

/**
* Resize images dynamically using wp built in functions (By Victor Teixeira)
**/

if ( !function_exists( 'vt_resize' ) ) {

	function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {

		// this is an attachment, so we have the ID
		if ( $attach_id ) {
		
			$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
			$file_path = get_attached_file( $attach_id );
		
		// this is not an attachment, let's use the image url
		} else if ( $img_url ) {
			
			$file_path = parse_url( $img_url );
			$file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
			
			//$file_path = ltrim( $file_path['path'], '/' );
			//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
			
			$orig_size = getimagesize( $file_path );
			
			$image_src[0] = $img_url;
			$image_src[1] = $orig_size[0];
			$image_src[2] = $orig_size[1];
		}
		
		$file_info = pathinfo( $file_path );
		$extension = '.'. $file_info['extension'];

		// the image path without the extension
		$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];

		$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;

		// checking if the file size is larger than the target size
		// if it is smaller or the same size, stop right here and return
		if ( $image_src[1] > $width || $image_src[2] > $height ) {

			// the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
			if ( file_exists( $cropped_img_path ) ) {

				$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
				
				$vt_image = array (
					'url' => $cropped_img_url,
					'width' => $width,
					'height' => $height
				);
				
				return $vt_image;
			}

			// $crop = false
			if ( $crop == false ) {
			
				// calculate the size proportionaly
				$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
				$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			

				// checking if the file already exists
				if ( file_exists( $resized_img_path ) ) {
				
					$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

					$vt_image = array (
						'url' => $resized_img_url,
						'width' => $proportional_size[0],
						'height' => $proportional_size[1]
					);
					
					return $vt_image;
				}
			}

			// no cache files - let's finally resize it
			$new_img_path = wp_get_image_editor( $file_path, $width, $height, $crop );
			$new_img_size = getimagesize( $new_img_path );
			$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

			// resized output
			$vt_image = array (
				'url' => $new_img,
				'width' => $new_img_size[0],
				'height' => $new_img_size[1]
			);
			
			return $vt_image;
		}

		// default output - without resizing
		$vt_image = array (
			'url' => $image_src[0],
			'width' => $image_src[1],
			'height' => $image_src[2]
		);
		
		return $vt_image;
	}

}
/* ========================================================================================================================
	
	BE Functions
	
======================================================================================================================== */
	function jb_dashboard_widgets() {
		global $wp_meta_boxes;
		unset(
			$wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
			$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
			$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
		);
			wp_add_dashboard_widget( 'dashboard_custom_feed', 'jb News' , 'dashboard_custom_feed_output' );
	}
	add_action('wp_dashboard_setup', 'jb_dashboard_widgets');


	function dashboard_custom_feed_output() {
		echo '<div class="rss-widget rss-jb">';
		wp_widget_rss_output(array(
			'url' => 'http://themeforest.net/feeds/users/jb.atom',
			'title' => '',
			'items' => 5,
			'show_summary' => 1,
			'show_author' => 0,
			'show_date' => 1
			));
		echo '</div>';

	}

	if ( ! function_exists( 'jb_bar_menu' ) ):
	
	function jb_bar_menu() {
		global $wp_admin_bar;
		if ( !is_super_admin() || !is_admin_bar_showing() )
			return;
		$admin_dir = get_admin_url();

		$wp_admin_bar->add_menu( 
			array(
				'id' => 'custom_menu',
				'title' => __( 'jb Panel', 'jb' ),
				'href' => FALSE,
				'meta' => array('title' => 'jb Options Panel', 'class' => 'jbpanel') 
			) 
		);

		$wp_admin_bar->add_menu(
			array(
				'id' => 'otw_to',
				'parent' => 'custom_menu',
				'title' => __( 'Theme Options', 'jb' ),
				'href' => $admin_dir .'themes.php?page=ot-theme-options',
				'meta' => array('title' => 'Theme Option') 
			)
		);

		$wp_admin_bar->add_menu(
			array(
				'id' => 'otw_sp',
				'parent' => 'custom_menu',
				'title' => __( 'Support Forum', 'jb' ),
				'href' => 'http://forum.jb.co/?utm_source=Support&utm_medium=theme&utm_campaign=TheAgency',
				'meta' => array('title' => 'Support Forum') 
			)
		);


		$wp_admin_bar->add_menu(
			array(
				'id' => 'otw_wt',
				'parent' => 'custom_menu',
				'title' => __( 'Our Themes', 'jb' ),
				'href' => 'http://jb.co/themes/?utm_source=WP-admin&utm_medium=theme&utm_campaign=TheAgency',
				'meta' => array('title' => 'Our Themes')
				)
		);

		$wp_admin_bar->add_menu(
			array(
				'id' => 'otw_fb',
				'parent' => 'custom_menu',
				'title' => __( 'Become our fan on Facebook', 'jb' ),
				'href' => 'http://facebook.com/jb',
				'meta' => array('target' => 'blank', 'title' => 'Become our fan on Facebook') 
			)
		);

		$wp_admin_bar->add_menu(
			array(
				'id' => 'otw_tw',
				'parent' => 'custom_menu',
				'title' => __( 'Follow us on Twitter', 'jb' ),
				'href' => 'http://twitter.com/jb',
				'meta' => array('target' => 'blank', 'title' => 'Follow us on Twitter')
			)
		);
	}
	add_action('admin_bar_menu', 'jb_bar_menu', '1000');

endif;



/*-----------------------------------------------------------------------------------*/
/* Theme Related */
/*-----------------------------------------------------------------------------------*/
require_once('inc/cpt-slider.php');
require_once('inc/cpt-projects.php');
require_once('inc/cpt-updates.php');
require_once('inc/meta-boxes.php');
require_once('inc/shortcodes/init.php');
require_once('inc/widgets/widget-init.php');
