$(document).ready(function() {
	$('.burger').click(function(){
                $('.burger').toggleClass('open-menu');
                $('.nav').toggleClass('open-menu');
                $('body').toggleClass('fixed-page');
	});

        $('.about__button-more').click(function(){
                $(".about__appear").fadeIn(1000);
                $('.about__button-more').addClass('about__appear');
        });
});