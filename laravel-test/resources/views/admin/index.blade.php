@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="">用户管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('/admin/adduser')}}"><span class="glyphicon glyphicon-plus"></span>新增用户</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>性别</th>
            <th>邮箱</th>
            <th>学校信息</th>
            <th>工作信息</th>
            <th>基本信息</th>
            <th>喜欢</th>
            <th>操作</th>
        </tr>
        @if($users->isEmpty())
            <tr>
                <td colspan="9">表中没有数据,请添加!!!</td>
            </tr>
        @endif
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{($user->sex)==1?'男':(($user->sex)==2?'女':'')}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{url('/showschool')}}/{{$user->id}}" class="btn btn-info">查看</a></td>
            <td><a href="{{url('/showwork')}}/{{$user->id}}" class="btn btn-info">查看</a></td>
            <td><a href="{{url('/showinformation')}}/{{$user->id}}" class="btn btn-info">查看</a></td>
            <td><a href="{{url('/showlike')}}/{{$user->id}}" class="btn btn-info">查看</a></td>
            <td>
                <a href="{{url('/admin/index')}}/{{$user->id}}" class="btn btn-success">删除</a>
            </td>

        </tr>
        @endforeach
    </table>
    {{$users->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
@endsection