<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage TheProfessional
 * @since TheProfessional 1.0
 */
?>
<?php get_header(); ?>
<?php global $options;
	if ( $options ) {
		$header_slider = get_post_meta($post->ID, 'jb_page_header_slider', true );
	} else {
		$header_slider = '';
	}
?>


<!-- main -->
<div id="main" role="main">	


	<?php if( $header_slider ) : ?>
		<!-- .slider -->
		<?php $shortcode = '[slider id="' . $header_slider . '"]'; ?>
		<?php echo do_shortcode( $shortcode ); ?>
		<!-- /.slider -->
	<?php endif; ?>	

	<!-- updates -->	
	<div id="home-news">
		<h5><?php _e('Updates', 'jb'); ?></h5>
		<ul>
			<?php query_posts('post_type=updates'); if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<li><?php the_content(); ?></li>
			<?php endwhile; ?>
		</ul>
		<div class="left"></div>
		<div class="right"></div>
	</div>
	<!-- //updates -->	
	
	<!-- about -->	
	<div id="home-about">
		<h4><?php bloginfo('description'); ?></h4>
	</div>
	<!-- //about -->
	
	<div class="fix">&nbsp;</div>
	<?php
		display_featured_work();
		display_home_sidebar(); 
	?>
</div>
<!-- //main -->

<?php get_footer(); ?>