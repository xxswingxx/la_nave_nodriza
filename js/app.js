$(document).ready(function() {
    $("#what").flexslider({
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
    $('nav').find('a[href*='+window.location.hash+']').parent().addClass('active');

    $.lockfixed('.col.sticky-parent', {offset: {top: 70, bottom: $(document).height() - ($("#main").height() + $('header').height())}});
    $(".dropdown-toggle").on('click', function(e) {
        e.stopPropagation();
        return $(".dropdown-menu").toggle();
    });

    $("#logo a").click(function(){
        $("nav").find('.active').removeClass('active');
    });
    
    $("nav a[href^=#]").click(function(){
        $("nav").find('.active').removeClass('active');
        $(this).parent().addClass('active');
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
            $("#contact_form").hide();
            $("#contact").addClass("contacted");
        }
    });
});
