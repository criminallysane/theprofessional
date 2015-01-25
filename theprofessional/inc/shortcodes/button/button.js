(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_button', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_button', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 526 + ed.getLang('jb_shortcode_button.delta_width', 0),
					height : 470 + ed.getLang('jb_shortcode_button.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// Button
            ed.addButton('jb_linkButton', {
                title : 'Insert a button link',
                image : url+'/button.png',
                cmd : 'mce_jb_shortcode_button'
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

	tinymce.PluginManager.add('jb_linkButton', tinymce.plugins.jb_shortcode_button);
	
})();