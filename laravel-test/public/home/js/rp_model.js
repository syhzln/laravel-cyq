$(document).ready(function(){
// 在滚动条大于180高度是上升
    $(window).scroll(function(){
        if(document.body.scrollTop>180){
            $('#rp_top').slideUp();
        }
    });
    //在滚动条一定距离和浏览器的宽大于800时候下降
    $(window).scroll(function(){
        if(document.body.scrollTop<180 ){
            $('#rp_top').slideDown();
        }
    });
    //滚动条大于180时隐形
    if(document.body.scrollTop>180){
        $('#rp_top').css({
            'display':'none'
        });
    }
        if(document.body.scrollTop<180 ){
            $('#rp_top').slideDown();
        }
 });