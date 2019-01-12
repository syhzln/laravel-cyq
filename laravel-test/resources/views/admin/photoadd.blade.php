@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/album')}}">相册管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('/admin/photo/add/'.$aid)}}"><span class="glyphicon glyphicon-plus"></span>新增图片</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">

            <h3><span class="glyphicon glyphicon-picture"></span>添加图片</h3>
            <form action="{{url('/admin/dophotoadd')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" value="{{$aid}}" name="aid">
                <input type="file" name="pic" style="margin-left:26%;" >
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