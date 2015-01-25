jQuery = jQuery.noConflict();
jQuery(window).load(function() {
	
	// Tabs
    jQuery('.panes div').hide();
    jQuery(".tabs a:first").addClass("selected");
    jQuery(".tabs_table").each(function(){
            jQuery(this).find('.panes div:first').show();
            jQuery(this).find('a:first').addClass("selected");
    });
    jQuery('.tabs a').click(function(){
            var which = jQuery(this).attr("rel");
            jQuery(this).parents(".tabs_table").find(".selected").removeClass("selected");
            jQuery(this).addClass("selected");
            jQuery(this).parents(".tabs_table").find(".panes").find("div").hide();
            jQuery(this).parents(".tabs_table").find(".panes").find("#"+which).fadeIn(800);
    });

    // Toggle
	jQuery(".toggle-content .expand-button").click(function() {
		jQuery(this).toggleClass('close').parent('div').find('.expand').slideToggle(250);
	});

	/* Init Functions */
	initFeaturedWorkHover();
	initFeaturedWorkAnim();
	initEvents();			
			
	/* Featured Work */
	function initFeaturedWorkHover() {
		var projects = jQuery('#featured-work li a.tall');
		projects.hover(
			function () { 
				jQuery(this).children('.hover').removeClass('offscreen'); 
			}, 
			function () { 
				jQuery(this).children('.hover').addClass('offscreen');
			}
		);

	};

	function initFeaturedWorkAnim() {
		var project = jQuery('#featured-work li a.tall');
		var projectTxt = project.children('.hover');

		project.children('.hover').css({left: '0px'})
		project.children().children('.hover-bg').fadeTo(1, 0.0)
		project.children().children('.hover-content').css({left: '-300px'})

		project.hover(
			function () {
				jQuery(this).children().children('.hover-content').css({left: '-260px'});
				jQuery(this).children().children('.hover-bg').stop().fadeTo(600, 1);
				jQuery(this).children().children('.hover-content').stop().animate({left: '0px'} , { queue: false, duration: 450, easing: 'easeOutQuint' });
			}, 
			function () {
				jQuery(this).children().children('.hover-bg').stop().fadeTo(800 , 0.0);
				jQuery(this).children().children('.hover-content').stop().animate({left: '300px'} , { queue: false, duration: 300, easing: 'easeOutQuint' });
			}
		);
	};
	
	function initSlideBox() {

		jQuery(window).scroll(function(){
			
			var distanceTop = jQuery('#slideboxplacer').offset().top - jQuery(window).height();

			if  (jQuery(window).scrollTop() > distanceTop)
				jQuery('#slidebox').animate({'right':'0px'},300);
			else
				jQuery('#slidebox').stop(true).animate({'right':'-430px'},100);	
		});

		/* remove the slidebox when clicking the cross */
		jQuery('#slidebox .close').bind('click',function(){
			jQuery(this).parent().remove();
		});
	};
	
	function initEvents() {

		/* Dropdown Navigation */
		jQuery('nav ul.children').hide();
		jQuery('nav ul.sub-menu').hide();
		
		jQuery('nav ul li').hover(function(){
			jQuery(this).find('ul.children').fadeIn('fast');
		},
		function(){
			jQuery(this).find('ul.children').fadeOut('fast');
		})
		
		jQuery('nav ul li').hover(function(){
			jQuery(this).find('ul.sub-menu').fadeIn('fast');
		},
		function(){
			jQuery(this).find('ul.sub-menu').fadeOut('fast');
		})
		
		/* Pretty Photo */
		jQuery("a.modal").attr('rel','gallery[modal]');
		jQuery("a.modal").prettyPhoto({animationSpeed:'normal',theme:'pp_default', show_title : false});

		/* Image Over */
		jQuery('div.showcase img').css({ opacity: 1 });
		jQuery('div.showcase img').hover(function(){
		    jQuery(this).stop().animate({ opacity: .7 }, 250);
		}, function(){
		    jQuery(this).stop().animate({ opacity: 1 }, 350);
		});
		
	};
		
	// get the action filter option item on page load
	var $filterType = jQuery('.load-portfolio li.active a').attr('class');
	
	// get and assign the ourHolder element to the
	// $holder varible for use later
	var $holder = jQuery('ul.portfolio-grid');
	
	// clone all items within the pre-assigned $holder element
	var $data = $holder.clone();
	
	// attempt to call Quicksand when a filter option
	// item is clicked
	jQuery('.load-portfolio li a').click(function(e) {
    
    // reset the active class on all the buttons
    jQuery('.load-portfolio li').removeClass('active');

    // assign the class of the clicked filter option
    // element to our $filterType variable
    var $filterType = jQuery(this).attr('class');
    
    jQuery(this).parent().addClass('active');

    if ($filterType == 'all') {
        // assign all li items to the $filteredData var when
        // the 'All' filter option is clicked
        var $filteredData = $data.find('li');
    }
    else {
        // find all li elements that have our required $filterType
        // values for the data-type element
        var $filteredData = $data.find('li[data-type~=' + $filterType + ']');
    }

    // call quicksand and assign transition parameters
    $holder.quicksand($filteredData, {
        easing: 'easeInOutCirc',
        adjustHeight: 'dynamic'
    });
    return false;
        
    });
	
})