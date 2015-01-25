<?php
/**
 * The default template for displaying 404 error page
 *
 * @package WordPress
 * @subpackage TheProfessional
 * @since TheProfessional 1.0
 */
?>

<?php get_header(); ?>

<div id="main">

	<h1><?php _e('Error', 'jb'); ?></h1>
	
	<div>
		<p><?php _e('Page not found (404)', 'jb'); ?></p>
		<p><?php _e('Please accept this apology. Perhaps a search might help.', 'jb'); ?></p>
		
		<div id="search" class="widget">
                    
			<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
				<input type="text" name="s" id="input" onclick="jQuery(this).val(\'\');" value="Search" />
				<input type="submit" id="submit" value="" />
			</form>

		</div>
		
		<div class="fix"></div>	
			
	</div>
	
	<div class="fix"></div>
	
	<?php get_footer(); ?>

</div>