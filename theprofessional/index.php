<?php
/**
 * The default template for displaying pages
 *
 * @package WordPress
 * @subpackage TheProfessional
 * @since TheProfessional 1.0
 */
?>
<?php 
	global $options;/** looks for the options in the appearance tab **/
	$pagedesc = get_post_meta($post->ID, 'lp_projectDesc', true);
 ?>
<?php get_header(); ?>

<div id="main">
	<?php if ( have_posts() ) ?>
	<div class="teaser single">
		<div class="bottom">
			<div class="headline primary">
				<div class="pos">
					<h1><?php echo $options['jb_blog_title']; ?></h1>
					<p><?php _e('What matters most; results.', 'jb'); ?></p>
				</div>
			</div>
		</div>		
	</div>
	
	<div class="content sidebar-left">
		
		<?php get_sidebar('blog'); ?>
		
		<div id="main-content">

			<div class="post">
				
				<ul class="row fix">
				
					<?php while ( have_posts() ) : the_post(); ?>				

						<li id="post-<?php the_ID(); ?>"  <?php post_class('one-third'); ?>>
							<div class="meta-cat"><?php the_category(', '); ?></div>
							<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<?php the_post_thumbnail('post-small'); ?>										
							<?php the_excerpt(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="clear"></div><div class="page-link"><span>' . __( 'Pages:', 'jb' ) . '</span>', 'after' => '</div>' ) ); ?>
						</li>
						
					<?php endwhile; wp_reset_query(); ?>
									
				</ul>
				
				<?php if ($wp_query->max_num_pages > 1) : ?>
				<div class="navigation">
					<h3 class="title">
						<span class="fl"><?php next_posts_link(); ?></span>
						<span class="fr"><?php previous_posts_link(); ?></span>
					</h3>
				</div>
				<?php endif; ?>				
				
			</div>
			
		</div>	
			
	</div>
		
	<div class="fix"></div>		

</div>

<?php get_footer(); ?>