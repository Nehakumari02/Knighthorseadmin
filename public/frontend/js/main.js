(function ($) {
"user strict";

//preloder
$(window).on('load', function() {
  $(".preloader").delay(600).animate({
    "opacity": "0"
  }, 600, function () {
      $(".preloader").css("display", "none");
  });

  $(".progressbar").each(function(){
    $(this).find(".bar").animate({
      "width": $(this).attr("data-perc")
    },8000);
    if($('body').hasClass('rtl')) {
      $(this).find(".label").animate({
        "right": $(this).attr("data-perc")
      },8000);
    }else{
      $(this).find(".label").animate({
        "left": $(this).attr("data-perc")
      },8000);
    }
  });
});

//Create Background Image
(function background() {
  let img = $('.bg_img');
  img.css('background-image', function () {
    var bg = ('url(' + $(this).data('background') + ')');
    return bg;
  });
})();

// nice-select
$(".nice-select").niceSelect()

// lightcase
 $(window).on('load', function () {
  $("a[data-rel^=lightcase]").lightcase();
})


// header-fixed
var fixed_top = $(".header-section");
$(window).on("scroll", function(){
    if( $(window).scrollTop() > 100){  
        fixed_top.addClass("animated fadeInDown header-fixed");
    }
    else{
        fixed_top.removeClass("animated fadeInDown header-fixed");
    }
});

// navbar-click
$(".navbar li a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("show")) {
    element.removeClass("show");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('show');
    element.addClass("show");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});



//Odometer
if ($(".counter").length) {
  $(".counter").each(function () {
    $(this).isInViewport(function (status) {
      if (status === "entered") {
        for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
          var el = document.querySelectorAll('.odometer')[i];
          el.innerHTML = el.getAttribute("data-odometer-final");
        }
      }
    });
  });
}

// aos
AOS.init();

//toggle passwoard

$(document).ready(function() {
  $(".show_hide_password a").on('click', function(event) {
      event.preventDefault();
      if($('.show_hide_password input').attr("type") == "text"){
          $('.show_hide_password input').attr('type', 'password');
          $('.show_hide_password i').addClass( "fa-eye-slash" );
          $('.show_hide_password i').removeClass( "fa-eye" );
      }else if($('.show_hide_password input').attr("type") == "password"){
          $('.show_hide_password input').attr('type', 'text');
          $('.show_hide_password i').removeClass( "fa-eye-slash" );
          $('.show_hide_password i').addClass( "fa-eye" );
      }
  });
});

$(document).ready(function() {
  $(".show_hide_password-2 a").on('click', function(event) {
      event.preventDefault();
      if($('.show_hide_password-2 input').attr("type") == "text"){
          $('.show_hide_password-2 input').attr('type', 'password');
          $('.show_hide_password-2 i').addClass( "fa-eye-slash" );
          $('.show_hide_password-2 i').removeClass( "fa-eye" );
      }else if($('.show_hide_password-2 input').attr("type") == "password"){
          $('.show_hide_password-2 input').attr('type', 'text');
          $('.show_hide_password-2 i').removeClass( "fa-eye-slash" );
          $('.show_hide_password-2 i').addClass( "fa-eye" );
      }
  });
});



// faq
$('.faq-wrapper .faq-title').on('click', function (e) {
  var element = $(this).parent('.faq-item');
  if (element.hasClass('open')) {
    element.removeClass('open');
    element.find('.faq-content').removeClass('open');
    element.find('.faq-content').slideUp(300, "swing");
  } else {
    element.addClass('open');
    element.children('.faq-content').slideDown(300, "swing");
    element.siblings('.faq-item').children('.faq-content').slideUp(300, "swing");
    element.siblings('.faq-item').removeClass('open');
    element.siblings('.faq-item').find('.faq-title').removeClass('open');
    element.siblings('.taq-item').find('.faq-content').slideUp(300, "swing");
  }
});

// slider
var swiper = new Swiper(".banner-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    speed: 1000,
    delay: 3000,
  },
  speed: 1000,
});

var swiper = new Swiper(".testimonial-slider-offer", {
  slidesPerView: 3,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    speed: 1000,
    delay: 3000,
  },
  speed: 1000,
  breakpoints: {
    1599: {
    slidesPerView: 2,
    },
    1238: {
    slidesPerView: 1,
    },
    991: {
      slidesPerView: 2,
      },
      768: {
        slidesPerView: 1,
        },
  }
});

