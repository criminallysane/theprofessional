<?php
/**
 * Template Name: Projects Page
 *
 * @package WordPress
 * @subpackage TheProfessional
 * @since TheProfessional 1.0
 */
?>
<?php global $options; ?>
<?php get_header(); ?>

<div id="main">
			
	<div class="content full">
			
		<?php query_posts('post_type=projects&orderby=date&posts_per_page=1'); if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php
				$pagedesc = get_post_meta($post->ID, 'lp_projectDesc', true);
			?>
			<div class="teaser">
				<div class="bottom">
					<div class="headline primary">
						<div class="pos">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
								<h1><?php the_title() ?></h1>
							</a>
							<p><?php echo $pagedesc; ?></p>
						</div>
					</div>
				</div>
				<div class="media">
					<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('project-large'); ?>
					</a>
				</div>
				<div class="tools">
					<p><?php _e('Latest project', 'jb'); ?></p>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	
		<div class="fix"></div>
		
		<div id="main-content">

			<div class="filter">

				<h3 class="title"><span><?php _e('All projects', 'jb'); ?></span></h3>
				
				<ul class="load-portfolio">
					<li class="active"><a href="#" class="all"><?php _e('All', 'jb'); ?></a></li>
				    <?php
				    $args = array( 'taxonomy' => 'projects_item_types' );
				    $terms = get_terms('projects_item_types', $args);
				    $count = count($terms); $i=0;
				    if ($count > 0) {
				     foreach($terms as $term) { 
						$term_name = $term->name;
						$term_slug = $term->slug; ?>
						<li class="<?php echo $term_name; ?>"><a class="<?php echo $term_name; ?>" href="#" data-filter=".<?php echo $term_slug; ?>"><?php echo $term_name; ?></a></li>
					<?php } 
				  
				    }
				    ?>
				</ul>
								
			</div>
					
			<div id="featured-work">
				
				<ul class="portfolio-grid">
				<?php query_posts('post_type=projects&offset=1&posts_per_page=100'); if ( have_posts() ) while ( have_posts() ) : the_post(); ?>				
				<?php 
					$terms = get_the_terms($post->ID, 'projects_item_types');
				 ?>
				<li class="view view-first" data-id="<?php echo 'post-'.get_the_ID().'' ?>" data-type="<?php if($terms) : foreach($terms as $term) : echo $term->name. ' '; endforeach; endif; ?>">
                    <a class="tall" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_post_thumbnail('project-small'); ?> 
                    <div class="mask">
                        <h2><?php the_title(); ?></h2>
                        <p class="type">
               			<?php 
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
               			?>     	
						</p>
                    </div>
                    </a>
                </li>
                <?php endwhile; wp_reset_postdata(); ?>  
                </ul>

			</div>
		
		</div>
	
	</div>
	
	<div class="fix">&nbsp;</div>
	
</div>

<?php get_footer(); ?>
