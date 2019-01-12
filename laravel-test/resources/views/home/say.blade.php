@extends('model.homemodel')
@section('title','个人信息')
@section('mycss')
    <link href="{{asset('home/css/say.css')}}" rel="stylesheet">
@endsection

@section('second')
    <a href=""><li>我的主页</li></a>
    <a href=""><li>资料</li></a>
    <a href=""><li>相册</li></a>
    <a href=""><li>分享</li></a>
    <a href=""><li>状态</li></a>
    <a href=""><li>说说</li></a>
    <a href=""><li>好友</li></a>
@endsection

@section('main')
    @foreach($say as $says)
    <div id="qq">
        <p>我的说说&nbsp&nbsp&nbsp{{$says->created_at}}</p>
        <div style="text-align: right">
                <textarea name="content" class="message" style="resize: none"  >{{$says->content}}</textarea>
                <a href="/delete/{{$says->id}}" class="btn btn-info ">删除</a>
        </div>
    </div>
    @endforeach
@endsection