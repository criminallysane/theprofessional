<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_theme_options', 1 );

/**
 * Theme Mode demonstration code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function _custom_theme_options() {
	
	/**
	 * Get a copy of the saved settings array. 
	 */
	$saved_settings = get_option( 'option_tree_settings', array() );
	
	$google_fonts = get_google_webfonts(); 
	foreach( $google_fonts as $font ) {
		$google_webfonts_array[$font['family']]['label'] = $font['family'];
		$google_webfonts_array[$font['family']]['value'] = $font['family'];
	}

	$websafe_fonts = array(
		array(
			'label' => 'Arial',
			'value' => '"Helvetica Neue", Helvetica, Arial' 
		),		
		array(
			'label' => 'Baskerville',
			'value' => 'Baskerville, Times, "Times New Roman"'
		),		
		array(
			'label' => 'Georgia',
			'value' => 'Georgia, Times, "Times New Roman"'
		),		
		array(
			'label' => 'Garamond',
			'value' => 'Garamond, "Hoefler Text", Palatino, "Palatino Linotype"'
		),		
		array(
			'label' => 'Palatino',
			'value' => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman"'
		),	
		array(
			'label' => 'Tahoma',
			'value' => 'Tahoma, Verdana, Geneva'
		),	
		array(
			'label' => 'Times New Roman',
			'value' => 'Times, "Times New Roman", Georgia'
		),		
		array(
			'label' => 'Trebuchet',
			'value' => '"Trebuchet MS", Tahoma, Arial'
		),
		array(
			'label' => 'Verdana',
			'value' => 'Verdana, Tahoma, Geneva'
		)
	);

	$fonts = array_merge($websafe_fonts, $google_webfonts_array);

/**
* write a custom settings array that we pass to the OptionTree Settings API Class.
*/

