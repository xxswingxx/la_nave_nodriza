$(document).ready(function() {
    $(".flexslider.carrousel").flexslider({
        animation: "fade",
        animationLoop: true,
        slideshow: true,
        itemWidth: "100%",
        itemMargin: 0,
        controlNav: false,
        directionNav: false,
        animationSpeed: 1000
    });
});

$(window).load(function(){

    // Add class on window load
    $('nav').find('a[href='+window.location.hash+']').parent().addClass('active');

    // Sticky box 
    $.lockfixed('.sticky-box', {offset: {top: 120, bottom: $(document).height() - ($("#main").height() + $('header').height())}});

    // Initialize appear plugin
    $('#home, #la-nave-nodriza, #founders, #courses, #who-is-for, #contact').appear();

    $('#home, #la-nave-nodriza, #founders, #courses, #who-is-for, #contact').on('appear', function(event, $all_appeared_elements) {
      var offset = $all_appeared_elements.length > 1 ? 2 : 1;
      var id = $($all_appeared_elements[$all_appeared_elements.length - offset]).attr('id');
      $("nav").find('.active').removeClass('active');
      $('nav').find('a[href='+'#'+id+']').parent().addClass('active');
    });

    $( window ).konami({
        cheat: function() {
            window.location.replace('http://www.youtube.com/v/PDHCLjuOzXY&autoplay=1');
        }
    });

    $(".contact-button a[href=#contact]").click(function(e){
        e.preventDefault();
        $('nav a[href=#contact]').click();
    })

    // open rel external into new window
    $('a[rel^="external"]').click( function() {
        window.open( $(this).attr('href') );
        return false;
    });
    // turn "external" classes into new window popups
    $('a.external').click( function() {
        window.open( $(this).attr('href') );
        return false;
    });
    
    $(document).on('click', function(){
        if ($(".dropdown-menu").is(':visible')) {
            $(".dropdown-menu").hide();
        }
    })

    $(".dropdown-toggle").on('click', function(e) {
        e.stopPropagation();
        return $(".dropdown-menu").toggle();
    });

    $("#logo a").click(function(){
        $("nav").find('.active').removeClass('active');
    });

    $("nav a[href^=#], #logo a").click(function(e){
        e.stopImmediatePropagation()
        $("nav").find('.active').removeClass('active');
        var link = $(this).attr("href");
        var scroll = $(link).offset().top;
            scroll = scroll-60;
        $("html, body").animate({scrollTop:scroll},{duration:500});
        return false;
    });

    $('input').each(function(){
        var currentValue = $(this).val();
        if(($(this).attr('type') != "submit")){
            $(this).focus(function(){
                if( $(this).val() == currentValue ) {
                    $(this).val('');
                    $(this).addClass("filled");
                }
            });
            $(this).blur(function(){
                if( $(this).val() === '' ) {
                    $(this).val(currentValue);
                    $(this).removeClass("filled");
                }
                else{
                   $(this).addClass("filled");
                }
            });
        }
    });

    $(".dropdown-menu li").on('click', function() {
        $(".notshow").removeClass("notshow");
        $(this).find('a').addClass("notshow");
        $(".dropdown-toggle .filter-option.pull-left").html($(this).find('a span').html());
        $('#entry_2018499662').val($(this).find('a span').html());
        return $(".dropdown-menu").toggle();
    });

    $("#contact_form").submit(function(event) {
        var error = false;
        $(".error").hide();
        if($("#entry_1889934454").val() == ""){  //name
            $("#entry_1889934454").parent().find(".error").css("display", "inline-block");
            error = true;
        }
        if($("#email").val() == ""){ //email
            $("#email").parent().find(".error").css("display", "inline-block");
            error = true;
        }
        if($("#entry_1111417980").val() == ""){ //about_you
            $("#entry_1111417980").parent().find(".error").css("display", "inline-block");
            error = true;
        }
        if($("#entry_2018499662").val() == ""){ //interests
            $("#entry_2018499662").parent().find(".error").css("display", "inline-block");
            error = true;
        }
        if(error){
            return false;
        }
        else{
            $(".two-col.contact-form").hide();
            $("#contact").addClass("contacted");
        }
    });
});
