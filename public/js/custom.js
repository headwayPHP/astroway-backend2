$(document).ready(function () {
  // banner slider
  $('.px_banner_slider').slick({
    dots: true,
    speed: 800,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="slick-prev px_btn"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="16" viewBox="0 0 12 16"> <path d="M12.003,15.996 L-0.000,7.997 L12.002,-0.001 L10.062,7.997 L12.003,15.996 ZM10.102,2.762 L2.246,7.997 L10.102,13.233 L8.832,7.997 L10.102,2.762 ZM3.824,7.997 L8.256,5.043 L7.539,7.997 L8.256,10.951 L3.824,7.997 Z" class="cls-1"/> </svg></span></button>',
    nextArrow: '<button type="button" class="slick-next px_btn"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="18" height="18" viewBox="0 0 8 12"><path d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" class="cls-1"/> </svg></span></button>'
  });


  // customer slider
  $('.px_customer_slider').slick({
    infinite: false,
    dots: true,
    speed: 800,
    slidesToShow: 2,
    slidesToScroll: 2,
    prevArrow: '<button type="button" class="slick-prev px_btn"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="12" height="16" viewBox="0 0 12 16"> <path d="M12.003,15.996 L-0.000,7.997 L12.002,-0.001 L10.062,7.997 L12.003,15.996 ZM10.102,2.762 L2.246,7.997 L10.102,13.233 L8.832,7.997 L10.102,2.762 ZM3.824,7.997 L8.256,5.043 L7.539,7.997 L8.256,10.951 L3.824,7.997 Z" class="cls-1"/> </svg></span></button>',
    nextArrow: '<button type="button" class="slick-next px_btn"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="22" height="22" viewBox="0 0 12 16"><path d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" class="cls-1"/> </svg></span></button>',
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false
        }
      },
    ]
  });

  // product slider
  $('.px_product_slider').slick({
    arrows: false,
    infinite: true,
    speed: 800,
    dots: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 4000,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          dots: true,
          arrows: false
        }
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          dots: true,
          arrows: false
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          dots: true,
          arrows: false
        }
      },
      {
        breakpoint: 568,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false
        }
      },
    ]

  });
  // overview slider
  $('.px_about_slider').slick({
    infinite: true,
    speed: 800,
    dots: false,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000
  });
  // overview slider
  $('.px_overview_slider').slick({
    infinite: true,
    speed: 800,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    prevArrow: '<button type="button" class="slick-prev px_btn"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="20" height="20" viewBox="0 0 12 16"> <path d="M12.003,15.996 L-0.000,7.997 L12.002,-0.001 L10.062,7.997 L12.003,15.996 ZM10.102,2.762 L2.246,7.997 L10.102,13.233 L8.832,7.997 L10.102,2.762 ZM3.824,7.997 L8.256,5.043 L7.539,7.997 L8.256,10.951 L3.824,7.997 Z" class="cls-1"/> </svg></span></button>',
    nextArrow: '<button type="button" class="slick-next px_btn"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" width="22" height="22" viewBox="0 0 8 12"><path d="M8.000,5.998 L-0.002,11.997 L1.292,5.998 L-0.002,-0.001 L8.000,5.998 ZM1.265,9.924 L6.502,5.998 L1.265,2.071 L2.112,5.998 L1.265,9.924 ZM5.451,5.998 L2.496,8.213 L2.974,5.998 L2.496,3.783 L5.451,5.998 Z" class="cls-1"/> </svg></span></button>',
    responsive: [
      {
        breakpoint: 991,
        settings: {
          arrows: false
        }
      },
    ]
  });
  //  shop single slider
  $('.px_shopsingle_for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    speed: 800,
    arrows: false,
    fade: true,
    asNavFor: '.px_shopsingle_nav'
  });
  $('.px_shopsingle_nav').slick({
    slidesToShow: 4,
    arrows: false,
    slidesToScroll: 1,
    asNavFor: '.px_shopsingle_for',
    dots: false,
    centerMode: true,
    focusOnSelect: true
  });
  // card slider
  $('.px_card_slider').slick({
    infinite: true,
    speed: 800,
    dots: false,
    arrows: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 4000,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
    ]
  });

  // datepicker
  $('.px_datepicker').datepicker({
    language: 'en'
  });

  // timepicker
  $('.px_timepicker').datepicker({
    dateFormat: ' ',
    timepicker: true,
    classes: 'only-timepicker',
    language: 'en'
  });

  // countTo
  $('.px_number>span>span').countTo();

  // search popup
  $('.px_search').on('click', function () {
    $(this).parent().find('.px_search_boxpopup').addClass('popup_open');
  })
  $('.px_cancel').on('click', function () {
    $(this).parent().removeClass('popup_open');
  })

  // menu toggle
  $('.px_toggle').on('click', function () {
    $(this).parent().toggleClass('menu_open');
    $(this).parent().find('.px_menu ul  li .px_submenu').parent().addClass('px_submenu_li')
  })
  $('.px_body_overlay').on('click', function () {
    $('.px_menu_wrapper').removeClass('menu_open');
  })
  // responsive menu
  $(document).on('click', '.px_menu > ul > li >a', function () {
    // console.log($(this).closest('li').find('ul.submenu'))
    $('.px_menu >ul > li>.px_submenu').removeClass('active');
    $(this).closest('li').find('>ul.px_submenu').addClass('active')
  })
  $(document).on('click', '.px_menu > ul > li > ul > li >a', function () {
    // console.log($(this).closest('li').find('ul.submenu'))
    $(this).closest('li').find('>ul.px_submenu').toggleClass('active')
  })

  // cart box
  $('.px_cart_wrapper').on('click', function () {
    $(this).parent().toggleClass('cart_open');
  })

  // login popup
  $('.px_signup').on('click', function () {
    $(this).closest('.modal-body').find('.px_login_box').removeClass('active');
    $(this).closest('.modal-body').find('.px_signup_box').addClass('active');
    $(this).closest('.modal-content').find('.modal-title').text('Sign Up');
  })
  $('.px_login').on('click', function () {
    $(this).closest('.modal-body').find('.px_login_box').addClass('active');
    $(this).closest('.modal-body').find('.px_signup_box').removeClass('active');
    $(this).closest('.modal-content').find('.modal-title').text('Login');
  })

  if ($('.px_select_box').length) {
    $(".px_select_box select").select2({
      placeholder: 'data-placeholder',
      allowClear: true
    });
  }
  // circle
  if ($('.px_progressbar').length) {
    $(".px_progressbar.p1").circularProgress({
      color: '#ff7010',
      starting_position: 0, // 12.00 o' clock position, 25 stands for 3.00 o'clock (clock-wise)
      percent: 0, // percent starts from
      percentage: true,
    }).circularProgress('animate', 45, 5000);
    $(".px_progressbar.p2").circularProgress({
      color: '#ff7010',
      starting_position: 0, // 12.00 o' clock position, 25 stands for 3.00 o'clock (clock-wise)
      percent: 0, // percent starts from
      percentage: true,
    }).circularProgress('animate', 94, 5000);
    $(".px_progressbar.p3").circularProgress({
      color: '#ff7010',
      starting_position: 0, // 12.00 o' clock position, 25 stands for 3.00 o'clock (clock-wise)
      percent: 0, // percent starts from
      percentage: true,
    }).circularProgress('animate', 84, 5000);
    $(".px_progressbar.p4").circularProgress({
      color: '#ff7010',
      starting_position: 0, // 12.00 o' clock position, 25 stands for 3.00 o'clock (clock-wise)
      percent: 0, // percent starts from
      percentage: true,
    }).circularProgress('animate', 64, 5000);
    $(".px_progressbar.p5").circularProgress({
      color: '#ff7010',
      starting_position: 0, // 12.00 o' clock position, 25 stands for 3.00 o'clock (clock-wise)
      percent: 0, // percent starts from
      percentage: true,
    }).circularProgress('animate', 76, 5000);
  }

  // step
  $(document).on('click', '.checkout_wrapper_box .next', function () {
    var targetNum = $(this).attr('data-step');
    $(this).closest('.checkout_wrapper_box').find('.step').css('display', 'none');
    $(this).closest('.checkout_wrapper_box').find('[data-target="' + targetNum + '"]').css('display', 'block');
    $(this).closest('.checkout_wrapper_box').find('[data-active="' + targetNum + '"]').addClass('active');
    // $(this).cloasest('.checkout_wrapper_box').find('data-target="'+targetNum+'"').css('display','block');
  })

  // number increase
  $('.quantity .plus').on('click', function () {
    var num = parseInt($('.quantity').find('input').val()) + 1;
    $(this).closest('.quantity').find('input').val(num);
  })
  $('.quantity .minus').on('click', function () {
    var num = parseInt($('.quantity').find('input').val()) - 1;
    $(this).closest('.quantity').find('input').val(num);
  })


})
$(window).on('load', function () {
  $('.px_loader').addClass('hide')
})

