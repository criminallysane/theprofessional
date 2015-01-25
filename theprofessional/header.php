<?php global $options; ?><!-- $options refers to the options tab under appearance in wordpress dashboard -->
<!doctype html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<?php $page_title = get_bloginfo('name'); ?>
	<?php if( !is_front_page() ) : ?>
		<title><?php wp_title($page_title . ' &mdash; '); ?></title>		
	<?php else : ?>
		<title><?php echo $page_title; ?></title>
	<?php endif; ?>	
	<meta name="description" content="" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<?php $favicon = $options['theme_favicon']; ?>
	<?php if($options['theme_favicon'] != '' ) : ?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>">
	<?php endif; ?>

    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php wp_head(); ?>
    <!-- WP_HEAD  -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- container -->
<div id="container">
	
	<!-- header -->
	<header>
	  
		<div id="border" class="primary">&nbsp;</div>
		
		<!-- logo -->
		<div id="logo">
			<?php theme_get_logo(); ?>
		</div>
		<!-- //logo -->

		<!-- top navigation -->
		<nav>
            <?php get_custom_menu() ?>
		</nav>
		<!-- //top navigation -->

		<div class="fix">&nbsp;</div>
	
	</header>
	<!-- //header -->