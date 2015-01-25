(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_emphasis', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_emphasis', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 526 + ed.getLang('jb_shortcode_emphasis.delta_width', 0),
					height : 262 + ed.getLang('jb_shortcode_emphasis.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// emphasis
            ed.addButton('jb_emphasis', {
                title : 'Insert an emphasis styled text',
                image : url+'/emphasis.png',
                cmd : 'mce_jb_shortcode_emphasis'
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

	tinymce.PluginManager.add('jb_emphasis', tinymce.plugins.jb_shortcode_emphasis);
	
})();