// slider
var swiper = new Swiper(".brand-slider", {
  slidesPerView: 5,
  spaceBetween: 30,
  loop: true,
  autoplay: {
    speed: 1000,
    delay: 3000,
  },
  speed: 1000,
  breakpoints: {
    1199: {
    slidesPerView: 5,
    },
    991: {
    slidesPerView: 3,
    },
    767: {
    slidesPerView: 2,
    },
    575: {
    slidesPerView: 2,
    },
    420: {
      slidesPerView: 1,
      },
  }
});

$(document).ready(function () {
  var AFFIX_TOP_LIMIT = 300;
  var AFFIX_OFFSET = 110;

  var $menu = $("#menu"),
  $btn = $("#menu-toggle");

  $("#menu-toggle").on("click", function () {
      $menu.toggleClass("open");
      return false;
  });


  $(".docs-nav").each(function () {
      var $affixNav = $(this),
    $container = $affixNav.parent(),
    affixNavfixed = false,
    originalClassName = this.className,
    current = null,
    $links = $affixNav.find("a");

      function getClosestHeader(top) {
          var last = $links.first();

          if (top < AFFIX_TOP_LIMIT) {
              return last;
          }

          for (var i = 0; i < $links.length; i++) {
              var $link = $links.eq(i),
        href = $link.attr("href");

              if (href.charAt(0) === "#" && href.length > 1) {
                  var $anchor = $(href).first();

                  if ($anchor.length > 0) {
                      var offset = $anchor.offset();

                      if (top < offset.top - AFFIX_OFFSET) {
                          return last;
                      }

                      last = $link;
                  }
              }
          }
          return last;
      }


      $(window).on("scroll", function (evt) {
          var top = window.scrollY,
        height = $affixNav.outerHeight(),
        max_bottom = $container.offset().top + $container.outerHeight(),
        bottom = top + height + AFFIX_OFFSET;

          if (affixNavfixed) {
              if (top <= AFFIX_TOP_LIMIT) {
                  $affixNav.removeClass("fixed");
                  $affixNav.css("top", 0);
                  affixNavfixed = false;
              } else if (bottom > max_bottom) {
                  $affixNav.css("top", (max_bottom - height) - top);
              } else {
                  $affixNav.css("top", AFFIX_OFFSET);
              }
          } else if (top > AFFIX_TOP_LIMIT) {
              $affixNav.addClass("fixed");
              affixNavfixed = true;
          }

          var $current = getClosestHeader(top);

          if (current !== $current) {
              $affixNav.find(".active").removeClass("active");
              $current.addClass("active");
              current = $current;
          }
      });
  });
});

// sidebar
$(".sidebar-menu-item > a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("active")) {
    element.removeClass("active");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('active');
    element.addClass("active");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});

// active menu JS
function splitSlash(data) {
  return data.split('/').pop();
}
function splitQuestion(data) {
  return data.split('?').shift().trim();
}
var pageNavLis = $('.sidebar-menu a');
var dividePath = splitSlash(window.location.href);
var divideGetData = splitQuestion(dividePath);
var currentPageUrl = divideGetData;

// find current sidevar element
$.each(pageNavLis,function(index,item){
    var anchoreTag = $(item);
    var anchoreTagHref = $(item).attr('href');
    var index = anchoreTagHref.indexOf('/');
    var getUri = "";
    if(index != -1) {
      // split with /
      getUri = splitSlash(anchoreTagHref);
      getUri = splitQuestion(getUri);
    }else {
      getUri = splitQuestion(anchoreTagHref);
    }
    if(getUri == currentPageUrl) {
      var thisElementParent = anchoreTag.parents('.sidebar-menu-item');
      (anchoreTag.hasClass('nav-link') == true) ? anchoreTag.addClass('active') : thisElementParent.addClass('active');
      (anchoreTag.parents('.sidebar-dropdown')) ? anchoreTag.parents('.sidebar-dropdown').addClass('active') : '';
      (thisElementParent.find('.sidebar-submenu')) ? thisElementParent.find('.sidebar-submenu').slideDown("slow") : '';
      return false;
    }
});

