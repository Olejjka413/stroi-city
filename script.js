$(document).ready(function() {
	$('.burger').click(function(){
        $('.burger').toggleClass('open-menu');
        $('.nav').toggleClass('open-menu');
        $('body').toggleClass('fixed-page');
	});
});