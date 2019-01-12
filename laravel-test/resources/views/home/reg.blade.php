@extends('model.homemodel')
@section('mycss')
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/reg.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/login.css')}}">
    <script type="text/javascript" src="{{asset('home/js/lunbo.js')}}"></script>
@endsection
@section('in_top')
@endsection
@section('in_left')
@endsection
@section('header')
@endsection
@section('fresh')
@endsection
@section('main')
    <style>
        body{margin:0;padding: 0;box-shadow: none}
    </style>
    <div id="header">
        <div class="header_nav">
            <div id="logo"><img src="{{asset('home/img/logo.jpg')}}" alt="人人网"></div>
            <div class="nav-other">

                <div class="menu">
                    <span class="right">已有人人帐号，<a href="{{url('/')}}">登录</a> </span>
                </div>
            </div>
        </div>
    </div>

    <div class="reg">
        <div class="register">
            <div class="header">注册新帐号 加入人人网</div>
            @if(count($errors) > 0)
                <div class="alert alert-danger" style="width:520px;!important;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{url('/store')}}">
                {{csrf_field()}}
                <div class="form_wrap">
                    用&nbsp户&nbsp&nbsp名:&nbsp&nbsp&nbsp<input type="text" name="name" id="name" class="forminput"><br><br>
                    邮&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp箱:&nbsp&nbsp&nbsp<input type="email" name="email" id="email" class="forminput"><br><br>
                    密&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp码:&nbsp&nbsp&nbsp<input type="password" name="password" id="password" class="forminput" placeholder="密码由6-20个字符组成"><br><br>
                    重复密码:&nbsp&nbsp&nbsp<input type="password" name="password_confirmation" id="password_confirmation" maxlength="20" class="forminput"><br><br>
                    <input type="submit" class="btn btn-success" id="btn" style="width:421px;!important;">
                </div>
            </form>

        </div>
    </div>
@endsection
@section('my_js')
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script>
        $(function(){
            $(window).resize(function(){
                if($('body').css('margin-left') != 150 ){
                    $('.model_main').css({
                        'margin-left':'0px',
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
                        'margin-left':'0px',
                    });
                }

            })
        })
    </script>
    @endsection