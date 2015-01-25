<?php
function cpt_updates(){
	register_post_type('updates', 

		array(
			'labels' => array(
				'name' => __( 'Quick Updates', 'jb' ),
				'singular_name' => __( 'Updates', 'jb' ),
				'add_new' => __( 'Add new update', 'jb' ),
				'add_new_item' => __( 'Add new update', 'jb' ),
				'edit' => __( 'Edit', 'jb' ),
				'edit_item' => __( 'Edit update', 'jb' ),
				'new_item' => __( 'New update', 'jb' ),
				'view' => __( 'View update', 'jb' ),
				'view_item' => __( 'View update', 'jb' ),
				'search_items' => __( 'Search updates', 'jb' ),
				'not_found' => __( 'No update(s) found', 'jb' ),
				'not_found_in_trash' => __( 'No update(s) found in Trash', 'jb' ),
				'parent' => __( 'Parent update', 'jb' ),
			),
			'singular_label' => __( 'Update', 'jb' ),
			'public' => true,
			'show_ui' => true,
			'_builtin' => false,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_position' => 15,
			'supports' => array('title','editor','author','page-attributes'),
			'menu_icon' => get_stylesheet_directory_uri() . '/images/wp_menu_updates.png',
			'rewrite' => array(
				'slug' => 'update', 
				'with_front' => false
			) 
		)
	);
}
add_action('init', 'cpt_updates');