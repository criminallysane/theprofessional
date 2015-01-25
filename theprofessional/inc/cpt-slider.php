<?php
function cpt_slider(){
	register_post_type('slides',
		array(
			'labels' => array(
				'name' => __( 'Slider', 'jb' ),
				'singular_name' => __( 'Slide', 'jb' ),
				'add_new' => __( 'Add new slide', 'jb' ),
				'add_new_item' => __( 'Add new slide', 'jb' ),
				'edit' => __( 'Edit', 'jb' ),
				'edit_item' => __( 'Edit slide', 'jb' ),
				'new_item' => __( 'New slide', 'jb' ),
				'view' => __( 'View slide', 'jb' ),
				'view_item' => __( 'View slide', 'jb' ),
				'search_items' => __( 'Search slides', 'jb' ),
				'not_found' => __( 'No slides found', 'jb' ),
				'not_found_in_trash' => __( 'No slides found in Trash', 'jb' ),
				'parent' => __( 'Parent slide', 'jb' ),
			),
			'singular_label' => __( 'Slide', 'jb' ),
			'public' => true,
			'show_ui' => true,
			'_builtin' => false,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_position' => 15,
			'supports' => array('title'),
			'menu_icon' => get_stylesheet_directory_uri() . '/images/wp_menu_gallery.png',
			'rewrite' => array(
				'slug' => 'slides', 
				'with_front' => false
			) 
		)
	);
}
add_action('init', 'cpt_slider');