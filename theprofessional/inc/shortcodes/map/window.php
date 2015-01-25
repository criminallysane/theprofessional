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
	<title><?php _e("Google Map Shortcode","jb_theme"); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
	
		var map_height = document.getElementById('map_height').value;
		var map_zoom = document.getElementById('map_zoom').value;
		var map_address = document.getElementById('map_address').value;
		
		if ( map_height != '') {
			map_height = 'height="'+map_height+'"';
		}
		
		if ( map_zoom != '') {
			map_zoom = 'zoom="'+map_zoom+'"';
		}
		
		if (map_address != '' ){
			
			output = '[map '+map_height+' '+map_zoom+' address="'+map_address+'" ]';
		
		} else {
			
			alert('Please enter the address to display on this map.');
			
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

	<form name="jb_button_shortcode" action="#">

		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e("Options","jb_theme"); ?></legend>
				
				<br />
			
				<table border="0" cellpadding="4" cellspacing="0">
				
					<tr>					
						<td nowrap="nowrap"><label for="map_height"><?php _e("Height","jb_theme"); ?>:</label></td>						
						<td>							
							<input type="text" name="map_height" id="map_height" style="width: 230px;"></input>						
						</td>						
					</tr>
					  
				  </table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Enter the height of this map","jb_theme"); ?></em><br />
				<br />				
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>					 
						<td nowrap="nowrap"><label for="map_zoom"><?php _e("Zoom Level","jb_theme"); ?>:</label></td>
						<td>						
							<select name="map_zoom" id="map_zoom" style="width: 210px">
								<option value="20">20</option>
								<option value="19">19</option>
								<option value="18">18</option>
								<option value="17">17</option>
								<option value="16">16</option>
								<option value="15">15</option>
								<option value="14">14</option>
								<option value="13">13</option>
								<option value="12">12</option>
								<option value="11">11</option>
								<option value="10">10</option>
								<option value="9">9</option>
								<option value="8">8</option>
								<option value="7">7</option>
							</select>						
						</td>
					</tr>			  
				</table>
			
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Select the zoom amount","jb_theme"); ?></em><br />
				<br />
				
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="map_address"><span>*</span><?php _e("Address","jb_theme"); ?>:</label></td>					
						<td>					
							<textarea type="text" name="map_address" id="map_address" style="width: 230px" rows="7"></textarea>					
						</td>				
					</tr>				  
				</table>
				
				<em style="font-size: 10px;padding: 5px 0 0 45px;"><?php _e("Enter the address to show on this map","jb_theme"); ?></em><br/>
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
