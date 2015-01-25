<?php
/**
 * The default template for displaying Archive
 *
 * @package WordPress
 * @subpackage TheProfessional
 * @since TheProfessional 1.0
 */
?>

<?php get_header(); ?>

<div id="main">
	<?php if (have_posts()) : ?>
	<div class="teaser single">
		<div class="bottom">
			<div class="headline primary">
				<div class="pos">
					<h1><?php _e('Archives', 'jb'); ?></h1>
					<p><?php if ( is_day() ) : ?>
						<?php printf( __( '%s', 'jb' ), get_the_date() ); ?>
					<?php elseif ( is_month() ) : ?>
						<?php printf( __( '%s', 'jb' ), get_the_date('F Y') ); ?>
					<?php elseif ( is_year() ) : ?>
						<?php printf( __( '%s', 'jb' ), get_the_date('Y') ); ?>
					<?php else : ?>
						<?php _e( 'Blog Archives', 'jb' ); ?>
					<?php endif; ?></p>
				</div>
			</div>
		</div>		
	</div>
	
	<div class="content sidebar-left">
		
		<?php get_sidebar('blog'); ?>
		
		<div id="main-content">

			<div class="post">
				
				<ul class="row fix">
				
					<?php while (have_posts()) : the_post(); ?>				

						<li class="one-third">
							<div class="meta-cat"><?php the_category(', '); ?></div>
							<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<?php the_post_thumbnail('post-small'); ?>										
							<?php the_excerpt(); ?>
						</li>
						
					<?php endwhile; endif; ?>
				
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
