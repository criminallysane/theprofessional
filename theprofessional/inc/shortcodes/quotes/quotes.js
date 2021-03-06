(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_quotes', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_quotes', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 360 + ed.getLang('jb_shortcode_quotes.delta_width', 0),
					height : 310 + ed.getLang('jb_shortcode_quotes.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// quotes
            ed.addButton('jb_quotes', {
                title : 'Insert pull quote',
                image : url+'/quotes.png',
				cmd : 'mce_jb_shortcode_quotes'
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

	tinymce.PluginManager.add('jb_quotes', tinymce.plugins.jb_shortcode_quotes);
	
})();