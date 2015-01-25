<?php
/**
 * The default template for displaying footer
 *
 * @package WordPress
 * @subpackage TheProfessional
 * @since TheProfessional 1.0
 */
?>

<?php global $options; ?>
</div>
<!-- //container -->

<!-- footer -->	
<footer>
	<p>
		<?php
		if ($options && $options['jb_copyright_wp'] != '') {
		echo $options['jb_copyright_wp']; 
		} ?>
		<?php _e('Designed by Jordan Beasley')?>.
	</p>
</footer>
<!-- //footer -->

<!--[if lt IE 7 ]>
<script src="js/libs/dd_belatedpng.js"></script>
<script> DD_belatedPNG.fix('img, .png_bg');</script>
<![endif]-->
<?php
	if ($options && $options['jb_analytic_wp'] != '') {
	echo $options['jb_analytic_wp']; 
	} ?>
	
<script type="text/javascript">
jQuery = jQuery.noConflict();
jQuery(document).ready(function() {

	if(jQuery('#slider').length>0){

		jQuery('#slider').anythingSlider({
			mode : "fade",
			autoPlay : true,
			autoPlayLocked : true,
			delay : <?php echo $options['jb_slider_pausetime']; ?>,
			resumeDelay : <?php echo $options['jb_slider_pausetime']; ?>,
			animationTime : <?php echo $options['jb_slider_animationSpeed']; ?>,
			<?php if( $options['jb_slider_auseHover'] != 'on') : ?>pauseOnHover: false,<?php endif; ?>
			<?php if( $options['jb_slider_controlNav'] != 'on') : ?>buildNavigation: false,<?php endif; ?>
			hashTags: true,
			buildArrows: false,
			buildNavigation: true,
			buildStartStop: false,
		});

	}

	/* Cycle Updates */
	jQuery('#home-news ul').cycle({
		fx: 'fade',
		speed: 650,
		rev: 'false',
		height: 'auto',
		timeout: 10000,
		next: '#home-news .left', 
		prev: '#home-news .right'
	});

})
</script>
<?php wp_footer(); ?>
</body>
</html>