$(document).ready(function() {
	$('.burger').click(function(){
        $('.burger').toggleClass('open-menu');
        $('.nav').toggleClass('open-menu');
        $('body').toggleClass('fixed-page');
	});
        $('#carousel-1').owlCarousel({
                items: 1,
                loop: true,
                dots: true,
                autoplay: true,
                smartSpeed: 600
        });
});