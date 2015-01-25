<?php
/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', '_custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types
 * in demo-theme-options.php.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_meta_boxes() {
	
	/**
	 * Create a custom meta boxes array that we pass to 
	 * the OptionTree Meta Box API Class.
	 */
	$page_meta_box = array(
		'id'          => 'page_meta_box',
		'title'       => 'Page Options',
		'desc'        => '',
		'pages'       => array( 'page' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(  
			array(
				'label'       => 'Slider',
				'id'          => 'jb_page_header_slider',
				'type'        => 'custom-post-type-select',
				'desc'        => 'Choose which slider you would like to see in the header section of this page.', 
				'std'         => '',
				'rows'        => '',
				'post_type'   => 'slides',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label' => 'Page description',
				'desc' => 'Enter a very small description of the page (Max. 100 caracters)',					
				'id' => 'lp_pageDesc',			
				'type' => 'text',
				'std' => ''
			), 
			array(
				'label'       => 'Page Layout',
				'id'          => 'theme_page_layout',
				'type'        => 'select',
				'desc'        => 'Choose the layout of the page.', 
				'choices'     => array(
					array(
					'label'       => 'Default Layout',
					'value'       => 'left'
					),
					array(
					'label'       => 'Fullwidth Layout',
					'value'       => 'full'
					),
				),        
				'std'         => 'Default Layout',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			), 
		)
	);
	
	$slider_meta_box = array(
		'id'          => 'slider_meta_box',
		'title'       => 'Slider',
		'desc'        => '',
		'pages'       => array( 'slides' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
		  array(
		    'label'       => 'Slider Builder',
		    'id'          => 'theme_slider_item',
		    'type'        => 'list-item',
		    'desc'        => 'Create slider items, re-order them, save them, use them!',
		    'settings'    => array(
		      array(
		        'label'       => 'Slide Image',
		        'id'          => 'theme_slider_item_image',
		        'type'        => 'upload',
		        'desc'        => 'Suggested image size is 980px wide by 363px high.',
		        'std'         => '',
		        'rows'        => '',
		        'post_type'   => '',
		        'taxonomy'    => '',
		        'class'       => ''
		      ),    
		      array(
		        'label'       => 'Slide Caption',
		        'id'          => 'theme_slider_item_caption',
		        'type'        => 'text',
		        'desc'        => 'Enter a slide caption, HTML is allowed.',
		        'std'         => '',
		        'rows'        => '',
		        'post_type'   => '',
		        'taxonomy'    => '',
		        'class'       => ''
		      ),
		      array(
		        'label'       => 'Slide URL',
		        'id'          => 'theme_slider_item_url',
		        'type'        => 'text',
		        'desc'        => 'Enter the URL you would like to redirect to.',
		        'std'         => '',
		        'rows'        => '',
		        'post_type'   => '',
		        'taxonomy'    => '',
		        'class'       => ''
		      )
		    ), 
		    'std'         => '',
		    'rows'        => '',
		    'post_type'   => '',
		    'taxonomy'    => '',
		    'class'       => ''
		  	)
		)
	);

	$project_meta_box = array(
		'id'          => 'project_meta_box',
		'title'       => 'Project Details',
		'desc'        => '',
		'pages'       => array( 'projects' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label' => 'Small Description',
				'desc' => '(Max. 100 caracters)',
				'id' => 'lp_projectDesc',
				'type' => 'textarea-simple',						
				'std' => '',
				'rows'        => '2',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label' => 'Case Study',
				'desc' => '',
				'id' => 'lp_projectCaseStudy',
				'type' => 'textarea',						
				'std' => '',
			),
			array(
				'label' => 'Project URL',
				'desc' => '',
				'id' => 'lp_projectURL',
				'type' => 'text',						
				'std' => '',
				'style' => 'width:300px'
			),
			array(
				'label'       => 'Client',
				'id'          => 'lp_projectClient',
				'type'        => 'text',
				'desc'        => 'Enter the client name.',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Role',
				'id'          => 'lp_projectRole',
				'type'        => 'text',
				'desc'        => 'Enter the your role within this project.',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'label'       => 'Year',
				'id'          => 'theme_project_year',
				'type'        => 'text',
				'desc'        => 'Enter the year of the project.',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),

			array(
				'label'       => 'Project Gallery',
				'id'          => 'jb_project_gallery',
				'type'        => 'list-item',
				'desc'        => 'Use this tool to build your project gallery.',
				'settings'    => array(     
					array(
						'label'       => 'Project Image',
						'id'          => 'jb_project_item_image',
						'type'        => 'upload',
						'desc'        => 'Upload your image using the builtin media manager.',
						'std'         => '',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'section'     => ''
					),

					array(
						'label'       => 'Project Image Caption',
						'id'          => 'jb_project_item_image_caption',
						'type'        => 'text',
						'desc'        => '',
						'std'         => '',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'section'     => ''
					),

					array(
						'label'       => 'Project Video',
						'id'          => 'jb_project_item_video',
						'type'        => 'text',
						'desc'        => 'Paste your video URL.',
						'std'         => '',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'section'     => ''
					), 
					array(
						'label'       => 'Video Size',
						'id'          => 'jb_project_item_size',
						'type'        => 'select',
						'desc'        => 'Choose the video width you would like to use.',
						'choices'     => array(
							array(
								'label'       => 'Small',
								'value'       => '597'
							),
							array(
								'label'       => 'Large',
								'value'       => '940'
							)
						),          
						'std'         => '',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => '',
						'class'       => '',
						'section'     => ''
					) 
				)
			),   

			array(
				'label'       => 'Gallery Columns',
				'id'          => 'jb_project_gallery_columns',
				'type'        => 'select',
				'desc'        => '<em>* &mdash; This setting is optional</em><br/>Select the number of columns for the gallery',
				'choices'     => array(
				  array(
				    'label'       => 'One',
				    'value'       => 'one'
				  ),
				  array(
				    'label'       => 'Two',
				    'value'       => 'two'
				    ),
				  array(
				    'label'       => 'Three',
				    'value'       => 'three'
				    ),
				  array(
				    'label'       => 'Four',
				    'value'       => 'four'
				    )
				),
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			)

		)
	);
		
	/**
	 * Register our meta boxes using the 
	 * ot_register_meta_box() function.
	 */
	ot_register_meta_box( $page_meta_box );
	ot_register_meta_box( $slider_meta_box );
	ot_register_meta_box( $project_meta_box );
}