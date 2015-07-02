// IIFE for faster access to $ and save $ use
(function ($) {

	$(function() {
		// Show upload form
		$('.t3-icon-edit-upload').parent().not('.transformed').on('click', function(event) {
			event.preventDefault();
			$(this).addClass('transformed');
			$('.uploadForm').slideDown();
			$.ajax({
				url: $(this).attr('href'),
				dataType: 'html',
				success: function (data) {
					$('.uploadForm').html(data);
				}
			});
		});
	});
}(jQuery));
