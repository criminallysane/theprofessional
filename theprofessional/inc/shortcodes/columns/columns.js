(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_columns', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_columns', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 360 + ed.getLang('jb_shortcode_columns.delta_width', 0),
					height : 255 + ed.getLang('jb_shortcode_columns.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// columns
            ed.addButton('jb_columns', {
                title : 'Insert column',
                image : url+'/columns.png',
				cmd : 'mce_jb_shortcode_columns'
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

	tinymce.PluginManager.add('jb_columns', tinymce.plugins.jb_shortcode_columns);
	
})();