//sidebar Menu
$(document).on('click', '.sidebar-menu-bar', function () {
  $('.sidebar').toggleClass('active');
  $('.navbar-wrapper').toggleClass('active');
  $('.body-wrapper').toggleClass('active');
});

// dashboard-list
$('.dashboard-list-item').on('click', function (e) {
  var element = $(this).parent('.dashboard-list-item-wrapper');
  if (element.hasClass('show')) {
    element.removeClass('show');
    element.find('.preview-list-wrapper').removeClass('show');
    element.find('.preview-list-wrapper').slideUp(300, "swing");
  } else {
    element.addClass('show');
    element.children('.preview-list-wrapper').slideDown(300, "swing");
    element.siblings('.dashboard-list-item-wrapper').children('.preview-list-wrapper').slideUp(300, "swing");
    element.siblings('.dashboard-list-item-wrapper').removeClass('show');
    element.siblings('.dashboard-list-item-wrapper').find('.dashboard-list-item').removeClass('show');
    element.siblings('.dashboard-list-item-wrapper').find('.preview-list-wrapper').slideUp(300, "swing");
  }
});


//sidebar Menu
$(document).on('click', function (e) {
  // If the click is NOT inside .profile-wrapper or .profile-icon
  if (!$(e.target).closest('.profile-wrapper, .profile-icon').length) {
    $('.profile-wrapper').removeClass('active');
    
  }
});

// Keep your toggle logic the same
$(document).on('click', '.profile-icon', function (e) {
  e.stopPropagation(); // prevent this click from triggering the document click
  $('.profile-wrapper').toggleClass('active');
  const $bodyWrapper = $('.body-wrapper');
        $bodyWrapper.removeClass('show');
});


//Profile Upload
function proPicURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          var preview = $(input).parents('.preview-thumb').find('.profilePicPreview');
          $(preview).css('background-image', 'url(' + e.target.result + ')');
          $(preview).addClass('has-image');
          $(preview).hide();
          $(preview).fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
$(".profilePicUpload").on('change', function () {
  proPicURL(this);
});

$(".remove-image").on('click', function () {
  $(".profilePicPreview").css('background-image', 'none');
  $(".profilePicPreview").removeClass('has-image');
});


//info-btn
$(document).on('click', '.info-btn', function () {
  $('.support-profile-wrapper').addClass('active');
});
$(document).on('click', '.chat-cross-btn', function () {
  $('.support-profile-wrapper').removeClass('active');
});


$(document).on("click",".card-custom",function(){
  $(this).toggleClass("active");
});

//acoount-toggle
$('.header-account-btn').on('click', function (e) {
  e.preventDefault();
  $('.account').addClass('active');
  $('.body-overlay').addClass('active');
});
$('#body-overlay').on('click', function (e) {
  e.preventDefault();
  $('.account').removeClass('active');
  $('.body-overlay').removeClass('active');
});
$('.account-cross-btn').on('click', function (e) {
  e.preventDefault();
  $('.account').removeClass('active');
  $('.body-overlay').removeClass('active');
});
$('.remove-account').on('click', function (e) {
  e.preventDefault();
  $(this).parent().parent().hide(300);
});
$('.account-control-btn').on('click', function () {
  $('.account-wrapper').toggleClass('change-form');
})


$(".buy-btn").click(function(){
  $("#sell").addClass("d-none");
  $("#buy").removeClass("d-none");
  $(this).addClass("active");
  $(".sell-btn").removeClass("active");
});
$(".sell-btn").click(function(){
  $("#sell").removeClass("d-none");
  $("#buy").addClass("d-none");
  $(this).addClass("active");
  $(".buy-btn").removeClass("active");
});
  

    jQuery(document).ready(($) => {
      $(document).on('click', '.quantity-area .plus', function(e) {
          let $input = $(this).prev('input.qty');
          let val = parseInt($input.val());
          $input.val( val+1 ).change();
      });

      $(document).on('click', '.quantity-area .minus', 
          function(e) {
          let $input = $(this).next('input.qty');
          var val = parseInt($input.val());
          if (val > 0) {
              $input.val( val-1 ).change();
          } 
          if(val == 1) {
            // console.log($(this).parents(".catagori-item").find(".button"));
            $(this).parents(".catagori-item").find("div.button").removeClass("active");
          }
      });
  });

  // zoom
