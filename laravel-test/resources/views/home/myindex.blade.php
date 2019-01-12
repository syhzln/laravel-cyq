@extends('model.homemodel')
@section('title','个人主页')
@section('mycss')
    <link href="{{asset('home/css/myindex.css')}}" rel="stylesheet">
@endsection

<div id="bd-main">
    <div class="bd-content" >
        <div id="cover">
            <div class="avatar">
                <div class="figure_con">
                    <figure id="uploadPic">
                        @if($user->avatar == 'Home/img/default.jpg')
                            <img width="177" src="{{asset($user->avatar)}}" id="userpic">
                        @else
                            <img width="177" src="{{asset('img/home/'.$user->avatar)}}" id="userpic">
                        @endif
                    </figure>

                </div>
            </div>

            <div class="cover-bg" style="background-image: url({{asset('home/img/banner-new.png')}})"><h1 class="avatar_title no_auth">{{$user->name}}。<span>
                <span class="more-tip" style="display: none;">
                </span>
                </span>
                </h1>
            </div>
            <div id="normal_cover" class="normal_cover">
                <img src="{{asset('img/home/'.$cover->img)}}"style="width: 860px;height: 200px">
            </div>
            <div class="comboBox">
                <form method="post" action="{{url('/updatecover')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <a href="javascript:;" class="file">选择封面
                        <input type="file" name="img" id="photo">
                    </a>
                    <input type="submit" value="确认更换" class="btn btn-info" style="padding:4px 12px !important;">
                </form>
            </div>
        </div>
        <div id="operate_area" class="clearfix">
            <div class="tl-information">
                 <a class="editinfo" href="{{url('../home/information')}}">编辑资料</a>
            </div>
        </div>
    </div>
</div>
@if(count($say))
@foreach($say as $says)
    <div id="qq">
        <p>我的说说&nbsp&nbsp&nbsp{{$says->created_at}}</p>
        <div style="text-align: right">
            <textarea name="content" class="message" style="resize: none"  >{{$says->content}}</textarea>
            <a href="/delete/{{$says->id}}" class="btn btn-info ">删除</a>
        </div>
    </div>
@endforeach
@endif
@section('main')
@endsection