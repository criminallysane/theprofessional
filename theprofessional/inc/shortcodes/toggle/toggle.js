(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_toggle', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_toggle', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 360 + ed.getLang('jb_shortcode_toggle.delta_width', 0),
					height : 400 + ed.getLang('jb_shortcode_toggle.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// Toggle
			ed.addButton('jb_toggle', {
				title : 'Insert a toggled content',
				image : url+'/toggle.png',
				cmd : 'mce_jb_shortcode_toggle'
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

	tinymce.PluginManager.add('jb_toggle', tinymce.plugins.jb_shortcode_toggle);
	
})();