document.querySelectorAll('.image').forEach(elem => {
  let x, y, width, height;
  elem.onmouseenter = () => {
      const size = elem.getBoundingClientRect();
      x = size.x;
      y = size.y;
      width = size.width;
      height = size.height;
  };
  elem.onmousemove = e => {
      const horizontal = (e.clientX - x) / width * 100;
      const vertical = (e.clientY - y) / height * 100;
      elem.style.setProperty('--x', horizontal + '%');
      elem.style.setProperty('--y', vertical + '%');

  };
});


// $('.catagori-item .add-to-cart-btn').on('click', function (e) {
//   e.preventDefault();
//   $(this).parents(".button").addClass('active');
//   $(".quantity-area .plus").prev("input.qty").val(1).change();
// });


// input toggle
$("#card-payment").click(function(){
  $(".card-payment-input").addClass('active');
});
$("#google-pay").click(function(){
  $(".card-payment-input").removeClass('active');
});
 
//Mobile Search
$(".header-mobile-search-btn").click(function(){
  $(".header-mobile-search-form-area").slideToggle();
});

//Mobile Dot Button
$('.dot-btn').on('click', function (e) {
  e.preventDefault();
  if($('.header-threedot-btn').hasClass('active')) {
    $('.header-threedot-btn').removeClass('active');
    $('.body-overlay').removeClass('active');
  }else {
    $('.header-threedot-btn').addClass('active');
    $('.body-overlay').addClass('active');
  }
});
$('#body-overlay').on('click', function (e) {
  e.preventDefault();
  $('.header-threedot-btn').removeClass('active');
  $('.body-overlay').removeClass('active');
});

  // $(".add-to-cart-btn").click(function(){
  //   // var allProductCard = $(".food-area .catagori-item");
  //   var thisTitle = $(this).parents(".catagori-item").find(".content p").first().text();
  //   var thisPrice = $(this).parents(".catagori-item").find(".content span").first().text();
  //   var thisOldPrice = $(this).parents(".catagori-item").find(".content span.mrp").first().text();
  //   var thisImage = $(this).parents(".catagori-item").find(".catagori-img img").first().attr("src");

  //   var priceSection = "";
  //   if(thisOldPrice != "" || thisOldPrice != null || thisOldPrice != undefined) {
  //     priceSection = `
  //     <div class="product-price">
  //       <span class="text--danger">${thisPrice}</span>
  //       <span class="mrp">${thisOldPrice}</span> 
  //     </div>
  //     `;
  //   }else {
  //     priceSection = `
  //     <div class="product-price">
  //       <span>${thisPrice}</span>
  //     </div>
  //     `;
  //   }

  //   var cartHtml = `
  //     <div class="cart-item catagori-item">
  //       <div class="cart-content">
  //           <div class="cart-thumb">
  //               <img src="${thisImage}" alt="cart">
  //           </div>
  //           <div class="cart-title">
  //               <a href="#">${thisTitle}</a>
  //               ${priceSection}
  //               <div class="button pt-2">
  //                   <div class="quantity-area w-100">
  //                       <form method='POST' class='quantity d-flex' action='#'>
  //                           <input type='button' value='-' class='qtyminus minus'>
  //                           <input type='text' name='quantity'  value='1' class='qty text-center'>
  //                           <input type='button' value='+' class='qtyplus plus'>
  //                       </form>
  //                   </div>
  //               </div>
  //           </div>
  //       </div>
  //       <button class="remove-btn"><i class="las la-trash"></i></button>
  //     </div>
  //   `;

  //   $(".cart .cart-item-wrapper").append(cartHtml);
  //   var cartNumber = $(".cart-number").text();
  //   $(".cart-number").text((parseInt(cartNumber) + 1));
    
  // });

  // $(document).on("click",".cart .remove-btn",function() {
  //   console.log("working");
  //   var cartNumber = $(".cart-number").text();
  //   $(".cart-number").text((parseInt(cartNumber) - 1));
  // });



   // language select
