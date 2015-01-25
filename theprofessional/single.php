<?php
/**
 * The default template for displaying all single posts.
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
		$pagedescription = get_post_meta($post->ID, 'lp_pageDesc', true);
	?>

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
				
				<div class="head">
					<div class="three-fourths">
						<div class="meta-cat"><?php the_category(', '); ?></div>
						<h2><?php the_title(); ?></h2>						
					</div>
					<div class="one-fourth last">
						<div class="details">
							<p><?php the_time('F j, Y'); ?></p>
							<p class="comments"><a href="#comments" title="Jump to the comments"><?php comments_number('0 Comments','1 Comment','% Comments'); ?></a></p>							
						</div>
					</div>
					<div class="fix"></div>
				</div>
				
				<div class="entry">
					<?php the_content(); ?>					
				</div>

				<div class="fix"></div>

				<div id="slideboxplacer"></div>
				<div id="slidebox">
					<a class="close"></a>
					<h3 class="title"><span><?php _e('What is next?', 'jb'); ?></span></h3>
					<div>
						<?php next_post_link( '%link', '<p>' . _x( '&rarr;', 'Next post link', 'jb' ) . ' %title</p>' ); ?><?php previous_post_link( '%link', '<p>' . _x( '&larr;', 'Previous post link', 'jb' ) . ' %title</p>' ); ?>
					</div>
					<div class="more">
						<p class="small"><?php _e('Read more in:', 'jb'); ?> <?php the_category(', '); ?></p>
					</div>
				</div>

				<script>
					jQuery(window).scroll(function(){

						var distanceTop = jQuery('#slideboxplacer').offset().top - jQuery(window).height();

						if  (jQuery(window).scrollTop() > distanceTop)
							jQuery('#slidebox').animate({'right':'0px'},300);
						else
							jQuery('#slidebox').stop(true).animate({'right':'-430px'},100);	
					});

					/* remove the slidebox when clicking the cross */
					jQuery('#slidebox .close').bind('click',function(){
						jQuery(this).parent().remove();
					});
				</script>
				
				<div class="fix"></div>
								

				<?php comments_template(); ?>

				
				<div class="fix"></div>
								
				<?php endwhile; else: ?>
					<h1><?php _e('Sorry, no posts matched your criteria.', 'jb'); ?></h1>
				<?php endif; ?>

			</div>
			
		</div>	
			
	</div>
		
	<div class="fix"></div>		

</div>

<?php get_footer(); ?>
