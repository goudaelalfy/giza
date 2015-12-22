$jQuery(function () {
     // start the ticker 
	$jQuery('#js-news').ticker();
	
	// hide the release history when the page loads
	$jQuery('#release-wrapper').css('margin-top', '-' + ($jQuery('#release-wrapper').height() + 20) + 'px');

	// show/hide the release history on click
	$jQuery('a[href="#release-history"]').toggle(function () {	
		$jQuery('#release-wrapper').animate({
			marginTop: '0px'
		}, 600, 'linear');
	}, function () {
		$jQuery('#release-wrapper').animate({
			marginTop: '-' + ($jQuery('#release-wrapper').height() + 20) + 'px'
		}, 600, 'linear');
	});	
	
	$jQuery('#download a').mousedown(function () {
		_gaq.push(['_trackEvent', 'download-button', 'clicked'])		
	});
});