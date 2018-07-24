jQuery.noConflict();
jQuery( document ).ready(function($) {

    /**
	 * Main menu dropdown slidedown and slideup effects
	 */
	$('.dropdown').on('show.bs.dropdown', function(e){
		$(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
	});
	
	$('.dropdown').on('hide.bs.dropdown', function(e){
		$(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
	});	

    /**
	 * Bootstrap Carousel Homepage
	 */
	//$("#carouselhome").carousel();
	$('.carousel').carousel();
	
    /**
	 * Back to Top Page
	 */
	// Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('#to_top').fadeIn();
		} else {
			$('#to_top').fadeOut();
		}
	});
	
	// Click event to scroll to top
	$('#to_top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

});
