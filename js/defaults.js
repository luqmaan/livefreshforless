$(document).bind("mobileinit", function() {
	$.extend($.mobile, {
		defaultPageTransition : "flip",
		loadingMessage : false
	});
});

$("body").live('pageinit', function(event) {
	checkCookie();
});

stLight.options({
	publisher : 'rrrrr',
});
