@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/aboutme')}}">关于我们管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/aboutme/add')}}"><span class="glyphicon glyphicon-plus"></span>新增关于我们信息</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">

            <h3><span class="glyphicon glyphicon-eye-open"></span>查看关于我们信息</h3>
                <div class="form-group">
                    <label for="exampleInputEmail1">标题</label>
                    <input type="text" class="form-control" name="title" value="{{$arr['title']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">内容</label>
                    <input type="text" class="form-control" name="content" value="{{$arr['content']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">小头像(50*50,jpg,png格式)</label>
                    <input type="text" class="form-control" name="iconpath" value="{{$arr['iconpath']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">图片(300*200,jpg,png格式)</label>
                    <input type="text" class="form-control" name="imgpath" value="{{$arr['imgpath']}}" disabled>
                </div>
                <a href="{{url('admin/aboutme')}}" class="btn btn-info">返回关于我们管理</a>
        </div>
        @if(count($errors) > 0)
            <div class="alert alert-danger" style="width:400px;margin:0 auto;!important;">
                <ul style="list-style: none;">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection