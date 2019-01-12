@extends('model.homemodel')
@section('mycss')
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/footer.css')}}">
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
<body>
  <div id="header">
      <div class="header_nav">
          <div id="logo"><img src="{{asset('home/img/logo.jpg')}}" alt="人人网"></div>
          <div class="nav-other">

              <div class="menu">
                  <a id="reg_link" title="注册" href="{{url('home/reg')}}">注册</a>
              </div>
              <div class="menu">
                  <a title="给我们提建议" href="">反馈意见</a>
              </div>
          </div>
      </div>
  </div>

 <div id="main">
     <div class="main_middle">
         <div id="left">
            <div class="top">
                <div class="men">
                <img src="{{asset('home/img/men_main.gif')}}" >
                </div>
            </div>
             @if(count($errors) > 0)
                 <div class="alert alert-danger" style="width:425px;!important;">
                     <ul>
                         @foreach($errors->all() as $error)
                             <li>{{$error}}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif
             {{--form表单--}}
             <form method="post" class="login-form" action="{{url('/singin')}}">
                 {{csrf_field()}}
                 <ul class="list" style="padding-left: 40px;">
                     <li>
                         <input type="text" name="email" class="input-text" id="email"  value="" placeholder="请输入邮箱" >
                     </li>
                     <li>
                         <input type="password" id="password" name="password" placeholder="请输入密码" class="input-text">
                     </li>
                      <div class="check">
                         <label title="为了确保您的信息安全，请不要在网吧或者公共机房勾选此项！" class="labelCheckbox">
                             <input type="checkbox" name="autoLogin" id="autoLogin" value="true" >下次自动登录
                         </label>


                         <span class="getpassword" id="getpassword"><a href="">忘记密码？</a></span>
                      </div>
                     <a href="{{url('home/reg')}}"  class="btn btn-success" id="reg" style="line-height: 34px"  >注册</a>
                         <input type="submit" class="btn btn-primary"  id="btn" value="登录" >
                 </ul>
             </form>

         </div>

         {{--轮播图--}}
         <div id="right">
             <div id="banner">
                 <div id="play">
                     <div id="playlist">
                         <a href="#" class="active"><img src="{{url('img/admin/'.$img['0']['img'])}}"></a>
                         <a href="#"><img src="{{url('img/admin/'.$img['1']['img'])}}"></a>
                         <a href="#"><img src="{{url('img/admin/'.$img['2']['img'])}}"></a>
                         <a href="#"><img src="{{url('img/admin/'.$img['3']['img'])}}"></a>
                         <a href="#"><img src="{{url('img/admin/'.$img['4']['img'])}}"></a>
                     </div>

                     <div id="icon">
                         <ul>
                             <li class="active">1</li>
                             <li>2</li>
                             <li>3</li>
                             <li>4</li>
                             <li>5</li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>
  <style>
      body{padding: 0;box-shadow: none;margin: 0;}
  </style>
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