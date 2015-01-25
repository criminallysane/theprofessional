(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_divider', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_divider', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 360 + ed.getLang('jb_shortcode_divider.delta_width', 0),
					height : 140 + ed.getLang('jb_shortcode_divider.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// divider
            ed.addButton('jb_divider', {
                title : 'Insert divider',
                image : url+'/divider.png',
				cmd : 'mce_jb_shortcode_divider'
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

	tinymce.PluginManager.add('jb_divider', tinymce.plugins.jb_shortcode_divider);
	
})();