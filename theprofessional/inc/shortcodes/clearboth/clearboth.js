(function() {
	
	tinymce.create('tinymce.plugins.jb_shortcode_clearboth', {		 
		init : function(ed, url) {
			
			// Clearboth
            ed.addButton('jb_clearboth', {
                title : 'Reset top margins',
                image : url+'/clearboth.png',
                onclick : function() {
                    ed.execCommand('mceInsertContent', false, '[clearboth] ');
                }
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

	tinymce.PluginManager.add('jb_clearboth', tinymce.plugins.jb_shortcode_clearboth);
	
})();