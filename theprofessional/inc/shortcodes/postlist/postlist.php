<?php
	
	// POSTLIST
	function postlist($atts, $content){
		
		extract(shortcode_atts(array(
			'title' => '',
			'number' => '-1',			// Number of pages to return.
			'category' => '',
			'tag' => ''
		), $atts));		
		
		if( empty ( $tag ) ){
			$query_args = array(
				'post_type' => 'post',
				'posts_per_page' => $number,
				'category_name' => $category,
				'ignore_sticky_posts' => 1
			);
		} else {
			$tag_array = explode( ',', $tag );
			
			$query_args = array(
				'post_type' => 'post',
				'posts_per_page' => $number,
				'category_name' => $category,
				'tag_slug__in' => $tag_array,
				'ignore_sticky_posts' => 1
			);		
		}
		
		$postlist = new WP_query( $query_args );
		
		if ( $postlist->have_posts() ) :
			
			$output = "";
			
			if ( $title != "" ) {
				$output .= '<h3>'. $title .'</h3>';
			}
			
			$output .= '<div class="postlist">';
			
				while ( $postlist->have_posts() ) : $postlist->the_post();
				
					global $post;	
					
					$output .= '<article class="postlist-post">';
						
						$output .= '<span class="postlist-post-date">
									<time datetime="'. get_the_time( 'c' ) .'">'. get_the_time(get_option('date_format')) .'</time>
								</span>
								<span class="postlist-post-title">
									<a href="'. get_permalink() .'">'. get_the_title() .'</a>
								</span>
								
					</article>';
					
				endwhile;			
			
			$output .= '</div>';
			
			$output .= '<div class="clearboth"></div>';
			
			return $output;
		
		endif;
		
		wp_reset_postdata();
		
	}
	add_shortcode('postlist', 'postlist');
	
	
	// ---------- TINYMCE BUTTONS ---------- //

	function add_jb_postlist_button() {
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
		if ( get_user_option('rich_editing') == 'true') {
			add_filter('mce_external_plugins', 'add_jb_postlist_tinymce_plugin');
			add_filter('mce_buttons_3', 'register_jb_postlist_button');
		}
	}

	add_action('init', 'add_jb_postlist_button');

	function register_jb_postlist_button($buttons) {
	   array_push($buttons, "jb_postlist" );
	   return $buttons;
	}

	function add_jb_postlist_tinymce_plugin($plugin_array) {
		
		$plugin_array['jb_postlist'] = get_template_directory_uri() .'/inc/shortcodes/postlist/postlist.js';	   
		return $plugin_array;
		
	}

	add_filter( 'tiny_mce_version', 'my_refresh_mce');

	// ---------- END TINYMCE BUTTONS ---------- //

?>