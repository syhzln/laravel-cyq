@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/privilege')}}">权限管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/profile')}}"><span class="glyphicon glyphicon-plus"></span>新增权限</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            <th>Id</th>
            <th>权限路由</th>
            <th>权限名称</th>
            <th>权限描述</th>
            <th>操作</th>
        </tr>
        @foreach($activitys as $activity)
            <tr>
                <td>{{$activity->id}}</td>
                <td>{{$activity->name}}</td>
                <td>{{$activity->display_name}}</td>
                <td>{{$activity->description}}</td>
                <td>
                    <a href="alter/{{$activity->id}}" class="btn btn-success">修改</a>
                    <a href="/admin/delete/{{$activity->id}}" class="btn btn-success">删除</a>
                </td>
                @endforeach
            </tr>
    </table>
    {{$activitys->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
@endsection