// Menu js for Position fixed
// $(window).scroll(function () {
//   var window_top = $(window).scrollTop() + 1;
//   if (window_top > 0) {
//     $('.px_menu_wrapper').addClass('menu_fixed ');
//   } else {
//     $('.px_menu_wrapper').removeClass('menu_fixed ');
//   }
// });

$(document).ready(function () {
  // Add class on page load
  $('.px_menu_wrapper').addClass('menu_fixed');

  // Keep class on scroll
  $(window).scroll(function () {
    var window_top = $(window).scrollTop() + 1;
    if (window_top > 0) {
      $('.px_menu_wrapper').addClass('menu_fixed');
    } else {
      $('.px_menu_wrapper').addClass('menu_fixed'); // Ensures it remains fixed
    }
  });
});



// Go Top Js
// =============================
$(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
    $('#scroll').fadeIn();
  } else {
    $('#scroll').fadeOut();
  }
});
$('#scroll').click(function () {
  $("html, body").animate({
    scrollTop: 0
  }, 600);
  return false;
});



// Contact Form Submission
function checkRequire(formId, targetResp) {
  targetResp.html('');
  var email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
  var url = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;
  var image = /\.(jpe?g|gif|png|PNG|JPE?G)$/;
  var mobile = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
  var facebook = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
  var twitter = /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/;
  var google_plus = /^(https?:\/\/)?(www\.)?plus.google.com\/[a-zA-Z0-9(\.\?)?]/;
  var check = 0;
  $('#er_msg').remove();
  var target = (typeof formId == 'object') ? $(formId) : $('#' + formId);
  target.find('input , textarea , select').each(function () {
    if ($(this).hasClass('require')) {
      if ($(this).val().trim() == '') {
        check = 1;
        $(this).focus();
        $(this).parent('div').addClass('form_error');
        targetResp.html('You missed out some fields.');
        $(this).addClass('error');
        return false;
      } else {
        $(this).removeClass('error');
        $(this).parent('div').removeClass('form_error');
      }
    }
    if ($(this).val().trim() != '') {
      var valid = $(this).attr('data-valid');
      if (typeof valid != 'undefined') {
        if (!eval(valid).test($(this).val().trim())) {
          $(this).addClass('error');
          $(this).focus();
          check = 1;
          targetResp.html($(this).attr('data-error'));
          return false;
        } else {
          $(this).removeClass('error');
        }
      }
    }
  });
  return check;
}

