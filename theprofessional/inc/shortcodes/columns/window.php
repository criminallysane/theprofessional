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
	<title><?php _e("Column Shortcodes","jb_theme"); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
		var width;
		
		var column_width = document.getElementById('column_width').value;
		var column_last = document.getElementById('column_last').checked;
			
		if ( column_width == '14' ){
			
			width = 'fourth';
			
		} else if ( column_width == '13' ){
			
			width = 'third';
		
		} else if ( column_width == '12' ){
			
			width = 'half';
		
		} else if ( column_width == '23' ){
			
			width = 'two_thirds';
		
		}
		
		if ( column_last == true ) {
		
			output = '['+width+' end="true"] *your content goes here* [/'+width+']';
			
		} else {
		
			output = '['+width+'] *your content goes here* [/'+width+']';
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

	<form name="jb_columns_shortcode" action="#">

		<div class="panel_wrapper">	
	
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e("Column Width","jb_theme"); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="column_width"><?php _e("Width","jb_theme"); ?>:</label></td>						
						<td>							
							<select name="column_width" id="column_width" style="width: 210px;">                        
								<option value="12"><?php _e("One Half","jb_theme"); ?></option>
								<option value="23"><?php _e("Two Thirds","jb_theme"); ?></option>
								<option value="13"><?php _e("One Third","jb_theme"); ?></option>
								<option value="14"><?php _e("One Fourth","jb_theme"); ?></option>
							</select>						
						</td>						
					</tr>					  
				</table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Choose the width of this column","jb_theme"); ?></em><br/>
				<br/>
				
			</fieldset>
			
			<br />
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e("Options","jb_theme"); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>
						<td nowrap="nowrap"><label for="column_last"><?php _e("This is the last column in this row","jb_theme"); ?>:</label></td>
						<td>
							<input type="checkbox" name="column_last" id="column_last" value="checked" style="width: 50px;"></input>					
						</td>					
					</tr>					  
				</table>
			 
				<em style="font-size: 10px; padding: 5px 0 0"><?php _e("Select the option above if this is the last column in the row. This will remove the column's right margin","jb_theme"); ?></em><br/>
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
