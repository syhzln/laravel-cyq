// ========================================================实现弹框======================================================
$(function(){
//        图标
    $('.zan img').mouseover(function(){
        $('.zanTop').css('display','block');
    }).mouseout(function(){
        $('.zanTop').css('display','none');
    })
    $('.zanTop').mouseover(function(){
        $(this).css('display','block');
    })
//切换
    $('#visit').mouseover(function(){
        $('.visitCut').css('display','block');
    }).mouseout(function(){
        $('.visitCut').css('display','none');
    })
//叉叉
    $('#listFriend img').mouseover(function(){
        $('#listFriend a').css('display','block');
    }).mouseout(function(){
        $('#listFriend a').css('display','none');
    })
    $('#listFriend a').mouseover(function(){
        $(this).css('display','block');
    })
//最近来访
    $('.visitIcon').hover(function(){
        $('#visit_01_Up').css('display','none');
        $(this).children('#visit_01_Up').css('display','block');
    },function(){
        $('#visit_01_Up').css('display','none');
        $(this).children('#visit_01_Up').css('display','none');
    })
    $('.visitCut .left').hover(function(){
        $('#visit_left_Up').css('display','block');
    },function(){
        $('#visit_left_Up').css('display','none');
    })
    $('.visitCut .right').hover(function(){
        $('#visit_right_Up').css('display','block');
    },function(){
        $('#visit_right_Up').css('display','none');
    })
    $('.visitMore').hover(function(){
        $('#visit_more_Up').css('display','block');
    },function(){
        $('#visit_more_Up').css('display','none');
    })
//        生日
    $('.birthMore').hover(function(){
        $('#birth_more_Up').css('display','block');
    },function(){
        $('#birth_more_Up').css('display','none');
    })
    $('.birthIcon').hover(function(){
        $('#birth_01_Up').css('display','none');
        $(this).children('#birth_01_Up').css('display','block');
    },function(){
        $('#birth_01_Up').css('display','none');
        $(this).children('#birth_01_Up').css('display','none');
    })

//        推荐
    $('#refereeTop .more').hover(function(){
        $('#referee_Up').css('display','block');
    },function(){
        $('#referee_Up').css('display','none');
    })
    $('#refereeTop .change').hover(function(){
        $('#referee_more_Up').css('display','block');
    },function(){
        $('#referee_more_Up').css('display','none');
    })

    $('#listFriend .jian').hover(function(){
        $('#friend_jian_Up').css('display','block');
    },function(){
        $('#friend_jian_Up').css('display','none');
    })
    $('#listFriend .jia').hover(function(){
        $('#friend_jia_Up').css('display','block');
    },function(){
        $('#friend_jia_Up').css('display','none');
    })

})
$(function(){
//         $('.rp_01 .zanTop').hover(function(){
//             $('.rp_01').find('#rp_01_Up').animate({opacity:'show',top:'0'},'slow');
//         },function(){
//             $('.rp_01').find('#rp_01_Up').animate({opacity:'hide',top:'20'},'fast');
//         })
    $('.rp_01 .zanTop').hover(function(){
        $('#rp_01_Up').css('display','block');
    },function(){
        $('#rp_01_Up').css('display','none');
    })
//      引入项目时设置top
    $('.rp_02').hover(function(){
        $('#rp_02_Up').css('display','block');
    },function(){
        $('#rp_02_Up').css('display','none');
    })
//         设置更多
    $('.rp_03').hover(function(){
        $('#rp_03_Up').css('display','block');
        $('#rp_032_Up').css('display','block');
    },function(){
        $('#rp_03_Up').css('display','none');
        $('#rp_032_Up').css('display','none');
    })
//         刷新获得
    $('#help .icon').hover(function(){
        $('#rp_Help_Up').css('display','block');
    },function(){
        $('#rp_Help_Up').css('display','none');
    })
//         帮助

});
// ==========================================倒计时=====================================
//    倒计时30分
// (function() {
//     var box = document.getElementById('box');
//     var rp03=document.getElementById('rp_03_Up');
//     var m = 30;
//     var s = 0;
//     var timeDate;
//     timeDate = setInterval(function () {
//         if (s == 0) {
//             m -= 1;
//             if (m >= 0) {
//                 s = 59;
//             } else {
//                 s = 0;
//             }
//         }
//         if (m <= 0) {
//             m = 0;
//         }
//         if (s < 0) {
//             clearInterval(timeDate);
//             rp03.style.display='none';
//             rp03.setAttribute('id','rp_032_Up');
//             return;
//         }
//         if(s < 10){
//             if(m < 10){
//                 box.innerHTML ='0'+m + '分0' + s + '秒';
//                 s--;
//             }else{
//                 box.innerHTML = m + '分0' + s + '秒';
//                 s--;
//             }
//         }else{
//             if(m <10){
//                 box.innerHTML ='0'+m + '分' + s + '秒';
//                 s--;
//             }else{
//                 box.innerHTML = m + '分' + s + '秒';
//                 s--;
//             }
//         }
//     },1000)
// })()
//                把时间存在在数据库，每次刷新取得数据库的值并判断值m,s 都为零rp+1
//                切换图片
$(function(){
    $('.zanTop').click(function(){
        $('.zan img').attr('src','/home/img/zan.png');
        $('#rp_01_Up').html('已赞');
    })
})
// ==========================================主板的切换===================================================
// {{--切换效果--}}
var bodys=document.getElementById('bodys');
var options=document.getElementById('optiond').getElementsByTagName('li');
var card=document.getElementById('card').getElementsByTagName('li');
for(var i=0;i<options.length;i++){
    (function(i){
        options[i].onclick=function(){
            for(var j=0;j < options.length;j++){
                options[j].className='';
            }
            options[i].className='active';
            for(var j=0;j < card.length;j++){
                card[j].className='';
            }
            card[i].className='active';
        }
    })(i)
}