<?php
function cpt_projects(){
	global $options;
	if ( $options ) {  
		$url_rewrite = $options['jb_project_item_url'];
		if( !$url_rewrite ) { $url_rewrite = 'projects'; }
	} else {
		$url_rewrite = 'projects';
	}
	register_post_type('projects',
		array(
			'labels' => array(
				'name' => __( 'Projects', 'jb' ),
				'singular_name' => __( 'Project', 'jb' ),
				'add_new' => __( 'Add new project', 'jb' ),
				'add_new_item' => __( 'Add new project', 'jb' ),
				'edit' => __( 'Edit', 'jb' ),
				'edit_item' => __( 'Edit project', 'jb' ),
				'new_item' => __( 'New project', 'jb' ),
				'view' => __( 'View project', 'jb' ),
				'view_item' => __( 'View project', 'jb' ),
				'search_items' => __( 'Search projects', 'jb' ),
				'not_found' => __( 'No project(s) found', 'jb' ),
				'not_found_in_trash' => __( 'No project(s) found in Trash', 'jb' ),
				'parent' => __( 'Parent project', 'jb' ),
			),
			'singular_label' => __( 'Project', 'jb' ),
			'public' => true,
			'show_ui' => true,
			'_builtin' => false,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_position' => 15,
			'supports' => array('title','editor','author','thumbnail','page-attributes'),
			'menu_icon' => get_stylesheet_directory_uri() . '/images/wp_menu_projects.png',
			'rewrite' => array('slug' => $url_rewrite) 
		)
	); 
	flush_rewrite_rules();
}
function tax_projects() {
	global $options;
	if ( $options ) {  
		$url_item_rewrite = $options['jb_project_item_type_url'];
		if( !$url_item_rewrite ) { $url_item_rewrite = 'projects-category'; }
	} else {
		$url_item_rewrite = 'projects-category';
	}
	
	register_taxonomy('projects_item_types', 'projects', 
		array( 
			'hierarchical' => true, 
			'labels' => array(
				  'name' => 'Categories',
				  'singular_name' => 'Categories',
				  'search_items' =>  'Search Categories',
				  'popular_items' => 'Popular Categories',
				  'all_items' => 'All Categories',
				  'parent_item' => 'Parent Categories',
				  'parent_item_colon' => 'Parent Category:',
				  'edit_item' => 'Edit Category',
				  'update_item' => 'Update Category',
				  'add_new_item' => 'Add New Category',
				  'new_item_name' => 'New Category Name'
			),
			'show_ui' => true,
			'query_var' => true, 
			'rewrite' => array('slug' => $url_item_rewrite)
		) 
	); 
	flush_rewrite_rules();	
}

add_action('init', 'cpt_projects');
add_action('init', 'tax_projects');