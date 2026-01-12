jQuery(function($) {'use strict';

	//Responsive Nav
	$('li.dropdown').find('.fa-angle-down').each(function(){
		$(this).on('click', function(){
			if( $(window).width() < 768 ) {
				$(this).parent().next().slideToggle();
			}
			return false;
		});
	});

	//Fit Vids
	if( $('#video-container').length ) {
		$("#video-container").fitVids();
	}

	//Initiat WOW JS
	new WOW().init();

	// portfolio filter
	$(window).load(function(){

		$('.main-slider').addClass('animate-in');
		$('.preloader').remove();
		//End Preloader

		if( $('.masonery_area').length ) {
			$('.masonery_area').masonry();//Masonry
		}

		var $portfolio_selectors = $('.portfolio-filter >li>a');
		
		if($portfolio_selectors.length) {
			
			var $portfolio = $('.portfolio-items');
			$portfolio.isotope({
				itemSelector : '.portfolio-item',
				layoutMode : 'fitRows'
			});
			
			$portfolio_selectors.on('click', function(){
				$portfolio_selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$portfolio.isotope({ filter: selector });
				return false;
			});
		}

	});


	$('.timer').each(count);
	function count(options) {
		var $this = $(this);
		options = $.extend({}, options || {}, $this.data('countToOptions') || {});
		$this.countTo(options);
	}
		
	// Search
	$('.fa-search').on('click', function() {
		$('.field-toggle').fadeToggle(200);
	});



// Contact form
var form = $('#main-contact-form');
form.submit(function(event){
    event.preventDefault(); // Prevent the standard form submission
    var formData = $(this).serialize(); // Serialize the form data into a query string
    var form_status = $('<div class="form_status"></div>');
    $.ajax({
        type: "POST", // Set the request type to POST
        url: $(this).attr('action'), // Endpoint where the form data will be sent
        data: formData, // Include the serialized form data
        beforeSend: function(){
            form.prepend(form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn());
        }
    }).done(function(data){
        form_status.html('<p class="text-success">Thank you for contacting us. We will contact you as soon as possible.</p>').delay(3000).fadeOut();
    }).fail(function(jqXHR, textStatus, errorThrown){
        form_status.html('<p class="text-danger">There was an error sending your message. Please try again later.</p>').delay(3000).fadeOut();
    });
});



	// Progress Bar
	$.each($('div.progress-bar'),function(){
		$(this).css('width', $(this).attr('data-transition')+'%');
	});

	if( $('#gmap').length ) {
		var map;
		
		//19.225079514529252, 72.85664809431378

		map = new GMaps({
			el: '#gmap',
			lat: 19.225079514529252,
			lng: 72.85664809431378,
			scrollwheel:false,
			zoom: 16,
			zoomControl : false,
			panControl : false,
			streetViewControl : false,
			mapTypeControl: false,
			overviewMapControl: false,
			clickable: false
		});

		map.addMarker({
			lat: 19.225079514529252,
			lng: 72.85664809431378,
			animation: google.maps.Animation.DROP,
			verticalAlign: 'bottom',
			horizontalAlign: 'center',
			backgroundColor: '#3e8bff',
		});
	}

});