$custom_settings = array(

	'contextual_help' => array(
		'content'       => array( 
			array(
				'id'        => 'general_help',
				'title'     => 'General',
				'content'   => ''
			)
		),
		'sidebar'       => ''
	),
	
	'sections'        => array(
		array(
			'title'       => 'General Settings',
			'id'          => 'general_default'
		),
		array(
			'title'       => 'Color Scheme',
			'id'          => 'colorscheme'
		),    
		array(
			'title'       => 'Typography',
			'id'          => 'typography'
		),
		array(
			'title'       => 'Home page',
			'id'          => 'homepage'
		),

		array(
			'title'       => 'Slider Settings',
			'id'          => 'slider'
		), 

		array(
			'title'       => 'Projects Settings',
			'id'          => 'projects'
		),  

		array(
			'title'       => 'Blog Settings',
			'id'          => 'blog'
		),  

		array(
			'title'       => 'Contacts',
			'id'          => 'contact'
		), 
 
	),

	'settings'          => array(

		//GENERAL SETTINGS

		array(
				'label'       => 'Logo Type',
				'id'          => 'theme_logo_type',
				'type'        => 'select',
				'desc'        => 'Which type of logo are you using ?',
				 'choices'     => array(
					array(
						'label'       => 'Text',
						'value'       => 'text'
					),
					array(
						'label'       => 'Image',
						'value'       => 'image'
					)
				),
				'std'         => 'text',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'general_default'
		),

		array(
				'label'       => 'Logo Text',
				'id'          => 'theme_logo_text',
				'type'        => 'text',
				'desc'        => 'Enter your company name. HTML is OK.',
				'std'         => 'The <span>Professional</span>',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'general_default'
		),

		array(
				'label'       => 'Logo Image',
				'id'          => 'theme_logo_image',
				'type'        => 'upload',
				'desc'        => 'Upload your logotype.',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'general_default'
		),

		array(
				'label'       => 'Favicon',
				'id'          => 'theme_favicon',
				'type'        => 'upload',
				'desc'        => 'Upload your favicon.<br/><br/><strong>NOTICE:</strong> Use .png image type.',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'general_default'
		),

		array(
				'label'       => 'Analytic Tracking Code',
				'id'          => 'jb_analytic_wp',
				'type'        => 'textarea-simple',
				'desc'        => '',
				'std'         => '',
				'rows'        => '4',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'general_default'
		),

		array(
				'label'       => 'Copyright',
				'id'          => 'jb_copyright_wp',
				'type'        => 'textarea-simple',
				'desc'        => 'Enter your Copyright notice displayed in the very bottom part of the website.',
				'std'         => '&copy; Copyright 2015 Your Company Name. WordPress Theme by <a href="http://jordanbeasley.tk">Jordan Beasley</a>.',
				'rows'        => '2',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'general_default'
		),
		
		// BRANDING SETTINGS

		array(
				'label'       => 'Body Background Color',
				'id'          => 'theme_body_bg_color',
				'type'        => 'colorpicker',
				'desc'        => '<em><strong>Default:</strong> #f3f3f3;</em>',
				'std'         => '#f3f3f3',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'colorscheme'
		),

		array(
				'label'       => 'Body Font Color',
				'id'          => 'theme_body_font_color',
				'type'        => 'colorpicker',
				'desc'        => '<em><strong>Default:</strong> #444444;</em>',
				'std'         => '#444444',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'colorscheme'
		),

		array(
				'label'       => 'Logo Font Color',
				'id'          => 'theme_logo_font_color',
				'type'        => 'colorpicker',
				'desc'        => '<em><strong>Default:</strong> #000000;</em>',
				'std'         => '#000000',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'colorscheme'
		),

		array(
				'label'       => 'Heading Font Color',
				'id'          => 'theme_heading_font_color',
				'type'        => 'colorpicker',
				'desc'        => '<em><strong>Default:</strong> #444444;</em>',
				'std'         => '#444444',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'colorscheme'
		),

		array(
				'label'       => 'Link Color',
				'id'          => 'theme_link_color',
				'type'        => 'colorpicker',
				'desc'        => '<em><strong>Default:</strong> #8c8c8c;</em>',
				'std'         => '#8c8c8c',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'colorscheme'
		),

		array(
				'label'       => 'Link Hover Color',
				'id'          => 'theme_link_hover_color',
				'type'        => 'colorpicker',
				'desc'        => '<em><strong>Default:</strong> #000000;</em>',
				'std'         => '#000000',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'colorscheme'
		),

		array(
				'label'       => 'Primary Color',
				'id'          => 'theme_primary_color',
				'type'        => 'colorpicker',
				'desc'        => '<em><strong>Default:</strong> #000000</em>',
				'std'         => '#000000',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'colorscheme'
		),

		array(
				'label'       => 'Secondary Color',
				'id'          => 'theme_secondary_color',
				'type'        => 'colorpicker',
				'desc'        => '<em><strong>Default:</strong> #8c8c8c</em>',
				'std'         => '#8c8c8c',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'colorscheme'
		),

		array(
				'label'       => 'Navigation Font Color',
				'id'          => 'theme_navigation_color',
				'type'        => 'colorpicker',
				'desc'        => '<em><strong>Default:</strong> #8C8C8C</em>',
				'std'         => '#8C8C8C',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'colorscheme'
		),

		array(
				'label'       => 'Navigation Hover Color',
				'id'          => 'theme_navigation_hover_color',
				'type'        => 'colorpicker',
				'desc'        => '<em><strong>Default:</strong> #000000</em>',
				'std'         => '#000000',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'colorscheme'
		),

		// TYPOGRAPHY SETTINGS

		array(
				'label'       => 'Logo Font',
				'id'          => 'theme_logo_font',
				'type'        => 'select',
				'desc'        => 'Choose a default font for your headings. You can preview all the fonts at <a href="http://www.google.com/webfonts/">http://www.google.com/webfonts/</a>.<br/><br/><strong>NOTICE:</strong> First 9 fonts in list are websafe fonts. All the other fonts will be loaded from Google Webfonts library.<br/></br><em><strong>Default:</strong> Open Sans</em>',
				'choices'     => $fonts,
				'std'         => 'Open Sans',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		array(
				'label'       => 'Logo Font Size',
				'id'          => 'theme_logo_font_size',
				'type'        => 'text',
				'desc'        => '<em><strong>Default:</strong> 28px</em>',
				'std'         => '28px',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		array(
				'label'       => 'Logo Weight',
				'id'          => 'theme_logo_font_weight',
				'type'        => 'select',
				'desc'        => '<em><strong>Default:</strong> 400</em>',
				'choices'     => array(
					array(
						'label'       => '100',
						'value'       => '100'
					),
					array(
						'label'       => '200',
						'value'       => '200'
					),
					array(
						'label'       => '300',
						'value'       => '300'
					),
					array(
						'label'       => '400',
						'value'       => '400'
					),
					array(
						'label'       => '500',
						'value'       => '500'
					),
					array(
						'label'       => '600',
						'value'       => '600'
					),
					array(
						'label'       => '700',
						'value'       => '700'
					)
				),
				'std'         => '400',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		array(
				'label'       => 'Top Navigation Font',
				'id'          => 'theme_navigation_font',
				'type'        => 'select',
				'desc'        => '<em><strong>Default:</strong> Open Sans</em>',
				'choices'     => $fonts,
				'std'         => 'Open Sans',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		array(
				'label'       => 'Top Navigation Font Size',
				'id'          => 'theme_navigation_font_size',
				'type'        => 'text',
				'desc'        => '<em><strong>Default:</strong> 12px</em>',
				'std'         => '12px',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		array(
				'label'       => 'Top Navigation Font Weight',
				'id'          => 'theme_navigation_font_weight',
				'type'        => 'select',
				'desc'        => '<em><strong>Default:</strong> 400</em>',
				'choices'     => array(
					array(
						'label'       => '100',
						'value'       => '100'
					),
					array(
						'label'       => '200',
						'value'       => '200'
					),
					array(
						'label'       => '300',
						'value'       => '300'
					),
					array(
						'label'       => '400',
						'value'       => '400'
					),
					array(
						'label'       => '500',
						'value'       => '500'
					),
					array(
						'label'       => '600',
						'value'       => '600'
					),
					array(
						'label'       => '700',
						'value'       => '700'
					)
				),
				'std'         => '400',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		array(
				'label'       => 'Body Font',
				'id'          => 'theme_body_font',
				'type'        => 'select',
				'desc'        => '<em><strong>Default:</strong> Open Sans</em>',
				'choices'     => $fonts,
				'std'         => 'Open Sans',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		array(
				'label'       => 'Body Size',
				'id'          => 'theme_body_font_size',
				'type'        => 'text',
				'desc'        => '<em><strong>Default:</strong> 12px</em>',
				'std'         => '12px',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		array(
				'label'       => 'Body Weight',
				'id'          => 'theme_body_font_weight',
				'type'        => 'select',
				'desc'        => '<em><strong>Default:</strong> 400</em>',
				'choices'     => array(
					array(
						'label'       => '100',
						'value'       => '100'
					),
					array(
						'label'       => '200',
						'value'       => '200'
					),
					array(
						'label'       => '300',
						'value'       => '300'
					),
					array(
						'label'       => '400',
						'value'       => '400'
					),
					array(
						'label'       => '500',
						'value'       => '500'
					),
					array(
						'label'       => '600',
						'value'       => '600'
					),
					array(
						'label'       => '700',
						'value'       => '700'
					)
				),
				'std'         => '400',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		array(
				'label'       => 'Heading Font',
				'id'          => 'theme_heading_font',
				'type'        => 'select',
				'desc'        => '<em><strong>Default:</strong> Open Sans</em>',
				'choices'     => $fonts,
				'std'         => 'Open Sans',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		array(
				'label'       => 'Heading Weight',
				'id'          => 'theme_heading_font_weight',
				'type'        => 'select',
				'desc'        => '<em><strong>Default:</strong> 300</em>',
				'choices'     => array(
					array(
						'label'       => '100',
						'value'       => '100'
					),
					array(
						'label'       => '200',
						'value'       => '200'
					),
					array(
						'label'       => '300',
						'value'       => '300'
					),
					array(
						'label'       => '400',
						'value'       => '400'
					),
					array(
						'label'       => '500',
						'value'       => '500'
					),
					array(
						'label'       => '600',
						'value'       => '600'
					),
					array(
						'label'       => '700',
						'value'       => '700'
					)
				),
				'std'         => '300',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'typography'
		),

		// HOME SETTINGS
	 	array(
				'label'       => 'Display featured work?',
				'id'          => 'ototw_home_featuredwork',
				'type'        => 'select',
				'desc'        => 'Enable this option to show up to six (6) Featured work on the home page.',
				'choices'     => array(
					array(
						'label'       => 'Enabled',
						'value'       => 'on'
					),
					array(
						'label'       => 'Disabled',
						'value'       => 'off'
					)
				),        
				'std'         => 'true',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'homepage'
		),

		array(
				'label'       => 'Use dynamic sidebar?',
				'id'          => 'jb_display_home_sidebar',
				'type'        => 'select',
				'desc'        => 'Enable this option to enable the dynamic sidebar located at the footer of the home page and enable you to insert widgets into this area.',
				'choices'     => array(
					array(
						'label'       => 'Enabled',
						'value'       => 'on'
					),
					array(
						'label'       => 'Disabled',
						'value'       => 'off'
					)
				),        
				'std'         => 'true',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'homepage'
		),
		
		// SLIDER SETTINGS

		array(
				'label'       => 'Transition speed',
				'id'          => 'jb_slider_animationSpeed',
				'type'        => 'text',
				'desc'        => 'The time the slider waits to play the next one in miliseconds.(range 500-2000)',       
				'std'         => '600',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'slider'
		),

		array(
				'label'       => 'Transition delay',
				'id'          => 'jb_slider_pausetime',
				'type'        => 'text',
				'desc'        => 'The time the slider waits to play the next one in miliseconds.( Range 3000-20000)',       
				'std'         => '7000',        
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'slider'
		),

		array(
				'label'       => 'Control Nav',
				'id'          => 'jb_slider_controlNav',
				'type'        => 'radio',
				'desc'        => 'Enable control navigation (1,2,3... navigation)',
				'choices'     => array(
					array(
						'label'       => 'Enabled',
						'value'       => 'on'
					),
					array(
						'label'       => 'Disabled',
						'value'       => 'off'
					)
				),        
				'std'         => 'on',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'slider'
		),
		array(
				'label'       => 'Pause on hover',
				'id'          => 'jb_slider_auseHover',
				'type'        => 'radio',
				'desc'        => 'Stop animation while hovering',
				'choices'     => array(
					array(
						'label'       => 'Enabled',
						'value'       => 'on'
					),
					array(
						'label'       => 'Disabled',
						'value'       => 'off'
					)
				),        
				'std'         => 'on',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'slider'
		),

		// PROJECT SETTINGS

		array(
				'label'       => 'Projects URL Rewrite',
				'id'          => 'jb_project_item_url',
				'type'        => 'text',
				'desc'        => '',
				'std'         => 'project',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'projects'
		),

		array(
				'label'       => 'Projects Type URL Rewrite',
				'id'          => 'jb_project_item_type_url',
				'type'        => 'text',
				'desc'        => '',
				'std'         => 'item-type',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'projects'
		),
		array(
				'label'       => 'Select the page where projects are displayed',
				'id'          => 'jb_more_projects',
				'type'        => 'custom-post-type-select',
				'desc'        => 'Select the page where the projects are displayed',       
				'std'         => 'Projects',
				'rows'        => '',
				'post_type'   => 'page',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'projects'
		),

		// BLOG SETTINGS

		array(
			'label'       => 'Blog Title',
			'id'          => 'jb_blog_title',
			'type'        => 'text',
			'desc'        => 'Enter the Blog page title.',       
			'std'         => 'Blog',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'section'     => 'blog'
		),

		// CONTACT SETTINGS

		array(
				'label'       => 'Contact Form Email(s)',
				'id'          => 'jb_contact_form_emails',
				'type'        => 'textarea-simple',
				'desc'        => 'Write your email contact form recipient email address(es) here. Each email needs to be on a new line.',
				'std'         => '',
				'rows'        => '2',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'contact'
		),

	));
	
	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings ); 
	}
	
}