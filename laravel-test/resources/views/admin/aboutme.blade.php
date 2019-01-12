@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-film"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{asset('admin/aboutme')}}">关于我们管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/aboutme/add')}}"><span class="glyphicon glyphicon-plus"></span>新增关于我们信息</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    @if(count($errors) > 0)
        <div class="alert alert-danger" style="width:100%;height:50px;padding:0;line-height:30px;text-align:center;margin:0 auto;!important;">
            <ul style="list-style: none;height:20px;">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>内容</th>
            <th>小头像路径</th>
            <th>图片路径</th>
            <th>操作</th>
        </tr>
        @if($arr !=[])
            @foreach($arr as $a)
                <tr>
                    <td>{{$a['id']}}</td>
                    <td>{{$a['title']}}</td>
                    <td>{{$a['content']}}</td>
                    <td>{{$a['iconpath']}}</td>
                    <td>{{$a['imgpath']}}</td>
                    <td>
                        <a href="{{url('/admin/aboutme/del/'.$a['id'])}}" class="btn btn-success">删除</a>
                        <a href="{{url('/admin/aboutme/up/'.$a['id'])}}" class="btn btn-success">修改</a>
                        <a href="{{url('/admin/aboutme/look/'.$a['id'])}}" class="btn btn-success">查看</a>
                    </td>
                    @endforeach
                </tr>
                {{$arr->links()}}
                @endif
    </table>

    <style>
        table td,th{text-align: center;}
    </style>
@endsection