@extends('model.homemodel')
@section('title','我关注的好友')

@section('mycss')
    <link rel="stylesheet" href="{{asset('home/css/friends.css')}}">
@endsection

@section('main')
    @if(count($errors))
        <div>
        <ul class="alert alert-danger" style="width:100%;text-align:center;height:50px;margin:0 auto;!important;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="friends_out">
        <div class="friends_first">
            <ul>
                <a href="{{url('home/friends')}}"><li>我的好友</li></a>
                <a href="{{url('home/addfriends')}}"><li>添加好友</li></a>
                <a href="{{url('home/myfriends')}}"><li>我关注的用户</li></a>
                <a href="{{url('home/friendsmy')}}"><li>关注我的用户</li></a>
            </ul>
        </div>
        <div class="friends_second" >

            <span class="big"><span class="glyphicon glyphicon-th-large"></span></span>
            <span class="small"><span class="glyphicon glyphicon-th-list"></span></span>

        </div>
        <div class="friends_info_all" >
            @if($arr !=[])
                @foreach( $arr as $ar)
                    {{--一个好友start--}}
                    <div class="friends_info">
                        <div class="friends_pic">
                            <img src="{{asset((($ar['avatar']=='Home/img/default.jpg') || !file_exists('img/home/'.$ar['avatar']))?'/home/img/default.jpg':'img/home/'.$ar['avatar'])}}"  height="180" width="180">
                        </div>
                        <div class="friends_schools">
                            <ul>
                                <li class="friends_name">{{empty($ar['username'])?'这是默认名':$ar['username']}}</li>
                                <li>{{empty($ar['school'])?'':$ar['school']}}</li>
                                <li>{{empty($ar['company'])?'':$ar['company']}}</li>
                            </ul>
                        </div>
                        <a href="{{url('/home/delmyfriends/'.$ar['id'])}}" class="btn btn-default  btn-sm" style="width: 130px;text-align: center">取关</a>
                    </div>
                    {{--一个好友stop--}}

                    {{--一个小框的好友start --}}
                    <div class="friends_small">
                        <div class="friends_smallpic">
                            <img src="{{asset((($ar['avatar']=='Home/img/default.jpg') || !file_exists('img/home/'.$ar['avatar']))?'/home/img/default.jpg':'img/home/'.$ar['avatar'])}}"  height="50" width="50">
                            <ul>
                                <li class="friends_name">{{empty($ar['username'])?'这是默认名':$ar['username']}}</li>
                                <li>{{empty($ar['school'])?'':$ar['school']}}</li>
                                <li>{{empty($ar['company'])?'':$ar['company']}}</li>
                            </ul><br>
                            <a  href="{{url('/home/delmyfriends/'.$ar['id'])}}"> <button class="btn btn-default  btn-sm" >取关</button></a>
                        </div>
                    </div>
                    {{--一个小框的好友stop --}}
                @endforeach
            @else
                目前没有关注的好友
            @endif


        </div>
    </div>
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script>
        $(function(){
            //下拉框的边框
            $('.friends_first li:eq(2)').css({
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
                $('.friends_first li:eq(2)').css({
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


            $('.friends_second span').mousemove(function(){
                $(this).css({
                    'cursor':'pointer'
                })
            })
            $('.big').click(function(){
                $('.friends_info').css({
                    'display':'block'
                });
                $('.friends_small').css({
                    'display':'none'
                });
                $('.big span').css({
                    'color':'black'
                })
                $('.small span').css({
                    'color':'#ccc'
                })
            })

            $('.small').click(function(){
                $('.friends_info').css({
                    'display':'none'
                });
                $('.friends_small').css({
                    'display':'block'
                });
                $('.big span').css({
                    'color':'#ccc'
                });
                $('.small span').css({
                    'color':'#000000'
                })
            })

        })
    </script>
@endsection

