/* gnb header fullmenu */
$(function () {
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
        .animate({ height: '470px' }, speed, function () {
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
});
/* gnb header fullmenu */

/* �ㅽ겕濡� 怨좎젙gnb */

$(document).ready(function () {
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
  /*
	寃뚯떆臾� �꾩껜 �쇱묠
	$('.faq>.faqHeader>.showAll').click(function(){
		var hidden = $('.faq>.faqBody>.article.hide').length;
		if(hidden > 0){
			article.removeClass('hide').addClass('show');
			article.find('.a').slideDown(100);
		} else {
			article.removeClass('show').addClass('hide');
			article.find('.a').slideUp(100);
		}
	});
*/
});