(function ($) {
	// Bookmark links
	$('a[href*="#"]').not('[href="#"]').click(function (e) {
		e.preventDefault();

		let target = $(this).attr('href');
		target = $(target);

		$('html, body').animate({
			scrollTop: target.offset().top - 100
		}, 500);
	});
})(jQuery);
