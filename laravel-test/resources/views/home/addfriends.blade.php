@extends('model.homemodel')
@section('title','查找好友')

@section('mycss')
    <link rel="stylesheet" href="{{asset('home/css/friends.css')}}">
@endsection

@section('main')
    <div class="friends_out">
        <div class="friends_first">
            <ul>
                <a href="{{url('home/friends')}}"><li>我的好友</li></a>
                <a href="{{url('home/addfriends')}}"><li>添加好友</li></a>
                <a href="{{url('home/myfriends')}}"><li>我关注的用户</li></a>
                <a href="{{url('home/friendsmy')}}"><li>关注我的用户</li></a>
            </ul>
        </div>
        <div class="friends_search">
            <div class="friends_search1">
                <form action="{{url('home/searchfriends')}}" method="post">
                    {{csrf_field()}}
                    <input type="text" name="name" class="search" placeholder="请搜索好友的名字..." style="width:200px;height:33px;padding:6px;border-radius: 3px;">
                    <input type="submit" class="btn btn-info" value="搜索">
                </form>

            </div>

        </div>
        <div class="friends_info_all" >

        </div>
    </div>
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script>
        $(function(){
            //下拉框的边框
            $('.friends_first li:eq(1)').css({
                'border-bottom':'3px solid blue'
            })
            $('.friends_first li').mousemove(function(){
                $(this).css({
                    'border-bottom':'3px solid blue'
                })
            });
            $('.friends_first li').mouseout(function(){
                $(this).css({
                    'border-bottom':'none'
                })
                $('.friends_first li:eq(1)').css({
                    'border-bottom':'3px solid blue'
                })
            });
            //屏幕
            $(window).resize(function(){
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
            })


        })
    </script>
@endsection

