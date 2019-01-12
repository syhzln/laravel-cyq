@extends('model.homemodel')
@section ('title','举报中心')
@section('mycss')
    <link href="{{asset('home\css\report.css')}}" rel="stylesheet">
    @endsection
@section('main')
    <div class="report_main" style="width:860px;height: auto;margin: 0 auto;outline:3px solid #ace;padding:25px 30px;background-color: #fff">
        @if(count($errors) > 0)
            <div class="alert alert-danger" style="width:100%;padding:0;line-height:30px;text-align:center;margin:0 auto;!important;">
                <ul style="list-style: none;height:20px;">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{url('home/report')}}" method="post" enctype="multipart/form-data">
            <h1>举报</h1>
            <h3>本人信息</h3>
            <div class="form-group">
                <label for="exampleInputEmail1">姓名*</label>
                <input type="text" class="form-control" name="u1name" id="u1name" style="width:40%">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">手机号*</label>
                <input type="text" maxlength="11" minlength="11" class="form-control" name="u1phone"  id="u1phone" style="width:40%">
                <a class="btn btn-info" id="send_code">发送</a><span id="tishi" style="color:red"></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">手机验证码*</label>
                <input type="text" class="form-control" name="code" id="code" style="width:20%">
            </div>
            <h3>被举报者信息</h3>
            <div class="form-group">
                <label for="exampleInputEmail1">用户昵称*</label>
                <input type="text" class="form-control" name="username" id="username" style="width:40%">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">举报信息*</label><br>
                <textarea cols="40" rows="3" name="userinfo" id="userinfo" style="padding:5px 10px;resize: none"></textarea>
            </div>
            {{csrf_field()}}
            <input type="submit" class="btn btn-default" value="举报">
        </form>

    </div>
    @endsection
@section('my_js')
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script>
        $(function(){
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
            //发送验证码
            $('#send_code').click(function () {
                var a=$('#u1phone').val();
                $.ajax({
                  url:"{{url('home/sendcode')}}?_token={{csrf_token()}}",
                  data:"u1phone="+a,
                  type:"post",
                  success:function (data) {
                      $('#tishi').html(data);
                  },
                  error:function(){
                      $('#tishi').html('发送失败了');
                  },
                })
            })

        })

    </script>

    @endsection



