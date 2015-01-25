<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Social Network Icons Widget
	Description: A widget that displays your social links
	Version: 1.0

-----------------------------------------------------------------------------------*/
add_action('widgets_init', create_function('', 'return register_widget("jb_social_widget");'));
class jb_social_widget extends WP_Widget {
	
	function jb_social_widget (){
		
		$widget_ops = array( 'classname' => 'social', 'description' => 'A widget that displays your social network links' );
		$control_ops = array( 'width' => 250, 'height' => 120, 'id_base' => 'social-widget' );
		$this->WP_Widget( 'social-widget', 'Social Networks', $widget_ops, $control_ops );
		
	}
	
	function widget($args, $instance){
			
		extract($args);
			
		$title = apply_filters('widget_title', $instance['title']);
		$twitter = $instance['twitter'];
		$facebook = $instance['facebook'];
		$googleplus = $instance['googleplus'];
		$pinterest = $instance['pinterest'];
		$linkedin = $instance['linkedin'];
		$github = $instance['github'];
		$rss = $instance['rss'];
			
		echo $before_widget;
			
		echo $before_title.$title.$after_title;
			
		echo '<ul class="social clearfix">';

		if($twitter)
			echo '<li><a target="_blank" href="' . $twitter . '"><span class="icon-twitter"></span></a></li>';
		if($facebook)
			echo '<li><a target="_blank" href="' . $facebook . '"><span class="icon-facebook"></span></a></li>';
		if($googleplus)
			echo '<li><a target="_blank" href="' . $googleplus . '"><span class="icon-google-plus"></span></a></li>';
		if($pinterest)
			echo '<li><a target="_blank"  href="' . $pinterest . '"><span class="icon-pinterest"></span></a></li>';
		if($linkedin)
			echo '<li><a target="_blank" href="' . $linkedin . '"><span class="icon-linkedin"></span></a></li>';
		if($github)
			echo '<li><a target="_blank" href="' . $github . '"><span class="icon-github"></span></a></li>';
		if($rss)
			echo '<li><a target="_blank" href="' . $rss . '"><span class="icon-rss"></span></a></li>';

		echo '</ul>';
			
		echo $after_widget;
			
	}
    
	function update($new_instance, $old_instance){
		
		$instance = $old_instance;
		
		foreach ($new_instance as $socialName => $socialUrl) {
		    $instance[$socialName] = $socialUrl;
		}
		return $instance;
			
	}
		
	function form($instance){
		
		$defaults = array( 
			'title' => 'Social Links', 
			'twitter' => '', 
			'facebook' => '', 
			'googleplus' => '', 
			'pinterest' => '',
			'linkedin' => '', 
			'github' => '', 
			'rss' => ''
		);
			
		$instance = wp_parse_args((array) $instance, $defaults);
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'jb'); ?></label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter link:', 'jb'); ?></label>
				<input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook link:', 'jb'); ?></label>
				<input id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php _e('Google Plus link:', 'jb'); ?></label>
				<input id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo $instance['googleplus']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest link:', 'jb'); ?></label>
				<input id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('LinkedIn link:', 'jb'); ?></label>
				<input id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e('GitHub link:', 'jb'); ?></label>
				<input id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo $instance['github']; ?>" style="width:100%;" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e('RSS link:', 'jb'); ?></label>
				<input id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" style="width:100%;" />
			</p>
		<?php
			
	}

}

?>