<?php
/*
 * Plugin Name: Twitter Widget
 * Plugin URL: http://github.com/criminallysane/
 * Description: A simple widget that displays tweets
 * Version: 1.0
 * Author: Jordan Beasley
 * Author URL: http://jordanbeasley.tk
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'jb_tweets_widgets' );

/*
 * Register widget.
 */
function jb_tweets_widgets() {
	register_widget( 'jb_Tweet_Widget' );
}

/*
 * Widget class.
 */
class jb_tweet_widget extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function jb_Tweet_Widget() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'jb_tweet_widget', 'description' => __('A simple widget that displays your latest tweets.', 'jb') );

		/* Create the widget. */
		$this->WP_Widget( 'jb_tweet_widget', __('Latest Tweets','jb'), $widget_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */	
		$user = $instance['user'];
		$postcount = $instance['postcount'];
		$title = $instance['title'];
        $width = $instance['width'];
        $last = $instance['last'];	

		/* Before widget (defined by themes). */
        echo $before_widget;

        /* Display Latest Tweets */
        ?>

        <div class="widget <?php echo $width; ?> <?php if($last == 'yes') {  ?>last<?php } ?>">

		<h3 class="title"><span><?php echo $title ?></span></h3>     
		<div class="tweet"></div>

		<script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/libs/jquery.tweet.js' ?>"></script>
		<script type='text/javascript'>
		jQuery(document).ready(function(){
		jQuery(".tweet").tweet({
			username: "<?php echo $user ?>",
			join_text: "",
			count: <?php echo $postcount ?>,
			auto_join_text_ed: "",
			auto_join_text_ing: "",
			auto_join_text_reply: "",
			auto_join_text_url: "",
			loading_text: "loading tweets..."
		})

		.bind('loaded',function(){
			var current = 0,
		   	timebetween = 4000,
		   	tweetlist = jQuery('.tweet_list'),
		   	tweets = tweetlist.find('li'),
		   	count = tweets.length,
		   	interval = setInterval(function() {
		       	tweets.eq(current).slideUp(function(){
		            	jQuery(this).appendTo(tweetlist);
		         	});
		       	(current + 1 < count) ? current++ : current = 0;
		       	tweets.eq(current).slideDown();
			}, timebetween);
			tweets.hide().eq(current).show();
			});
		});
		</script>
		
		</div>
               
	<?php 

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['user'] = strip_tags( $new_instance['user'] );
		$instance['postcount'] = strip_tags( $new_instance['postcount'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
        $instance['width'] = $new_instance['width'];
        $instance['last'] = $new_instance['last'];
		return $instance;
	}
	
	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */
		 
	function form($instance) {

		/* Set up some default widget settings. */
		$defaults = array(
			'user' => 'simonbouchard',
			'postcount' => '5',
			'title' => 'Twitted Feeds',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Heading:', 'jb') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<!-- Username: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'user' ); ?>"><?php _e('Username:', 'jb') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'user' ); ?>" name="<?php echo $this->get_field_name( 'user' ); ?>" value="<?php echo $instance['user']; ?>" />
		</p>
		
		<!-- Postcount: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of tweets (max 20)', 'jb') ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width :', 'jb') ?></label>
			<select id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" class="widefat">
                <option <?php if ( 'full' == $instance['width'] ) echo 'selected="selected"'; ?>>full</option>
				<option <?php if ( 'one-half' == $instance['width'] ) echo 'selected="selected"'; ?>>one-half</option>
				<option <?php if ( 'one-third' == $instance['width'] ) echo 'selected="selected"'; ?>>one-third</option>
				<option <?php if ( 'two-thirds' == $instance['width'] ) echo 'selected="selected"'; ?>>two-thirds</option>
				<option <?php if ( 'one-fourth' == $instance['width'] ) echo 'selected="selected"'; ?>>one-fourth</option>
				<option <?php if ( 'three-fourths' == $instance['width'] ) echo 'selected="selected"'; ?>>three-fourths</option>
				<option <?php if ( 'one-fifth' == $instance['width'] ) echo 'selected="selected"'; ?>>one-fifth</option>
				<option <?php if ( 'two-fifths' == $instance['width'] ) echo 'selected="selected"'; ?>>two-fifths</option>
				<option <?php if ( 'three-fifths' == $instance['width'] ) echo 'selected="selected"'; ?>>three-fifths</option>
				<option <?php if ( 'four-fifths' == $instance['width'] ) echo 'selected="selected"'; ?>>four-fifths</option>


			</select>
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'last' ); ?>"><?php _e('Give a "Last" class?:', 'jb') ?></label>
			<select id="<?php echo $this->get_field_id( 'last' ); ?>" name="<?php echo $this->get_field_name( 'last' ); ?>" class="widefat">
				<option <?php if ( 'yes' == $instance['last'] ) echo 'selected="selected"'; ?>>yes</option>
                <option <?php if ( 'no' == $instance['last'] ) echo 'selected="selected"'; ?>>no</option>
			</select>
		</p>
				
	<?php
	}
}
?>