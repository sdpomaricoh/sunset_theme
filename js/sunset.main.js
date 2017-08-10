jQuery(document).ready(function($){

// 1. Carousel post
// -----------------------------------------------------------------------------

var carousel = '.sunset-carousel';

sunset_set_carousel_thumbs('.sunset-carousel');

$(carousel).on('slid.bs.carousel', function(){
	sunset_set_carousel_thumbs(carousel);
});

function sunset_set_carousel_thumbs(carousel){
	$(carousel).each(function(){
		var next = $(this).find('.item.active').find('.next-image-preview').data('image');
		var prev = $(this).find('.item.active').find('.prev-image-preview').data('image')
		$(this).find('.carousel-control.right').find('.thumbnail-container').css({'background-image': 'url('+next+')'});
		$(this).find('.carousel-control.left').find('.thumbnail-container').css({'background-image': 'url('+prev+')'});
	});
}


// 2. Ajax load post
// -----------------------------------------------------------------------------

var canBeLoaded = true,
	bottomOffset = $('.sunset-footer').height()+1000;

	$(window).scroll(function(){

		var input = $('.sunset-load-more');
		var page = input.data('page');
		var ajaxUrl = input.data('url');

		if($(document).scrollTop() > ($(document).height() - bottomOffset ) && canBeLoaded == true ){
			$.ajax({
				url: ajaxUrl,
				type: 'post',
				data: {
					page: page,
					action: 'sunset_load_more'
				},
				beforeSend: function( xhr ){
					canBeLoaded = false;
					$('#load-more').addClass('loader');
				},
				success: function(response){
					if(response){
						$('.sunset-post-container > .row').append(response);
						page++;
						input.data('page', page);
						canBeLoaded = true;
						$('#load-more').removeClass('loader');
					}else{
						$('#load-more').removeClass('loader');
					}
				}
			});
		}
	});

});