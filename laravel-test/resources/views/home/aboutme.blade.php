@extends('model.homemodel')
@section('title','关于我们')
@section('mycss')
    <link href="{{asset('home/css/aboutme.css')}}" rel="stylesheet">
@endsection
@section('main')
    <div class="main11" style="width:960px;margin:0 auto;height:auto;padding:15px 25px;">
        <h1>中国领先的实名制sns网站</h1>
        会超好成立于2017年,是中国较领先的实名制的SNS网络平台.通过每个人正式的人际关系,满足各类用户对社交、资讯、娱乐等多方面的沟通需求。

        @if($arr!=[])
            @foreach($arr as $a)
                <div class="one_about">
                    <div class="one_left" style="float:left;width: 50%">
                        <img src="{{asset($a['iconpath'])}}" width='50'><br>
                        {{$a['content']}}
                    </div>
                    <div class="one_right" style="float: right;width: 50%">
                        <img src="{{asset($a['imgpath'])}}" width="300" height="200">
                    </div>
                </div>
            @endforeach
        @else
            敬请期待
        @endif
    </div>

    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script  >

        $(function(){
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


        });
    </script>
@endsection

