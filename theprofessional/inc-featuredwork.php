<h3 class="title"><span><?php _e('Featured work', 'jb'); ?></span></h3>

<div id="featured-work">

	<ul>				
		<?php query_posts('post_type=projects&posts_per_page=6'); if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php 
			$terms = get_the_terms($post->ID, 'projects_item_types');
		?>
		<li class="view view-first">
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

<div class="fix"></div>