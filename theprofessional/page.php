<?php
/**
 * The default template for displaying all pages
 *
 * @package WordPress
 * @subpackage TheProfessional
 * @since TheProfessional 1.0
 */
?>

<?php global $options; ?>
<?php get_header(); ?>

<div id="main" role="main">	

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php
		$pagedesc = get_post_meta($post->ID, 'lp_pageDesc', true);
		$pagelayout = get_post_meta( $post->ID, 'theme_page_layout', true );
		$header_slider = get_post_meta($post->ID, 'jb_page_header_slider', true );
	?>
	

		<?php if( $header_slider ) : ?>
			<!-- .slider -->
			<?php $shortcode = '[slider id="' . $header_slider . '"]'; ?>
			<?php echo do_shortcode( $shortcode ); ?>
			<!-- /.slider -->
		<?php endif; ?>	

	
	<div class="teaser single">
		<div class="bottom">
			<div class="headline primary">
				<div class="pos">
					<h1><?php the_title() ?></h1>
					<span><?php echo $pagedesc; ?></span>
				</div>
			</div>
		</div>		
	</div>
	
	<div class="content <?php if($pagelayout != 'full') : ?>sidebar-<?php if($pagelayout == 'left')  { echo 'left'; } else { echo 'right'; } ?><?php else: ?>full<?php endif; ?>">

        <?php if($pagelayout != 'full') : ?>
		<?php get_sidebar('page'); ?>
        <?php endif; ?>
		
		<div id="main-content">
			<?php the_content() ?>
		</div>	
			
	</div>
		
	<div class="fix"></div>
		
	<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
