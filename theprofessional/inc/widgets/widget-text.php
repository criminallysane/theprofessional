<?php
/*
 * Plugin Name: Cool Text Widget
 * Description: Cool Text widget
 * Version: 1.0
 * Author: jb
 * Author URI: http://themeforest.net/user/jb/
 */

add_action('widgets_init', create_function('', 'return register_widget("jb_text_widget");'));
class jb_text_widget extends WP_Widget {

	
	/*	----------------------------------------------------------
		Widget actual processes
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	
	public function __construct() {
		parent::__construct(
			'jb_text_widget', // Base ID
			'Cool Text Widget', // Name
			array( 'description' => __( 'A text widget with few different options.', 'jb' ), ) // Args
		);
	}

	/*	----------------------------------------------------------
		Outputs the options form on admin
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	public function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}
		else {
			$title = __( '', 'jb' );
		}

		if ( $instance ) {
			$content = esc_attr( $instance[ 'content' ] );
		}
		else {
			$content = __( '', 'jb' );
		}

		if ( $instance ) {
			$width = esc_attr( $instance[ 'width' ] );
		}
		else {
			$width = __( '', 'jb' );
		}

		if ( $instance ) {
			$last = esc_attr( $instance[ 'last' ] );
		}
		else {
			$last = __( '', 'jb' );
		}

		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('jb:', 'jb'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>"><?php echo $content; ?>
		</textarea>

				<!-- Width -->
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width :', 'jb') ?></label>
			<select id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" class="widefat">
				<option value="full" <?php selected( 'full', $width ); ?>><?php _e('full', 'jb'); ?></option>
				<option value="one-half" <?php selected( 'one-half', $width ); ?>><?php _e('one-half', 'jb'); ?></option>
				<option value="one-third" <?php selected( 'one-third', $width ); ?>><?php _e('one-third', 'jb'); ?></option>
				<option value="two-thirds" <?php selected( 'two-thirds', $width ); ?>><?php _e('two-thirds', 'jb'); ?></option>
				<option value="one-fourth" <?php selected( 'one-fourth', $width ); ?>><?php _e('one-fourth', 'jb'); ?></option>
				<option value="three-fourths" <?php selected( 'three-fourths', $width ); ?>><?php _e('three-fourths', 'jb'); ?></option>
				<option value="one-fifth" <?php selected( 'one-fifth', $width ); ?>><?php _e('one-fifth', 'jb'); ?></option>
				<option value="two-fifths" <?php selected( 'two-fifths', $width ); ?>><?php _e('two-fifths', 'jb'); ?></option>
				<option value="three-fifths" <?php selected( 'three-fifths', $width ); ?>><?php _e('three-fifths', 'jb'); ?></option>
				<option value="four-fifths" <?php selected( 'four-fifths', $width ); ?>><?php _e('four-fifths', 'jb'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'last' ); ?>"><?php _e('Give a "Last" class?:', 'jb') ?></label>
			<select id="<?php echo $this->get_field_id( 'last' ); ?>" name="<?php echo $this->get_field_name( 'last' ); ?>" class="widefat">
				<option value="yes" <?php selected( 'yes', $last ); ?>><?php _e('yes', 'jb'); ?></option>
				<option value="no" <?php selected( 'no', $last ); ?>><?php _e('no', 'jb'); ?></option>
			</select>
		</p>


	<?php }

	/*	----------------------------------------------------------
		Processes widget options to be saved
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = sanitize_text_field($new_instance['title']);

		$instance['content'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['content']) ) );
		$instance['width'] = sanitize_text_field($new_instance['width']);
		$instance['last'] = sanitize_text_field($new_instance['last']);
		return $instance;
	}

	/*	----------------------------------------------------------
		Outputs the content of the widget
	= = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */
	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$content = apply_filters( 'widget_text', $instance['content'], $instance );
		$width = $instance['width'];
		$last = $instance['last'];

		?>
				
		<div class="<?php echo $width; ?> <?php if($last == 'yes') {  ?>last<?php } ?> fix">
		<?php if ( !empty( $title ) ) { ?> <h3 class="title"><span><?php echo $title; ?></span></h3> <?php } ?>
			<div class="textwidget"><p><?php echo $content; ?></p></div>
		</div>
	<?php 
	}

}