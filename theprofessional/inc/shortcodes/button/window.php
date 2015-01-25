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
	<title><?php _e( "Button Shortcode", "jb_theme" ); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
	
		var button_url = document.getElementById('button_url').value;
		var button_text = document.getElementById('button_text').value;
		var button_align = document.getElementById('button_align').value;
		var button_style = document.getElementById('button_style').value;		
		var button_size = document.getElementById('button_size').value;
		var button_margin = document.getElementById('button_margin').value;
		
		if ( button_style === 'secondary') {
			button_style = 'style="secondary"';
		} else {
			button_style = '';
		}

		if ( button_size === 'large' ) {
			button_size = 'size="large"';
		} else {
			button_size = '';
		}
		
		if ( button_margin != '' ) {
			button_margin = 'margin="'+button_margin+'"';
		}
		
		if (button_text != '' ){
			
			output = '[button align="'+button_align+'" link="'+button_url+'" '+button_size+' '+button_style+' '+button_margin+']'+button_text+'[/button] ';
		
		} else {
			
			alert( 'Please enter the text to appear on your button.' );
			
		}

		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand( 'content', 'mceInsertContent', false, output );
			tinyMCEPopup.editor.execCommand( 'mceRepaint' );
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

	<form name="jb_button_shortcode" action="#">

		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Button URL", "jb_theme" ); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">
				
					<tr>					
						<td nowrap="nowrap"><label for="button_style"><?php _e( "URL", "jb_theme" ); ?>:</label></td>						
						<td>							
							<input type="text" name="button_url" id="button_url" style="width: 230px;"></input>						
						</td>						
					</tr>
					  
				  </table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter the URL the button will link to", "jb_theme" ); ?></em><br />
				<br />
			
			</fieldset>
			
			<br />
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Text", "jb_theme" ); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="button_text"><span>*</span><?php _e( "Text", "jb_theme" ); ?>:</label></td>					
						<td>					
							<input type="text" name="button_text" id="button_text" style="width: 230px;"></input>					
						</td>					
					</tr>				  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter the text to be displayed on the button", "jb_theme" ); ?></em><br />
				<br />
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>					 
						<td nowrap="nowrap"><label for="button_align"><?php _e( "Alignment", "jb_theme" ); ?>:</label></td>
						<td>						
							<select name="button_align" id="button_align" style="width: 210px">
								<option value="left"><?php _e( "Left", "jb_theme" ); ?></option>
								<option value="right"><?php _e( "Right", "jb_theme" ); ?></option>
								<option value="center"><?php _e( "Center", "jb_theme" ); ?></option>
							</select>						
						</td>
					</tr>			  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select button alignment", "jb_theme" ); ?></em><br />
				<br />
			
			</fieldset>
			
			<br />
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e( "Styling", "jb_theme" ); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>					 
						<td nowrap="nowrap"><label for="button_style"><?php _e( "Style","jb_theme" ); ?>:</label></td>
						<td>						
							<select name="button_style" id="button_style" style="width: 210px">
								<option value="normal"><?php _e( "Normal", "jb_theme" ); ?></option>
								<option value="secondary"><?php _e( "Secondary", "jb_theme" ); ?></option>
							</select>						
						</td>
					</tr>			  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select button styling", "jb_theme" ); ?></em><br />
				<br />
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>					 
						<td nowrap="nowrap"><label for="button_size"><?php _e( "Size", "jb_theme" ); ?>:</label></td>
						<td>						
							<select name="button_size" id="button_size" style="width: 210px">
								<option value="normal"><?php _e( "Normal", "jb_theme" ); ?></option>
								<option value="large"><?php _e( "Large", "jb_theme" ); ?></option>
							</select>						
						</td>
					</tr>			  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Select button size", "jb_theme" ); ?></em><br />
				<br />
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="button_margin"><?php _e( "Top Margin", "jb_theme" ); ?>: </label></td>					
						<td>					
							<input type="text" name="button_margin" id="button_margin" style="width: 230px;" value="20"></input>					
						</td>					
					</tr>				  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e( "Enter the size (px) of the top margin", "jb_theme" ); ?></em><br />
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
