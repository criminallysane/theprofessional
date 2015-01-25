<?php
/**
 * The default template for displaying tags
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
					<h1><?php the_title() ?></h1>
					<p><?php printf( __( 'Tag Archives: %s', 'jb' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></p>
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
							<h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
							<?php the_post_thumbnail('post-small'); ?>										
							<?php the_excerpt(); ?>
						</li>
						
					<?php endwhile; endif; ?>
				
				</ul>

			</div>
			
		</div>	
			
	</div>
		
	<div class="fix"></div>		

</div>

<?php get_footer(); ?>
