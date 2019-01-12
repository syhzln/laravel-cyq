//点击搜索框触发背景色
$(function(){

    $('#change_info li:first').css({
        'border-bottom':'3px solid blue'
    });
    $('#homeindex_search').click(function(){
        $('#homeindex_search').css({
            'border':'2px solid #ace',
            'outline':'none'
        });
        $('#search_info').css({
            'display':'block',
            'box-shadow':'0 2px 3px 0 #ccc',
        })
    });
    //失去失去搜索框焦点时失去边框色
    $('#homeindex_search').blur(function(){
        $('#homeindex_search').css({'border-color':'#1C68A4'});
        $('#search_info').css({
            'display':'none'
        })
    });
    //移入搜索框下面的字显示背景色
    $('#search_info li').mousemove(function(){
        $(this).css({'background-color':'#ccc'});
    });
    //移出搜索框下面的字移除背景色
    $('#search_info li').mouseout(function(){
        $(this).css({'background-color':''});
    });
    //在滚动条大于180高度是上升
    $(window).scroll(function(){
        if(document.body.scrollTop>180){
            $('#change_infof').slideUp('fast');
        }
    });
    //在滚动条一定距离和浏览器的宽大于800时候下降
    $(window).scroll(function(){
        if(document.body.scrollTop<180 && $(window).width()>800){
            $('#change_infof').slideDown('fast');
        }
    });
    //滚动条大于180时隐形
    if(document.body.scrollTop>180){
        $('#change_infof').css({
            'display':'none'
        });
    }
    //浏览器宽小于800自动隐藏
    //浏览器小于800 左边的变成小的图标,大于800自动变成长宽度的
    $(window).resize(function(){
        if($(window).width()<800){
            $('#change_infof').css({
                'display':'none',
            });
            $('#model_left').css({
                'width':'55px',
                'overflow':'hidden',
            });
            $('body').css({
                'margin-left':'55px'
            });
        }
        if($(window).width()>800){
            $('#model_left').css({
                'width':'150px',
            });
            $('body').css({
                'margin-left':'150px'
            });
        }
        if(document.body.scrollTop<180 && $(window).width()>800){
            $('#change_infof').slideDown('fast');
        }
        $('#change_infof').css({
            'width':$(window).width()-150+'px'
        });
        // $(body).css({
        //     'margin-left':'150px'
        // });
        // $('.model_main').css({
        //     'margin-left':'150px',
        // })
        if($('body').css('margin-left') != 150 ){
            $('.model_main').css({
                'margin-left':'150px',
            });
            $('body').css({
                'margin-left':'0',
            });
        }
        if($('body').css('margin-left') == 150 ){
            $('.model_main').css({
                'padding-left':'0',
            });
            $('body').css({
                'margin-left':'150px',
            });
        }
    });

    //刷新页面并且浏览器宽小于800时触发
    if($(window).width()<800){
        $('#change_infof').css({
            'display':'none'
        });
        $('body').css({
            'margin-left':'55px',
        });
        $('#model_left').css({
            'width':'55px'
        })
    }
    //点击评论的时候框变大,确认按钮出现
    // ====================================评论=========================================
    $('.index_friendstextarea').click(function(){
        $(this).css({
            'height':'130px'
        });
        $(this).siblings('span').css({
            'display':'inline-block'
        });
        $(this).siblings('button').css({
            'display':'inline-block'
        });
    });
    $('.index_friendstextarea').focus(function(){
        $(this).css({
            'height':'130px'
        });
        $(this).siblings('span').css({
            'display':'inline-block'
        });
        $(this).siblings('button').css({
            'display':'inline-block'
        })
    });
//submit阻值冒泡
//     $('.index_friendssureinfo').click(function(){
//
//     })
    $('button').mouseover(function(){
        $('.index_friendstextarea').blur(function (event) {
            event.stopPropagation();
            $(this).css({
                'height': '130px'
            });
            $(this).next('.index_friendshint').css({
                'display':'inline-block'
            });
            $(this).siblings('.index_friendssureinfo').css({
                'display':'inline-block'
            })
            $(this).parent('.index_friendscomment').css({
                'height':'180px'
            })
        })
    })

    $('.bq').mouseover(function(){
        $('.index_friendstextarea').blur(function () {
            $(this).css({
                'height': '130px'
            });
            $('.index_friendshint').css({
                'display':'inline-block'
            });
            $('.index_friendssureinfo').css({
                'display':'inline-block'
            })
        })
    })
    $('.bq').mouseout(function(){
        $('.index_friendstextarea').blur(function () {
            $(this).css({
                'height': '30px'
            });
            $('.index_friendshint').css({
                'display':'none'
            });
            $('.index_friendssureinfo').css({
                'display':'none'
            })
        })
    })
    $('button').mouseout(function(){
        $('.index_friendstextarea').blur(function () {
            $(this).css({
                'height': '30px'
            });
            $(this).next('.index_friendshint').css({
                'display':'none'
            });
            $(this).siblings('.index_friendssureinfo').css({
                'display':'none'
            })
            $(this).parent('.index_friendscomment').css({
                'height':'auto'
            })
        })
    })

    $('.index_friendstextarea').blur(function () {
           $('.index_friendstextarea').css({
               'height': '30px'
           });
           $('.index_friendshint').css({
               'display': 'none'
           });
           $('.index_friendssureinfo').css({
               'display': 'none'
           })
    })

    $('.limit_more a').click(function(event){
        event.stopPropagation();
        $(this).css({
            "display":'none'
        });
        $('.limit').css({
            'height':'auto'
        })
    })
//回复
    $('.friends_zan .receive').click(function(event){
        event.stopPropagation();
    })
    //赞
    $('.index_friendscomment_content .zan').click(function(event){
        event.stopPropagation();
    })
    //删除
    $('.friends_delete .delete').click(function(event){
        event.stopPropagation();
    })
    //评论
    $('.index_friendstextarea').click(function(event){
        event.stopPropagation();
    })
    //表情
    $('.bq').click(function(event){
        event.stopPropagation();
    })
    $('.face').click(function(event){
        event.stopPropagation();
    })
    //评论
    $('.limit').click(function(event){
        event.stopPropagation();
    })

    $(document).click(function(){
        $(".limit").css({
            'height':'124px'
        });
        $('.limit_more a').show();
    })
// --------------------------------------------------------------------------------
    //使第二行出现平均分布
    $('#change_infof').css({
        'width':$(window).width()-150+'px'
    });


    // $('.index_friendssureinfo').click(function(){
    //     alert(1);
    // })

    if($('body').css('margin-left') != 150 ){
        $('.model_main').css({
            'margin-left':'150px',
        });
        $('body').css({
            'margin-left':'0',
        });
    }
    if($('body').css('margin-left') == 150 ){
        $('.model_main').css({
            'padding-left':'0',
        });
        $('body').css({
            'margin-left':'150px',
        });
    }

});
var its=document.getElementsByClassName('index_friendstextarea');
var ics=document.getElementsByClassName('index_changenum');
for(var i in its) {
    (function (i) {
        its[i].oninput = function () {
            ics[i].innerHTML=its[i].value.length;
        }
    })(i)
}
