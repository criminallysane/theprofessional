(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_postlist', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_postlist', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 403 + ed.getLang('jb_shortcode_postlist.delta_width', 0),
					height : 240 + ed.getLang('jb_shortcode_postlist.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// boxes
            ed.addButton('jb_postlist', {
                title : 'Insert post list',
                image : url+'/postlist.png',
				cmd : 'mce_jb_shortcode_postlist'
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

	tinymce.PluginManager.add('jb_postlist', tinymce.plugins.jb_shortcode_postlist);
	
})();