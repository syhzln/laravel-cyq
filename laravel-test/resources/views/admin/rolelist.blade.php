@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/role-list')}}">角色管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/role-add')}}"><span class="glyphicon glyphicon-plus"></span>新增角色</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            <th>角色权限</th>
            <th>操作</th>
        </tr>
        @foreach($roles as $role )
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->display_name}}</td>
                <td>{{$role->description}}</td>
                <td>{{$role->perms}}</td>
                <td>
                    <a href="assignment/{{$role->id}}" class="btn btn-success">分配权限</a>
                    <a href="/admin/role-update/{{$role->id}}" class="btn btn-success">修改</a>
                    <a href="role-delete/{{$role->id}}" class="btn btn-success">删除</a>
                </td>
                @endforeach
            </tr>
    </table>
    {{$roles->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
@endsection