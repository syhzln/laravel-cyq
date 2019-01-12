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

            <h3><span class="glyphicon glyphicon-eye-open"></span>添加关于我们信息</h3>
            <form action="{{url('/admin/aboutme/doadd')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">标题</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">内容</label>
                    <input type="text" class="form-control" name="content">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">小头像(50*50,jpg,png格式)</label>
                    <input type="file" name="iconpath" style="margin-left:26%;" >
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">图片(300*200,jpg,png格式)</label>
                    <input type="file" name="imgpath" style="margin-left:26%;" >
                </div>
                <input type="submit" class="btn btn-default" value="新建">
            </form>
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