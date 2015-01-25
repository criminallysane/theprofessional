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
	<title><?php _e("Divider Shortcodes","jb_theme"); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
		
		var divider_style = document.getElementById('divider_style').value;
			
		if ( divider_style == 'thick' ){
			
			output = '[divider style="thick]';
			
		} else if ( divider_style == 'thin' ){
			
			output = '[divider]';
		
		} else if ( divider_style == 'top link' ){
			
			output = '[divider style="top"]';
		
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

	<form name="jb_columns_shortcode" action="#">

		<div class="panel_wrapper">	
	
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e("Divider Style","jb_theme"); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="divider_style"><?php _e("Style","jb_theme"); ?>:</label></td>						
						<td>							
							<select name="divider_style" id="divider_style" style="width: 210px">                        
								<option value="thin"><?php _e("Thin","jb_theme"); ?></option>								
								<option value="top link"><?php _e("Thin + Top Link","jb_theme"); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Choose a divider style","jb_theme"); ?></em><br/>
				<br/>
				
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
