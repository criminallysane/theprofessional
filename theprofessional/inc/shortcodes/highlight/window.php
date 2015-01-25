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
	<title><?php _e("Highlight Shortcodes","jb_theme"); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
		var selectedContent = tinyMCE.activeEditor.selection.getContent();
		
		if(selectedContent != '') {
			
			document.getElementById('box_text').value = selectedContent;
			
		}
		
	}
	
	function insertShortcode() {
		
		var output;
		
		var box_text = document.getElementById('box_text').value;
			
		if (box_text != '' ){
		
			output = '[highlight] '+box_text+' [/highlight] ';
		
		} else {
			
			alert('Please specify the text to be highlighted.');
			
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

	<form name="jb_box_shortcodes" action="#">
		
		<div class="panel_wrapper">
		
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e("Text","jb_theme"); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="box_text"><span>*</span><?php _e("Text","jb_theme"); ?>:</label></td>					
						<td>					
							<textarea type="text" name="box_text" id="box_text" style="width: 230px;" rows="7"></textarea>					
						</td>					
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Enter the text to be highlighted","jb_theme"); ?></em>
				<br /><br />
			
			</fieldset>
			
		</div>

		<div class="mceActionPanel">
			<input type="button" id="cancel" name="cancel" value="Close" style="float: left;" onclick="tinyMCEPopup.close();" />
			<input type="submit" id="insert" name="insert" value="Insert" style="float: right;" onclick="insertShortcode();" />
		</div>
		
	</form>
</body>
</html>
<?php

?>
