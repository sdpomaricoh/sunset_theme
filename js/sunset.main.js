jQuery(document).ready(function($){

// 1. Ajax load post
// -----------------------------------------------------------------------------
	$(document).on('click','.sunset-load-more', function(){
		var that = $(this);
		var page = that.data('page');
		var ajaxUrl = that.data('url');
		var newPage = page+1;

		$.ajax({
			url: ajaxUrl,
			type: 'post',
			data: {
				page: page,
				action: 'sunset_load_more'
			},
			success: function(response){
				that.data('page', newPage);
				$('.sunset-post-container').append(response);
			},
			error: function(response){
				console.log(response);
			}
		});
	});

});