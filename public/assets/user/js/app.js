$('#menu > li').hover(function() {
    // khi thẻ menu li bị hover thì drop down menu thuộc thẻ li đó sẽ trượt xuống(hiện)
    $('.dropdown_menu', this).slideDown(200);
},function() {
    // khi thẻ menu li bị out không hover nữa thì drop down menu thuộc thẻ li đó sẽ trượt lên(ẩn)
    $('.dropdown_menu', this).slideUp(200);
});

$('.dropdown_menu > li').hover(function() {
    // khi thẻ dropdown_menu li bị hover thì submenusubmenu thuộc thẻ li đó sẽ trượt xuống(hiện)
    $('.submenu', this).slideDown(200);
},function() {
    // khi thẻ dropdown_menu li bị hover thì submenusubmenu thuộc thẻ li đó sẽ trượt lên(ẩnẩn)
    $('.submenu', this).slideUp(200);
});


$('#mobile-main-menu > ul > li .button-arrow').click(function() {
    $(this).closest('li').find('.sub-menu').slideToggle();
    if ($(this).find('.fa-chevron-down').length === 1) {
        $(this).html('<i class="fa fa-chevron-right" aria-hidden="true"></i>')
    } else {
        $(this).html('<i class="fa fa-chevron-down" aria-hidden="true"></i>')
    }
});

$('.hidden-menu').click(function () {
    $('#mobile-main-menu').hide('slow')
})

$('#toggle-show-menu .toggle-button').click(function () {
    $('#mobile-main-menu').show('slow')
})

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})
