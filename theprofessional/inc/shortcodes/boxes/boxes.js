(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_boxes', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_boxes', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 360 + ed.getLang('jb_shortcode_boxes.delta_width', 0),
					height : 310 + ed.getLang('jb_shortcode_boxes.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// boxes
            ed.addButton('jb_boxes', {
                title : 'Insert styled box',
                image : url+'/boxes.png',
				cmd : 'mce_jb_shortcode_boxes'
            });
			
		},

		getInfo : function() {
			
			return {				
				longname : "jb Shortcodes",
                author : 'Jordan Beasley',
                authorurl : 'http://jordanbeasley.tk/',
                infourl : 'http://jordanbeasley.tk/',
                version : "1.0"				
			};
			
		}		
	});

	tinymce.PluginManager.add('jb_boxes', tinymce.plugins.jb_shortcode_boxes);
	
})();