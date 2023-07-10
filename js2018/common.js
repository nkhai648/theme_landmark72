/* gnb header fullmenu */
$(document).ready(function () {
  var className = ["animate_text1", "animate_text2", "animate_text3"];
  var classNameBackgroundImg = [
    "animate__main-visual1",
    "animate__main-visual2",
    "animate__main-visual3",
  ];
  $(".bxslider7").bxSlider({
    pager: true,
    speed: 1000,
    auto: true,
    pause: 9000,
    autoControls: false,
    stopAutoOnClick: true,
    onSliderLoad: function (currentIndex) {
      $(".bxslider7>li .slide_txt").eq(1).addClass("active-slide");
      $(".slide_txt.active-slide").addClass(className[0]);
      // Background image animate
      $(".bxslider7>li .main_img").eq(1).addClass("active-main_img");
      $(".main_img.active-main_img").addClass(classNameBackgroundImg[0]);
    },
    onSlideAfter: function (
      currentSlideNumber,
      totalSlideQty,
      currentSlideHtmlObject,
      oldIndex,
      newIndex
    ) {
      $(".active-slide").removeClass("active-slide");
      $(".bxslider7>li .slide_txt")
        .eq(currentSlideHtmlObject + 1)
        .addClass("active-slide");
      $(".slide_txt.active-slide").addClass(className[currentSlideHtmlObject]);
      // Background image animate
      $(".active-main_img").removeClass("active-main_img");
      $(".bxslider7>li .main_img")
        .eq(currentSlideHtmlObject + 1)
        .addClass("active-main_img");
      $(".main_img.active-main_img").addClass(
        classNameBackgroundImg[currentSlideHtmlObject]
      );
    },
    onSlideBefore: function () {
      $(".slide_txt.active-slide").removeClass(function (index, className) {
        return (className.match(/(^|\s)animate_\S+/g) || []).join(" ");
      });
      // Background image animate
      $(".main_img.active-main_img").removeClass(function (
        index,
        classNameBackgroundImg
      ) {
        return (classNameBackgroundImg.match(/(^|\s)animate__\S+/g) || []).join(
          " "
        );
      });
    },
  });

  var gnbLi = $("#gnb>li");
  var ul = $("#gnb>li>ul");
  var headerMin = $("#headerWrap").height();
  var headerMax = ul.innerHeight() + headerMin;
  var state = false;
  var speed = 300;
  gnbLi.on("mouseenter keyup", function () {
    if (!state) {
      $("#headerWrap")
        .stop()
        .animate({ height: "470px" }, speed, function () {
          ul.stop().fadeIn(speed);
        });
      state = true;
    }

    ul.removeClass("on");
    $(this).find("ul").addClass("on");
  });
  gnbLi.mouseleave(function () {
    $(this).find("ul").removeClass("on");
  });
  $("#header").mouseleave(function () {
    ul.stop().fadeOut(speed, function () {
      $("#headerWrap").stop().animate({ height: headerMin }, speed);
    });
    state = false;
  });
  $("#header .close").focus(function () {
    ul.stop().fadeOut(speed, function () {
      $("#headerWrap").stop().animate({ height: headerMin }, speed);
    });
    state = false;
  });
  /* gnb header fullmenu */

  // wrap
  $(".ico_more").click(function () {
    console.log("cc");
    const element = document.getElementById("section1");
    let offset = 85;
    const bodyRect = document.body.getBoundingClientRect().top;
    const elementRect = element.getBoundingClientRect().top;
    const elementPosition = elementRect - bodyRect;
    const offsetPosition = elementPosition - offset;
    window.scrollTo({
      top: offsetPosition,
      behavior: "smooth",
    });
  });

  var jbOffset = $("#headerWrap").height();
  $(window).scroll(function () {
    if ($(document).scrollTop() > jbOffset) {
      $("#headerWrap").addClass("dfix");
    } else {
      $("#headerWrap").removeClass("dfix");
    }
  });
});

/* mobile gnb */
function repsMenuWrap() {
  if ($(window).width() > 1024) {
    $(".menu_wrap").css("width", "100%");
  } else {
    $(".menu_wrap").css("width", "0px");
  }
}

function toggleMenuWrap(type) {
  if (type == "open") {
    toggleBlindWrap();

    $(".menu_wrap").css("height", $(document).height() - 107);

    $(".menu_wrap").css("width", "320px");
    $(".menu_inner").animate({ left: "0" }, 500, "easeOutExpo");
    $("#header .small_menu_close").css("display", "block");
  } else {
    toggleBlindWrap();
    $("#header .small_menu_close").css("display", "none");
    $(".menu_inner").animate(
      { left: "-320px" },
      100,
      "easeOutExpo",
      function () {
        $(".menu_wrap").css("width", "0px");
      }
    );
  }
}

function toggleBlindWrap() {
  if ($("#blind_bg").length == 0) {
    $("body").append('<div id="blind_bg"></div>');
  }
  $("#blind_bg").toggle();
  $("#blind_bg").bind("click", function () {
    toggleMenuWrap("close");
  });
}

/* 紐⑤컮�� 醫뚯륫 �꾩퐫�붿뼵 硫붾돱 */
$(document).ready(function () {
  $(".lnb ul").hide();
  $(".lnb li a").click(function () {
    var checkElement = $(this).next();
    if (checkElement.is("ul") && checkElement.is(":visible")) {
      $(".lnb ul:visible").slideUp(300);
      return false;
    }
    if (checkElement.is("ul") && !checkElement.is(":visible")) {
      $(".lnb ul:visible").slideUp(300);
      checkElement.slideDown(300);
      return false;
    }
  });
});

function initTopBtn() {
  $(".go_top > a").click(function (event) {
    event.preventDefault();
    $("html,body").animate({ scrollTop: 0 }, 500);
  });
}

/* Accodian list FAQ */
jQuery(function ($) {
  // Frequently Asked Question
  var article = $(".faq>.faqBody>.article");
  article.addClass("hide");
  article.find(".a").hide();
  article.eq(0).removeClass("show");
  article.eq(0).find(".a").hide();
  $(".faq>.faqBody>.article>.q>a").click(function () {
    var myArticle = $(this).parents(".article:first");
    if (myArticle.hasClass("hide")) {
      article.addClass("hide").removeClass("show");
      article.find(".a").slideUp(100);
      myArticle.removeClass("hide").addClass("show");
      myArticle.find(".a").slideDown(100);
    } else {
      myArticle.removeClass("show").addClass("hide");
      myArticle.find(".a").slideUp(100);
    }
    return false;
  });
});
