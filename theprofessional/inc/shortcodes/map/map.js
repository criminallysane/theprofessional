(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_googleMap', {		 
		init : function(ed, url) {
			
			ed.addCommand('mce_jb_shortcode_googleMap', function() {
				
				ed.windowManager.open({
					
					file : url + '/window.php',
					width : 526 + ed.getLang('jb_shortcode_googleMap.delta_width', 0),
					height : 310 + ed.getLang('jb_shortcode_googleMap.delta_height', 0),
					inline : 1
					
				}, {
					
					plugin_url : url // Plugin absolute URL
					
				});
			});
			
			// Button
            ed.addButton('jb_googleMap', {
                title : 'Insert a google map',
                image : url+'/map.png',
                cmd : 'mce_jb_shortcode_googleMap'
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

	tinymce.PluginManager.add('jb_googleMap', tinymce.plugins.jb_shortcode_googleMap);
	
})();