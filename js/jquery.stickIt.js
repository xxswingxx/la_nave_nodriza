/*
* jQuery StickIt Plugin - v0.1.0
* Copyright 2011, Matthew Mirande
* Dual licensed under the MIT or GPL Version 2 licenses.
* Usage: Adds / Removes a css class to target element when it is
*        scrolled off screen (allows fixing an element to viewport)
*/

(function ($) {
  $.fn.stickIt = function (cfg) {
    //default settings
    var settings = {
        containerClass : "stickItContainer",
        enabledClass   : "fixed",
        resetEvent     : "reset.stickIt"
      },
      $window = $(window);

    //update settings w/ any configs set by user
    if (cfg) {
      $.extend(settings, cfg);
    }

    //helper func to handle position detection and assign classes
    function doIt($target, elPos, elHeight) {
      var position = $window.scrollTop();

      if (position > elPos.top) {
        $target
          .addClass(settings.enabledClass)
          .parent("div." + settings.containerClass)
          .height(elHeight);
      } else {
        $target
          .removeClass(settings.enabledClass)
          .parent("div." + settings.containerClass)
          .css("height", "auto");
      }
    }

    //loop through jQuery collection (selected elements) and apply
    return this.each(function () {
      var $this = $(this),
        elemPosition = $this.offset(),
        elemHeight = $this.outerHeight(true),
        timer = 0;

      //wrap target element w/ place-holder element to keep page from
      //bouncing around
      $this.wrap('<div class="' + settings.containerClass + '"></div>');

      //detect scrolling, and throttle calls to helper func.
      $window.bind("scroll", function () {
        if (timer) {
          clearTimeout(timer);
        }

        timer = setTimeout(function () {
          doIt($this, elemPosition, elemHeight);
        }, 20);
      });

      //enable reset event
      $this.bind(settings.resetEvent, function () {
        $this
          .removeClass(settings.enabledClass)
          .parent("div." + settings.containerClass)
          .css("height", "auto");

        return false;
      });
    });
  };
})(jQuery);
