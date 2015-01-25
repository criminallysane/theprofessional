<?php
	
	// Setup location of WordPress
	$absolute_path = __FILE__;
	$path_to_file = explode( 'wp-content', $absolute_path );
	$path_to_wp = $path_to_file[0];

	// Access WordPress
	require_once( $path_to_wp.'/wp-load.php' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php _e("Emphasis Shortcodes","jb_theme"); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
	
		var emphasis_text = document.getElementById('emphasis_text').value;
		var emphasis_align = document.getElementById('emphasis_align').value;
		
		if (emphasis_text != '' ){
			
			output = '[emphasis align="'+emphasis_align+'"]'+emphasis_text+'[/emphasis] ';
		
		} else {
			
			alert('Please enter some text.');
			
		}

		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, output);
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
	}
	</script>
	<base target="_self" />
    
	<style type="text/css">	
		label span { color: #f00; }	
    </style>
    
</head>
<body onload="init();">

	<form name="jb_emphasis_shortcode" action="#">

		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e("Text","jb_theme"); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="emphasis_text"><span>*</span><?php _e("Text","jb_theme"); ?>:</label></td>					
						<td>					
							<textarea type="text" name="emphasis_text" id="emphasis_text" style="width: 230px" rows="7"></textarea>					
						</td>					
					</tr>				  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Enter the text to be displayed","jb_theme"); ?></em><br />
				<br />
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>					 
						<td nowrap="nowrap"><label for="emphasis_align"><?php _e("Alignment","jb_theme"); ?>:</label></td>
						<td>						
							<select name="emphasis_align" id="emphasis_align" style="width: 210px">
								<option value="left"><?php _e("Left","jb_theme"); ?></option>
								<option value="right"><?php _e("Right","jb_theme"); ?></option>
								<option value="center"><?php _e("Center","jb_theme"); ?></option>
							</select>						
						</td>
					</tr>			  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Select emphasis text alignment","jb_theme"); ?></em><br />
				<br />
			
			</fieldset>
				
		</div>

		<div class="mceActionPanel">
			<input type="button" id="cancel" name="cancel" value="Close" style="float: left" onclick="tinyMCEPopup.close();" />
			<input type="submit" id="insert" name="insert" value="Insert" style="float: right" onclick="insertShortcode();" />
		</div>
	
	</form>
	
</body>
</html>
<?php

?>
