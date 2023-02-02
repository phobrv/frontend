$(function(){$(window).scroll(function(){if($(this).scrollTop()!=0){$('#bttop').fadeIn();}else{$('#bttop').fadeOut();}});$('#bttop').click(function(){$('body,html').animate({scrollTop:0},800);});});
$(document).ready(function () {
    $('.search-button, .glyphicon-search').on('click', function(){
        $('.mb-search').toggle();
    });
});
$(document).ready(function () {
	lazyload();
    $(function(){
    	$(function(){$(window).scroll(function(){if($(this).scrollTop()!=0){$('#bttop').fadeIn();}else{$('#bttop').fadeOut();}});$('#bttop').click(function(){$('body,html').animate({scrollTop:0},800);});});
        var width_web = $(window).width();
        var width =  $(".thumb-box").width();
        $('.thumb-box').css('height', width*0.65);
    });
    $('.rstar1').barrating({
        theme: 'fontawesome-stars',
        readonly: true,
        initialRating:1,
        showSelectedRating: false
    });
    $('.rstar2').barrating({
        theme: 'fontawesome-stars',
        readonly: true,
        initialRating:2,
        showSelectedRating: false
    });
    $('.rstar3').barrating({
        theme: 'fontawesome-stars',
        readonly: true,
        initialRating:3,
        showSelectedRating: false
    });
    $('.rstar4').barrating({
        theme: 'fontawesome-stars',
        readonly: true,
        initialRating:4,
        showSelectedRating: false
    });
    $('.rstar5').barrating({
        theme: 'fontawesome-stars',
        readonly: true,
        initialRating:5,
        showSelectedRating: false
    });
});
var $mnav_panel = jQuery('#mobilenav');

jQuery('.panel-overlay').click(function(){
    $mnav_panel.toggleClass('opened');
    jQuery(this).removeClass('active');
});
jQuery("body").on('click touchstart','#mobilenav .arrow', function(){
    jQuery(this).parent('li').toggleClass('open');
    jQuery(this).parent('li').find('ul.sub-menu').slideToggle( "normal" );
});
jQuery('#showmenu').click(function(){
	$mnav_panel.toggleClass('opened');
	jQuery('.panel-overlay').toggleClass('active');
});