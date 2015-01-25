(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_highlight', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_highlight', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 360 + ed.getLang('jb_shortcode_highlight.delta_width', 0),
					height : 210 + ed.getLang('jb_shortcode_highlight.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// boxes
            ed.addButton('jb_highlight', {
                title : 'Insert highlighted text',
                image : url+'/highlight.png',
				cmd : 'mce_jb_shortcode_highlight'
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

	tinymce.PluginManager.add('jb_highlight', tinymce.plugins.jb_shortcode_highlight);
	
})();