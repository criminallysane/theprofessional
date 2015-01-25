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
	<title><?php _e("Post List Shortcode","jb_theme"); ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo includes_url() ?>js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo includes_url(); ?>js/tinymce/tiny_mce_popup.js"></script>	
	<script language="javascript" type="text/javascript">
	function init() {
		
		tinyMCEPopup.resizeToInnerSize();
		
	}
	
	function insertShortcode() {
		
		var output;
		
		var postlist_title = document.getElementById('postlist_title').value;
		var postlist_number = document.getElementById('postlist_number').value;
		var postlist_category = document.getElementById('postlist_category').value;		
		
		if ( postlist_title != '' ){
			postlist_title = ' title="'+postlist_title+'"';
		}
		if ( postlist_number != '' ){
			postlist_number = ' number="'+postlist_number+'"';
		}
		if ( postlist_category != '' ){
			postlist_category = ' category="'+postlist_category+'"';
		}		

		output = '[postlist' + postlist_title + postlist_number + postlist_category + ']';
		
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

	<form name="jb_postlist_shortcodes" action="#">
		
		<div class="panel_wrapper">
			
			<fieldset style="padding-left: 15px;">
			
				<legend><?php _e("Options","jb_theme"); ?></legend>
				
				<br />
				
				<!-- TITLE -->
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="postlist_title"><?php _e("Title","jb_theme"); ?>:</label></td>					
						<td>					
							<input type="text" name="postlist_title" id="postlist_title" style="width: 230px;"></input>				
						</td>					
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Text to display above post list","jb_theme"); ?></em>
				<br /><br />
				
				<!-- NUMBER -->
				<table border="0" cellpadding="4" cellspacing="0">				
					<tr>					 
						<td nowrap="nowrap"><label for="postlist_number"><?php _e("Number of posts","jb_theme"); ?>:</label></td>						
						<td>						
							<select name="postlist_number" id="postlist_number" style="width: 210px"> 							
								<option value="-1"><?php _e("All","jb_theme"); ?>All</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
							</select>						
						</td>						
					</tr>					  
				  </table>
				  
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Select the max number of posts to display","jb_theme"); ?></em><br />
				<br />
				
				<!-- CATEGORY -->
				<table border="0" cellpadding="4" cellspacing="0">				  
					<tr>				 
						<td nowrap="nowrap"><label for="postlist_category"><?php _e("Category Slug","jb_theme"); ?>:</label></td>					
						<td>					
							<input type="text" name="postlist_category" id="postlist_category" style="width: 230px;"></input>				
						</td>					
					</tr>				  
				</table>
				
				<em style="font-size: 10px; padding: 5px 0 0 45px;"><?php _e("Slug of category to display","jb_theme"); ?></em>
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
