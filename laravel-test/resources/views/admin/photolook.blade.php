@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/album')}}">相册管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/album/add')}}"><span class="glyphicon glyphicon-plus"></span>新增相册</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div style="width:100%;height:100%;">
        <div style="width:600px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">
            <h3><span class="glyphicon glyphicon-picture"></span>展示图片</h3>
            <img src="{{asset($arr)}}" width="300"><br>
            <a href="{{url('admin/album/look/'.$aid)}}" class="btn btn-info">返回 </a>
            <form action="{{url('/admin/photo/up/'.$id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="file" name="pic" style="margin-left:36%;" >
                <input type="submit" value="更新" class="btn btn-success">
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