(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_lists', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_lists', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 360 + ed.getLang('jb_shortcode_lists.delta_width', 0),
					height : 140 + ed.getLang('jb_shortcode_lists.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// lists
            ed.addButton('jb_lists', {
                title : 'Insert list',
                image : url+'/lists.png',
				cmd : 'mce_jb_shortcode_lists'
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

	tinymce.PluginManager.add('jb_lists', tinymce.plugins.jb_shortcode_lists);
	
})();