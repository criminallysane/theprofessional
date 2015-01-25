<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage TheProfessional
 * @since TheProfessional 1.0
 */
?>
<?php global $options; ?>
<?php get_header(); ?>

<div id="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php
		$pagedesc = get_post_meta($post->ID, 'lp_pageDesc', true);
		$pagelayout = get_post_meta( $post->ID, 'theme_page_layout', true )
	?>
	<div class="teaser single">
		<div class="bottom">
			<div class="headline primary">
				<div class="pos">
					<h1><?php the_title() ?></h1>
					<p><?php echo $pagedesc; ?></p>
				</div>
			</div>
		</div>		
	</div>
	
	<div class="content <?php if($pagelayout != 'full') : ?>sidebar-<?php if($pagelayout == 'left')  { echo 'left'; } else { echo 'right'; } ?><?php else: ?>full<?php endif; ?>">

		<?php if($pagelayout != 'full') : ?>
		<?php get_sidebar('contact'); ?>
     	<?php endif; ?>
     	
		<div id="main-content">
																
			<?php the_content() ?>
			
		</div>
		
		<div class="fix"></div>
				
	</div>
		
	<div class="fix"></div>
		
	<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>