$(".submitForm").on('click', function () {
  var _this = $(this);
  var targetForm = _this.closest('form');
  var errroTarget = targetForm.find('.response');
  var check = checkRequire(targetForm, errroTarget);

  if (check == 0) {
    var formDetail = new FormData(targetForm[0]);
    formDetail.append('form_type', _this.attr('form-type'));
    $.ajax({
      method: 'post',
      url: 'ajaxmail.php',
      data: formDetail,
      cache: false,
      contentType: false,
      processData: false
    }).done(function (resp) {
      console.log(resp);
      if (resp == 1) {
        targetForm.find('input').val('');
        targetForm.find('textarea').val('');
        errroTarget.html('<p style="color:green;">Mail has been sent successfully.</p>');
      } else {
        errroTarget.html('<p style="color:red;">Something went wrong please try again latter.</p>');
      }
    });
  }
});

// video js
// var video = document.getElementById('videoElm')
// video.addEventListener('ended',function(){
//     video.currentTime = (parseInt(video.duration) - 10) * 1000;
//     video.play();
// })



// color theme option
var colorcode = document.cookie;
if (colorcode != "") {
  var cname = "colorcssfile";
  var name = cname + "=";
  var cssname = '';
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1);
    if (c.indexOf(name) != -1) {
      cssname = c.substring(name.length, c.length);
    }
  }

  if (cssname != '') {
    var new_style = 'assets/css/' + cssname + '.css';
    $('#theme-change').attr('href', new_style);
  }
};

//Color Change Script
$('.colorchange').on("click", function () {
  var name = $(this).attr('id');
  var new_style = 'assets/css/' + name + '.css';
  $('#theme-change').attr('href', new_style);
});

$("#style-switcher .bottom a.settings").on("click", function (e) {
  e.preventDefault();
  var div = $("#style-switcher");
  if (div.css("left") === "-160px") {
    $("#style-switcher").animate({
      left: "0px"
    });
  } else {
    $("#style-switcher").animate({
      left: "-160px"
    });
  }
});

//  home light slider


document.addEventListener('DOMContentLoaded', function () {
  const track = document.querySelector('.marquee-track');
  const clone = track.innerHTML;
  track.innerHTML += clone;

  // Adjust animation speed based on content width
  const duration = track.scrollWidth / 50;
  track.style.animationDuration = duration + 's';
});


