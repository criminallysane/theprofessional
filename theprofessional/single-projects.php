<?php
/**
 * The default template for displaying content
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
			$client = get_post_meta($post->ID, 'lp_projectClient', true);
			$casestudy = get_post_meta($post->ID, 'lp_projectCaseStudy', true);
			$role = get_post_meta($post->ID, 'lp_projectRole', true);
			$url = get_post_meta($post->ID, 'lp_projectURL', true);
			$project_gallery = get_post_meta($post->ID, 'jb_project_gallery', true);
			$project_gallery_image_caption = get_post_meta($post->ID, 'jb_project_item_image_caption', true);
			$project_gallery_columns = get_post_meta($post->ID, 'jb_project_gallery_columns', true);
			$moreprojects = $options['jb_more_projects'];
			$terms = get_the_terms($post->ID, 'projects_item_types');
		?>

	<div class="teaser single">
		<div class="bottom">
			<div class="headline primary">
				<div class="pos">
					<h1><?php the_title() ?></h1>
					<p><?php echo $client; ?></p>
				</div>
			</div>		
		</div>
	</div>	

	<div class="fix"></div>

	<div class="content full">
		
		<div id="main-content">
			
			<div class="two-thirds">
				<h3 class="title"><span><?php _e('Case study', 'jb'); ?></span></h3>
				<p><?php echo $casestudy; ?></p>
			</div>
			<div class="one-third last">
				<h3 class="title"><span><?php _e('Details', 'jb'); ?></span></h3>
				<div class="details">
				
				<?php
					if (!empty( $client) ) {
						echo "<p><strong>";
						_e('Client', 'jb'); 
						echo "</strong>$client</p>";
					}

					if (!empty( $terms) ) {
						echo "<p><strong>Deliverables</strong>";
              				if($terms) { 
								$numTerms = count($terms);
								$i = 1;
								foreach($terms as $term) {
									echo $term->name;
									if($i < $numTerms)
									echo ', '; 
									$i++;
								}
							}
						echo "</p>";
					}

					if (!empty( $role) ) {
						echo "<p><strong>";
						_e('Role', 'jb'); 
						echo "</strong>$role</p>";
					}

					if (!empty( $url) ) {
						echo "<p><strong>";
						_e('URL', 'jb'); 
						echo "</strong>";
						echo "<a href='$url'>";
						_e('Launch project', 'jb'); 
						echo "</a></p>";
					}
				?>
				</div>

			</div>

			<div class="fix"></div>

			<?php the_content() ?>

			<?php if( $project_gallery ) : ?>
				<h3 class="title"><span><?php _e('Project Gallery', 'jb'); ?></span></h3>
				<ul id="gallery" class="<?php echo $project_gallery_columns ?>">
					<?php foreach( $project_gallery as $item ) : ?>
						<?php if( $item['jb_project_item_image'] ) : ?>
							<li>
								<a class="modal" rel="prettyPhoto[modal]" href="<?php echo $item['jb_project_item_image']; ?>" title="<?php echo $item['jb_project_item_image_caption'] ?>"><img class="scale-with-grid" src="<?php echo $item['jb_project_item_image']; ?>"/></a> 
								<span class="caption"><?php echo $item['jb_project_item_image_caption'] ?></span>      	
							</li>
						<?php endif; ?>
						<?php // Video
						if( $item['jb_project_item_video'] ) : ?>
							<li>
								<?php echo wp_oembed_get( $item['jb_project_item_video'], array('width'=> ''. $item['jb_project_item_size'] .'') ); ?>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>			
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
				
				<p class="small"><a href="<?php echo get_permalink($moreprojects); ?>" title="<?php _e('Browse all projects', 'jb'); ?>"><?php _e('Browse all projects', 'jb'); ?></a></p>
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
							
	</div>
		
	<div class="fix"></div>
		
	<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
