<?php
/**
 * The default template for displaying search form
 *
 * @package WordPress
 * @subpackage TheProfessional
 * @since TheProfessional 1.0
 */
?>

<div class="search-form fright">
	<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<div>
			<input type="text" size="put_a_size_here" name="s" id="s" value="<?php _e('Type your searching word', 'jb'); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
			<input type="submit" id="searchsubmit" value="Search" />
		</div>
	</form>
</div>