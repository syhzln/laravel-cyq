@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/praise-list')}}">点赞管理</a>    >>&nbsp; <a href="">点赞操作</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/praise-add/'.$links[0]->rid)}}"><span class="glyphicon glyphicon-plus"></span>新增点赞</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            <th>用户ID</th>
            <th>评论ID</th>
            <th>操作</th>
        </tr>
        @foreach($links as $zan)
            <tr>
                <td>{{$zan->id}}</td>
                <td>{{$zan->uid}}</td>
                <td>{{$zan->rid}}</td>
                <td>
                    <a href="{{url('admin/praise-delete/'.$zan->id)}}" class="btn btn-success">删除</a>
                </td>
                @endforeach
            </tr>
    </table>

    <style>
        table td,th{text-align: center;}
    </style>
@endsection