@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/user-list')}}">管理员管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/user-add')}}"><span class="glyphicon glyphicon-plus"></span>新增管理员</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            <th>用户名</th>
            <th>邮箱</th>
            <th>角色名称</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->roles}}</td>
                <td>
                    <a href="attach-role/{{$user->id}}" class="btn btn-success">分配角色</a>
                    <a href="user-update/{{$user->id}}" class="btn btn-success">修改</a>
                    <a href="user-delete/{{$user->id}}" class="btn btn-success">删除</a>
                </td>
                @endforeach
            </tr>
    </table>
    {{$users->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
@endsection