/***************************************************
==================== JS INDEX ======================
****************************************************
01. PreLoader Js


****************************************************/

(function ($) {
  "use strict";

  var windowOn = $(window);
  ////////////////////////////////////////////////////
  // 01. PreLoader Js
  windowOn.on("load", function () {
    $("#loading").fadeOut(500);
  });

  // 02. Mobile Menu Js
  $("#mobile-menu").meanmenu({
    meanMenuContainer: ".mobile-menu",
    meanScreenWidth: "991",
    meanExpand: ['<i class="fal fa-plus"></i>'],
  });

  ////////////////////////////////////////////////////
  // 03. Sidebar Js
  $(".tp-menu-toggle").on("click", function () {
    $(".tp-sidebar-menu").addClass("sidebar-opened");
    $(".body-overlay").addClass("opened");
  });
  $(".sidebar-close").on("click", function () {
    $(".tp-sidebar-menu").removeClass("sidebar-opened");
    $(".body-overlay").removeClass("opened");
  });

  ////////////////////////////////////////////////////
  // 04. Body overlay Js
  $(".body-overlay").on("click", function () {
    $(".tp-sidebar-menu").removeClass("sidebar-opened");
    $(".body-overlay").removeClass("opened");
  });

  ////////////////////////////////////////////////////
  // 05. Search Js
  $(".search-toggle").on("click", function () {
    $(".search__area").addClass("opened");
  });
  $(".search-close-btn").on("click", function () {
    $(".search__area").removeClass("opened");
  });

  ////////////////////////////////////////////////////
  // 06. Sticky Header Js
  windowOn.on("scroll", function () {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $("#header-sticky").removeClass("header__sticky");
    } else {
      $("#header-sticky").addClass("header__sticky");
    }
  });

  ////////////////////////////////////////////////////
  // 07. Data CSS Js
  $("[data-background").each(function () {
    $(this).css(
      "background-image",
      "url( " + $(this).attr("data-background") + "  )"
    );
  });

  $("[data-width]").each(function () {
    $(this).css("width", $(this).attr("data-width"));
  });

  $("[data-bg-color]").each(function () {
    $(this).css("background-color", $(this).attr("data-bg-color"));
  });

  ////////////////////////////////////////////////////
  // 07. Nice Select Js
  $("select").niceSelect();

  // mainSlider
  function mainSlider() {
    var BasicSlider = $(".slider__container");

    BasicSlider.slick({
      autoplay: true,
      autoplaySpeed: 4000,
      dots: false,
      fade: false,
      arrows: true,
      prevArrow:
        '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
      nextArrow:
        '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
      responsive: [
        {
          breakpoint: 767,
          settings: {
            dots: false,
            arrows: false,
          },
        },
      ],
    });

    function doAnimations(elements) {
      var animationEndEvents =
        "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
      elements.each(function () {
        var $this = $(this);
        var $animationDelay = $this.data("delay");
        var $animationType = "animated " + $this.data("animation");
        $this.css({
          "animation-delay": $animationDelay,
          "-webkit-animation-delay": $animationDelay,
        });
        $this.addClass($animationType).one(animationEndEvents, function () {
          $this.removeClass($animationType);
        });
      });
    }
  }
  mainSlider();

  var $grid = $(".faculty-filter").isotope({
    itemSelector: ".element-item",
    layoutMode: "fitRows", // Use fitRows instead of masonry for better Bootstrap compatibility
    percentPosition: true,
    filter: "*", // Show all items by default
  });

  // Re-layout on window resize
  $(window).on("resize", function () {
    $grid.isotope("layout");
  });

  // Filter items on button click
  $(".filter-button-group").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({ filter: filterValue });

    // Toggle active class
    $(".filter-button-group button").removeClass("active");
    $(this).addClass("active");
  });
  /* magnificPopup img view */
  $(".popup-image").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });

  /* magnificPopup video view */
  $(".popup-video").magnificPopup({
    type: "iframe",
  });

  ////////////////////////////////////////////////////
  // 14. Wow Js
  new WOW().init();

  ////////////////////////////////////////////////////
  // 17. Show Login Toggle Js
  $("#showlogin").on("click", function () {
    $("#checkout-login").slideToggle(900);
  });

  ////////////////////////////////////////////////////
  // 21. Counter Js
  $(".counter").counterUp({
    delay: 10,
    time: 1000,
  });

  ////////////////////////////////////////////////////
  // 22. Parallax Js
  if ($(".scene").length > 0) {
    $(".scene").parallax({
      scalarX: 10.0,
      scalarY: 15.0,
    });
  }

  ////////////////////////////////////////////////////
  // 23. InHover Active Js
  $(".hover__active").on("mouseenter", function () {
    $(this)
      .addClass("active")
      .parent()
      .siblings()
      .find(".hover__active")
      .removeClass("active");
  });
})(jQuery);
