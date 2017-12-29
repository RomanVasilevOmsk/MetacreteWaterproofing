$(document).ready(function(){
    //Якорь
        $("#jsArrowLink").on("click", function (event) {
            console.log('ttt');
            event.preventDefault();
            var id  = $(this).attr('href'),
                top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 1500);
        });
    

    //------------INFOBLOCK------------//


    $('#plan area').click(function(e){
        e.preventDefault();
    });
    $('.joints').mouseover(function(){
        $('#js-joints').css({'display' : 'block'});
        $('.info-block__pulse--joints').css({'-webkit-animation' : 'none'});

    });
    $('.joints').mouseout(function(){
        $('#js-joints').css({'display' : 'none'});
        $('.info-block__pulse--joints').css({'-webkit-animation' : 'pulses 1s infinite cubic-bezier(0.6, 0, 0, 1)'});
    });


    $('.overlapping').mouseover(function(){
        $('#js-overlapping').css({'display' : 'block'});
        $('.info-block__pulse--overlapping').css({'-webkit-animation' : 'none'});

    });
    $('.overlapping').mouseout(function(){
        $('#js-overlapping').css({'display' : 'none'});
        $('.info-block__pulse--overlapping').css({'-webkit-animation' : 'pulses 1s infinite cubic-bezier(0.6, 0, 0, 1)'});
    });


    $('.bricks').mouseover(function(){
        $('#js-bricks').css({'display' : 'block'});
        $('.info-block__pulse--bricks').css({'-webkit-animation' : 'none'});

    });
    $('.bricks').mouseout(function(){
        $('#js-bricks').css({'display' : 'none'});
        $('.info-block__pulse--bricks').css({'-webkit-animation' : 'pulses 1s infinite cubic-bezier(0.6, 0, 0, 1)'});
    });

    $('.cutOff').mouseover(function(){
        $('#js-cutOff').css({'display' : 'block'});
        $('.info-block__pulse--cutOff').css({'-webkit-animation' : 'none'});

    });
    $('.cutOff').mouseout(function(){
        $('#js-cutOff').css({'display' : 'none'});
        $('.info-block__pulse--cutOff').css({'-webkit-animation' : 'pulses 1s infinite cubic-bezier(0.6, 0, 0, 1)'});
    });

    $('.floor').mouseover(function(){
        $('#js-floor').css({'display' : 'block'});
        $('.info-block__pulse--floor').css({'-webkit-animation' : 'none'});

    });
    $('.floor').mouseout(function(){
        $('#js-floor').css({'display' : 'none'});
        $('.info-block__pulse--floor').css({'-webkit-animation' : 'pulses 1s infinite cubic-bezier(0.6, 0, 0, 1)'});
    });

    $('.flow').mouseover(function(){
        $('#js-flow').css({'display' : 'block'});
        $('.info-block__pulse--flow').css({'-webkit-animation' : 'none'});

    });
    $('.flow').mouseout(function(){
        $('#js-flow').css({'display' : 'none'});
        $('.info-block__pulse--flow').css({'-webkit-animation' : 'pulses 1s infinite cubic-bezier(0.6, 0, 0, 1)'});
    });

    $('.seams').mouseover(function(){
        $('#js-seams').css({'display' : 'block'});
        $('.info-block__pulse--seams').css({'-webkit-animation' : 'none'});

    });
    $('.seams').mouseout(function(){
        $('#js-seams').css({'display' : 'none'});
        $('.info-block__pulse--seams').css({'-webkit-animation' : 'pulses 1s infinite cubic-bezier(0.6, 0, 0, 1)'});
    });

    $('.concrete').mouseover(function(){
        $('#js-concrete').css({'display' : 'block'});
        $('.info-block__pulse--concrete').css({'-webkit-animation' : 'none'});

    });
    $('.concrete').mouseout(function(){
        $('#js-concrete').css({'display' : 'none'});
        $('.info-block__pulse--concrete').css({'-webkit-animation' : 'pulses 1s infinite cubic-bezier(0.6, 0, 0, 1)'});

    });
    //------------INFOBLOCK------------//
    //---------WOW-----------//
    var wow = new WOW(
        {
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       100,          // distance to the element when triggering the animation (default is 0)
            mobile:       false,       // trigger animations on mobile devices (default is true)
            live:         true,       // act on asynchronously loaded content (default is true)
            scrollContainer: null // optional scroll container selector, otherwise use window
        }
    );
    wow.init();
    //---------WOW-----------//

    //---------Modals-----------//

    // //Modal-phone
    $(".js-show-modal").on("click", function(e) {
        e.preventDefault();
        var currentModal = $(this).attr("href");
        $(currentModal + ", #js-overlay").fadeIn(500);
        $("body").addClass("open-modal");
        $(".modal-form__phone").focus();
    });

    $("#js-overlay, .js-modal-close").on("click", function(e) {
        e.preventDefault();
        $(".js-modal, .js-modal-features-approach, .js-modal-features-availability, .js-modal-features-quality, .js-modal-features-price, .js-modal-features-objects, .js-modal-features-destruction, #js-overlay").fadeOut(100);
        $("body").removeClass("open-modal");
    });

    //---------Modals-----------//

    //---------Mask-----------//
    $('input[name="phone"]').mask('+7 (999) 999-99-99');
    //---------Mask-----------//

    //---------Gallery-----------//
    $("#js-lightgallery1").lightGallery({
        mode: "lg-slide-skew-rev",
        download: false,
        thumbContHeight: 50
    });

    $("#js-lightgallery").lightGallery({
        mode: "lg-slide-skew-rev",
        download: false,
        thumbContHeight: 50
    });
    // //---------Gallery-----------//

    // //---------Carousel-----------//
    $('#js-testimonials-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 4000,
        fade: false
    });

    $(".js-slider-prev").on("click", function() {
        $('#js-testimonials-slider').slick("slickNext");
    });

    $(".js-slider-next").on("click", function() {
        $('#js-testimonials-slider').slick("slickPrev");
    });
    //---------Carousel-----------//

    $('form').submit(function(event) {
        var required = $(this).find('input[required]');
        var error = false;
        for (var i = 0; i <= (required.length - 1); i++) {
            if (required[i].value == '') {
                required[i].style.borderColor = 'red';
                error = true;
            } else
                required[i].style.borderColor = '#fcc500';
        }
        if (error) event.preventDefault();
        else { dataLayer.push({ 'event': 'sendaction' }); }
    });
    $('.js-phone-wrap').click(function() { dataLayer.push({ 'event': 'sendaction' }); });
    $('.js-email-link').click(function() { dataLayer.push({ 'event': 'sendaction' }); });

    //---------counterUp-----------//

    $('.js-counter-likes').counterUp({
        delay: 10,
        time: 3000
    });

    //---------counterUp-----------//
});


