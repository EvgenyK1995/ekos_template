import '../styl/index.styl';
import $ from 'jquery';

$(document).ready(() => {
    $('.humb-menu').on('click', () => {
        $('.mobile-menu').toggleClass('show');
        $('.header').toggleClass('menu-show');
    });
});
