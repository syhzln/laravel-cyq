@extends('model.homemodel')
@section('title','我的留言')
@section('second')
    <a href="{{url('home/wtf')}}"><li>给好友留言</li></a>
    <a href="{{url('home/words')}}"><li>好友的留言</li></a>

@endsection
@section('mycss')
    <link rel="stylesheet" href="{{asset('home/css/words.css')}}">
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

                <a href="{{url('home/wtf')}}"><li>留言好友</li></a>
            </ul>
        </div>

        <div class="friends_info_all" >
            @if($arr !=[])
                @foreach( $arr as $ar)
                    <div class="wordsconment">
                        <div class="index_onefriend">
                            <!-- 头像 -->
                            <div class="index_friendimg">
                            @if($ar['avatar']=='home/img/default.jpg')
                                <img src="{{url('home/img/default_icon.png')}}" width="50">
                            @else
                                <img src="{{url('img/home/'.$ar['avatar'])}}" width="50">
                            @endif 
                            </div>
                            <!-- 谁什么时候发表什么 -->
                            <div class="index_friendinfo" >
                                <div>
                                    <div style="float: left">
                                        {{$ar['name']}}&nbsp; &nbsp; &nbsp;
                                    </div>
                                    <div style="float: right;width:60%;" >
                                        <form action="{{url('home/wordsdo/'.$ar['id'])}}" method="post">
                                            {{csrf_field()}}
                                            <textarea name="content"  rows="1" placeholder="请输入留言" style="width:100%;resize: none"></textarea>
                                            <input type="submit" style="margin-top:-20px;" value="留言" style="margin-bottom: 20px;">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
{{--                {{$ar->links()}}--}}
            @else
                <div class="wordsconment" style="padding:10px 25px">
                    目前您没有好友...
                </div>
            @endif
        </div>
    </div>
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script>
        $(function(){
            //下拉框的边框
            $('.friends_first li:eq(1)').css({
                'border-bottom':'3px solid blue'
            });
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
                });
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
            $('.index_onefriend').hover(function () {
                $(this).css({
                    'background-color':'#eee',
                })
            },function () {
                $(this).css({
                    'background-color':'',
                })
            })

        })
    </script>
@endsection







