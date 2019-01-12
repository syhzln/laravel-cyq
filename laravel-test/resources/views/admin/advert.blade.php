@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-film"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/advert')}}">广告管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/advert/add')}}"><span class="glyphicon glyphicon-plus"></span>新增广告</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            <th>链接地址</th>
            <th>标题</th>
            <th>图片名</th>
            <th>图片路径</th>
            <th>公司名(简介)</th>
            <th>公司英文名</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @if($arr !=[])
        @foreach($arr as $a)
            <tr>
                <td>{{$a['id']}}</td>
                <td>{{$a['link']}}</td>
                <td>{{$a['title']}}</td>
                <td>{{$a['photo_name']}}</td>
                <td>{{$a['photo_path']}}</td>
                <td>{{$a['company']}}</td>
                <td>{{$a['englishcompany']}}</td>
                <td>{{$a['status']==1?'大广告':'小广告'}}</td>
                <td>
                    <a href="{{url('/admin/advert/del/'.$a['id'])}}" class="btn btn-success">删除</a>
                    <a href="{{url('/admin/advert/up/'.$a['id'])}}" class="btn btn-success">修改</a>
                    <a href="{{url('/admin/advert/look/'.$a['id'])}}" class="btn btn-success">查看</a>
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