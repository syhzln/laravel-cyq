$(function(){
    $('.friends_name a').mouseover(function(){
        $(this).addClass("active");
    }).mouseout(function(){
        $(this).removeClass("active");
    })
    $('.index_friendscomment_list').mouseover(function(){
        $(this).addClass("active").find('.friends_zan').css('display','block');
        $(this).find('.friends_delete').css('display','block');
    }).mouseout(function(){
        $(this).removeClass("active").find('.friends_zan').css('display','none');
        $(this).find('.friends_delete').css('display','none');
    })
    $('.friends_zan a').mouseover(function(){
        $(this).addClass("active");
    }).mouseout(function(){
        $(this).removeClass("active");
    })
    $('.friends_delete a').mouseover(function(){
        $(this).addClass("active");
    }).mouseout(function(){
        $(this).removeClass("active");
    })
})
