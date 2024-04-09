$('#mobile-main-menu > ul > li .button-arrow').click(function() {
    $(this).closest('li').find('.sub-menu').slideToggle();
    if ($(this).find('.fa-chevron-down').length === 1) {
        $(this).html('<i class="fa fa-chevron-right" aria-hidden="true"></i>')
    } else {
        $(this).html('<i class="fa fa-chevron-down" aria-hidden="true"></i>')
    }
});

$('.hidden-menu').click(function () {
    $('#mobile-main-menu').hide(200)
})

$('#toggle-show-menu .toggle-button').click(function () {
    $('#mobile-main-menu').show(200)
})

$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#to-top').fadeIn();
    } else {
        $('#to-top').fadeOut();
    }
});

$("#to-top").click(function () {
    //1 second of animation time
    //html works for FFX but not Chrome
    //body works for Chrome but not FFX
    //This strange selector seems to work universally
    $("html, body").animate({scrollTop: 0}, 200);
});

$(".button-show-share").click(function() {
    $('.box-social').slideToggle(200);
});

$(document).click(function (e) {
    const element = $('.wrapper-share-social')
    if (!element.is(e.target) && element.has(e.target).length === 0) {
        $('.wrapper-share-social .box-social').hide()
    }
});

async function shareOnSocial (type, url, pageTitle = '123' , popupWinWidth = 1200, popupWinHeight = 650) {
    let left = (screen.width - popupWinWidth) / 2;
    let top = (screen.height - popupWinHeight) / 4;
    switch (type) {
        case 'facebook':
            const urlSocial = 'https://www.facebook.com/sharer/sharer.php?u=' + url
            window.open(urlSocial, pageTitle, 'resizable=yes, width=' + popupWinWidth + ', height=' + popupWinHeight + ', top=' + top + ', left=' + left);
            break
    }
}



if (navigator.share) {
    $('.wrapper-share-social').hide()
} else {
    $('.wrapper-share-social-mobile').hide()
}

async function shareNavigator(url) {
    const data = {
        url: url,
    }
    try {
        navigator.share(data).then();
    } catch (error) {
    }
}

jQuery.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        return this.optional(element) || (new RegExp(regexp)).test(value);
    },"erreur expression reguliere"
);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#request-question').validate({
    rules: {
        name: {
            required: true,
            maxlength: 50,
        },
        phone: {
            required: true,
            regex: /^0[1-9]{1}[0-9]{8,9}$/,
        },
        content: {
            required: true,
            maxlength: 1000,
        },
    },
    messages: {
        name: {
            required: "Vui lòng nhập.",
            maxlength: "Tối đa 50 ký tự.",
        },
        phone: {
            required: "Vui lòng nhập.",
            regex: "Số điện thoại không hợp lệ.",
        },
        content: {
            required: "Vui lòng nhập.",
            maxlength: "Tối đa 1000 ký tự.",
        },
    },
    submitHandler: function() {
        const reCaptcha = $('#request-question textarea[name=g-recaptcha-response]').val()

        if (!reCaptcha) {
            $('.show-error-recaptcha').text('Vui lòng xác nhận bạn không phải là người máy.')
            return
        } else {
            $('.show-error-recaptcha').text('')
        }
        const data = {
            name: $('#request-question input[name=name]').val(),
            phone: $('#request-question input[name=phone]').val(),
            content: $('#request-question textarea[name=content]').val(),
            "g-recaptcha-response": reCaptcha,
        }

        $.ajax("support-and-consultation", {
            data: data,
            method: 'POST',
            success: function() {
                $('#request-question input[name=name]').val('')
                $('#request-question input[name=phone]').val('')
                $('#request-question textarea[name=content]').val('')
                grecaptcha.reset();

                $('#show-toast .toast-body').html(
                    `<p style="margin: 0">Cảm ơn bạn đã gởi câu hỏi. </p>
                    <p style="margin: 0">Chúng tôi sẽ liên hệ bạn ngay sau khi tiếp nhận.</p>`
                )
                const showToast = document.getElementById('show-toast')

                if (showToast) {
                    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(showToast)
                    toastBootstrap.show()
                }
            },
            error: function (error) {
                grecaptcha.reset();
                console.log(error.responseJSON)
            }
        });
    }
});

var swiper = new Swiper(".main-banner-swiper", {
    lazy: true,
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiperCourseImage = new Swiper(".thumb-course-images", {
    lazy: true,
    spaceBetween: 3,
    slidesPerView: 5,
    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 320px
        576: {
            slidesPerView: 5,
        },
        // when window width is >= 640px
        768: {
            slidesPerView: 7,
        },
        1200: {
            slidesPerView: 9,
        },
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
new Swiper(".course-images", {
    lazy: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    thumbs: {
        swiper: swiperCourseImage,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

$('#lv-navbar ul > li').hover(function() {
    // khi thẻ menu li bị hover thì drop down menu thuộc thẻ li đó sẽ trượt xuống(hiện)
    $('ul', this).addClass('show-submenu');
}, function() {
    // khi thẻ menu li bị out không hover nữa thì drop down menu thuộc thẻ li đó sẽ trượt lên(ẩn)
    $('ul', this).removeClass('show-submenu');
});
