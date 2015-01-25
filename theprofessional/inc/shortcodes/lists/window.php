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
	<title><?php _e("Styled Lists Shortcodes","jb_theme"); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
	
		var list_style = document.getElementById('list_style').value;
			
		if ( list_style == 'tick' ){
		
			output = '[list style="tick"] <li>*List Item*</li> [/list] ';
		
		} else if ( list_style == 'cross' ){
		
			output = '[list style="cross"] <li>*List Item*</li> [/list] ';
			
		} else if ( list_style == 'circle' ){
		
			output = '[list style="circle"] <li>*List Item*</li> [/list] ';
			
		} else if ( list_style == 'square' ){
		
			output = '[list style="square"] <li>*List Item*</li> [/list] ';
			
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
		label span { color: #F00; }	
    </style>
    
</head>
<body onload="init();">

	<form name="jb_list_shortcode" action="#">
	
		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e("Style","jb_theme"); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="list_style"><?php _e("Style","jb_theme"); ?>:</label></td>						
						<td>							
							<select name="list_style" id="list_style" style="width: 230px">                        
								<option value="tick"><?php _e("Tick","jb_theme"); ?></option>
								<option value="cross"><?php _e("Cross","jb_theme"); ?></option>
								<option value="circle"><?php _e("Circle","jb_theme"); ?></option>
								<option value="square"><?php _e("Square","jb_theme"); ?></option>
							</select>						
						</td>						
					</tr>				  
				</table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Choose the list style to be insterted","jb_theme"); ?></em>
				<br /><br />
			
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