//  $(document).ready(function() {
//   let projectLangDir = localStorage.getItem("local_lang");
//   if(projectLangDir == null) projectLangDir = "ltr";
//   if(projectLangDir == 'ltr') $("body").removeClass("rtl").addClass(projectLangDir);
//   if(projectLangDir == 'rtl') $("body").removeClass("ltr").addClass(projectLangDir);
//   let selectedValue = $("select.lang-switch-local").find("[data-dir="+projectLangDir+"]").prop("selected", true);
//   setTimeout(() => {
//     $("select.lang-switch-local").niceSelect();
//   }, 500);
// });
// // let switcher = $(".lang-switch-local");
// $(document).on("change",".lang-switch-local", function() {
//   let selectTarget = $(this).find(":selected");
//   let targetVal = $(this).val();
//   let targetDir = selectTarget.data("dir");
//   localStorage.setItem("local_lang",targetDir);
//   window.location.reload();
// });

  // Add or remove Bags
//   document.addEventListener('DOMContentLoaded', function () {
//     const bagsCheckbox = document.getElementById('bags');
//     const bagsPrice = document.querySelector('.bags-price');

//     // Hide bags price by default
//     bagsPrice.style.display = 'none';

//     // Toggle visibility on checkbox change
//     bagsCheckbox.addEventListener('change', function () {
//         bagsPrice.style.display = this.checked ? 'block' : 'none';
//     });
// });

  
// Cart Bar JS

// document.addEventListener('DOMContentLoaded', function () {
//     const cartBtns = document.querySelectorAll('.cart-btn-wrapper');
//     const cartBar = document.querySelector('.cart-bar');
//     const cartCloseBtn = document.querySelector('.cartbar-close');

//     // Add click event for all cart buttons
//     cartBtns.forEach(cartBtn => {
//         cartBtn.addEventListener('click', function () {
//             cartBar.classList.toggle('show');
//         });
//     });

//     // Close button inside cart bar
//     cartCloseBtn.addEventListener('click', function () {
//         cartBar.classList.remove('show');
//     });

//     // Click outside to close
//     document.addEventListener('click', function (e) {
//         const isCartBtn = Array.from(cartBtns).some(btn => btn.contains(e.target));
//         if (!cartBar.contains(e.target) && !isCartBtn) {
//             cartBar.classList.remove('show');
//         }
//     });
// });

// document.addEventListener('DOMContentLoaded', function () {
//     const cartBtns = document.querySelectorAll('.cart-btn-wrapper');
//     const cartBar = document.querySelector('.cart-bar');
//     const cartCloseBtn = document.querySelector('.cartbar-close');

//     // Add click event for all cart buttons
//     cartBtns.forEach(cartBtn => {
//         cartBtn.addEventListener('click', function () {
//           cartBar.classList.toggle('show');
//           $('.body-wrapper').toggleClass('show');
//         });
//     });

//     // Close button inside cart bar
//     cartCloseBtn.addEventListener('click', function () {
//       cartBar.classList.remove('show');
//       $('.body-wrapper').toggleClass('show');
//     });

//     // Click outside to close
//     document.addEventListener('click', function (e) {
//         const isCartBtn = Array.from(cartBtns).some(btn => btn.contains(e.target));
//         if (!cartBar.contains(e.target) && !isCartBtn) {
//             cartBar.classList.remove('show');
//         }
//     });
// });









// document.addEventListener('DOMContentLoaded', function () {
//     const cartBtns = document.querySelectorAll('.cart-btn-wrapper');
//     const cartBar = document.querySelector('.cart-bar');
//     const cartCloseBtn = document.querySelector('.cartbar-close');

//     // Add click event for all cart buttons
//     cartBtns.forEach(cartBtn => {
//         cartBtn.addEventListener('click', function () {
//           cartBar.classList.toggle('show');
//           $('.body-wrapper').toggleClass('show');
//         });
//     });

//     // Close button inside cart bar
//     cartCloseBtn.addEventListener('click', function () {
//       cartBar.classList.remove('show');
//       $('.body-wrapper').toggleClass('show');
//     });

//   });
  // Click outside to close
  // document.addEventListener('click', function (e) {
  //     const isCartBtn = Array.from(cartBtns).some(btn => btn.contains(e.target));
  //     if (!cartBar.contains(e.target) && !isCartBtn) {
  //         cartBar.classList.remove('show');
  //     }
  // });










