$(document).ready(function() {
    $('.sidebar').hover(function() {
        if ($(window).width() > 1400) {
            $('.sidebar .sidebar-wrapper li .collapsible-header').css('height', '58px');
            $('.sidebar .sidebar-wrapper li').css('height', '58px');
            $('.sidebar .sidebar-wrapper').css('width', '220px');
            $('.sidebar').css('width', '220px');
        }
        if ($(window).width() < 1400) {
            $('.sidebar .sidebar-wrapper').css('width', '200px');
            $('.sidebar').css('width', '200px');
        }
        $('.sidebar .sidebar-wrapper li div p').css('display', 'block');
        $('.sidebar').css('opacity', '1');
        $('.sidebar').css('transition-duration', '0.5s')
        $('.sidebar .sidebar-wrapper').css('transition-duration', '0.5s')
        $('.sidebar .sidebar-wrapper li div p').addClass('animated fadeInLeft faster');
        $('.logo_mini').css('display', 'none');
        $('.logo_completo').css('display', 'block');

    }, function() {
        $('.sidebar .sidebar-wrapper li div p').css('display', 'none');
        if ($(window).width() > 1400) {
            $('.sidebar .sidebar-wrapper li .collapsible-header').css('height', '58px');
            $('.sidebar .sidebar-wrapper li').css('height', '58px');
            $('.sidebar').css('width', '60px');
            $('.sidebar .sidebar-wrapper').css('width', '60px');
        }
        if ($(window).width() < 1400) {
            $('.sidebar').css('width', '45px');
            $('.sidebar .sidebar-wrapper').css('width', '45px');
        }
        $('.sidebar').css('opacity', '1');
        $('.sidebar .sidebar-wrapper li div p').removeClass('animated fadeInLeft faster');
        $('.logo_completo').css('display', 'none');
        $('.logo_mini').css('display', 'block');
        $('.collapsible-body').css('display', 'none');
    });

});