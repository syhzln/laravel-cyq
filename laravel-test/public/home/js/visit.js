$(function(){
    $('.toggleshow').mouseenter(function(){
        $(this).siblings('ul').css({
            'display':'block'
        })
        $(this).toggleClass('active');
    })
    if($(".rightmenu li[class='active']")){
        $('.rightmenu li').hover(function(){
            $(this).toggleClass('active');
        })
        $('.rightmenu').mouseleave(function(){
            $(this).hide();
            $('.toggleshow').removeClass('active');
        })
    }else{
        $('.toggleshow').mouseleave(function(){
            $('.rightmenu').hide();
            $(this).removeClass('active');
        })
    }
})