// select-2 init
$('.select2-basic').select2();
$('.select2-multi-select').select2();
$(".select2-auto-tokenize").select2({
tags: true,
tokenSeparators: [',']
});

})(jQuery);

/**
 * Function For Get All Country list by AJAX Request
 * @param {HTML DOM} targetElement
 * @param {Error Place Element} errorElement
 * @returns
 */
var allCountries = "";
function getAllCountries(
    hitUrl,
    targetElement = $(".country-select"),
    errorElement = $(".country-select").siblings(".select2")
) {
    if (targetElement.length == 0) {
        return false;
    }
    var CSRF = $("meta[name=csrf-token]").attr("content");
    var data = {
        _token: CSRF,
    };
    $.post(hitUrl, data, function () {
        // success
        $(errorElement).removeClass("is-invalid");
        $(targetElement).siblings(".invalid-feedback").remove();
    })
        .done(function (response) {
            // Place States to States Field
            var options = "<option selected disabled>Select Country</option>";
            var selected_old_data = "";
            if ($(targetElement).attr("data-old") != null) {
                selected_old_data = $(targetElement).attr("data-old");
            }
            $.each(response, function (index, item) {
                options += `<option value="${item.name}" data-id="${
                    item.id
                }" data-mobile-code="${item.mobile_code}" ${
                    selected_old_data == item.name ? "selected" : ""
                }>${item.name}</option>`;
            });

            allCountries = response;

            $(targetElement).html(options);
        })
        .fail(function (response) {
            var faildMessage = "Something went wrong! Please try again.";
            var faildElement = `<span class="invalid-feedback" role="alert">
                            <strong>${faildMessage}</strong>
                        </span>`;
            $(errorElement).addClass("is-invalid");
            if ($(targetElement).siblings(".invalid-feedback").length != 0) {
                $(targetElement)
                    .siblings(".invalid-feedback")
                    .text(faildMessage);
            } else {
                errorElement.after(faildElement);
            }
        });
}

function placePhoneCode(code) {
    if (code != undefined) {
        code = code.replace("+", "");
        code = "+" + code;
        $("input.phone-code").val(code);
        $("div.phone-code").html(code);
    }
}


/**
 * Function For Open Modal Instant by pushing HTML Element
 * @param {Object} data
 */
function openModalByContent(
    data = {
        content: "",
        animation: "mfp-move-horizontal",
        size: "medium",
    }
) {
    $.magnificPopup.open({
        removalDelay: 500,
        items: {
            src: `<div class="white-popup mfp-with-anim ${
                data.size ?? "medium"
            }">${data.content}</div>`, // can be a HTML string, jQuery object, or CSS selector
        },
        callbacks: {
            beforeOpen: function () {
                this.st.mainClass = data.animation ?? "mfp-move-horizontal";
            },
            open: function () {
                var modalCloseBtn = this.contentContainer.find(".modal-close");
                $(modalCloseBtn).click(function () {
                    $.magnificPopup.close();
                });
            },
        },
        midClick: true,
    });
}

/**
 * Function for open delete modal with method DELETE
 * @param {string} URL
 * @param {string} target
 * @param {string} message
 * @returns
 */
function openAlertModal(
    URL,
    target,
    message,
    actionBtnText = "Remove",
    method = "DELETE"
) {
    if (URL == "" || target == "") {
        return false;
    }

    if (message == "") {
        message = "Are you sure to delete ?";
    }
    var method = `<input type="hidden" name="_method" value="${method}">`;
    openModalByContent({
        content: `<div class="card modal-alert border-0">
                        <div class="card-body">
                            <form method="POST" action="${URL}">
                                <input type="hidden" name="_token" value="${laravelCsrf()}">
                                ${method}
                                <div class="head mb-3">
                                    ${message}
                                    <input type="hidden" name="target" value="${target}">
                                </div>
                                <div class="foot d-flex align-items-center justify-content-between">
                                    <button type="button" class="modal-close btn--base btn-for-modal">Close</button>
                                    <button type="submit" class="alert-submit-btn btn--danger btn-loading btn-for-modal">${actionBtnText}</button>
                                </div>
                            </form>
                        </div>
                    </div>`,
    });
}

/**
 * Function for getting CSRF token for form submit in laravel
 * @returns string
 */
function laravelCsrf() {
    return $("head meta[name=csrf-token]").attr("content");
}




